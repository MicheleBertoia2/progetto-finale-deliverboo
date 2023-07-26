<script>

import Restaurant from '../components/Restaurant.vue';
import Slider from '../components/Slider.vue';
import axios from 'axios';
import Loader from '../components/Loader.vue';
import Cart from '../components/Cart.vue';
import { store } from '../store/store';
import BtnCart from '../components/BtnCart.vue';

// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper styles
import 'swiper/css';

import 'swiper/css/navigation';


// import required modules
import { Navigation } from 'swiper/modules';

export default {
    name:'Home',

    data(){
        return{
            store,
            restaurants : [],
            title : 'Ecco una selezione di ristoranti per te',
            resTypes : [],
            typeSelected : [],
            // Breakpoints per rendere responsive lo slider
            swiperBreakpoints: {
                // Configurazione per schermi con larghezza fino a 320px (dispositivi mobili)
                320: {
                slidesPerView: 2, // Mostra 3 slide
                spaceBetween: 60, // Spazio tra le slide
                },
                // Configurazione per schermi con larghezza fino a 425px (dispositivi mobili)
                425: {
                slidesPerView: 3, // Mostra 4 slide
                spaceBetween: 60, // Spazio tra le slide
                },
                // Configurazione per schermi con larghezza fino a 510px (dispositivi mobili)
                510: {
                slidesPerView: 3, // Mostra 5 slide
                spaceBetween: 80, // Spazio tra le slide
                },

                570: {
                slidesPerView: 3, // Mostra 5 slide
                spaceBetween: 90, // Spazio tra le slide
                },
                // Configurazione per schermi con larghezza fino a 640px (dispositivi mobili)
                640: {
                slidesPerView: 4, // Mostra 6 slide
                spaceBetween: 60, // Spazio tra le slide
                },

                700: {
                slidesPerView: 4, // Mostra 6 slide
                spaceBetween: 60, // Spazio tra le slide

                },

                820: {
                slidesPerView: 7, // Mostra 6 slide
                spaceBetween: 30, // Spazio tra le slide
                },
                // configurazuiione da 915 in giú
                915: {
                slidesPerView: 6, // Mostra 7 slide
                spaceBetween: 60, // Spazio tra le slide
                },
                // Configurazione per schermi con larghezza da 768px a 991px (tablet)
                991: {
                slidesPerView: 7, // Mostra 7 slide
                spaceBetween: 50, // Spazio tra le slide
                },
                // Configurazione per schermi con larghezza superiore a 1200px (desktop)
                1200: {
                slidesPerView: 7, // Mostra 7 slide come prima
                spaceBetween: 85, // Spazio tra le slide come prima
                },
                // Configurazione per schermi con larghezza superiore a 1660px (desktop)
                1660: {
                slidesPerView: 7, // Mostra 7 slide come prima
                spaceBetween: 100, // Spazio tra le slide come prima
                },
            }


        }
    },

    components: {
        Restaurant,
        Loader,
        Slider,
        Cart,
        BtnCart,
        Swiper,
        SwiperSlide,

    },
    setup() {
        return {
        modules: [Navigation],
        };
    },

    methods:{

        getApi(endpoint = store.apiUrl + 'restaurants'){
            store.loaded = false;
            axios.get(endpoint)
                .then(res => {

                    this.restaurants = res.data.restaurants;
                    this.resTypes = res.data.types;
                    store.loaded = true;
                })

            },

        eseguiRicerca() {
        console.log(this.typeSelected);

        axios.get(store.apiUrl + 'restaurants/typesearch')
            .then(response => {
            // prendo tutti i ristoranti dalla chiamata dell'API
            let allRestaurants = response.data.restaurants;

            // li filtro in base agli id dei tipi selezionati
            this.restaurants = allRestaurants.filter(ristorante => {
                // utilizzo il metodo `every()` per verificare se ogni id della tipologia selezionata è incluso nell'array delle tipologie del ristorante corrente
                // il metodo `every()` restituisce true solo se tutti gli elementi dell'array soddisfano la condizione specificata
                return this.typeSelected.every(typeId => ristorante.types.some(type => type.id === typeId));
            });

            this.title = 'Risultati';
            store.loaded = true;
            })
            .catch(error => {
            console.log(error);
            });
        },

    },

    mounted(){
        this.getApi()
        // Carica il carrello salvato nel localStorage al momento del caricamento della pagina
        const savedCart = localStorage.getItem('cart');
        if (savedCart) {
            store.cartItems = JSON.parse(savedCart);
            }
    }
}
</script>

<template>

    <div class="jumbotron">
        <img src="img/jumbo.jpg" alt="jumbotron">
    </div>



    <div class="container-inner">

        <!-- <Slider /> -->

        <!-- VECCHIA VERSIONE RICERCA -->

        <!-- <ul class="d-flex bg-dark py-3">
            <li v-for="resType in this.resTypes" :key="resType.id"
                class="badge badge-success text-white "
                @click="getRestaurantsType(resType.slug)">{{ resType.name }}</li>
        </ul> -->


        <!-- nuova versione RICERCA -->
        <div class="d-flex flex-wrap justify-content-evenly align-items-center py-3 position-relative">
            <swiper
                :navigation="true"
                :slidesPerView="7"
                :spaceBetween="85"
                :breakpoints="swiperBreakpoints"
                class="mySwiper"
                :modules="swiperModules"
            >
                <swiper-slide v-for="(resType, index) in resTypes" :key="resType.id" class="mx-4 d-flex flex-column">
                    <label class="d-flex justify-content-center align-items-center" style="height: 130px; width: 130px; background-color: #3ABFB4; border-radius: 10px;" :for="resType.id">
                    <img :src="`img/${store.typesImages[index]}`" alt="Type Image">
                    </label>
                    <div class="d-flex">
                    <input class="me-2" @change="eseguiRicerca" type="checkbox" :id="resType.id" :value="resType.id" v-model="typeSelected"><span>{{ resType.name }}</span>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
        <Loader v-if="!store.loaded" />

        <div v-else class="container-restaurant">
            <!-- <span class="badge bg-pink">{{ title }}</span> -->
            <!-- <span class="badge mybadge">{{ title }}</span> -->
            <h1>{{ title }}</h1>

            <div v-if="restaurants.length > 0" class="wrapper">

                <Restaurant v-for="restaurant in this.restaurants" :key="restaurant" :restaurant="restaurant"/>

            </div>
            <div v-else class="wrapper">

                <h2>Non ci sono risultati</h2>

            </div>
        </div>
    </div>

    <Cart :modalOpen="store.showModal" :cartItems="store.cartItems" @close="store.showModal = false" />

    <BtnCart/>

</template>



<style lang="scss" scoped>

.jumbotron {
    height: 600px;
    width: 100%;
    img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
}

.container-inner{
    background-color: white;
    min-height: 400px;
    width: 100%;
}

//* sezione CHECKBOX

.custom-checkbox{
    width: 100%;
}

.mybadge {
    transition: all .5s;
    color: black;
    background-color: #3ABFB4 !important;
    // height: 40px;
    font-size: 2rem;
    margin: 40px 50px;
    border-radius: 15px;

    // &:hover {
        // color: white;
    // }
}
//* // CHECKBOX

// .badge{
//     background-color: #3ABFB4;
//     background-color: #f05167;
//     color: black;
//     font-size: 30px;
//     margin: 50px;
// }

.btn-dark {
    transition: all .5s;

    &:hover {
        color: #3ABFB4 !important;
    }
}

ul{
    li{
        cursor: pointer;
    }
}

.container-restaurant{
    // background-image: url("/img/pattern-anguria.jpg");
    background-image: url("/img/bg-60.jpg");

    overflow-y: auto;
    background-position: center;
    height: 700px;
    background-size: 100%;
    background-repeat: no-repeat;

    h1{
        padding: 50px;
    }
}

.wrapper{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding-bottom: 20px;
    // height: 100%;
    width: 100%;
}

//* slider
.swiper {
width: 100%;
height: 100%;
}

.swiper-slide {
text-align: center;
font-size: 18px;
background: #fff;

/* Center slide text vertically */
display: flex;
justify-content: center;
align-items: center;
}

.swiper-slide img {
display: block;
width: 100%;
height: 100%;
object-fit: cover;
}

</style>
