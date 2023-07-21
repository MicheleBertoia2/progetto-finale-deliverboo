
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
            }
        .bg-restaurant{
            border-top-left-radius: 10%;
            border-top-right-radius: 10%;
            background-image: url('img/prova-ristorante.png');
            background-size: cover;
            height: 340px;
            position: relative;


            .center {
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                }
            .text{
                font-size: 25px;
                font-weight: bold;
                color:rgb(0, 0, 0);
                position: absolute;
            }
            .badge{
                border-radius: 10px;
                background-color: rgba(255, 255, 255, 0.521);
            }
        }
    }
</style>



