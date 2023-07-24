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
  <div class="btn-cart">
        <div class="number">{{ store.cartItems.length }}</div>
        <button class="btn btn-primary" v-if="store.cartItems.length  > 0 " @click="store.showModal = true"><i class="fa-solid fa-cart-shopping"></i></button>
    </div>
</template>


<style  lang="scss"  scoped>
    .btn-cart{
    position: fixed;
    right: 100px;
    bottom: 100px;
    z-index: 5;
    .number{
        height: 15px;
        width: 15px;
        line-height: 5px;
        background-color: orange;
        background-image: url('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.arcostudiopsicologia.it%2Fstaff%2Fsilvia-gambato%2Fcerchio-arancione%2F&psig=AOvVaw2C24Mp2BCU_PjBgucnz7Ug&ust=1690279708000000&source=images&cd=vfe&opi=89978449&ved=0CA0QjRxqFwoTCMDNyd6Mp4ADFQAAAAAdAAAAABAE');
        color: white;
        padding: 5px;
        font-size: 10px;
        border-radius: 50%;
        position: absolute;
        top: -10px;
        right:  0;

    }

}
</style>
