<template>

        <router-link class="mr-3"  to="/admin/login"><span>Login </span></router-link>
        <router-link class="mr-3"  to="/admin/register"><span>Registration</span></router-link>
        <router-link class="mr-3"  to="/admin/get"><span>Get</span></router-link>
        <a href="" class="mr-3" @click.prevent="logoutUser">Logout</a>

    <router-view></router-view>
</template>

<script setup>
import axios from 'axios'
import router from "./router";
import {ref, onMounted, onUpdated} from 'vue';




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
