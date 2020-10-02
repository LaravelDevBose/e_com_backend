<template>
    <li class="product-item">
        <a class="product-item-photo" href="#" title="The Name Product">
            <img class="product-image-photo"
                 src="images/media/index1/minicart.jpg"
                 alt="The Name Product">
        </a>
        <div class="product-item-details">
            <strong class="product-item-name">
                <a href="#">Donec Ac Tempus</a>
            </strong>
            <div class="product-item-price">
                <span class="price">61,19 €</span>
            </div>
            <div class="product-item-qty">
                <span class="label">Qty: </span><span
                class="number">1</span>
            </div>
            <div class="product-item-actions">
                <a class="action delete" href="#" title="Remove item">
                    <span>Remove</span>
                </a>
            </div>
        </div>
    </li>
</template>

<script>
export default {
name: "CartDropdownItem"
}
</script>

<style scoped>

</style>
