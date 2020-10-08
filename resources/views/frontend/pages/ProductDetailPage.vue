<template>
    <!-- MAIN -->
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <!--<li><a href="#">Home    </a></li>
                <li><a href="#">Electronics    </a></li>
                <li class="active">Machine Pro</li>-->
            </ol><!-- Block  Breadcrumb-->

            <div class="row">
                <!-- Main Content -->
                <div class="col-md-9  col-main" v-if="typeof productData !== 'undefined' && productData !== ''">

                    <div class="row">

                        <div class="col-sm-6 col-md-6 col-lg-6">

                            <div class="product-media media-horizontal">

                                <div class="image_preview_container images-large">
                                    <img id="pro_img_zoom"
                                         :data-zoom-image="productData.image.image_path"
                                         :src="productData.image.image_path"
                                         :alt="productData.name"
                                         v-if="productData.image"
                                    >

                                    <img id="pro_img_zoom"
                                         :data-zoom-image="$baseUrl+'/images/loader.gif'"
                                         :src="$baseUrl+'/images/loader.gif'"
                                         :alt="productData.name"
                                         v-else
                                    >

                                    <button class="btn-zoom open_qv"><span>zoom</span></button>

                                </div>

                                <div class="product_preview images-small">

                                    <div
                                        class="owl-carousel owl-carousel-product"
                                        id="thumbnails"
                                        data-nav="true"
                                        data-dots="false"
                                        data-margin="5"
                                        data-responsive='{"0":{"items":3},"480":{"items":4},"600":{"items":5},"768":{"items":3}}'
                                        v-if="productData.productImages && productData.productImages.length> 0"
                                    >
                                        <a href="#"
                                           :data-image="productData.image.image_path"
                                           :data-zoom-image="productData.image.image_path"
                                        >
                                            <img
                                                :data-zoom-image="productData.image.image_path"
                                                :src="productData.image.image_path"
                                                :alt="productData.name"
                                            >
                                        </a>

                                        <a href="#"
                                           v-for="proImage in productData.productImages"
                                           :key="proImage.attachment.attachment_id"
                                           v-if="proImage.attachment"
                                           :data-image="proImage.attachment.image_path"
                                           :data-zoom-image="proImage.attachment.image_path"
                                        >
                                            <img
                                                :src="proImage.attachment.image_path"
                                                :data-large-image="proImage.attachment.image_path"
                                                :alt="productData.name"
                                            >
                                        </a>
                                    </div><!--/ .owl-carousel-->

                                </div><!--/ .product_preview-->

                            </div><!-- image product -->
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">

                            <div class="product-info-main">

                                <h1 class="page-title"> {{ productData.name }}</h1>
                                <div class="product-reviews-summary">
                                    <div class="rating-summary">
                                        <div class="rating-result" :title="productData.rating">
                                            <span :style="{width: productData.rating * 100 +'%'}">
                                                <span><span>{{ productData.rating }}</span>% of <span>100</span></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="reviews-actions">
                                        <a href="" class="action view">Based on {{
                                                (productData.reviews && productData.reviews.length > 0) ? productData.reviews.length : 0
                                            }} ratings</a>
                                    </div>
                                </div>

                                <div class="product-info-price">
                                    <div class="price-box">
                                        <span class="price">{{ cartData.price }}</span>
                                        <span class="old-price"
                                              v-if="cartData.oldPrice > 0">{{ cartData.oldPrice }}</span>
                                        <span class="label-sale"
                                              v-if="cartData.discount > 0">{{ cartData.discount }} %</span>
                                    </div>
                                </div>
                                <div class="product-code">
                                    Item Code: {{ productData.sku }}
                                </div>
                                <div class="product-info-stock">
                                    <div class="stock available">
                                        <span class="label">Availability: </span>In stock
                                    </div>
                                </div>
                                <div class="product-condition" v-if="productData.brand">
                                    Brand: {{ productData.brand.name }}
                                </div>
                                <div class="product-overview">
                                    <div class="overview-content" v-html="productData.highlight"></div>
                                </div>

                                <div class="product-add-form">
                                    <p>Available Options:</p>
                                    <form>

                                        <div class="product-options-wrapper">

                                            <div class="swatch-opt"
                                                 v-if="productData.product_type === 2 && productData.variations.length >0">
                                                <div class="swatch-attribute color">
                                                    <span class="swatch-attribute-label">Color:</span>
                                                    <div class="swatch-attribute-options clearfix">
                                                        <div
                                                            v-for="colorVar in productData.variations"
                                                            v-if="colorVar.color !== ''"
                                                            :key="colorVar.color.name"
                                                            :title="colorVar.color.name"
                                                            class="swatch-option color"
                                                            :style="{backgroundColor: colorVar.color.code}"
                                                            :class="{selected: colorVar.color.id === cartData.colorId}"
                                                            @click.prevent="cartData.colorId = colorVar.color.id"
                                                        ></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-qty">
                                                <label class="label">Qty: </label>
                                                <div class="control">
                                                    <input type="text" class="form-control input-qty" value='1'
                                                           id="qty1" name="qty1" maxlength="12" minlength="1">
                                                    <button class="btn-number  qtyminus" data-type="minus"
                                                            data-field="qty1"><span>-</span></button>
                                                    <button class="btn-number  qtyplus" data-type="plus"
                                                            data-field="qty1"><span>+</span></button>
                                                </div>
                                            </div>
                                            <div class="form-configurable"
                                                 v-if="productData.product_type === 2 && productData.variations.length >0">
                                                <label for="forSize" class="label">Size: </label>
                                                <div class="control">
                                                    <select id="forSize" class="form-control attribute-select">
                                                        <option
                                                            v-for="sizeVar in productData.variations"
                                                            v-if="sizeVar.size !== ''"
                                                            :key="sizeVar.size.name"
                                                            :value="sizeVar.size.id"
                                                        >{{ sizeVar.size.name }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <a href="" class="size-chart">Size chart</a>
                                            </div>
                                        </div>


                                        <div class="product-options-bottom clearfix">

                                            <div class="actions">

                                                <button type="submit" title="Add to Cart" class="action btn-cart">
                                                    <span>Add to Cart</span>
                                                </button>
                                                <div class="product-addto-links">

                                                    <a href="#" class="action btn-wishlist" title="Wish List">
                                                        <span>Wishlist</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div><!-- detail- product -->

                        </div><!-- Main detail -->

                    </div>

                    <!-- product tab info -->

                    <div class="product-info-detailed ">

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="active"><a href="#description" role="tab" data-toggle="tab">Product
                                Details </a></li>
                            <li role="presentation">
                                <a
                                    href="#extra_info"
                                    role="tab"
                                    data-toggle="tab"
                                    v-if="productData.details && (productData.details.model
                                    || productData.details.materials
                                    || productData.details.pieces
                                    || productData.details.color_shade
                                    || productData.details.extra_details
                                    || productData.details.warranty_period
                                    || productData.details.warranty_policy)
                                    "
                                >Extra information </a>
                            </li>
                            <li role="presentation"><a href="#reviews" role="tab" data-toggle="tab">reviews</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                <div class="block-title">Product Details</div>
                                <div class="block-content" v-html="productData.description"></div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="extra_info"
                                 v-if="productData.details && (productData.details.model
                                    || productData.details.materials
                                    || productData.details.pieces
                                    || productData.details.color_shade
                                    || productData.details.extra_details
                                    || productData.details.warranty_period
                                    || productData.details.warranty_policy)
                                    "
                            >
                                <div class="block-title">information</div>
                                <div class="block-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-compare">
                                            <tbody>
                                            <tr v-if="productData.details.materials">
                                                <td class="compare-label">Materials:</td>
                                                <td>{{ productData.details.materials }}</td>
                                            </tr>
                                            <tr v-if="productData.details.model">
                                                <td class="compare-label">Product Model:</td>
                                                <td>{{ productData.details.model }}</td>
                                            </tr>
                                            <tr v-if="productData.details.pieces">
                                                <td class="compare-label">Number Of Pieces:</td>
                                                <td>{{ productData.details.pieces }}</td>
                                            </tr>
                                            <tr v-if="productData.details.color_shade">
                                                <td class="compare-label">Color Shade:</td>
                                                <td>{{ productData.details.color_shade }}</td>
                                            </tr>
                                            <tr v-if="productData.details.extra_details">
                                                <td class="compare-label">Extra Details:</td>
                                                <td>{{ productData.details.extra_details }}</td>
                                            </tr>
                                            <tr v-if="productData.details.warranty_period">
                                                <td class="compare-label">Warranty Period:</td>
                                                <td>{{ productData.details.warranty_period }} (days)</td>
                                            </tr>
                                            <tr v-if="productData.details.warranty_policy">
                                                <td class="compare-label">Warranty Policy:</td>
                                                <td>
                                                    <p v-html="productData.details.warranty_policy"></p>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="reviews">
                                <div class="block-title">reviews</div>
                                <div class="block-content">
                                    <div class="single-box">
                                        <div class="comment-list">
                                            <ul v-if="productData.reviews && productData.reviews.length > 0">
                                                <li
                                                    v-for="review in productData.reviews"
                                                    :key="review.date"
                                                >
                                                    <div class="avartar">
                                                        <img
                                                            :src="`https://ui-avatars.com/api/?name=${review.user.name }&color=7F9CF5&background=EBF4FF`"
                                                            alt="Avatar">
                                                    </div>
                                                    <div class="comment-body">
                                                        <div class="comment-meta">
                                                            <span class="author">
                                                                <a href="#" v-if="review.user">
                                                                    {{ review.user.name }}
                                                                </a>
                                                                <a href="#" v-else>Unknown User</a>
                                                            </span>
                                                            <span class="date">{{ review.date }}</span>
                                                        </div>
                                                        <div class="comment" v-html="review.review"></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product tab info -->
                </div><!-- Main Content -->

                <!-- Sidebar -->
                <div class=" col-md-3   col-sidebar">
                    <details-page-sidebar></details-page-sidebar>
                </div><!-- Sidebar -->

            </div>
        </div>


    </main>
    <!-- end MAIN -->

</template>

<script>
import DetailsPageSidebar from "../components/details_page/DetailsPageSidebar";
import {mapGetters, mapActions} from 'vuex';
import Vue from "vue";

export default {
    name: "ProductDetailPage",
    components: {DetailsPageSidebar},
    data() {
        return {
            owl_carousel: false,
            productOwlCarousel: {},
            elevateZoom: false,
            productElevateZoom: {},
            cartData: {
                id: '',
                name: '',
                qty: 1,
                price: 0,
                colorId: '',
                sizeId: '',
                oldPrice: 0,
                discount: 0,
            },
            rating: 0,
        }
    },
    beforeRouteEnter(to, from, next) {
        let slug = '';
        if (to.params.hasOwnProperty('slug')) {
            slug = to.params.slug;
        } else {
            vm.$router.push('/page_not_found');
        }

        next(vm => {
            vm.getProductDetails(slug)
                .then(response => {
                    if (response.status !== 200) {
                        vm.$router.push('/page_not_found');
                    }
                });
        });
    },
    beforeRouteUpdate(to, from, next) {
        let slug = '';
        if (to.params.hasOwnProperty('slug')) {
            slug = to.params.slug;
        } else {
            this.$router.push('/page_not_found');
        }

        this.getProductDetails(slug)
            .then(response => {
                if (response.status !== 200) {
                    this.$router.push('/page_not_found');
                }
            });
        next();
    },
    mounted() {

    },
    methods: {
        ...mapActions([
            'getProductDetails'
        ]),
        installOwlCarousel: function () {
            this.owl_carousel = true;
            this.productOwlCarousel = $('.owl-carousel-product');
            var config = this.productOwlCarousel.data();
            config.navText = ['', ''];
            config.dots = false;
            this.productOwlCarousel.owlCarousel(config);
        },
        installElevateZoom: function () {
            this.elevateZoom = true;
            this.productElevateZoom = $('#pro_img_zoom');
            const zoomConfig = {
                zoomType: "inner",
                gallery: 'thumbnails',
                galleryActiveClass: 'active',
                cursor: "crosshair",
                responsive: true,
                easing: true,
                zoomWindowFadeIn: 500,
                zoomWindowFadeOut: 500,
                lensFadeIn: 500,
                lensFadeOut: 500
            }
            this.productElevateZoom.elevateZoom(zoomConfig);

            $(".open_qv").on("click", function (e) {
                var ez = $(this).siblings('img').data('elevateZoom');
                $.fancybox(ez.getGalleryList());
                e.preventDefault();
            });
        },
        intProductInfo() {
            this.cartData.price = parseInt(this.productData.variation.price).toFixed(2);
            if (this.productData.discount) {
                this.cartData.discount = this.productData.discount.percent;
                this.cartData.oldPrice = this.cartData.price;
                let discount = (this.cartData.oldPrice * this.productData.discount.percent) / 100;
                this.cartData.price = this.cartData.oldPrice - discount.toFixed(0);
                this.cartData.price = parseFloat(this.cartData.price).toFixed(2);
            }
        },

    },
    computed: {
        ...mapGetters([
            'productData'
        ]),

        checkProductData() {
            return JSON.parse(JSON.stringify(this.productData));
        }

    },
    watch: {
        checkProductData: {
            handler(newValue, oldValue) {
                Vue.nextTick(function () {
                    if (this.owl_carousel) {
                        this.productOwlCarousel.trigger('destroy.owl.carousel');
                    }
                    this.installOwlCarousel();
                    this.installElevateZoom();
                    this.intProductInfo();
                }.bind(this));
            }
        }
    }
}
</script>

<style scoped>

</style>
