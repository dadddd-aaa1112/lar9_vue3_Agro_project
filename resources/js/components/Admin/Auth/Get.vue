<template>
Get
    {{dataGet}}
   </template>

<script setup>
import {onMounted, ref} from 'vue'
import axios from 'axios';



const dataGet = ref('')

const getData = () => {
    axios.get('/api/get')
        .then(res => {
            dataGet.value = res.data
        })
}
onMounted(() => {
    getData()
})
</script>

<style scoped>

</style>
