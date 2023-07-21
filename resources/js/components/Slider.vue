<script>
import { register } from 'swiper/element/bundle';

register();

export default {
    setup() {
        const spaceBetween = 1;
        const onProgress = (e) => {
            const [swiper, progress] = e.detail;
            //console.log(progress);
        };

        const onSlideChange = (e) => {
            //console.log('slide changed');
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
        :loopedSlides="2"
        :loop="true"
        :autoplay="true"
        :centered-slides="true"
        :pagination="{ hideOnClick: true }"
        :breakpoints="{ 1250: { slidesPerView: 6,},
                        1100: { slidesPerView: 5,},
                        880: { slidesPerView: 4 ,},
                        620: { slidesPerView: 3 ,}}"
        :updateOnWindowResize="true"
        @progress="onProgress"
        @slidechange="onSlideChange">
        <swiper-slide>
            <div class="turco">
                <img src="img/kebab.png" alt="kebab">
                <span>Turco</span>
            </div>
        </swiper-slide>
        <swiper-slide>
            <div class="giapponese">
                <img src="img/sushi.png" alt="sushi">
                <span>Giapponese</span>
            </div>
        </swiper-slide>
        <swiper-slide>
            <div class="italiano">
                <img src="img/pizza.png" alt="pizza">
                <span>Italiano</span>
            </div>
        </swiper-slide>
        <swiper-slide>
            <div class="thai">
                <img src="img/thai.png" alt="thai">
                <span>Thai</span>
            </div>
        </swiper-slide>
        <swiper-slide>
            <div class="messicano">
                <img src="img/messicano.png" alt="messicano">
                <span>Messicano</span>
            </div>
        </swiper-slide>
        <swiper-slide>
            <div class="indiano">
                <img src="img/indiano.png" alt="indiano">
                <span>Indiano</span>
            </div>
        </swiper-slide>
        <!-- <swiper-slide>
            <div class="greco">
                <img src="img/greco.png" alt="greco">
                <span>Greco</span>
            </div>
        </swiper-slide> -->
        <swiper-slide>
            <div class="cinese">
                <img src="img/cinese.png" alt="cinese">
                <span>Cinese</span>
            </div>
        </swiper-slide>
        <swiper-slide>
            <div class="americano"
            ><img src="img/americano.png" alt="americano">
            <span>Americano</span>
        </div>
        </swiper-slide>
    </swiper-container>
</template>

<style lang="scss" scoped>

swiper-container{
    background-color: #3abfb4;
    width: 100vw;
}

swiper-slide {
    margin-top: 30px;
    margin-bottom: 30px;
    padding: 50px 0 50px 0;
}

img {
    position: absolute;
    height: 200px;
    width: 200px;
}

span{
        position: absolute;
        transform: translate(-50%,-50%);
        top: 130%;
        left: 50%;
        font-size: 21px;
    }

.turco {
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

.giapponese {
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

.italiano {
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
    background-color: #08f6ea;
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
    background-color: #dd0d1e;
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

// .greco {
//     background-color: #08f6ea;
//     border-radius: 10%;
//     height: 120px;
//     width: 200px;
//     position: relative;

//     img {
//         position: absolute;
//         height: 180px;
//         width: 200px;
//         transform: translateY(-15%);
//     }
// }

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







