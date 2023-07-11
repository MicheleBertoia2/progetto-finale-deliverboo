import { createRouter, createWebHistory } from "vue-router";

import Home from './pages/Home.vue'
import Contacts from './pages/Contacts.vue'
import About from './pages/About.vue'
import Error404 from './pages/Error404.vue'


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
            meta
        },
        {
            path: '/contatti',
            name: 'contacts',
            component: Contacts,
            meta
        },
        {
            path: '/chi-siamo',
            name: 'about',
            component: About,
            meta
        },





        {
            path: '/:pathMatch(.*)*',
            component: Error404,
            meta
        }

    ]

})

export { router }
