
<script>
export default {
    name: 'Restaurant'
}
</script>


<template>
    <div class="restaurant">
        <div class="bg-restaurant">
            <div class="text center">CICCIOGAMER89</div>
        </div>
        <div class="info">
            <p><i class="fa-solid fa-star"></i></p>
            <p><i class="fa-solid fa-truck"></i></p>
            <p>tempo</p>
        </div>
    </div>

</template>



<style lang="scss" scoped>

.restaurant{
        margin: 10px;
        background-color: white;
            max-height: 390px;
            max-width: 400px;
            min-width: 400px;
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
                color:black;
                position: absolute;
            }
        }
    }
</style>
