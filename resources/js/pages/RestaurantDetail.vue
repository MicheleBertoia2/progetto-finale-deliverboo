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
            restaurant:[],
        }
    },
    methods:{
        getApi(){
            axios.get(store.apiUrl + 'restaurants/'  + this.$route.params.slug)
                .then(result => {
                    this.restaurant = result.data;
                    console.log(this.restaurant);
                })

        }
    },
    mounted(){
        this.getApi();
    }
}
</script>

<template>
<div class="main-container">

    <div class="container d-flex py-5">


        <img :src="restaurant.image" alt="">

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
