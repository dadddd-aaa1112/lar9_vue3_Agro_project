<template>
    <div class="container w-50">
        <div class="d-flex justify-content-center">
            <h3>Registration</h3>
        </div>
        <form>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" v-model="name" class="form-control" placeholder="Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" v-model="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" v-model="password" class="form-control" placeholder="Password">
            </div>
            <div class="mb-3">
                <label class="form-label">Password confirm</label>
                <input type="password" v-model="password_confirmed" class="form-control" placeholder="Password confirm">
            </div>

            <select v-model="role" class="mb-3 form-select">
                <option disabled>Select role</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>

            <div class="d-flex justify-content-center">
                <button @click.prevent="registerUser" class="btn btn-outline-primary">Registration</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from 'axios'
import {ref} from 'vue'
import router from "../../../router";

const email = ref('')
const name = ref('')
const password = ref('')
const password_confirmed = ref('')
const role = ref(null)

const registerUser = () => {
    axios.get('/sanctum/csrf-cookie').then(response => {
        axios.post('/register', {
            name: name.value,
            email: email.value,
            password: password.value,
            password_confirmation: password_confirmed.value,
            role: role.value
        })
            .then(res => {

              console.log(role.value)
            })
    })
}
</script>

<style scoped>

</style>
