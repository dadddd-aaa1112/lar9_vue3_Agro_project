<template>

    <div class="container w-50">
        <div class="d-flex justify-content-center">
            <h3>Login</h3>
        </div>
        <form>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input v-model="email" type="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input v-model="password" type="password" class="form-control" placeholder="Password">
            </div>

            <div class="d-flex justify-content-center">
                <button @click.prevent="loginUser" class="btn btn-outline-primary">Login</button>
            </div>
        </form>
    </div>

</template>

<script setup>
import axios from 'axios'
import {ref} from 'vue'
import router from "../../../router";

const email = ref('')
const password = ref('')

const loginUser = () => {
    axios.get('/sanctum/csrf-cookie').then(response => {
        axios.post('/login', {
            email: email.value,
            password: password.value
        })
            .then(r => {
                localStorage.setItem('x_xsrf_token', r.config.headers['X-XSRF-TOKEN'])
                 router.push('/admin/get')
                console.log(r)
            })
            .catch(err => {
                console.log(err.response)
            })
    })


}
</script>

<style scoped>

</style>
