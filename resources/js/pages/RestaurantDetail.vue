<script>

import Dish from '../components/Dish.vue'


export default {
    name:'RestaurantDetail',
    components: {
        Dish,
    }
}
</script>

<template>

            <div class="jumbotron-ristorante">
                <img src="img/jumbo.png" alt="jumbotron">
                <div class="info">
                    <h1>Ristorante</h1>
                    <p>Indirizzo: Via 25 aprile, Novara</p>
                </div>
            </div>

    <div class="container-inner">



        <div class="container-dishes">

            <span class="badge bg-pink">Tutti i piatti</span>

            <div class="wrapper">

                <Dish v-for="dish in 9" :key="dish"/>

            </div>
        </div>

    </div>


</template>


<style lang="scss" scoped>


.jumbotron-ristorante{
    height: 550px;
    width: 100vw;
    img {
        height: 100%;
        width: 100%;
    }
    .info{
        background-color: #3abfb4 ;
        border-radius: 10%;
        position: absolute;
        padding: 30px;
        margin: 30px;
        transform: translate(-50%,-50%);
        top: 55%;
        left: 20%;
    }
}

.container-inner{
    min-height: 400px;
    width: 100%;

    .badge{
    background-color: #f05167;
    color: black;
    font-size: 30px;
    margin: 50px;
    }

    .container-dishes{
    background-image: url("/img/pattern-anguria.jpg");
        h1{
            padding: 50px;
        }
        .wrapper{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding-bottom: 50px;
            height: 100%;
            width: 100%;
        }
    }
}
</style>
