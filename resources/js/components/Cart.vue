<template>
    <transition name="modal">
      <div v-if="modalOpen" class="modal-container" @click.self="closeModal">
        <div class="mb-modal">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Il tuo ordine</h4>
                <div @click="closeModal" class="d-flex align-items-center cursor-pointer">
                    <div class="bg-primary-color ms-2 rounded close-button d-flex justify-content-center align-items-center"><i class="fa-solid fa-close"></i></div>
                </div>
            </div>

          <div class="" v-if="store.cartItems.length <= 0">
            <h4 class="text-center mt-5 mb-3">Il carrello è vuoto</h4>
            <!-- <div class="text-decoration-none text-center d-flex justify-content-center">
            <router-link class="text-decoration-none text-center d-flex justify-content-center" :to="{ name: 'home' }">
              <div class="btn-footer-card bg-primary-color p-2 rounded btn-order mt-2 w-32 mx-2">Torna alla Home</div>
            </router-link>
            <div class="text-decoration-none text-center d-flex justify-content-center">
              <div @click="closeModal" class="btn-footer-card bg-primary-color p-2 rounded btn-order mt-2 w-32 mx-2">Chiudi Carrello</div>
            </div>
            </div> -->
          </div>

            <div class="my-3 " v-else></div>

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
              <div v-for="(item, index) in cartItems" :key="index" class="d-flex justify-content-start align-items-start h-item my-3">
                  <img class="img-product " :src="store.getFullImageUrl(item.image_path)" :alt="item.name">
                  <div class="d-flex flex-column justify-content-start details-product ms-2">
                    <div class="my-strong card-titles">{{ item.name }}</div>
                    <div class="text-muted mt-2 small">Quantità:
                        <strong class=" text-dark">
                            {{ item.quantity }}
                        </strong>
                    </div>
                    <div class="d-flex ">
                      <div @click="store.modifyQuantity(item,false)" class="mt-1 mb-3 btn btn-quantity bg-primary-color d-flex justify-content-center align-items-center">-</div>
                      <div @click="store.modifyQuantity(item,true)" class="mt-1 mb-3 btn btn-quantity bg-primary-color d-flex justify-content-center align-items-center ms-2">+</div>
                    </div>
                    <div @click="removeFromCartAndEmit(item.id),item.isAdded = false" class="trash-b bg-danger rounded p-2 remove-product text-white"><i class="fa-solid fa-trash"></i> <span class="remove">Rimuovi</span></div>
                    </div>
                    <div class="mt-2 my-strong">{{ item.price }} €</div>
            </div>

            </div>

            <div v-if="store.cartItems.length > 0" class="actions-bar d-flex align-items-end">
                <div class="ms-5 mb-1 my-strong">Totale: {{ orderTotal.toFixed(2) }}€</div>

                <!-- <div class="btn-footer-card bg-danger rounded p-2 text-white me-2 mt-2" @click="this.store.emptyCart()"><i class="fa-solid fa-trash"></i> Svuota Carrello</div> -->
                <router-link class="text-decoration-none" :to="{ name: 'checkout' }">
                <div class="btn-footer-card bg-primary-color p-2 rounded btn-order ms-5 mt-2">Procedi all'ordine</div>
                </router-link>


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

<style lang="scss">
/*serve per chiudere il modal lateralmente*/
.card-titles{
        width: 180px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
  .modal-container {
    position: fixed;
    left: 0;
    z-index: 25;
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
    background-color: #3ABFB4 !important;
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
      color: white !important;
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
    height: calc(100% - 97px);
    /*height: calc(100% - 41px - 104px);*/
    /*height: calc(100% - 65px - 104px);*/
  }

  .my-strong{
    font-weight: bold;
  }

.btn-footer-card, .cursor-pointer{
  cursor: pointer;
}

.bg-danger{
  &:hover{
    background-color: #c82333 !important;
  }
}
.text-decoration-none{
  color: black;
  &:hover{
    color: white;
  }
}
@media screen and (max-width: 768px) {
        .restaurant-container {
            display: block;

        }
    }
@media screen and (max-width: 445px) {
        .details-product{
            height: 150px;
            width: 130px;
        }
        .trash-b{
            width: 33px;
        }
        .remove{
            display: none;
        }
    }

@media screen and (max-width: 555px) {
    .mb-modal {
        width: 100%;
    }
    .trash-b{
        width: 33px;
    }
    .remove{
            display: none;
        }
        .card-titles{
        width: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
}

@media screen and (max-width: 515px) {
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
