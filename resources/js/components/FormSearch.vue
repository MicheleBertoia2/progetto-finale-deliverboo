
<script>
import axios from 'axios';
import { store } from '../store/store';

export default {
    name:'FormSearch',
    data(){
        return{
            tosearch : ''
        }
    },
    methods:{
        getApi(){
            store.loaded = false;
            axios.get(store.apiUrl + 'posts/search/' + this.tosearch)
                .then(result => {
                    store.posts = result.data.data;
                    store.links = result.data.links
                    store.first_page_url = result.data.first_page_url
                    store.last_page_url = result.data.last_page_url
                    store.current_page = result.data.current_page
                    store.last_page = result.data.last_page
                    store.loaded = true;
                    this.tosearch = '';
                })

        }
    }
}
</script>

<template>

    <input
      v-model.trim="tosearch"
      placeholder="Cerca"
      type="text"
      @keyup.enter="getApi"
    >
    <button @click="getApi">Invia</button>

</template>


<style lang="scss" scoped>
    input, button{
        padding: 10px;
        border-radius: 10px;
        margin-right: 20px;
        margin-bottom: 20px;
    }
    button{
        border: none;
        cursor: pointer;
        &:hover{
            background-color: darkgray;
        }
    }
</style>
