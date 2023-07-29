<script>
import { store } from '../store/store';
export default {
    name: 'Footer',
    data(){
        return{
            store
        }
    }
}
</script>

<template>
    <footer>
        <div class="container d-flex justify-content-center">
            <div class="row w-100 d-flex flex-wrap">
            <div class="col" style="max-width: 305px;">
                <ul>
                    <h5>Sei Un Ristoratore?</h5>
                    <li>
                        <a :href="`${store.Url}register`" target="_blank">
                            Registrati
                        </a>
                    </li>
                    <li>
                        <a :href="`${store.Url}login`" target="_blank">
                            Login
                        </a>
                    </li>
                    <img class="shake-vertical" src="img/logosingle.png" alt="">
                </ul>
            </div>
            <div class=" col" style="padding: 15px; max-width: 150px;">
                <h5>Metodi Di Pagamento</h5>
                <span class="payment">
                    <img src="img/maestro.svg" alt="maestro">
                    <img src="img/mastercard.svg" alt="mastercard">
                    <img src="img/visa.svg" alt="visa">
                </span>

            </div>
            <div class=" col" style="max-width: 150px;">
                <ul>
                    <h5>
                        Team 3
                    </h5>
                    <li>
                        <a target="_blank">
                            Chi Siamo
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        </div>

        <div class="bottom d-flex justify-content-between mt-4">
            <p>Designed by <strong>Team 3</strong> Class 94 </p>
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
    height: 100%;
    width: 100%;
    -webkit-box-shadow: 0px 0px 15px 1px rgba(0, 0, 0, 0.88);
    box-shadow: 0px 0px 15px 1px rgba(0, 0, 0, 0.88);
    .row{
        display: flex;
        justify-content: center;
        max-width: 1000px;
        .col{
            border-radius: 5px;
            height: 250px;
            background-color: #319990;
            margin: 10px;
            ul{
                padding: 15px;
                font-weight: 800;
                .shake-vertical {
	                -webkit-animation: shake-vertical 3s cubic-bezier(0.455, 0.030, 0.515, 0.955) infinite both;
	                animation: shake-vertical 6s cubic-bezier(0.455, 0.030, 0.515, 0.955) infinite both;
                }
                    @-webkit-keyframes shake-vertical {
                    0%,
                    100% {
                        -webkit-transform: translateY(0);
                                transform: translateY(0);
                    }
                    10%,
                    30%,
                    50%,
                    70% {
                        -webkit-transform: translateY(-8px);
                                transform: translateY(-8px);
                    }
                    20%,
                    40%,
                    60% {
                        -webkit-transform: translateY(8px);
                                transform: translateY(8px);
                    }
                    80% {
                        -webkit-transform: translateY(6.4px);
                                transform: translateY(6.4px);
                    }
                    90% {
                        -webkit-transform: translateY(-6.4px);
                                transform: translateY(-6.4px);
                    }
                    }
                    @keyframes shake-vertical {
                    0%,
                    100% {
                        -webkit-transform: translateY(0);
                                transform: translateY(0);
                    }
                    10%,
                    30%,
                    50%,
                    70% {
                        -webkit-transform: translateY(-8px);
                                transform: translateY(-8px);
                    }
                    20%,
                    40%,
                    60% {
                        -webkit-transform: translateY(8px);
                                transform: translateY(8px);
                    }
                    80% {
                        -webkit-transform: translateY(6.4px);
                                transform: translateY(6.4px);
                    }
                    90% {
                        -webkit-transform: translateY(-6.4px);
                                transform: translateY(-6.4px);
                    }

                }
                li{
                    font-weight: 400;
                    padding: 5px 0px;
                a{
                    color: rgb(0, 0, 0);
                    text-decoration: none;
                    transition: all .5s;
                    &:hover{
                        color: rgb(247, 247, 247);
                    }
                    }
                list-style: none;
                }
            }

            .payment{
                display: flex;
                flex-wrap: wrap;
                img{
                    width: 80px;
                }
            }
        }
    }

    .social{
        i{
            font-size: 35px;
            margin: 2px;
        }
    }
}

</style>
