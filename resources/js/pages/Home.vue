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
            // Converto gli ID dei tipi selezionati in un array
            const typesIds = this.typeSelected.map(type => type.id);


            axios.get(store.apiUrl + '/restaurants-types', { params: { types : typesIds } })
            .then(response => {
                this.restaurants = response.data.restaurants;
                this.title = 'risultati';

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
        <!-- <ul class="d-flex bg-dark py-3">
            <li v-for="resType in this.resTypes" :key="resType.id"
                class="badge badge-success text-white "
                @click="getRestaurantsType(resType.slug)">{{ resType.name }}</li>
        </ul> -->
        <!-- nuova version -->
        <div>
            <label v-for="resType in this.resTypes" :key="resType.id"><input type="checkbox" value="{{ resType.id }}"> {{ resType.name }}</label>

            <!-- Aggiungi altri tipi di ristoranti qui -->
            <button @click="eseguiRicerca">Cerca</button>
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
