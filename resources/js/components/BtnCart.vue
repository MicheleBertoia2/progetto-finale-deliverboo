<script>
import { store } from '../store/store';
export default {

    data(){
        return{
            store
        }
    }
}
</script>

<template>
    <div :class="{'d-none' : store.hiddencart}" v-if="store.cartItems.length  > 0 " class="btn-cart">
        <div class="number">{{ store.cartItems.length }}</div>
        <button class="btn btn-dark"   @click="store.showModal = true"><i class="fa-solid fa-cart-shopping"></i></button>
    </div>
</template>


<style  lang="scss"  scoped>
    .btn-cart{
    position: fixed;
    right: 100px;
    bottom: 50px;
    z-index: 5;
    opacity: 0;
    pointer-events: none;
    .number{
        height: 15px;
        width: 15px;
        line-height: 5px;
        background-color: #3ABFB4;
        background-image: url('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.arcostudiopsicologia.it%2Fstaff%2Fsilvia-gambato%2Fcerchio-arancione%2F&psig=AOvVaw2C24Mp2BCU_PjBgucnz7Ug&ust=1690279708000000&source=images&cd=vfe&opi=89978449&ved=0CA0QjRxqFwoTCMDNyd6Mp4ADFQAAAAAdAAAAABAE');
        color: rgb(0, 0, 0);
        padding: 5px;
        font-size: 10px;
        border-radius: 50%;
        position: absolute;
        top: -10px;
        right:  0;
        opacity: 0;
    }

}
</style>
