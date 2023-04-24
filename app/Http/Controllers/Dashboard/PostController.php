<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Storage;
use App\Post;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class PostController extends Controller
{

    public function __construct() {

        $this->middleware(['permission:read_posts'])->only('index');
        $this->middleware(['permission:create_posts'])->only('create');
        $this->middleware(['permission:update_posts'])->only('edit');
        $this->middleware(['permission:delete_posts'])->only('destroy');

    }


    public function index()
    {

        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.posts.create', compact('categories'));
    }


    public function store(Request $request)
    {



        $request_data  =  $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'image'     => 'required|image',
            'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime,video/x-flv,video/mp4',
            'category_id'   => 'required|numeric'
        ]);

        $request_data['slug'] = Str::slug($request_data['title'], '-');


        $request_data['user_id'] = Auth::user()->id;

        if($request->hasFile('video')) {

            if($request->video->getSize() >= '12600000') {
                session()->flash('error', 'يجب تحميل فيديو لا يتخطي 12 ميجا');

                return redirect()->back()->withInput();

            }else {
                $request_data['video'] = $request->video->store('videos/posts', 'public');
            }
        }


        $request_data['image'] = $request->image->store('images/posts', 'public');


        Post::create($request_data);
        session()->flash('updated', 'تم الاضافة بنجاح');
        return redirect()->route('dashboard.posts.index');
    }


    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.posts.edit', compact('post','categories'));
    }


    public function update(Request $request, Post $post)
    {
        $request_data  =  $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'image'     => 'image',
            'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime,video/x-flv,video/mp4',
            'category_id'   => 'required|numeric'
        ]);

        $request_data['user_id'] = Auth::user()->id;


        if($request->hasFile('video')) {

            if($request->video->getSize() >= '12600000') {
                session()->flash('error', 'يجب تحميل فيديو لا يتخطي 12 ميجا');
            }else {
                Storage::disk('public')->delete($post->video);
                $request_data['video'] = $request->video->store('videos/posts', 'public');
            }
        }

        if ($request->image) {
            Storage::disk('public')->delete($post->image);
            $request_data['image'] = $request->image->store('images/posts', 'public');
        }

        $post->update($request_data);
        session()->flash('updated', 'تم التعديل بنجاح');
        return redirect()->route('dashboard.posts.index');
    }





    public function destroy(Post $post)
    {

        Storage::disk('public')->delete($post->image);
        Storage::disk('public')->delete($post->video);
        $post->delete();
        session()->flash('deleted', 'تم الحذف بنجاح');
        return redirect()->route('dashboard.posts.index');
    }




}
