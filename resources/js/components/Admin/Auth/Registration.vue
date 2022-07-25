<template>
    <div class="container w-50">
        <div class="d-flex justify-content-center">
        <h3>Registration</h3>
            </div>
        <form>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="email" class="form-control" placeholder="Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
                <label  class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Password" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Password confirm</label>
                <input type="password" class="form-control" placeholder="Password confirm">
            </div>
<div class="d-flex justify-content-center">
            <button type="submit"  class="btn btn-outline-primary">Registration</button>
</div>
        </form>
    </div>
</template>

<script>
export default {
    name: "Registration"
}
</script>

<style scoped>

</style>
