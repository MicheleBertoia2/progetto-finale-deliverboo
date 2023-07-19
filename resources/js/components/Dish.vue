
<script>
export default {
    name: 'Dish'
}
</script>


<template>
    <div class="dish">
        <div class="bg-dish"></div>
        <div class="info">
            <h3>Nome Piatto</h3>
            <p>Ingredienti: cipolle, carote, mele, banane, spinaci... </p>
            <p class="d-flex justify-content-between">Prezzo: 150€<button type="button" class="btn btn-primary">Aggiungi</button></p>

        </div>
    </div>

</template>



<style lang="scss" scoped>
.dish{
        margin: 15px;
        border-radius: 10%;
        background-color: white;
        max-width: 350px;
        flex: 1 0 280px;
        .info{
            margin-top: 10px;
            margin-left: 15px;
            margin-right: 15px;
            margin-bottom: 5px;
            height: 150px;
            }
        .bg-dish{
            border-top-left-radius: 10%;
            border-top-right-radius: 10%;
            background-image: url('/img/prova-ristorante.png');
            background-size: cover;
            height: 200px;
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
                border-radius: 10%;
                background-color: rgba(255, 255, 255, 0.051);
            }
        }
    }
</style>



