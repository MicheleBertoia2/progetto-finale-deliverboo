<template>
    <transition name="modal">
      <div v-if="modalOpen" class="modal-container" @click.self="closeModal">
        <div class="mb-modal">
          <!-- Contenuto del modal, ad esempio il carrello -->
          <h2>Carrello</h2>
          <ul>
            <li v-for="(item, index) in cartItems" :key="index">
              {{ item.name }} - {{ item.quantity }}
            </li>
          </ul>
          <button @click="closeModal">Chiudi</button>
        </div>
      </div>
    </transition>
  </template>

  <script>
  export default {
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
    methods: {
      closeModal() {
        this.$emit("close");
      },


    }
  };
  </script>

  <style>
  .modal-container {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 5;
    right: 0;
    bottom: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.5);
  }

  .mb-modal {
    width: 500px;
    height: 500px;
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
  </style>
