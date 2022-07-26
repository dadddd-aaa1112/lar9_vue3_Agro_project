<template>

        <router-link class="mr-3" v-if="!token" to="/admin/login"><span>Login </span></router-link>
        <router-link class="mr-3" v-if="!token" to="/admin/register"><span>Registration</span></router-link>
        <router-link class="mr-3" v-if="token" to="/admin/get"><span>Get</span></router-link>
        <a href="" class="mr-3" v-if="token" @click.prevent="logoutUser">Logout</a>

    <router-view></router-view>
</template>

<script setup>
import axios from 'axios'
import router from "./router";
import {ref, onMounted, onUpdated} from 'vue';

const token = ref(null)

const getToken = () => {
    token.value = localStorage.getItem('x_xsrf_token')
}
onMounted(() => {
    getToken()
})

onUpdated(() => {
    getToken()
})

const logoutUser = () => {
    axios.post('/logout')
        .then(res => {
            localStorage.removeItem('x_xsrf_token')
            router.push('/admin/login')
        })
}
</script>

<style scoped>

</style>
