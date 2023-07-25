<template>
    <transition name="modal">
      <div v-if="modalOpen" class="modal-container" @click.self="closeModal">
        <div class="mb-modal">
          <!-- Contenuto del modal, ad esempio il carrello -->
          <h2>Carrello</h2>
          <div class="btn btn-danger" @click="this.store.emptyCart()">Svuota Carrello</div>
          <ul v-if="store.cartItems.length > 0">
            <li v-for="(item, index) in cartItems" :key="index" class="d-flex">
                <div class="imagebox">
                    <img :src="store.getFullImageUrl(item.image_path)" :alt="item.name">
                </div>
                <div class="info">
                    <h4>{{ item.name }}</h4>
                    <p>{{ item.description }}</p>
                    <div class="quantity-interface d-flex">
                        <div class="btn btn-secondary" @click="store.modifyQuantity(item,false)"><i class="fa-solid fa-minus"></i></div>
                        <div class="text-center px-3 py-1 border border-black">{{ item.quantity }}</div>
                        <div class="btn btn-secondary" @click="store.modifyQuantity(item,true)"><i class="fa-solid fa-plus" ></i></div>
                        <div class="btn btn-danger" @click="removeFromCartAndEmit(item.id),item.isAdded = false"><i class="fa-solid fa-close" ></i></div>
                    </div>
                </div>

            </li>
          </ul>
          <div v-else><p>Non ci sono elementi nel carrello!</p></div>
          <div class="mb-btn-close" @click="closeModal"><i class="fa-solid fa-close"></i>
            </div>

            <div v-if="store.cartItems.length > 0">
                <h5>Totale Provvisorio: {{ orderTotal.toFixed(2) }}€</h5>
                <div  class="btn btn-success">
                    <router-link :to="{ name: 'checkout' }" class="nav-link">Procedi con l'ordine</router-link>
                </div>
            </div>
        </div>
      </div>
    </transition>
  </template>

  <script>
  import { store } from '../store/store';
  export default {
    data(){
        return{
            store
        }
    },
    props: {
      modalOpen: {
        type: Boolean,
        required: true
      },
      cartItems: {
        type: Array,
        required: true
      }
    },
    computed:{
        orderTotal() {
            let total = 0;
            for (const item of this.cartItems) {
                total += parseFloat(item.price) * item.quantity;
            }
            return total;
        }
    },
    methods: {
      closeModal() {
        this.$emit("close");
      },



      removeFromCartAndEmit(itemId){
        this.store.removeFromCart(itemId)
        const item = this.cartItems.find(item => item.id === itemId);
        item.isAdded = false;
        this.$emit("item-removed", item);
      }

    }
  };
  </script>

  <style>
  .modal-container {
    position: fixed;
    left: 0;
    z-index: 5;
    bottom: 0;
    width: 550px;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
  }

  .mb-modal {
    width: 500px;
    height: 100%;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  }

  .modal-enter-active,
  .modal-leave-active {
    transition: transform 0.3s;
  }

  .modal-enter-from,
  .modal-leave-to {
    transform: translateX(-100%);
  }

  .mb-btn-close{
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    transform: translateY(-50%);
    top: 50%;
    left: 93%;
    height: 90vh;
    background-color: rgba(247, 247, 247, 0.5);
    padding: 10px;
    border-radius: 50%;
    cursor: pointer;
  }
  </style>
