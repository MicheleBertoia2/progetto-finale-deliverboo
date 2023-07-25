<script>

import {store} from '../store/store';


export default {
    name:'Checkout',
    data(){
        return{
            store,
            orderTotal : 100,
            order: [],
        }
    },
    mounted (){
        this.order = JSON.parse(localStorage.getItem('cart'));
        console.log(this.order);
        var button = document.querySelector('#submit-button');

        braintree.dropin.create({
        // Insert your tokenization key here
        authorization: 'sandbox_q7wkxr96_rntzhj86v4qk7kgg',
        container: '#dropin-container'
        }, function (createErr, instance) {
        button.addEventListener('click', function () {
            instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
            // When the user clicks on the 'Submit payment' button this code will send the
            // encrypted payment information in a variable called a payment method nonce
            $.ajax({
                type: 'POST',
                url: '/checkout',
                data: {'paymentMethodNonce': payload.nonce}
            }).done(function(result) {
                // Tear down the Drop-in UI
                instance.teardown(function (teardownErr) {
                if (teardownErr) {
                    console.error('Could not tear down Drop-in UI!');
                } else {
                    console.info('Drop-in UI has been torn down!');
                    // Remove the 'Submit payment' button
                    $('#submit-button').remove();
                }
                });

                if (result.success) {
                $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
                } else {
                console.log(result);
                $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
                }
            });
            });
        });
        });
    }

}
</script>

<template>
  <div class="container-inner">


    <div class="container">
        <h1 class="my-5">Checkout</h1>

        <div class="order-review my-3">
            <h3>Rivedi il tuo Ordine</h3>
            <ul>
                <li v-for="item in this.order" :key="item.id" class="d-flex">
                    <div class="imagebox">
                        <!-- <img :src="store.getFullImageUrl(item.image_path)" :alt="item.name"> -->
                    </div>
                    <div class="info">
                        <h5>{{ item.name }}</h5>
                        <div class="text-center px-3 py-1 border border-black">{{ item.quantity }}</div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="total">
            <h5>Totale: {{ orderTotal }} €</h5>
        </div>

        <div id="dropin-wrapper">
            <div id="checkout-message"></div>
            <div id="dropin-container"></div>
            <button id="submit-button">Submit payment</button>
        </div>
    </div>



</div>
</template>



<style>

</style>
