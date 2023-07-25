<script>
export default {
    name: 'Footer'
}
</script>

<template>
    <footer>
        <div class="row">
            <div class="col">
                <p>Chi siamo</p>
                <p>Contatti</p>
                <p>Privacy</p>
                <p>Chi siamo</p>
            </div>
            <div class="col">
                <p>Top Food</p>
                <p>Top Restaurant</p>
                <p>Top Cities</p>
                <p>Blog</p>
            </div>
            <div class="col">
                <p>Aggiungi il tuo locale</p>
                <p>Contratti collettivi</p>
                <p>Opportunità di carriera</p>
                <p>Soci</p>
            </div>
        </div>
        <div class="bottom d-flex justify-content-evenly mt-4">
            <p>Powered by Class 94 Team 3</p>
            <div class="social">
            <i class="fa-brands fa-square-instagram"></i>
            <i class="fa-brands fa-square-facebook"></i>
            <i class="fa-brands fa-square-twitter"></i>
            <i class="fa-brands fa-square-pinterest"></i>
            <i class="fa-brands fa-square-youtube"></i>
        </div>
        </div>

    </footer>

</template>

<style lang="scss" scoped>

footer{
    background-color: #3abfb4;
    padding: 30px;
    width: 100%;

    .social{
        display: flex;
        justify-content: center;
        i{
            font-size: 35px;
            margin: 2px;
        }
    }
}

</style>
