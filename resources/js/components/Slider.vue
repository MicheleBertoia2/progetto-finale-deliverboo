<script>
import { defineComponent } from 'vue'
import { Carousel, Navigation, Slide } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'



export default defineComponent({
    name: 'Slider',
    components: {
        Carousel,
        Slide,
        Navigation,
    },
    data: () => ({
        settings: {
            itemsToShow: 1,
            snapAlign: 'center',
        },
        breakpoints: {
            400: {
                itemsToShow: 2,
                snapAlign: 'center',
            },
            500: {
                itemsToShow: 3,
                snapAlign: 'center',
            },
            700: {
                itemsToShow: 3.5,
                snapAlign: 'center',
            },
            1024: {
                itemsToShow: 5,
                snapAlign: 'start',
            },
        },
    }),
})
</script>

<template>
    <Carousel v-bind="settings" :breakpoints="breakpoints" class="carousel">
        <Slide v-for="slide in 2" :key="slide">
            <div class="carousel__item">
                <img src="img/pizza.png" alt="pizza">

            </div>
            <div class="carousel__item">
                <img src="img/shushi.png" alt="sushi">
            </div>
        </Slide>

        <template #addons>
            <Navigation />
        </template>
    </Carousel>
</template>


<style lang="scss" scoped>
.carousel {
    height: 80px;
    margin: 10px;

    img {
        height: 80px;
    }
}
</style>







