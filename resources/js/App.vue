
<script>
import Header from './components/Header.vue'


export default {
    name:'App',
    components: {
        Header
    }
}
</script>

<template>

    <div class="container">
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
    .container{
        position: relative;
        .page{
            position: absolute;
        }
    }
</style>
