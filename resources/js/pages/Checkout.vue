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
            errorPay: false,
            customer: {
                name: "",
                email: "",
                phone: "",
                address: "",
            },
            isFieldTouched: {
                name: false,
                email: false,
                phone: false,
                address: false,
            },
        }
    },

    computed:{
        // computed con regole di validazione del form
        isFormValid() {
        const isNameValid = this.customer.name.trim().length >= 3;

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const isEmailValid = emailPattern.test(this.customer.email.trim());

        const phonePattern = /^\d{10}$/;
        const isPhoneValid = phonePattern.test(this.customer.phone.trim());

        const isAddressValid = this.customer.address.trim().length >= 8;

        return isNameValid && isEmailValid && isPhoneValid && isAddressValid;
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
        // metodiper mostrare il messaggio di errore solo se il  campo viene toccato
        validateName() {
        this.isFieldTouched.name = true;

        // se il campo è valido resetto la proprietà isTouched per nascondere l'errore, vale per tutti i controlli
        if (this.customer.name.trim().length >= 3) {
            this.isFieldTouched.name = false;
        }
        },

        validateEmail() {
        this.isFieldTouched.email = true;

        if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.customer.email.trim())) {
            this.isFieldTouched.email = false;
        }
        },

        validatePhone() {
        this.isFieldTouched.phone = true;

        if (/^\d{10}$/.test(this.customer.phone.trim())) {
            this.isFieldTouched.phone = false;
        }
        },

        validateAddress() {
        this.isFieldTouched.address = true;

        if (this.customer.address.trim().length >= 8) {
            this.isFieldTouched.address = false;
        }
        },




    },

    mounted (){
        this.order = JSON.parse(localStorage.getItem('cart'));
        if (this.order.length === 0) {
            this.$router.push({ name: 'home' });

        }else{this.calculateOrderTotal();
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


                        $.ajax({
                        type: 'POST',
                        url: '/api/order-store',
                        data: {
                            // faccio un'altra chiamata in post per mandare i dati allo store degli orders
                            //uso thisVue invece di this perchè ha lo scope diverso
                            customer_name: thisVue.customer.name,
                            customer_mail: thisVue.customer.email,
                            customer_address: thisVue.customer.address,
                            customer_phone: thisVue.customer.phone,
                            restaurant_id: thisVue.order[0].restaurant_id,
                            total_price: thisVue.orderTotal.toFixed(2),

                        },
                        }).done((submitResult) => {
                        console.log(submitResult);
                        thisVue.page++
                        thisVue.isPayed = true
                        store.emptyCart()
                        }).fail((submitError) => {
                            thisVue.page++
                            thisVue.errorPay = true
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

}
</script>

<template>
    <div class="container-inner">


        <div class="container" v-show="this.order.length > 0">
            <h1 class="my-5">Checkout</h1>

            <div class="order-review my-3 page-1" v-if="this.page === 1">
                <h3 class="mb-3">Rivedi il tuo Ordine</h3>
                <ul class="d-flex flex-wrap">
                    <li v-for="item in this.order" :key="item.id" class="d-flex">
                        <div class="imagebox m-2">
                            <img :src="store.getFullImageUrl(item.image_path)" :alt="item.name" style="width: 150px;">
                        </div>
                        <div class="info p-2">
                            <h5>{{ item.name }}</h5>
                            <span class="text-center">Quantità: <strong>
                                x{{ item.quantity }}
                            </strong>
                            </span>
                        </div>
                    </li>
                </ul>
                <div class="total mb-3">
                    <h5>Totale: {{ orderTotal.toFixed(2) }} €</h5>
                </div>
                <span class="mb-5">
                    <button class="btn btn-dark">Indietro</button>
                    <button class="btn btn-dark ms-3" @click="this.page++">Avanti</button>
                </span>

            </div>


            <div class="container page-2 mb-5" v-show="this.page === 2">

                <form  >

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" v-model="customer.name" @input="validateName" required />
                        <small v-if="!isNameValid && isFieldTouched.name" class="text-danger">Il nome deve avere almeno 3 caratteri.</small>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" v-model="customer.email" @input="validateEmail" required />
                        <small v-if="!isEmailValid && isFieldTouched.email" class="text-danger">Inserisci un indirizzo email valido.</small>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefono</label>
                        <input type="tel" class="form-control" id="phone" v-model="customer.phone" @input="validatePhone" required />
                        <small v-if="!isPhoneValid && isFieldTouched.phone" class="text-danger">Il numero di telefono deve essere composto da 10 cifre.</small>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Indirizzo</label>
                        <input type="text" class="form-control" id="address" v-model="customer.address" @input="validateAddress" required />
                        <small v-if="!isAddressValid && isFieldTouched.address" class="text-danger">L'indirizzo deve avere almeno 8 caratteri.</small>
                    </div>


                </form>
                <div id="dropin-wrapper " >
                    <div id="checkout-message"></div>
                    <div id="dropin-container"></div>
                    <div class="amount-label mb-3">Totale: {{ orderTotal.toFixed(2) }} €</div>
                </div>

                <button class="btn btn-dark" @click="this.page--">Indietro</button>
                <button id="submit-button" class="btn btn-dark ms-3" :disabled="!this.isFormValid">Submit payment</button>

            </div>

            <div class="container page-3 mb-5" v-if="this.page === 3">
                <div v-if="this.isPayed">
                    <h3 class="mb-5 slide-in-right"> <i class="fa-solid fa-check"></i> Operazione avvenuta con successo!</h3>
                    <span class="d-block p-2">
                        <h6 class="slide-in-right">Il Tuo Ordine Arriverà a Breve, Buon Appetito.</h6>
                        <img class="mt-5 shake-vertical ms-4" src="img/logosingle.png" alt="">
                    </span>

                    <div class="btn btn-dark mt-3">
                        <router-link :to="{ name: 'home' }" class="btn btn-dark">Torna alla Home</router-link>
                    </div>
                </div>
                <div v-if="this.errorPay">
                    <h3>Ops! qualcosa è andato storto</h3>
                </div>
            </div>
        </div>
    </div>
</template>



<style lang="scss">
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
.btn-dark:hover{
    color: #3ABFB4 !important;
}
.page-1{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0px auto;
    min-height: 400px;
    img{
        border-radius: 5px;
    }
    ul{
        width: 100%;
    }
}
.page-2{
    min-height: 600px;
}
.page-3{

    padding: 15px;
    min-height: 600px;
    .slide-in-right {
	-webkit-animation: slide-in-right 1s ease-in-out both;
	animation: slide-in-right 1s ease-in-out both;
    }
    @-webkit-keyframes slide-in-right {
    0% {
        -webkit-transform: translateX(1000px);
                transform: translateX(1000px);
        opacity: 0;
    }
    100% {
        -webkit-transform: translateX(0);
                transform: translateX(0);
        opacity: 1;
    }
    }
    @keyframes slide-in-right {
    0% {
        -webkit-transform: translateX(1000px);
                transform: translateX(1000px);
        opacity: 0;
    }
    100% {
        -webkit-transform: translateX(0);
                transform: translateX(0);
        opacity: 1;
    }
    }

    .shake-vertical {
	                -webkit-animation: shake-vertical 3s cubic-bezier(0.455, 0.030, 0.515, 0.955) infinite both;
	                animation: shake-vertical 6s cubic-bezier(0.455, 0.030, 0.515, 0.955) infinite both;
                }
                    @-webkit-keyframes shake-vertical {
                    0%,
                    100% {
                        -webkit-transform: translateY(0);
                                transform: translateY(0);
                    }
                    10%,
                    30%,
                    50%,
                    70% {
                        -webkit-transform: translateY(-8px);
                                transform: translateY(-8px);
                    }
                    20%,
                    40%,
                    60% {
                        -webkit-transform: translateY(8px);
                                transform: translateY(8px);
                    }
                    80% {
                        -webkit-transform: translateY(6.4px);
                                transform: translateY(6.4px);
                    }
                    90% {
                        -webkit-transform: translateY(-6.4px);
                                transform: translateY(-6.4px);
                    }
                    }
                    @keyframes shake-vertical {
                    0%,
                    100% {
                        -webkit-transform: translateY(0);
                                transform: translateY(0);
                    }
                    10%,
                    30%,
                    50%,
                    70% {
                        -webkit-transform: translateY(-8px);
                                transform: translateY(-8px);
                    }
                    20%,
                    40%,
                    60% {
                        -webkit-transform: translateY(8px);
                                transform: translateY(8px);
                    }
                    80% {
                        -webkit-transform: translateY(6.4px);
                                transform: translateY(6.4px);
                    }
                    90% {
                        -webkit-transform: translateY(-6.4px);
                                transform: translateY(-6.4px);
                    }

                }
}



</style>
