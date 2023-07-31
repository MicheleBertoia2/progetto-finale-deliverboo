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
                </ul>
            </div>
            <div class=" col" style="padding: 15px; max-width: 300px;">
                <span class="payment">
                    <img src="img/maestro.svg" alt="maestro">
                    <img src="img/mastercard.svg" alt="mastercard">
                    <img src="img/visa.svg" alt="visa">
                </span>

            </div>
            <div class=" col team-3" style="max-width: 200px; min-width: 200px;">
                <ul >
                    <h6>
                        Team 3
                    </h6>
                            <li><a target="_blank" href="https://www.linkedin.com/in/marco-de-marie-580a82281/">Marco De Marie</a></li>
                            <li><a target="_blank" href="https://www.linkedin.com/in/giacomo-arena-94287a256/">Giacomo Arena</a></li>
                            <li><a target="_blank" href="https://www.linkedin.com/in/michele-bertoia-dev/">Michele Bertoia</a></li>
                            <li><a target="_blank" href="https://www.linkedin.com/in/michele-pilla/">Michele Pilla</a></li>
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
    // -webkit-box-shadow: 0px 0px 15px 1px rgba(0, 0, 0, 0.88);
    // box-shadow: 0px 0px 15px 1px rgba(0, 0, 0, 0.88);
            .team-3{
                padding: 0px !important;
                li{
                    line-height: 15px;
                }
                a{
                    font-size: 15px;
                    &:hover{
                        font-size: 18px;
                    }
                }
            }
    .row{
        display: flex;
        justify-content: center;
        max-width: 1000px;
        .col{
            border-radius: 5px;
            height: 150px;
            background-color: #F1F3F4;
            margin: 10px;
            ul{
                padding: 15px;
                font-weight: 800;

                li{
                    font-weight: 400;
                    padding: 5px 0px;
                a{
                    color: rgb(78, 75, 75);
                    text-decoration: none;
                    transition: all .5s;
                    font-weight: 500;
                    &:hover{
                        color: black;
                        font-size: 19px;
                    }
                    }
                list-style: none;
                }
            }

            .payment{
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                img{
                    width: 100px;
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
    @media screen and (max-width: 992px) {
        .payment {
            img{
                width: 90px !important;
            }
        }

    }
    @media screen and (max-width: 768px) {
        .payment {
            img{
                width: 50px !important;
            }
        }
    }
}

</style>
