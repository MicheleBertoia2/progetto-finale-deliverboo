import { reactive } from "vue";

export const store = reactive({

    apiUrl: 'http://127.0.0.1:8000/api/',

    loaded: false,

    cartItems: [],
    showModal: false,


    addToCart(item) {

        const restaurantId = item.restaurant_id; // Assumendo che ci sia un identificatore univoco per ogni ristorante (es. "restaurantId" nella tua struttura dati)
        const isCartEmpty = this.cartItems.length === 0;

        if (isCartEmpty || this.cartItems.every(cartItem => cartItem.restaurantId === restaurantId)) {
            const existingItem = this.cartItems.find(cartItem => cartItem.id === item.id);

            if (existingItem) {
            existingItem.quantity++;
            } else {
            this.cartItems.push({ ...item, quantity: 1 });
            }

            this.saveCartToLocalStorage();
        } else {
            // Mostra un messaggio di errore o svuota il carrello


            alert('Puoi ordinare piatti solo da un unico ristorante');
        }
    },

    removeFromCart(itemId) {
        // Rimuovi l'elemento dal carrello
        this.cartItems = this.cartItems.filter(item => item.id !== itemId);

        // Salva il carrello aggiornato nel localStorage
        this.saveCartToLocalStorage();
    },

    saveCartToLocalStorage() {
    // Salva il carrello nel localStorage come stringa JSON
    localStorage.setItem('cart', JSON.stringify(this.cartItems));
    },

    modifyQuantity(item,bool){
        const cartItemToChange = this.cartItems.find(cartItem => cartItem.id === item.id)
        if (cartItemToChange.quantity > 1 && bool == false) {
            cartItemToChange.quantity --;
        } else if (bool == true){
            cartItemToChange.quantity ++;
        }
        this.saveCartToLocalStorage();
      },


});
