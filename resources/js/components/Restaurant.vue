
<script>
export default {
    name: 'Restaurant',
    props:{
        restaurant : Object
    },
    created() {

    },
    methods:{
        getImageUrl(imagePath) {
            // Aggiungo "storage/" al percorso dell'immagine
            return `storage/${imagePath}`;
        },
        checkImgRestaurant(src) {
            if (this.restaurant.image) {
                return this.restaurant.image.includes(src);
            }
                return false;
        },

    }
}
</script>


<template>

    <div class="restaurant">
        <router-link  :to="{name: 'RestaurantDetail', params:{slug: restaurant.slug}}" class="text-decoration-none">
            <div class="bg-restaurant d-flex flex-column justify-content-center align-items-center flex-wrap">
                <img v-if="restaurant.image.startsWith('http://') || restaurant.image.startsWith('https://')" :src="restaurant.image" class="card-img-top imgdishes " :alt="restaurant.name">
                <img v-else-if="checkImgRestaurant('img/placeholder-img.png')" src="../../img/placeholder-img.png" class="card-img-top imgdishes " :alt="restaurant.name">
                <img v-else :src="getImageUrl(restaurant.image)" class="card-img-top imgdishes " :alt="restaurant.name">
                <div class="myBadge text dark d-flex justify-content-center align-items-center text-center">
                    {{ restaurant.name }}
                </div>
                <div class="d-flex justify-content-center align-items-center flex-wrap mt-1 text-center">
                    <div v-for="type in restaurant.types" :key="type" class="greenBadge p-2 textTypes m-3 d-flex justify-content-center flex-wrap">
                    <!-- <div v-for="type in restaurant.types" :key="type" class="badge badge-dark textTypes m-3 d-flex justify-content-center flex-wrap"> -->
                        <div class="text-center">{{ type.name }}</div>
                    </div>
                </div>
            </div>



        </router-link>
            <div class="info">
                <!-- icona camion -->
                <p>{{ restaurant.address }}  <i class="fa-solid fa-truck"></i></p>
            </div>
    </div>

</template>



<style lang="scss" scoped>
img{
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: -1;
    object-fit: cover;
    border-radius: 10px 10px 0px 0px;
}
.restaurant{
        margin: 15px;
        border-radius: 10px;
        background-color: #F1F3F4;
        max-width: 450px;
        flex: 1 0 380px;
        z-index: 1;
        .info{
            margin-top: 10px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            height: 30px;
                .continer-badge{
                    display: flex;
                    justify-content: center;


                    .badge{
                        color:black;
                        // margin-left: 3px;
                        // margin-bottom: 6px;
                    }

                    .badge-turco{
                        background-color: #efc4ff ;
                    }
                    .badge-giapponese{
                        background-color: #414bb2 ;
                    }
                    .badge-italiano{
                        background-color: #77e334 ;
                    }
                    .badge-thai{
                        background-color: #08f6ea ;
                    }
                    .badge-messicano{
                        background-color: #f5a700 ;
                    }
                    .badge-indiano{
                        background-color: #dd0d1e ;
                    }
                    .badge-cinese{
                        background-color: #a708f6 ;
                    }
                    .badge-americano{
                        background-color: #f6088b ;
                    }
                }
            }
        .bg-restaurant{
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            // border-radius: 10px;
            background:
                linear-gradient(
                rgba(0, 0, 0, 0.3),
                rgba(0, 0, 0, 0.3));
                //url('img/prova-ristorante.png');
            background-size: cover;
            height: 340px;
            position: relative;


            .center {
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                }
            .text{
                // display: flex;
                // justify-content: center;
                width: 350px;
                // color: white;
                color: black;
                font-size: 25px;
                font-weight: bold;
                // position: absolute;
            }
            .textTypes{
                // display: flex;
                // justify-content: center;
                // width: 350px;
                text-decoration: none;
                // color: white;
                // color: #000;
                // font-size: 18px;
                font-size: 15px;
                font-weight: bold;
                // position: absolute;
                // right: 11%;
                // top: 60%;
                border-radius: 10px;
                background-color: rgba(255, 255, 255, 0.521);
            }
            .myBadge{
                border-radius: 10px;
                // background-color: rgba(255, 255, 255, 0.521);
                background-color: rgba(255, 255, 255, 0.6);

            }
        }
    }
    .text-decoration-none{
        text-decoration: none !important;
    }
    .greenBadge {
    transition: all .5s;
    // color: black;
    // background-color: #3ABFB4 !important;
    color: #fff;
    background-color: rgb(0 0 0 / 80%) !important;
    // height: 40px;
    font-size: 2rem;
    margin: 40px 50px;
    border-radius: 15px;

    // &:hover {
        // color: white;
    // }
}
</style>



