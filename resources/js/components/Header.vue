
<script>
import { store } from '../store/store';
export default {
    name: 'Header',
    data(){
        return{
            store
        }
    }
}
</script>


<template>
    <header>
        <nav class="navbar navbar-expand navbar-light bg-dark-green d-flex justify-content-between container-fluid">
            <div class="">
                    <router-link :to="{ name: 'home' }" class="nav-link"> <img src="img/logosingle.png" alt="logo" width="55" ></router-link>
            </div>
            <div class="">
                <router-link :to="{ name: 'home' }" class="nav-link">
                <img src="img/logoscritta2.png" alt="logo" width="160" >
                </router-link>
            </div>
            <div class="d-flex align-items-center me-4">
                <span class="go-dashboard">
                    <!-- <a  href="#">
                        Sei Un Ristoratore?
                    </a> -->
                    <!-- <i class="fa-regular fa-hand-pointer"></i> -->
                </span>
                <div  class="btn-cart ms-3">
                    <div v-if="store.cartItems.length  > 0 " class="number">{{ store.cartItems.length }}</div>
                    <button    @click="store.showModal = true"><i class="fa-solid fa-cart-shopping"></i></button>
                </div>

            </div>
            </nav>
        </header>
    </template>

<style lang="scss" scoped>
    nav{
        width: 100%;
        height: 75px;
        position: fixed;
        z-index: 15;
        -webkit-box-shadow: 0px 0px 15px 1px rgba(0, 0, 0, 0.88);
        box-shadow: 0px 0px 15px 1px rgba(0, 0, 0, 0.88);
        .go-dashboard{
            position: relative;
                i{
                    position: absolute;
                    left: 138px;
                    top: 18px;
                }
            }

            a{
                text-decoration: none;
                color: rgb(0, 0, 0);
                font-size: .9rem;
            }
            i{
                font-size: 1.4rem;
                color: black;
            }

        button{
            position: relative;
            border: none;
            background-color: rgba(240, 248, 255, 0);
        }
        .number{
            height: 15px;
            width: 15px;
            line-height: 5px;
            background-color: #FFF;
            color: rgb(0, 0, 0);
            padding: 5px;
            font-size: 10px;
            border-radius: 50%;
            position: absolute;
            top: 14px;
            right: 25px;
            font-weight: bold;
        }

    }


.bg-dark-green {
    background-color: #3abfb4;
}


</style>
