@extends("layouts.master")
@section ('title', 'Checkout')
@section ('head')
        <script src="https://js.stripe.com/v3/"></script>
        <script src="{{asset('js/stripe.js')}}"></script>
        <style>
            .StripeElement {
                padding: 10px 12px;
                width: 100%;
                color: #32325d;
                background-color: #fff;
                border: 1px solid transparent;
                border-radius: 5px;
                margin-bottom: 25px;
                margin-top: 10px;

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
            .p-LinkAutofillPrompt{
                display: none !important;
            }
            .p-AnimateSinglePresence {
                display: none !important;
            }
            .p-BillingAddressForm{
                display: none !important;
            }
        </style>
@endsection 
@section('content') 

    <header>
        <h1></h1>
        <h3></h3>
    </header>

    <main class="checkout-page">
        <div class="container">
            <div class="checkout-form">
                <form action="{{route('stripeCheckout')}}" id="payment-form" method="post">
                    @csrf 

                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="@error('name') has-error @enderror" placeholder="name" value="{{old('name') ? old('name') : auth()->user()->name}}">
                        @error('name')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="@error('email') has-error @enderror" placeholder="email" value="{{old('email') ? old('email') : auth()->user()->email}}">
                        @error('email')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="phone">Phone</label>
                        <input type="phone" id="phone" name="phone" class="@error('phone') has-error @enderror" placeholder="0756******" value="{{old('phone') ? old('phone') : auth()->user()->phone}}">
                        @error('phone')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="field">
                        <label for="country">Country</label>
                        <select name="country" id="country">
                            <option value="">-- Select Country --</option>
                            <option value="kenya">Kenya</option>                            
                            <option value="Uganda">Uganda</option>
                            <option value="senegal">Senegal</option>
                            <option value="morocco">Morocco</option>
                            <option value="South Africa">South Africa</option>                            
                        </select>
                        @error('country')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="city">City</label>
                            <input type="text" name="city" id="city" class="@error('class') has-error @enderror" placeholder="Nairobi" value="{{old('city')}}">  
                     
                        @error('city')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="zip">ZipCode</label>
                        <input type="text" id="zip" name="zip" class="@error('zip') has-error @enderror" placeholder="1234" value="{{old('zip')}}">
                        @error('zip')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="address">Address</label>
                        <input type="type" id="address" name="address" class="@error('address') has-error @enderror" placeholder="ABC St." value="{{old('address')}}">
                        @error('address')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                   <input type="hidden" name="payment_method_id" id="payment_method_id" value="">
                   <label for="card">Card Details</label>
                    <div id="card-element">
                        <!-- Elements will create form elements here -->
                    </div>
                    
                   <button class="btn btn-primary btn-block" type="submit" >Submit Payment</button>
                    
                </form>
            </div>
        </div>
    </main>

    <script> 
        var stripe = Stripe('pk_test_51MjbhpDaDediTcsKbmAthsyhQCBDkZmvjFf9RESQgbDW7asmY0ite7NWIwVx8zzrfLnnpFSF1KxWLdfvasTotJb300lQdkgn3F');
        var elements = stripe.elements();
        
        var style = {
            base: {
                color: "#32325d",
                fontFamily: 'Arial, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                color: "#ddd"
                }
            },
            invalid: {
                fontFamily: 'Arial, sans-serif',
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };

        var cardElement = elements.create('card', { style: style });
        // Stripe injects an iframe into the DOM
        cardElement.mount("#card-element");
        
        const form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: 'Test Name',
                },
            }).then(stripePaymentMethodHandler);
        });

        function stripePaymentMethodHandler(result) {
            if (result.error) {
                //show error in payment form
            } else {
                document.getElementById('payment_method_id').value = result.paymentMethod.id
                form.submit();
            }
        }
                
    </script>

@endsection 