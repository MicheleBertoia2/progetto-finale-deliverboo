
<script>
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'

export default {
    name:'App',
    components: {
        Header,
        Footer
    }
}
</script>

<template>

    <div>
        <Header />


        <router-view v-slot="{Component, route}" class="page">
            <transition
                :enter-active-class="route.meta.enterClass"
                :leave-active-class="route.meta.leaveClass"
            >
                <component :is="Component" />
            </transition>
        </router-view>


    </div>


</template>

<style lang="scss" scoped>


</style>
