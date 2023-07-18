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



    <div class="container-inner ">

        <Slider />

        <div class="container-restaurant">
            <span class="badge bg-pink">Tutti i locali</span>

            <div class="wrapper mx-5">

                <Restaurant v-for="restaurant in 9" :key="restaurant"/>

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
    padding-bottom: 50px;
    height: 100%;
    width: 100%;
}

</style>
