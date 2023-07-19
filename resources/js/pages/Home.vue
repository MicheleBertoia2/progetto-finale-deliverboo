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

        getRestaurantsType(){
            //store.loaded = false;
            console.log('cliccato');

        }

    },

    mounted(){
        this.getApi()
    }
}
</script>

<template>



    <div class="container-inner ">

        <Slider />
        <ul class="d-flex bg-dark py-3">
            <li v-for="resType in this.resTypes" :key="resType.id"
                class="badge badge-success text-white cursor-pointer"
                @click="getRestaurantsType()">{{ resType.name }}</li>
        </ul>
        <Loader v-if="!store.loaded" />

        <div v-else class="container-restaurant">
            <span class="badge bg-pink">{{ title }}</span>

            <div class="wrapper">

                <Restaurant v-for="restaurant in this.restaurants" :key="restaurant" :restaurant="restaurant"/>

            </div>
        </div>
    </div>


</template>



<style lang="scss" scoped>




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
