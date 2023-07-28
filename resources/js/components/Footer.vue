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
            <div class="row w-100">
            <div class="col">
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
                    <li>
                        <a :href="`${store.Url}login`" target="_blank">
                            Il Mio Ristorante
                        </a>
                    </li>
                    <li>
                        <a :href="`${store.Url}register`" target="_blank">
                            I Miei Ordini
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col">

            </div>
            <div class="col">
                <ul>
                    <h5>
                        Team 3
                    </h5>
                    <li>
                        <a :href="`${store.Url}register`" target="_blank">
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
            border-radius: 10px;
            height: 250px;
            background-color: #319990;
            margin: 10px;
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
