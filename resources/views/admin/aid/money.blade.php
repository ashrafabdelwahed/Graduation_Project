@extends('admin.index')

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


<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header d-flex align-items-center ">
                    <h3 class="mb-0 mr-5 btn btn-dark">التبرع اونلاين</h3>
                    @include('admin.layouts.message')

                </div>


                <div class="container-fluid mt-5">
                    <form action="{{ route('dashboard.stripe.charge') }}" method="post" id="payment-form">
                        @csrf
                            <div class="form-row justify-content-center mb-4">
                                <div class="col-12 col-md-6">
                                    <label class="h3" for="amount"> قيمة التبرع :</label>
                                    <input type="number" name="amount" min="1" class="form-control"
                                        placeholder="صافي القيمة بالجنية المصري">
                                </div>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="col-12 col-md-6">

                                    <label class="h3" for="card-element">
                                        Credit or debit card
                                    </label>
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>
                            </div>


                        <div class="form-group d-flex justify-content-center  mt-3">
                            <button class="btn btn-success">تأكيد التبرع</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection


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
