<script>

import axios from 'axios';
import { store } from '../store/store'

export default {
    name:'ContactForm',
    data(){
        return{
            name: '',
            email: '',
            message: '',
            errors: {},
            sending: false,
            success: false
        }
    },
    methods:{

        sendForm(){
            this.sending = true;
            const data = {
                name: this.name,
                email: this.email,
                message: this.message,
            }

            axios.post(`${store.apiUrl}contacts`, data)
                .then(result => {
                    this.sending = false;
                    this.success = result.data.success;
                    if(!result.data.success){
                        this.errors = result.data.errors;
                    }else{
                        this.errors = {};
                    }
                })
        }
    }
}
</script>

<template>

    <form v-if="!success" @submit.prevent="sendForm()" >
        <div>
            <input :class="{'error-form': errors.name}" v-model.trim="name" type="text" placeholder="Nome">
            <p v-for="(error,index) in errors.name" :key="index" class="error-msg">{{ error }}</p>
        </div>
        <div>
            <input :class="{'error-form': errors.email}" v-model.trim="email" type="email" id="" placeholder="Email">
            <p v-for="(error,index) in errors.email" :key="index" class="error-msg">{{ error }}</p>
        </div>
        <div>
            <textarea :class="{'error-form': errors.message}" v-model.trim="message" cols="30" rows="10" placeholder="Messaggio"></textarea>
            <p v-for="(error,index) in errors.message" :key="index" class="error-msg">{{ error }}</p>
        </div>
        <button type="submit" :disabled="sending">{{ sending ? 'Invio in corso...' : 'Invia' }}</button>
    </form>

    <div v-else><h2 class="success">Form inviato correttamente</h2></div>

</template>

<style lang="scss" scoped>
form{
    width: 100%;
}
input, textarea, button{
    width: 100%;
    margin-top: 10px;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid lightgray

}
.error-form{
    border: 1px solid red
}
.error-msg{
    color: red;
    font-size: .9rem;
}
.success{
    color: green;
}
button{
    cursor: pointer;
}
</style>
