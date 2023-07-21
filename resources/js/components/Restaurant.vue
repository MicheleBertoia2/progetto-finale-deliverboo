
<script>
export default {
    name: 'Restaurant',
    props:{
        restaurant : Object
    }
}
</script>


<template>

    <div class="restaurant">
        <router-link  :to="{name: 'RestaurantDetail', params:{slug: restaurant.slug}}">
            <div class="bg-restaurant">
                <div class="badge text dark center ">
                    {{ restaurant.name }}
                </div>
            </div>

        </router-link>
            <div class="info">
                <p><i class="fa-solid fa-star"></i></p>
                <p><i class="fa-solid fa-truck"></i></p>
                <!-- <p>{{restaurant.slug}} questo é lo slug</p> -->
            </div>
    </div>

</template>



<style lang="scss" scoped>
.restaurant{
        margin: 15px;
        border-radius: 10%;
        background-color: white;
        max-width: 450px;
        flex: 1 0 380px;
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
                        margin-left: 3px;
                        margin-bottom: 6px;
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
            border-top-left-radius: 10%;
            border-top-right-radius: 10%;
            background:
                linear-gradient(
                rgba(0, 0, 0, 0.3),
                rgba(0, 0, 0, 0.3)),
                url('img/prova-ristorante.png');
            background-size: cover;
            height: 340px;
            position: relative;


            .center {
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                }
            .text{
                display: flex;
                justify-content: center;
                width: 350px;
                color: white;
                font-size: 25px;
                font-weight: bold;
                position: absolute;
            }
            .badge{
                border-radius: 10px;
                background-color: rgba(255, 255, 255, 0.521);
            }
        }
    }
</style>



