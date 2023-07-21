<script>

import Restaurant from '../components/Restaurant.vue';
import Slider from '../components/Slider.vue';
import axios from 'axios';
import Loader from '../components/Loader.vue';
import { store } from '../store/store';


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

    },

    methods:{

        getApi(endpoint = store.apiUrl + 'restaurants'){
            store.loaded = false;
            axios.get(endpoint)
                .then(res => {
                    console.log(res.data,);

                    this.restaurants = res.data.restaurants;
                    this.resTypes = res.data.types;

                    store.loaded = true;
                })

            },

        getRestaurantsType($slug){
            store.loaded = false;
            axios.get(store.apiUrl + 'restaurants/type/' + $slug)
                .then(res => {
                    this.restaurants = res.data.restaurants;
                    this.title = 'Risultati per tipo: ' + $slug;

                    store.loaded = true;

                })

        },
        eseguiRicerca() {


            axios.get(store.apiUrl + 'restaurants/typesearch')
            .then(response => {

                // prendo tutti i ristoranti
                let allRestaurants = response.data.restaurants;

                // li filtro in base agli id dei tipi selezionati

                this.restaurants = allRestaurants.filter(ristorante => {
                    return ristorante.types.some(type => this.typeSelected.includes(type.id));
                });
                this.title = 'risultati';
                console.log(this.restaurants);

                store.loaded = true;
            })
            .catch(error => {
                console.log(error);
            });
  }

    },

    mounted(){
        this.getApi()
    }
}
</script>

<template>

    <div class="jumbotron">
            <img src="img/jumbo.png" alt="jumbotron">
        </div>

    <div class="container-inner ">

        <Slider />

        <!-- VECCHIA VERSIONE RICERCA -->

        <!-- <ul class="d-flex bg-dark py-3">
            <li v-for="resType in this.resTypes" :key="resType.id"
                class="badge badge-success text-white "
                @click="getRestaurantsType(resType.slug)">{{ resType.name }}</li>
        </ul> -->


        <!-- nuova versione RICERCA -->
        <div>

            <label v-for="resType in this.resTypes" :key="resType.id"><input type="checkbox" :id="resType.id" :value="resType.id" v-model="typeSelected" > {{ resType.name }}</label>


            <button @click="eseguiRicerca" :disabled="(!this.typeSelected.length > 0)" >Cerca</button>
        </div>
        <Loader v-if="!store.loaded" />

        <div v-else class="container-restaurant">
            <span class="badge bg-pink">{{ title }}</span>

            <div v-if="restaurants.length > 0" class="wrapper">

                <Restaurant v-for="restaurant in this.restaurants" :key="restaurant" :restaurant="restaurant"/>

            </div>
            <div v-else class="wrapper">

                <h2>Non ci sono risultati</h2>

            </div>
        </div>
    </div>


</template>



<style lang="scss" scoped>

.jumbotron {
    height: 550px;
    width: 100vw;
    img {
        height: 100%;
        width: 100%;
    }
}


.container-inner{
    background-color: white;
    min-height: 400px;
    width: 100%;
}
.badge{
    background-color: #f05167;
    color: black;
    font-size: 30px;
    margin: 50px;
}

ul{
    li{
        cursor: pointer;
    }
}


.container-restaurant{
    background-image: url("/img/pattern-anguria.jpg");
    h1{
        padding: 50px;
    }
}

.wrapper{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding-bottom: 50px;
    height: 100%;
    width: 100%;
}

</style>
