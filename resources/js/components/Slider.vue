<script>
import { register } from 'swiper/element/bundle';

register();

export default {
    setup() {
        const spaceBetween = 1;
        const onProgress = (e) => {
            const [swiper, progress] = e.detail;
            console.log(progress);
        };

        const onSlideChange = (e) => {
            console.log('slide changed');
        }

        return {
            spaceBetween,
            onProgress,
            onSlideChange,
        };
    }
}

</script>

<template>
    <swiper-container
        :slides-per-view="2"
        :loop="true"
        :centered-slides="true"
        :pagination="{ hideOnClick: true }"
        :breakpoints="{ 880: { slidesPerView: 4, },
                        620: { slidesPerView: 3 ,}}"
        :updateOnWindowResize="true"
        @progress="onProgress"
        @slidechange="onSlideChange">
        <swiper-slide>
            <div class="kebab"><img src="img/kebab.png" alt="kebab"></div>
        </swiper-slide>
        <swiper-slide>
            <div class="sushi"><img src="img/sushi.png" alt="sushi"></div>
        </swiper-slide>
        <swiper-slide>
            <div class="pizza"><img src="img/pizza.png" alt="pizza"></div>
        </swiper-slide>
        <swiper-slide>
            <div class="thai"><img src="img/thai.png" alt="thai"></div>
        </swiper-slide>
        <swiper-slide>
            <div class="messicano"><img src="img/messicano.png" alt="messicano"></div>
        </swiper-slide>
        <swiper-slide>
            <div class="indiano"><img src="img/indiano.png" alt="indiano"></div>
        </swiper-slide>
        <swiper-slide>
            <div class="greco"><img src="img/greco.png" alt="greco"></div>
        </swiper-slide>
        <swiper-slide>
            <div class="cinese"><img src="img/cinese.png" alt="cinese"></div>
        </swiper-slide>
        <swiper-slide>
            <div class="americano"><img src="img/americano.png" alt="americano"></div>
        </swiper-slide>
    </swiper-container>
</template>

<style lang="scss" scoped>
swiper-slide {
    margin-top: 30px;

    margin-bottom: 30px;

}

img {
    position: absolute;
    height: 200px;
    width: 200px;
}

.kebab {
    background-color: #efc4ff;
    border-radius: 10%;
    height: 120px;
    width: 200px;
    position: relative;

    img {
        position: absolute;
        height: 200px;
        width: 200px;
        transform: translateY(-20%);
    }
}

.sushi {
    background-color: #414bb2;
    border-radius: 10%;
    height: 120px;
    width: 200px;
    position: relative;

    img {
        position: absolute;
        height: 200px;
        width: 200px;
        transform: translateY(-20%);
    }

}

.pizza {
    background-color: #77e334;
    border-radius: 10%;
    height: 120px;
    width: 200px;
    position: relative;

    img {
        position: absolute;
        height: 235px;
        width: 235px;
        transform: translateY(-38%);
    }
}

.thai {
    background-color: #dbd639;
    border-radius: 10%;
    height: 120px;
    width: 200px;
    position: relative;

    img {
        position: absolute;
        height: 210px;
        width: 220px;
        transform: translateY(-20%);
    }

}

.messicano {
    background-color: #f5a700;
    border-radius: 10%;
    height: 120px;
    width: 200px;
    position: relative;

    img {
        position: absolute;
        height: 190px;
        width: 200px;
        transform: translateY(-20%);
    }
}

.indiano {
    background-color: #57951c;
    border-radius: 10%;
    height: 120px;
    width: 200px;
    position: relative;

    img {
        position: absolute;
        height: 170px;
        width: 200px;
        transform: translateY(-15%);
    }
}

.greco {
    background-color: #08f6ea;
    border-radius: 10%;
    height: 120px;
    width: 200px;
    position: relative;

    img {
        position: absolute;
        height: 180px;
        width: 200px;
        transform: translateY(-15%);
    }
}

.cinese {
    background-color: #a708f6;
    border-radius: 10%;
    height: 120px;
    width: 200px;
    position: relative;

    img {
        position: absolute;
        height: 180px;
        width: 200px;
        transform: translateY(-20%);
    }
}

.americano {
    background-color: #f6088b;
    border-radius: 10%;
    height: 120px;
    width: 200px;
    position: relative;

    img {
        position: absolute;
        height: 220px;
        width: 200px;
        transform: translateY(-22%);
    }
}</style>







