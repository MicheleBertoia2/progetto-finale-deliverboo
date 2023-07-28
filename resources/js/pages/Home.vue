<script>

import Restaurant from '../components/Restaurant.vue';
import Slider from '../components/Slider.vue';
import axios from 'axios';
import Loader from '../components/Loader.vue';
import Cart from '../components/Cart.vue';
import { store } from '../store/store';
import BtnCart from '../components/BtnCart.vue';
import GhostScene from '../components/GhostScene.vue';

// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper styles
import 'swiper/css';

import 'swiper/css/navigation';


// import required modules
import { Navigation } from 'swiper/modules';

export default {
    name: 'Home',

    data() {
        return {
            store,
            restaurants: [],
            title: 'Ecco una selezione di ristoranti per te',
            resTypes: [],
            typeSelected: [],
            isNavigationVisible: true,
            currentPage: 1,
            swiperBreakpoints: {
                // Configurazione per schermi con larghezza fino a 320px (dispositivi mobili)
                220: {
                    slidesPerView: 1, // Mostra 3 slide
                    spaceBetween: 60, // Spazio tra le slide
                },
                320: {
                    slidesPerView: 2, // Mostra 3 slide
                    spaceBetween: 60, // Spazio tra le slide
                },
                // Configurazione per schermi con larghezza fino a 425px (dispositivi mobili)
                425: {
                    slidesPerView: 2, // Mostra 4 slide
                    spaceBetween: 70, // Spazio tra le slide
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
                    slidesPerView: 5, // Mostra 6 slide
                    spaceBetween: 30, // Spazio tra le slide
                },
                // configurazuiione da 915 in giú
                915: {
                    slidesPerView: 5, // Mostra 7 slide
                    spaceBetween: 60, // Spazio tra le slide
                },
                // Configurazione per schermi con larghezza da 768px a 991px (tablet)
                991: {
                    slidesPerView: 5, // Mostra 7 slide
                    spaceBetween: 70, // Spazio tra le slide
                },
                1030: {
                    slidesPerView: 5, // Mostra 7 slide
                    spaceBetween: 70, // Spazio tra le slide
                },
                1085: {
                    slidesPerView: 5, // Mostra 7 slide
                    spaceBetween: 90, // Spazio tra le slide
                },
                // Configurazione per schermi con larghezza superiore a 1200px (desktop)
                1200: {
                    slidesPerView: 5, // Mostra 7 slide come prima
                    spaceBetween: 120, // Spazio tra le slide come prima
                },

                1415: {
                    slidesPerView: 5, // Mostra 7 slide come prima
                    spaceBetween: 150, // Spazio tra le slide come prima
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
        GhostScene,
    },
    setup() {
        return {
            modules: [Navigation],
        };
    },

    methods: {

        getApi(endpoint = store.apiUrl + 'restaurants') {
            store.loaded = false;
            axios.get(endpoint)
                .then(res => {

                    this.restaurants = res.data.restaurants;
                    this.resTypes = res.data.types;
                    this.title ='Ecco una selezione di ristoranti per te';
                    store.loaded = true;
                })

        },

        eseguiRicerca() {
            this.currentPage = 1;
            if (this.typeSelected.length === 0) {
                this.getApi()
            }else{

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
            }

        },
        onWindowResize() {
            this.isNavigationVisible = window.innerWidth >= 768;
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
            this.currentPage++;
            }
        },
        prevPage() {
            if (this.currentPage > 1) {
            this.currentPage--;
            }
        }

    },

    computed:{
        paginatedRestaurants() {
            const pageSize = 6;
            const currentPage = this.currentPage;
            const startIndex = (currentPage - 1) * pageSize;
            const endIndex = startIndex + pageSize;
            return this.restaurants.slice(startIndex, endIndex);
        },
        totalPages() {
            const pageSize = 6;
            return Math.ceil(this.restaurants.length / pageSize);
        }
    },

    mounted() {

        window.addEventListener('resize', this.onWindowResize);
        this.onWindowResize();
        this.getApi()
        // Carica il carrello salvato nel localStorage al momento del caricamento della pagina
        const savedCart = localStorage.getItem('cart');
        if (savedCart) {
            store.cartItems = JSON.parse(savedCart);
        }
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.onWindowResize);
    },
}
</script>

<template>

    <!-- BELO JUMBO -->
    <GhostScene/>

    <!-- BRUTO  VECHIO JUMBO -->
    <!-- <div class="jumbotron">
        <img src="img/jumbo.jpg" alt="jumbotron">
    </div> -->



    <div class="container-inner">

        <!-- <Slider /> -->

        <!-- VECCHIA VERSIONE RICERCA -->

        <!-- <ul class="d-flex bg-dark py-3">
            <li v-for="resType in this.resTypes" :key="resType.id"
                class="badge badge-success text-white "
                @click="getRestaurantsType(resType.slug)">{{ resType.name }}</li>
        </ul> -->


        <!-- nuova versione RICERCA -->
        <div class="d-flex flex-wrap justify-content-evenly align-items-center position-relative">
            <swiper  :navigation="isNavigationVisible" :slidesPerView="7" :spaceBetween="30" :breakpoints="swiperBreakpoints"
                class="mySwiper" :modules="swiperModules">
                <swiper-slide  v-for="(resType, index) in resTypes" :key="resType.id" class="mx-4 d-flex flex-column "
                    :class="{ 'checked': typeSelected.includes(resType.id) }">
                    <label @click="changeCheck()" class="d-flex justify-content-center align-items-center checked-label" :for="resType.id">
                        <img  :src="`img/${store.typesImages[index]}`" alt="Type Image">
                    </label>
                    <div class="d-flex type-container mb-4">
                        <input class="me-2" @change="eseguiRicerca" type="checkbox" :id="resType.id" :value="resType.id"
                            v-model="typeSelected"><span class="type-name badge myBadge ">{{ resType.name }}</span>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
        <Loader v-if="!store.loaded" />

        <div v-else class="container-restaurant">
            <h1>{{ title }}</h1>

            <div v-if="paginatedRestaurants.length > 0" class="wrapper">

                <Restaurant v-for="restaurant in paginatedRestaurants" :key="restaurant" :restaurant="restaurant" />

            </div>
            <div v-else class="wrapper">

                <h2>Non ci sono risultati</h2>

            </div>
            <div class="pagination">
                <button @click="prevPage" :disabled="currentPage === 1">Previous</button>
                <div class="page">{{ this.currentPage }}</div>
                <button @click="nextPage" :disabled="currentPage === totalPages">Next</button>
            </div>
        </div>
    </div>

    <Cart :modalOpen="store.showModal" :cartItems="store.cartItems" @close="store.showModal = false" />

    <BtnCart />
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

.container-inner {
    background-color: white;
    min-height: 400px;
    width: 100%;
}

//* sezione CHECKBOX

.custom-checkbox {
    width: 100%;
}
.myBadge{
    background-color: rgba(0, 0, 0, 0.87);
    color: #f3f3f3ec;
}
.btn-dark {
    transition: all .5s;

    &:hover {
        color: #3ABFB4 !important;
    }
}
ul {
    li {
        cursor: pointer;
    }
}

.container-restaurant {
    // background-image: url("/img/pattern-anguria.jpg");
    background-image: url("/img/bg-60.jpg");

    min-height: 700px;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;

    h1 {
        padding: 50px;
    }
}
.wrapper {
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
    //cambio da 100% a height fissa
    height: 180px;
    label{
        position: relative;
        img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    }
    .type-container{
        position: relative;
    }
    .type-name{
        position: absolute;
        left: 50%;
        transform: translate(-50%);
        top: 15px;
    }
}
.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #ffffff00;
    display: flex;
    justify-content: center;
    align-items: center;
}
.swiper-slide .checked-label {
    height: 80px;
    width: 150px;
    background-color: #3ABFB4;
    border-radius: 10px;
    cursor:pointer;
}
.swiper-slide.checked {
    .checked-label {
        box-shadow: 0px 0px 8px 6px rgba(0,0,0,0.29) inset;
        -webkit-box-shadow: 0px 0px 8px 6px rgba(0,0,0,0.29) inset;
        -moz-box-shadow: 0px 0px 8px 6px rgba(0,0,0,0.29) inset;
        background-color: #FE99AE;
        transition: all .5s;
    }
   /* .checked-label::after {
        content: '\2714';
        font-family: "Font Awesome";
        font-size: 25px;
        color: #000000;
        position: absolute;
       // top: 115px;
        top: -15px;
        left: 3px;
        //top: -5px;
       // left: 10px;
        top: -35px;
        left: 50%;
        transform: translate(-50%);
        opacity: 1;
        z-index:100;
        transition: all .5s;
    }*/

    .fa {
        font-size: 12px;
        color: white;
        position: absolute;
        top: 2px;
        left: 3px;
        opacity: 0; // Nasconde l'icona inizialmente
        transition: opacity 0.2s;
        }
    }
    input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        line-height: 0;
        overflow: hidden;
        width: 0;
        height: 0;
        padding: 0;
        margin: 0;
    }

    .pagination {
    display: flex;
    justify-content: center;
    margin: 20px 0;
  }

  .pagination button {
    margin: 0 5px;
    padding: 5px 10px;
    background-color: #3ABFB4;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .pagination .page{
    margin: 0 5px;
    padding: 5px 10px;
    background-color: #3ABFB4;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 5px;
  }

  .pagination button:disabled {
    background-color: #ccc;
  }


@media screen and (max-width: 767px) {

    .swiper-button-prev,
    .swiper-button-next {
        display: none;
    }
}
</style>
