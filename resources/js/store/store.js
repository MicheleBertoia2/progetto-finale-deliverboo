import { reactive } from "vue";

export const store = reactive({

    apiUrl: 'http://127.0.0.1:8000/api/',

    loaded: false,

    cartItems: [],
    showModal: false,


    addToCart(item) {

        // Cerca se l'elemento è già presente nel carrello
        const existingItem = this.cartItems.find(cartItem => cartItem.id === item.id);

        if (existingItem) {
            // Se l'elemento è già presente, aumenta la quantità
            existingItem.quantity++;
        } else {
            // Altrimenti aggiungi l'elemento al carrello
            this.cartItems.push({ ...item, quantity: 1 });
        }

        // Salva il carrello aggiornato nel localStorage
        this.saveCartToLocalStorage();
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
