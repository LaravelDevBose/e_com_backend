<template>
    <form action="">
        <h4>Checkout as Guest</h4>
        <p>Quick Checkout? Please give information:</p>
        <label>Name <span class="text text-danger">*</span></label>
        <input class="form-control input" type="text">
        <label>Email address <span class="text text-danger">*</span></label>
        <input class="form-control input" type="email">
        <label>Phone No <span class="text text-danger">*</span></label>
        <input class="form-control input" type="number">
        <button class="button">Checkout</button>
    </form>
</template>

<script>
export default {
name: "GuestComponent"
}
</script>

<style scoped>

</style>
