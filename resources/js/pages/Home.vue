<script>

import Restaurant from '../components/Restaurant.vue';
import Slider from '../components/Slider.vue';
import axios from 'axios';
import Loader from '../components/Loader.vue';
import Cart from '../components/Cart.vue';
import { store } from '../store/store';
import BtnCart from '../components/BtnCart.vue';


export default {
    name:'Home',

    data(){
        return{
            store,
            restaurants : [],
            title : 'Ecco una selezione di ristoranti per te',
            resTypes : [],
            typeSelected : [],



        }
    },

    components: {
        Restaurant,
        Loader,
        Slider,
        Cart,
        BtnCart,

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

                // prendo tutti i ristoranti
                let allRestaurants = response.data.restaurants;

                // li filtro in base agli id dei tipi selezionati
                this.restaurants = allRestaurants.filter(ristorante => {
                    return ristorante.types.some(type => this.typeSelected.includes(type.id));
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
        <div class="d-flex justify-content-evenly align-items-center py-3">
            <!-- //* prima -->
            <!-- <label v-for="resType in this.resTypes" :key="resType.id"> -->
            <!-- //* prima -->
            <!-- <input type="checkbox" :id="resType.id" :value="resType.id" v-model="typeSelected" >{{ resType.name }}</label> -->

            <div v-for="(resType, index) in this.resTypes" :key="resType.id" class="custom-checkbox mx-4 d-flex flex-column">

                <!-- labels //* funziona-->
                <label class="d-flex justify-content-center align-items-center" style="height: 130px; width: 130px; background-color: #3ABFB4; border-radius: 10px;" :for="resType.id">
                        <!-- immagini -->
                        <img :src="`img/${store.typesImages[index]}`" alt="Type Image">
                </label>

                <div class="d-flex">
                <!-- checkbox + nome tipologia-->
                    <input class="me-2" @change="eseguiRicerca" type="checkbox" :id="resType.id" :value="resType.id" v-model="typeSelected"><span>{{ resType.name }}</span>
                    <!-- prima -->
                    <!-- <input class="me-2" type="checkbox" :id="resType.id" :value="resType.id" v-model="typeSelected"><span>{{ resType.name }}</span> -->
                </div>
            </div>
            <!-- prima -->
            <!-- <button class="btn mybadge" @click="eseguiRicerca" :disabled="(!this.typeSelected.length > 0)" >Cerca</button> -->
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


</style>
