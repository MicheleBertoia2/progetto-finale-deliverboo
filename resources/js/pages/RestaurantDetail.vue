<script>
import axios from 'axios';
import { store } from '../store/store';
import Cart  from  '../components/Cart.vue';
import BtnCart from '../components/BtnCart.vue';


export default {
    name: 'RestaurantDetail',
    components: {
        Cart,
        BtnCart,
    },

    data() {
        return {
            store,
            restaurant: [],
            kmDistanza: 0,
            timing: 0,
            delivery: '',
            closingTime: '',
            showError: false,
        }
    },

    computed:{
        cartQuantity() {
            return function (dish) {
            const cartItemToShow = this.store.cartItems.find(cartItem => cartItem.id === dish.id);
            return cartItemToShow ? cartItemToShow.quantity : 0;
            };
        },

        isAllItemsFromCurrentRestaurant() {
            if (this.store.cartItems.length === 0) {
                return true; // Consideriamo il carrello vuoto come "tutti gli elementi del ristorante corrente"
            }
            return this.store.cartItems.every(item => item.restaurant_id === this.restaurant.id);
        },
    },

    methods: {
        getApi() {
            axios.get(store.apiUrl + 'restaurants/' + this.$route.params.slug)
                .then(result => {
                    this.restaurant = result.data;
                    console.log(this.restaurant);
                    //prova
                    this.restaurant.dishes.forEach(dish => {
                    dish.showDetail = false;
                    const cartItem = store.cartItems.find(item => item.id === dish.id);
                        if (cartItem) {
                            dish.isAdded = true;
                            dish.quantity = cartItem.quantity;
                        } else {
                            dish.isAdded = false;
                            dish.quantity = 1;
                        }

                    });
                })
                .catch(error => {
                    console.log(error);
                });

        },
        checkImgRestaurant(src) {
            if (this.restaurant.image) {
                return this.restaurant.image.includes(src);
            }
                return false;
        },
        getRAndomKm() {
            const min = 0.1;
            const max = 7.0;
            // Genera un numero casuale compreso tra min e max
            this.kmDistanza = (Math.random() * (max - min) + min).toFixed(1);

        },
        getTiming() {
            const min = 10;
            const max = 45;
            this.timing = Math.floor(Math.random() * (max - min + 1) + min);
        },
        getClosingTime() {
            const min = 0;
            const max = 5;
            let timing = Math.floor(Math.random() * (max - min + 1) + min);
            const randomStr = ['22:00', '22:30', '23:00', '23:30', '00:00', '00:30'];
            this.closingTime = randomStr[timing];
        },
        getDelivery() {
            const min = 0;
            const max = 4;
            let timing = Math.floor(Math.random() * (max - min + 1) + min);
            const randomStr = ["Consegna Gratuita", "Ordine minimo: 10,00€", "Ordine minimo: 15,00€", "Ordine minimo: 05,00€", "Consegna Gratuita"];
            this.delivery = randomStr[timing];
        },
        getImageUrl(imagePath) {
            // Aggiungo "storage/" al percorso dell'immagine
            return `storage/${imagePath}`;
        },
        clickingtrue(dish) {
            dish.showDetail = !dish.showDetail;
            event.preventDefault();
        },
        // prendo l'emit e faccio l'update delle variabili del piatto e del localstorage
        updateIsAdded(removedItem) {
        const dish = this.restaurant.dishes.find(dish => dish.id === removedItem.id);
        if (dish) {
            dish.isAdded = false;
            this.store.removeFromCart(dish.id);
            localStorage.setItem('cart', JSON.stringify(this.store.cartItems));
        }
        },

    },
    mounted() {
        const savedCart = localStorage.getItem('cart');
        this.getApi();
        this.getRAndomKm();
        this.getTiming();
        this.getClosingTime();
        this.getDelivery();
        if (savedCart) {
            store.cartItems = JSON.parse(savedCart);

        }

    }
}
</script>

<template>

    <div class="main-container pb-5 pt-3" >

        <div class="container py-5 restaurant-container">

            <div class="d-flex my-cnt">
                <router-link class="arrow badge bg-dark" :to="{ name: 'home' }"><i class="fa-solid fa-arrow-left"></i>
                    Indietro</router-link>
                <div>
                    <img class="rounded" v-if="checkImgRestaurant('../../img/placeholder-img.png')" src="../../img/placeholder-img.png" alt="placeholder">
                    <img v-else class="rounded" :src="restaurant.image" alt="restaurant-img">
                    <!-- //* funziona l'immagine dinamica ma non con il placholder (salvato nello storage)  -->
                    <!-- <img :src="restaurant.image" alt=""> -->
                    <!-- <img :src="`${restaurant.image}`" alt=""> -->
                    <!-- //* funziona il placeholder statico  -->
                    <!-- <img src="../../img/placeholder-img.png" alt="placeholder"> -->
                </div>
                <div class="info-locale">
                    <h1>{{ restaurant.name }}</h1>
                    <p>{{ restaurant.address }}</p>
                    <p>{{ delivery }}</p>
                    <span>{{ kmDistanza }} Km di distanza</span>
                </div>
            </div>
            <div class="delivery">
                <p class="m-2 "><i class="fa-solid fa-truck"></i> Consegna prevista fra {{ timing }} - {{ timing + 15 }} min</p>
                <p class="m-2">chiude alle: {{ closingTime }}</p>
                <div class=" types">
                    <span class="badge mybadge m-2" v-for="(type, i) in restaurant.types" :key="i">{{ type.name }}</span>
                </div>
            </div>
        </div>

        <div class="py-5" >
            <h2 class="text-center">I Nostri Piatti</h2>
            <div class="dishes d-flex containers flex-wrap py-5">
                <div v-for="(dish, i) in restaurant.dishes" :key="i" class="cards d-flex mt-5 ms-4" >
                    <div class="d-flex dish " :class="{'hidden': dish.showDetail}">
                        <img v-if="dish.image_path.includes('http://') || dish.image_path.includes('https://')" :src="dish.image_path" class="card-img-top imgdishes " :alt="dish.name">
                        <img v-else :src="getImageUrl(dish.image_path)" class="card-img-top imgdishes " :alt="dish.name">
                        <div class="card-body">
                            <h5 class="card-title">{{ dish.name }}</h5>
                            <p class="card-text m-0">{{ dish.ingredients }}</p>
                            <h6 class="my-1"><strong>{{ dish.price }} &euro;</strong></h6>
                            <a href="#" @click="clickingtrue(dish), store.gethiddencart()"  class="btn mybadge">Dettaglio Prodotto </a>
                            <button  class="btn btn-dark ms-3" @click="store.addToCart(dish),dish.isAdded=true" v-if="!dish.isAdded && isAllItemsFromCurrentRestaurant"><i class="fa-solid fa-cart-shopping"></i></button>
                            <div v-else-if="dish.isAdded" class="quantity-interface d-flex mt-2 align-items-center">
                                <div class="btn btn btn-dark" @click="store.modifyQuantity(dish,false)"><i class="fa-solid fa-minus" ></i></div>

                                <div class="mx-2"><strong>{{ cartQuantity(dish) }}</strong></div>

                                <div class="btn btn btn-dark" @click="store.modifyQuantity(dish,true)"><i class="fa-solid fa-plus" ></i></div>
                                <div class="btn btn-danger ms-3"  @click="dish.isAdded=false, store.removeFromCart(dish.id)"><i class="fa-solid fa-close" ></i></div>
                            </div>

                            <div v-else class="bg-tertiary ">
                                <strong >
                                    Puoi ordinare solo da un ristorante
                                </strong>
                                <div class="btn btn-danger" @click="this.store.emptyCart">Svuota Carrello</div>

                            </div>

                        </div>
                    </div>
                    <div class="overlay" v-if="restaurant.dishes.some(dish => dish.showDetail)">
                    </div>


                    <!-- @mouseleave="clickingtrue(dish)" -->
                        <section :class="{'hidden': !dish.showDetail, 'back': dish.showDetail}"

                        class="detail-dish">
                                <span class="exit d-flex justify-content-evenly w-100 ">
                                    <button class=" btn btn-dark" @click="clickingtrue(dish), store.gethiddencart()">
                                        X
                                    </button>
                                </span>
                                <img v-if="dish.image_path.includes('http://') || dish.image_path.includes('https://')" :src="dish.image_path"  :alt="dish.name"
                                class="detail-img">
                                <img v-else  class="detail-img" :src="getImageUrl(dish.image_path)"  :alt="dish.name">
                                <h5 class=" text-center m-0 mx-1">{{ dish.name }}</h5>
                                <div class="card-body p-2">
                                    <span class="price m-0 my-2 badge bg-dark d-block">{{ dish.price }} &euro;</span>
                                    <span class=""><strong>Ingredienti: </strong>{{ dish.ingredients }}</span>
                                    <p class="card-text mt-1">{{ dish.description }}</p>
                                </div>
                                <div class="detaildish-cart">
                                    <button v-if="!dish.isAdded && isAllItemsFromCurrentRestaurant" @click="store.addToCart(dish),dish.isAdded=true" class="btn btn-dark p-1">Aggiungi Al Carrello</button>
                                    <div v-else-if="dish.isAdded" class="w-75">

                                        <span class="add">
                                            <i  @click="store.modifyQuantity(dish,false)" class=" fa-solid fa-minus mt-1"></i>
                                            <h5 class="">{{ cartQuantity(dish) }}</h5>
                                            <i  @click="store.addToCart(dish),dish.isAdded=true" class="fa-solid fa-plus mt-1"></i>
                                        </span>
                                        <div class="d-flex">

                                        <div class="bg-dark text-white p-1 w-100 text-center rounded">Aggiunto <i class="fa-solid fa-check"></i></div>
                                        <button @click="dish.isAdded=false, store.removeFromCart(dish.id)" class="btn btn-danger w-25 ms-2">
                                            <i class="fa-solid fa-close"></i>
                                        </button>
                                        </div>
                                    </div>

                                    <div v-else class="btn btn-danger py-1 px-2" @click="store.emptyCart">
                                        <p>Puoi ordinare solo da un ristorante</p>
                                        <p>Clicca qui per svuotare il carrello</p>
                                    </div>
                                </div>

                        </section>


                </div>
            </div>

        </div>
    </div>

    <!-- CARRELLO-->
    <Cart :modalOpen="store.showModal" :cartItems="store.cartItems" @close="store.showModal = false" @item-removed="updateIsAdded" />
    <BtnCart />

</template>


<style lang="scss" scoped>
.main-container {
    .svuota{
        position: fixed;
        right: 1px;
        bottom: 50px;
        z-index: 5;
    }
    .disabled{
        pointer-events: none;
    }
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.363);
        z-index: 15;
        pointer-events: none;
        }
    .my-cnt {
        position: relative;
        margin-top: 10px;

        .arrow {
            text-decoration: none;
            position: absolute;
            top: -50px;
            font-size: 1rem;
            transition: all .5s;

            &:hover {
                color: #3ABFB4;
            }
        }

        img {
            width: 300px;

        }

        .info-locale {
            margin-left: 15px;
            color: #585C5C;
            font-size: .9rem;
            h1 {
                color: black;
                text-transform: capitalize;
            }
        }
    }

    .restaurant-container {
        display: flex;
        justify-content: space-between;
        /* provp a mettere relastiev qui per centrare il dettaglio del prodotto */
        position: relative;
        .delivery {
            p {
                i {
                    color: black;
                }
                font-size: .9rem;
                color: #585C5C;
            }
        }

    }
    .types {
        font-size: 1.3rem;
    }

    .mybadge {
        cursor: pointer;
        transition: all .5s;
        color: black;
        background-color: #3ABFB4 !important;

        &:hover {
            color: white;
        }
    }
    .dishes {
        background-color: #F9FAFA;
        margin: 0px auto;
        .cards {
            /*position: relative;*/
            .dish{
                transition: all .5s;

            }
            .imgdishes,img{
                width: 150px;
                height: 150px;
                border-radius: 15px;
            }
            .card-body{
                .price{
                    font-size: 1.1rem;
                }
                h5, .card-title{
                    width: 300px;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                }
                p, .card-text{
                width: 250px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap; /* Assicura che il testo non venga a capo */
                }
            }
        }
        .detail-dish {
            bottom: 0;
            overflow: auto;
            border-radius: 15px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 20;
            /*right: 800px;*/
            transition: all .5s;
            background-color: #3ABFB4;
            width: 430px;
            height: 600px;
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            justify-items: center;
            .exit{
                position: sticky;
                margin-bottom: 7px;
                right: 20px;
                top: 20px;
                width: 50px;
                button{
                    width: 40px;
                }
            }
            .detail-img, img{
                width: 100%;
                object-fit: cover;
                height: 300px;
                padding: 15px;
                border-radius: 30px;
            }
            .detaildish-cart{
                width: 100%;
                // height: 90px;
                background-color: #F9FAFA;
                display: flex;
                flex-direction: column;
                padding-bottom: 20px;
                padding-top: 10px;
                align-items: center;
                justify-content: center;
                position: sticky;
                bottom: 0;
                button{
                    width: 80%;
                }
                i{
                    cursor: pointer;
                }
            }
            .add{
                display: flex;
                justify-content:space-evenly;

            }
        }
    }

    .btn-dark {
        transition: all .5s;

        &:hover {
            color: #3ABFB4 !important;
        }
    }
    .hidden{
        opacity: 0;
        pointer-events: none;
    }
    .back{
        top: 50% !important;
        right: 50% !important;
    }
    @media screen and (max-width: 768px) {
        .restaurant-container {
            display: block;

        }
    }
    @media screen and (max-width: 930px) {
        .dishes {
            justify-content: center;

        }
    }
    @media screen and (max-width: 1404px) {
        .dishes {
            justify-content: space-evenly;

        }
    }

}
</style>
