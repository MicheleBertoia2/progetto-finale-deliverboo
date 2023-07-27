<template>
    <transition name="modal">
      <div v-if="modalOpen" class="modal-container" @click.self="closeModal">
        <div class="mb-modal">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Il tuo ordine</h4>
                <div @click="closeModal" class="d-flex align-items-center cursor-pointer">
                    <div>Chiudi Carrello</div>
                    <div class="bg-primary-color ms-2 rounded close-button d-flex justify-content-center align-items-center"><i class="fa-solid fa-close"></i></div>
                </div>
            </div>

          <div class="mt-5" v-if="store.cartItems.length <= 0">
            <h4 class="text-center">Il carrello è vuoto</h4>
          </div>

            <div class="my-3 " v-else>Stai acquistando da: <span class="my-strong"></span></div>

            <div class="container-items">
              <!-- //* statico -->
              <!-- <div class="d-flex justify-content-start align-items-start h-item mb-3">
                  <img class="img-product " src="/img/jumbo.jpg" alt="">
                  <div class="d-flex flex-column justify-content-start details-product ms-2">
                    <div class="my-strong">Nome Prodotto</div>
                    <div class="text-muted mt-2 small">Quantità: 1</div>
                    <div class="d-flex ">
                      <div class="mt-1 mb-3 btn btn-quantity bg-primary-color d-flex justify-content-center align-items-center">-</div>
                      <div class="mt-1 mb-3 btn btn-quantity bg-primary-color d-flex justify-content-center align-items-center ms-2">+</div>
                    </div>
                    <div class="bg-danger rounded p-2 remove-product text-white"><i class="fa-solid fa-trash"></i> Rimuovi</div>
                  </div>
                  <div class="mt-2 my-strong">10.00 €</div>
              </div> -->

              <!-- //* dinamico -->
              <div v-for="(item, index) in cartItems" :key="index" class="d-flex justify-content-start align-items-start h-item mb-3">
                  <img class="img-product " :src="store.getFullImageUrl(item.image_path)" :alt="item.name">
                  <div class="d-flex flex-column justify-content-start details-product ms-2">
                    <div class="my-strong">{{ item.name }}</div>
                    <div class="text-muted mt-2 small">Quantità: {{ item.quantity }}</div>
                    <div class="d-flex ">
                      <div @click="store.modifyQuantity(item,false)" class="mt-1 mb-3 btn btn-quantity bg-primary-color d-flex justify-content-center align-items-center">-</div>
                      <div @click="store.modifyQuantity(item,true)" class="mt-1 mb-3 btn btn-quantity bg-primary-color d-flex justify-content-center align-items-center ms-2">+</div>
                    </div>
                    <div @click="removeFromCartAndEmit(item.id),item.isAdded = false" class="bg-danger rounded p-2 remove-product text-white"><i class="fa-solid fa-trash"></i> Rimuovi</div>
                  </div>
                  <div class="mt-2 my-strong">{{ item.price }} €</div>
              </div>

            </div>

            <div v-if="store.cartItems.length > 0" class="actions-bar d-flex align-items-end">
              <div class="tot me-2 mt-2 my-strong">Totale: {{ orderTotal.toFixed(2) }} €</div>
              <div class="footer-card d-flex">
                <div class="btn-footer-card bg-danger rounded p-2 text-white me-2 mt-2" @click="this.store.emptyCart()"><i class="fa-solid fa-trash"></i> Svuota Carrello</div>
                <router-link class="text-decoration-none" :to="{ name: 'checkout' }">
                  <div class="btn-footer-card bg-primary-color p-2 rounded btn-order mt-2">Procedi all'ordine</div>
                </router-link>
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
/*serve per chiudere il modal lateralmente*/
  .modal-container {
    position: fixed;
    left: 0;
    /*z-index: 5;*/
    z-index: 10;
    bottom: 0;
    top: 0;
    /*width: 550px;*/
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
  }

  .mb-modal {
    /*width: 500px;*/
    width: 550px;
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

  .bg-primary-color{
    background-color: #3ABFB4;
  }

  .fa-close{
    font-size: 1.7rem;
  }

  .close-button{
    background-color: #3ABFB4;
    padding: 8px 13px;
    cursor: pointer;
      &:hover{
        color: white;
      }
  }

  .h-item{
    height: 150px;
  }

  .img-product{
    width: 150px;
    height: 150px;
    border-radius: 10px;
    object-fit: cover;
  }

  .details-product{
    height: 150px;
    /*width: 215px;*/
    width: 45%;
  }

  .btn-quantity{
    border-radius: 5px;
    padding: 4px 12px;
    &:hover{
      color: white;
    }
  }

  .remove-product{
    width: 50%;
    cursor: pointer;
  }

  .actions-bar{
    font-size: 16px;
  }

  .tot{
    width: 14.5%;
  }

  .btn-order{
    /*width: 41.5%;*/
  }

  .container-items{
    overflow-y: auto;
    height: calc(100% - 41px - 104px);
    /*height: calc(100% - 65px - 104px);*/
  }

  .my-strong{
    font-weight: bold;
  }

.btn-footer-card, .cursor-pointer{
  cursor: pointer;
}

.text-decoration-none{
  color: black;
  &:hover{
    color: white;
  }
}

@media screen and (max-width: 550px) {
  .modal-container {
    width: 100%;
  }
}

@media screen and (max-width: 515px) {
  .remove-product{
    width: 53%;
  }
}

@media screen and (max-width: 332px) {
  .container-items{
    height: calc(100% - 65px - 104px);
  }

  .tot{
    width: 100%;
  }

  .actions-bar{
    display: flex !important;
    flex-direction: column !important;
    align-items: flex-start !important;
  }

  .footer-card{
    width: 100%;
  }

  .btn-footer-card{
    width: 50%;
    text-align: center;
  }
}
</style>
