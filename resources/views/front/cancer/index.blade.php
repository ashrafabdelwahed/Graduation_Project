@extends('layouts.app')

@section('content')



    <section class="experiences  py-5">
        <div class="title text-center">
            <h2 class=" text-primary mb-3">التوعية بالسرطان</h2>
            <hr class="w-25 m-auto mb-5 text-primary">
        </div>

        <div class="container mb-5">
            <!-- تعريف المرض بشكل عام -->

            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-cancer-tab" data-bs-toggle="pill" href="#pills-cancer"
                        role="tab" aria-controls="pills-cancer" aria-selected="true">تعريف السرطان</a>
                </li>



                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-protection-tab" data-bs-toggle="pill" href="#pills-protection"
                        role="tab" aria-controls="pills-protection" aria-selected="false">علامات وأعراض السرطان</a>
                </li>

            </ul>



            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active  p-3 bg-white rounded shadow" id="pills-cancer" role="tabpanel"
                    aria-labelledby="pills-cancer-tab">

                    <div class="wpb_wrapper">
                        <p dir="rtl" style="text-align: right;"><strong>ما هو السرطان:</strong></p>
                        <ul dir="rtl" style="text-align: right; padding-right: 30px;">
                            <li>السرطان هو انقسام ونمو غير مسيطر عليه لخلايا غير طبيعية والتي ممكن أن تصيب أي نسيج في
                                الجسم، وهو ليس مرض وحيد وإنما مجموعة من أكثر من 100 مرض مختلف.</li>
                        </ul>
                        <ul dir="rtl" style="text-align: right; padding-right: 30px;">
                            <li>السرطان يمكن أحياناً ان ينتشر لأجزاء أخرى في الجسم عن طريق الدم والجهاز اللمفاوي. ،
                                وتسمى معظم السرطانات طبقا لنوع الخلية أو العضو الذي بدأ فيه السرطان .</li>
                        </ul>
                        <p dir="rtl" style="text-align: right;"><strong>مراحل السرطان ودرجاته :</strong></p>
                        <ul dir="rtl" style="text-align: right; padding-right: 30px;">
                            <li>مرحله السرطان تعبر عن مدى حجمه وما إذا كان قد انتشر إلى أجزاء اخرى من الجسم.</li>
                            <li>درجة السرطان تعبر عن مدى كون الخلايا السرطانية غير طبيعية.</li>
                        </ul>
                        <p dir="rtl" style="text-align: right;">يمكن أن يعالج السرطان بنجاح إذا تم تشخيصه في مرحلة مبكرة
                            قبل انتشاره إلى أجزاء أخرى, فعلى سبيل المثال :أكثر من 90% من النساء المصابات بسرطان الثدي
                            واللاتي تم تشُخيصهن في مرحلة مبكرة, أصبحن ناجيات من المرض ، لذلك ينصح البالغين بإجراء فحوصات
                            السرطان بانتظام للمساعدة على الكشف المبكر للمرض.</p>
                        <p dir="rtl" style="text-align: right;"><strong>طرق علاج السرطان :</strong></p>
                        <p dir="rtl" style="text-align: right;">هناك ثلاثة أنماط رئيسية لعلاج السرطان : ” العلاج
                            الكيماوي , الجراحة , الإشعاع”</p>
                    </div>

                </div>
                <div class="tab-pane fade p-3 bg-white rounded shadow" id="pills-protection" role="tabpanel" aria-labelledby="pills-protection-tab">

                    <div class="wpb_wrapper">
                        <ul style="padding-right: 30px;">
                        <li dir="rtl" style="text-align: right;">فقدان الوزن غير المبرر.</li>
                        <li dir="rtl" style="text-align: right;">سماكه أو ورم في أي جزء من الجسم .</li>
                        <li dir="rtl" style="text-align: right;">تغيرات غير طبيعية في الثدي (ورم ,إفرازات ….).</li>
                        <li dir="rtl" style="text-align: right;">السعال المستمر أو خروج دم أثناء السعال.</li>
                        <li dir="rtl" style="text-align: right;">بحة في الصوت تستمر لفتره طويلة.</li>
                        <li dir="rtl" style="text-align: right;">دم في البراز.</li>
                        <li dir="rtl" style="text-align: right;">تغير في عادات التبرز (إمساك أو إسهال ).</li>
                        <li dir="rtl" style="text-align: right;">تغير في عادات التبول أو وظيفة المثانة.</li>
                        <li dir="rtl" style="text-align: right;">صعوبة في البلع.</li>
                        <li dir="rtl" style="text-align: right;">نريف مهبلي غير مبرر.</li>
                        <li dir="rtl" style="text-align: right;">تقرحات لا تلتئم.</li>
                        <li dir="rtl" style="text-align: right;">حمى غير مبررة.</li>
                        </ul>
                        </div>

                </div>
            </div>

        </div>



        <!-- الامراض -->
        <div class="container">

            <div class="title text-center">
                <h2 class="mb-3">انواع السرطان </h2>
                <p> اعرف انواع السرطان وطرق الوقاية الخاصة بكل نوع</p>
                <hr class="w-25 m-auto mb-5 text-primary">
            </div>

            <div class="row">

                @foreach ($cancers as $cancer)


                <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img src=" {{ $cancer->image_path }}"  height="250px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $cancer->name }} </h5>
                            <p class="card-text">
                                {!! strip_tags(Str::limit( $cancer->content, 113)) !!}

                            </p>
                            <a href=" {{ route('cancer.show', $cancer->slug) }} " class="btn btn-primary">اعرف اكتر</a>
                        </div>
                    </div>
                </div>

                @endforeach


            </div>
        </div>
    </section>





@endsection
