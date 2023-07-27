import { reactive } from "vue";

export const store = reactive({

    apiUrl: 'http://127.0.0.1:8000/api/',

    loaded: false,

    typesImages: [
        'pizza2.png',
        'sushi.png',
        'cinese.png',
        'americano.png',
        'kebab.png',
        'messicano.png',
        'indiano.png',
        'thai.png',
    ],

    cartItems: [],

    showModal: false,

    // FUNZIONI PER IL CARRELLO
    addToCart(item) {

        const restaurantId = item.restaurant_id;

        const isCartEmpty = this.cartItems.length === 0;

        if (isCartEmpty || this.cartItems.every(cartItem => cartItem.restaurant_id === restaurantId)) {
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

    emptyCart(){
        this.cartItems = [];
        this.saveCartToLocalStorage();

    },
    // FINE  FUNZIONI PER  IL CARRELLO

    getFullImageUrl(imagePath) {
        if (imagePath.startsWith('uploads/')) {
            // Se l'immagine è salvata nel disco di archiviazione di Laravel
            return imagePath.replace('uploads/', 'storage/uploads/');
        } else {
            // Altrimenti, l'immagine è un URL completo
            return imagePath;
        }
    },

});
