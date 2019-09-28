<template>
    <div class="box-border">
        <ul class="shipping_method">
            <li>
                <p class="subcaption bold">Free Shipping</p>
                <label for="radio_button_3"><input checked="" name="radio_3" id="radio_button_3" type="radio">Free $0</label>
            </li>

            <li>
                <p class="subcaption bold">Free Shipping</p>
                <label for="radio_button_4"><input name="radio_3" id="radio_button_4" type="radio"> Standard Shipping $5.00</label>
            </li>
        </ul>
        <button class="button">Continue</button>
    </div>
</template>

<script>
    export default {
        name: "ShippingMethod"
    }
</script>

<style scoped>

</style>
