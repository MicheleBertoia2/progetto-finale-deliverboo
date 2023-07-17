
<script>
export default {
    name: 'Restaurant'
}
</script>


<template>
    <div class="restaurant">
        <div class="bg-restaurant">
            <div class="text center">RISTORANTE</div>
        </div>
        <div class="info">
            <p><i class="fa-solid fa-star"></i></p>
            <p><i class="fa-solid fa-truck"></i></p>
            <p>tempo</p>
        </div>
    </div>

</template>



<style lang="scss" scoped>

@media (min-width: 1200px) {
    .restaurant{
        margin: 10px;
        background-color: white;
        height: 450px;
        width: 350px;

}
}


.restaurant{
        margin: 10px;
        background-color: white;
        min-width: 350px;
        max-width: 450px;
        max-height: 390px;
        min-height: 250px;
        height: 30%;
        width: 30%;
        .info{
            margin-top: 10px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            height: 30px;
            }
        .bg-restaurant{
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
        }
    }
</style>



