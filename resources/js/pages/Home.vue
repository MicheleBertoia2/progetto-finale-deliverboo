<script>

import Restaurant from '../components/Restaurant.vue'
import Slider from '../components/Slider.vue'


export default {
    name:'Home',
    components: {
        Restaurant,
        Slider,

    }
}
</script>

<template>

    <div class="jumbotron">
            <img src="img/jumbo.png" alt="jumbotron">
        </div>

    <div class="container-inner ">

        <Slider />

        <div class="container-restaurant">
            <span class="badge bg-pink">Tutti i locali</span>

            <div class="wrapper">

                <Restaurant v-for="restaurant in 9" :key="restaurant"/>

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
