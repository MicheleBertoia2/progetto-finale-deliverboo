<script>
import axios from 'axios';
import { store } from '../store/store';


export default {
    name:'RestaurantDetail',
    components: {

    },

    data(){
        return{
            store,
            // restaurant:[],
            restaurant:{},
        }
    },
    methods:{
        getApi(){
            axios.get(store.apiUrl + 'restaurants/'  + this.$route.params.slug)
                .then(result => {
                    this.restaurant = result.data;
                    console.log(this.restaurant);
                })
                .catch(error => {
                    console.log(error);
                });

        },
        checkImg(src) {

        // if (this.restaurant && this.restaurant.image && typeof this.restaurant.image === 'string') {
        if (this.restaurant.image) {
            return this.restaurant.image.includes(src);
        }
            return false;

        },
    },
    mounted(){
        this.getApi();
    }
}
</script>

<template>
<div class="main-container">

    <div class="container d-flex py-5">

    <div>
        <img v-if="checkImg('../../img/placeholder-img.png')" src="../../img/placeholder-img.png" alt="placeholder">
        <img v-else :src="restaurant.image" alt="restaurant-img">
        <!-- <img v-else :src="`${restaurant.image}`" alt="restaurant-img"> -->
        <!-- <img :src="`${restaurant.image}`" alt="restaurant-img"> -->

        <!-- <img v-if="checkImg('resources/img/placeholder-img.png')" src="../../img/placeholder-img.png" alt="placeholder"> -->
        <!-- <img v-if="checkImg('placeholder-img')" src="../../img/placeholder-img.png" alt="placeholder"> -->
        <!-- <img v-else :src="`${restaurant.image}`" alt="restaurant-img"> -->

        <!-- <img v-else-if="restaurant.image" :src="restaurant.image" alt="restaurant-img"> -->
        <!-- <img v-else :src="restaurant.image" alt="restaurant-img"> -->
    </div>
        <!-- <img src="`resources/img/placeholder-img.png`" alt=""> -->
        <!-- <img src="/../../img/placeholder-img.png" alt=""> -->
        <!-- <img src="~/img/placeholder-img.png" alt=""> -->
        <!-- <img src=getImageUrl('img/placeholder-img.png') alt=""> -->
        <!-- <img src="./img/placeholder-img.png" alt=""> -->
        <!-- //* funziona l'immagine dinamica ma non con il placholder (salvato nello storage)  -->
        <!-- <img :src="restaurant.image" alt=""> -->
        <!-- <img :src="`${restaurant.image}`" alt=""> -->
        <!-- //* funziona il placeholder statico  -->
        <!-- <img src="../../img/placeholder-img.png" alt="placeholder"> -->
        <h1>{{ restaurant.name }}</h1>



    </div>

</div>
</template>


<style lang="scss" scoped>

    .main-container{

        img{
            width: 300px;

        }
    }

</style>
