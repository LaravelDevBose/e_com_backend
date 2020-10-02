<template>
    <div class="product-item-info">
        <div class="product-item-photo">
            <a class="product-item-img" href=""><img alt="product name" src="images/media/index3/deals1.jpg"></a>
            <div class="product-item-actions">
                <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                <a class="btn btn-compare" href=""><span>compare</span></a>
                <a class="btn btn-quickview" href=""><span>quickview</span></a>
            </div>
            <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
        </div>
        <div class="product-item-detail">
            <strong class="product-item-name"><a href="">Maecenas consequat </a></strong>
            <div class="clearfix">
                <div class="product-item-price">
                    <span class="price">$45.00</span>
                    <span class="old-price">$52.00</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProductItem"
}
</script>

<style scoped>

</style>
