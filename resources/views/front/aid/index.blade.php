@extends('layouts.app')



@section('css')

<style>
    .StripeElement {
        box-sizing: border-box;

        height: 40px;
        width: 100%;
        padding: 10px 12px;

        border: 1px solid #dee2e6;
        border-radius: 4px;
        background-color: white;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }


    .card-errors {}

</style>




@endsection


@section('content')



<section class="experiences  py-5">
    <div class="title text-center mb-5">
        <h2 class=" text-primary mb-3">التبرع لمرضى السرطان</h2>
        <hr class="w-25 m-auto mb-2 text-primary">
    </div>



    <div class="container">

        @include('layouts.message')

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('stripe.charge') }}" method="POST" id="payment-form">
                    @csrf
                    <div class="form-group row">
                        <label for="donor" class="col-sm-1-12 col-form-label">اسم المتبرع</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="donor"  placeholder="اسم المتبرع" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-1-12 col-form-label">رقم الموبايل</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="phone" placeholder="رقم الموبايل" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-1-12 col-form-label">البريد الالكتروني</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-1-12 col-form-label" for="amount"> قيمة التبرع :</label>
                        <div class="col-sm-12">
                            <input type="number" name="amount" min="1" class="form-control"
                                placeholder="صافي القيمة بالجنية المصري">
                        </div>
                    </div>

                    <div class="form-row  justify-content-center">
                        <label class="col-sm-1-12 col-form-label" for="card-element">
                            Credit or debit card
                        </label>
                        <div class="col-12">
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                    </div>


                    <div class="form-group d-flex justify-content-center  mt-4">
                        <button class="btn btn-success">تأكيد التبرع</button>
                    </div>


                </form>
            </div>
        </div>
    </div>


</section>



@section('js')

<script>
    // Create a Stripe client.
    var stripe = Stripe('pk_test_9m3PW72PtN7CU4pR5x6YGxc300uD2Tbrop');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            border: "1px solid #000",
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.on('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        stripe.createToken(card).then(function (result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }

</script>

@endsection



@endsection
