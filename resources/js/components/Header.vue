
<script>
export default {
    name: 'Header'
}
</script>


<template>
  <header>
    <ul>
        <li>
            <router-link :to="{ name:'home' }">home</router-link>
        </li>
        <li>
            <router-link :to="{ name:'about' }">chi siamo</router-link>
        </li>
        <li>
            <router-link :to="{ name:'contacts' }">contatti</router-link>
        </li>
    </ul>
  </header>
</template>

<style lang="scss" scoped>
ul{
    list-style: none;
    display: flex;
    justify-content: center;
    li{
        margin: 0 15px;
        a{
            text-transform: uppercase;
            color: white;
            text-decoration: none;
            &:hover, &.active{
                color: yellow;
            }

        }
    }
}
</style>
