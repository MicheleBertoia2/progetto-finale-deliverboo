import { createRouter, createWebHistory } from "vue-router";

import Home from './pages/Home.vue'
import Contacts from './pages/Contacts.vue'
import About from './pages/About.vue'
import Error404 from './pages/Error404.vue'
import RestaurantDetail from './pages/RestaurantDetail.vue'
import Checkout from './pages/Checkout.vue'

const meta = {
    enterClass: 'animate__animated animate__bounceInLeft',
    leaveClass: 'animate__animated animate__bounceOutRight',
}

const router = createRouter({

    history: createWebHistory(),
    linkExactActiveClass: 'active',

    routes:[
        {
            path: '/',
            name: 'home',
            component: Home,

        },
        {
            path: '/contatti',
            name: 'contacts',
            component: Contacts,

        },
        {
            path: '/chi-siamo',
            name: 'about',
            component: About,

        },
        {
            path: '/:slug',
            name: 'RestaurantDetail',
            component: RestaurantDetail,

        },
        {
            path: '/checkout-order',
            name: 'checkout',
            component: Checkout,

        },
        {
            path: '/:pathMatch(.*)*',
            component: Error404,

        }
    ]
});

export { router }
