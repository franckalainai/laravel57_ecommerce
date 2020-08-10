<!DOCTYPE html>
<html>
<head>
<title>Billing Details</title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>

<style type="text/css">
    html, body{

        width: 890px;
        margin: 0 auto;
        }

        .StripeElement {
        box-sizing: border-box;

        height: 40px;

        padding: 10px 12px;

        border: 1px solid transparent;
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
        background-color: #fefde5 !important;}
</style>
</head>
<body>
    <h1>Billing Details</h1>
    <hr>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <form action="{{route('checkout.store')}}" method="post" id="payment-form">
                @csrf
                    <div class="form-group">
                    <input type="text" name="name" value="{{$c->customer_name}}" class="form-control"  placeholder="Name">
                    </div>

                    <div class="form-group">
                        <input type="text" name="email" value="{{$c->email}}" class="form-control"  placeholder="Email">
                    </div>

                    <div class="form-group">
                        <input type="text" name="phone" value="{{$c->phone}}" class="form-control" placeholder="Phone">
                    </div>

                    <div class="form-group">
                        <input type="text" name="City" value="{{$c->city}}" class="form-control" placeholder="City">
                    </div>

                    <div class="form-group">
                        <input type="text" name="district" value="{{$c->district}}" class="form-control" placeholder="District">
                    </div>

                    <div class="form-group">
                        <input type="text" name="commune" value="{{$c->commune}}" class="form-control" placeholder="Commune">
                    </div>

                    <div class="form-group">
                        <input type="text" name="postcode" value="{{$c->code}}" class="form-control" placeholder="Post Code">
                    </div>

                    <div class="form-group">
                        <input type="text" name="village" value="{{$c->village}}" class="form-control" placeholder="Village">
                    </div>

                    <div class="form-group">
                        <label for="card-element">
                        Credit or debit card
                        </label>
                        <div id="card-element">
                        </div>
                        <div id="card-errors" role="alert"></div>
                    </div>



                    <div class="form-group">
                        <button class="btn btn-success btn-md">Complete order</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">

                <div class="form-group">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Subtotal
                            <span class="badge badge-primary badge-pill">{{Cart::subtotal()}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tax
                            <span class="badge badge-primary badge-pill">{{Cart::tax()}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total
                            <span class="badge badge-primary badge-pill">{{Cart::total()}}</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_NTpznax6Yy3eHdruwGFRbHSY00fNgoujU5');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
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
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
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

</body>
</html>
