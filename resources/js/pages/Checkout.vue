<script>

import {store} from '../store/store';


export default {
    name:'Checkout',
    data(){
        return{
            store,
            orderTotal : 0,
            order: [],
            page: 1,
            isPayed: false,
            customer: {
                name: "",
                email: "",
                phone: "",
                address: "",
            },
        }
    },

    methods: {
        calculateOrderTotal() {
            let total = 0;
            for (const item of this.order) {
                total += parseFloat(item.price) * item.quantity;
            }
            this.orderTotal = total;
            },



    },

    mounted (){
        this.order = JSON.parse(localStorage.getItem('cart'));
        this.calculateOrderTotal();
        const thisVue = this


        // BRAINTREE DROP-IN
        var button = document.querySelector('#submit-button');

        braintree.dropin.create({
        // Insert your tokenization key here
        authorization: 'sandbox_q7wkxr96_rntzhj86v4qk7kgg',
        container: '#dropin-container',
        locale: 'it_IT',
        amount: this.orderTotal,
        }, (createErr, instance) =>{
        button.addEventListener('click', (event) => {
            instance.requestPaymentMethod((requestPaymentMethodErr, payload) =>{

            // When the user clicks on the 'Submit payment' button this code will send the
            // encrypted payment information in a variable called a payment method nonce
            $.ajax({
                type: 'POST',
                url: '/api/checkout-order',
                data: {'paymentMethodNonce': payload.nonce,}
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
                    $.ajax({
                    type: 'POST',
                    url: '/api/order-store',
                    data: {
                        // faccio un'altra chiamata in post per mandare i dati allo store degli orders
                        //uso thisVue invece di this perchè ha lo scope diverso
                        customer: thisVue.customer,
                        order: thisVue.order,
                        orderTotal: thisVue.orderTotal,

                    },
                    }).done((submitResult) => {
                    console.log(submitResult);
                    }).fail((submitError) => {

                    console.error(submitError);
                    });
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

        <div class="order-review my-3" v-if="this.page === 1">
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
            <div class="total">
                <h5>Totale: {{ orderTotal.toFixed(2) }} €</h5>
            </div>
            <button class="btn btn-primary" @click="this.page++">Avanti</button>
        </div>


        <div class="container" v-show="this.page === 2">

            <form  >

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" v-model="customer.name" required />
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" v-model="customer.email" required />
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Telefono</label>
                    <input type="tel" class="form-control" id="phone" v-model="customer.phone" required />
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo</label>
                    <input type="text" class="form-control" id="address" v-model="customer.address" required />
                </div>


            </form>
            <div id="dropin-wrapper" >
                <div id="checkout-message"></div>
                <div id="dropin-container"></div>
                <div class="amount-label">Totale: {{ orderTotal.toFixed(2) }} €</div>
                <button id="submit-button" class="btn btn-primary">Submit payment</button>
            </div>

            <button class="btn btn-primary" @click="this.page--">Indietro</button>

        </div>
    </div>



</div>
</template>



<style>
  /* Stile del Drop-in UI */
  .braintree-sheet {
    /* Regola le dimensioni e il posizionamento dell'iframe */
    width: 100%;
    height: 100%;


    /* Personalizza i colori di sfondo e del testo */
    background-color: #f9f9f9;
    color: #333;

    /* Personalizza i font */
    font-family: Arial, sans-serif;
    font-size: 14px;

    /* Personalizza i margini e i padding */
    margin: 0;
    padding: 10px;

    /* Personalizza il bordo e l'ombra */
    border: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  }

  /* Personalizza gli elementi figli all'interno dell'iframe */
  .braintree-sheet label {
    /* Personalizza le etichette dei campi di input */
    font-weight: bold;
  }


[data-braintree-id="toggle"] {
  display: none;
}



</style>
