<script>
import axios from 'axios';
import { store } from '../store/store';


export default {
    name: 'RestaurantDetail',
    components: {

    },

    data() {
        return {
            store,
            restaurant: [],
            kmDistanza: 0,
            timing: 0,
            delivery: '',
            closingTime: '',
            hover:false,
            click: false,
        }
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
                    });
                })
                .catch(error => {
                    console.log(error);
                });

        },
        checkImg(src) {
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
        hoveringfalse(){
        this.hover = false
        },
        flagChangeFalse(){
            this.flag = false
        },
        clickingtrue(dish) {
            dish.showDetail = !dish.showDetail;
            event.preventDefault();
        },
    },
    mounted() {
        this.getApi();
        this.getRAndomKm();
        this.getTiming();
        this.getClosingTime();
        this.getDelivery();
    }
}
</script>

<template>

<!-- 
<div class="main-container">

    <div class="container d-flex py-5">
        <div>
            <img v-if="checkImg('../../img/placeholder-img.png')" src="../../img/placeholder-img.png" alt="placeholder">
            <img v-else :src="restaurant.image" alt="restaurant-img">
            <!-- //* funziona l'immagine dinamica ma non con il placholder (salvato nello storage)  -->
            <!-- <img :src="restaurant.image" alt=""> -->
            <!-- <img :src="`${restaurant.image}`" alt=""> -->
            <!-- //* funziona il placeholder statico  -->
            <!-- <img src="../../img/placeholder-img.png" alt="placeholder"> -->
        </div>
        <h1>{{ restaurant.name }}</h1>
    </div>
-->
    <div class="main-container pb-5 pt-3">

        <div class="container py-5 restaurant-container">

            <div class="d-flex my-cnt">
                <router-link class="arrow badge bg-dark" :to="{ name: 'home' }"><i class="fa-solid fa-arrow-left"></i>
                    Indietro</router-link>
                  <div>
                    <img v-if="checkImg('../../img/placeholder-img.png')" src="../../img/placeholder-img.png" alt="placeholder">
                    <img v-else :src="restaurant.image" alt="restaurant-img">
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

        <div class="containers dishes">
            <h2 class="text-center">I Nostri Piatti</h2>
            <div class="dishes d-flex container flex-wrap">
                <div v-for="(dish, i) in restaurant.dishes" :key="i" class="cards d-flex mt-5 ms-4">
                    <div class="d-flex dish" :class="{'hidden': dish.showDetail}">
                        <img :src="getImageUrl(dish.image_path)" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ dish.name }}</h5>
                            <p class="card-text">{{ dish.ingredients }}</p>
                            <a href="#" @click="clickingtrue(dish)" class="btn mybadge">Dettaglio Prodotto</a>
                            <a href="#" class="btn btn-dark ms-3"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                <span :class="{'hidden': !dish.showDetail, 'back': dish.showDetail}"
                @mouseleave="clickingtrue(dish)"
                class=" detail-dish">
                    ciao gigiiiiiiiii
                </span>


                </div>
            </div>

        </div>
    </div>
</template>


<style lang="scss" scoped>
.main-container {
    .back{
        right: 0px !important;
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
            h1 {
                color: black;
                text-transform: capitalize;
            }
            

            margin-left: 15px;
            color: #585C5C;
            font-size: .9rem;
        }
    }

    .restaurant-container {
        display: flex;
        justify-content: space-between;

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
        .cards {
            position: relative;
            .dish{
                transition: all .5s;
            }
            img {
                width: 150px;
                border-radius: 15px;
            }
        }
        .detail-dish {
            position: absolute;
            z-index: 10;
            right: 800px;
            transition: all .5s;
            background-color: #3ABFB4;
            width: 350px;
            height: 350px;
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
    @media screen and (max-width: 768px) {
        .restaurant-container {
            display: block;

        }
    }
}</style>
