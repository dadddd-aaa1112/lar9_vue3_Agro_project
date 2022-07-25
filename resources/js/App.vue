<template>

    <router-link to="/admin/login"><span>Login </span></router-link>
    <router-link to="/admin/register"><span>Registration</span></router-link>

    <router-view></router-view>
</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>

</style>
