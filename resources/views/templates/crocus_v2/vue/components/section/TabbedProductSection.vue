<template>
    <div class="category-product">
        <div class="navbar nav-menu">
            <div class="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <div class="new_title">
                            <h2>Hot Products</h2>
                        </div>
                    </li>
                    <li class="active"><a data-toggle="tab" href="#tab-1">Computer</a> </li>
                    <li><a data-toggle="tab" href="#tab-2">Appliances</a> </li>
                    <li><a data-toggle="tab" href="#tab-3">Headsets</a> </li>
                    <li><a data-toggle="tab" href="#tab-4">Mobile</a> </li>
                    <li><a data-toggle="tab" href="#tab-5">Accessories</a> </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </div>
        <div class="product-bestseller">
            <div class="product-bestseller-content">
                <div class="product-bestseller-list">
                    <div class="tab-container">
                        <!-- tab product -->
                        <div class="tab-panel active" id="tab-1">
                            <div class="category-products">
                                <ul class="products-grid">
                                    <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info"> <a class="product-image" title="Maharaja 450W Juicer" href="product_detail.html"> <img alt="Maharaja 450W Juicer" src="crocus_v2/images/product-img.jpg"> </a>
                                                    <div class="box-hover">
                                                        <ul class="add-to-links">
                                                            <li><a class="link-quickview" href="quick_view.html"></a> </li>
                                                            <li><a class="link-wishlist" href="wishlist.html"></a> </li>
                                                            <li><a class="link-compare" href="compare.html"></a> </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"> <a title="Maharaja 450W Juicer" href="product_detail.html"> Maharaja 450W Juicer </a> </div>
                                                    <div class="item-content">
                                                        <div class="rating">
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <div style="width:80%" class="rating"></div>
                                                                </div>
                                                                <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                            </div>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box"> <span class="regular-price"> <span class="price">$155.00</span> </span> </div>
                                                        </div>
                                                        <div class="action">
                                                            <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "TabbedProductSection",
        props:{
            section:[Object]
        }
    }
</script>

<style scoped>

</style>
