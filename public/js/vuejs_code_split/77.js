(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[77],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/details_page/DetailsPageSidebar.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/details_page/DetailsPageSidebar.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _section_HotDealCarouselSection__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../section/HotDealCarouselSection */ "./resources/views/frontend/components/section/HotDealCarouselSection.vue");
/* harmony import */ var _section_OwlCarouselProductList__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../section/OwlCarouselProductList */ "./resources/views/frontend/components/section/OwlCarouselProductList.vue");
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(source, true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(source).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  name: "DetailsPageSidebar",
  components: {
    OwlCarouselProductList: _section_OwlCarouselProductList__WEBPACK_IMPORTED_MODULE_1__["default"],
    HotDealCarouselSection: _section_HotDealCarouselSection__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_2__["mapGetters"])(['relatedProducts']))
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/section/HotDealCarouselSection.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/section/HotDealCarouselSection.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _product_HotDealProductItem__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../product/HotDealProductItem */ "./resources/views/frontend/components/product/HotDealProductItem.vue");
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_2__);
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(source, true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(source).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  name: "HotDealCarouselSection",
  components: {
    HotDealProductItem: _product_HotDealProductItem__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  created: function created() {
    this.getDiscountProducts();
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_1__["mapActions"])(['getDiscountProducts']), {
    installOwlCarousels: function installOwlCarousels() {
      var hotDealOwlC = $('.owl-carousel-hot-deal');
      var config = hotDealOwlC.data();
      config.navText = ['', ''];
      config.dotsData = false;
      config.smartSpeed = "800";
      config.loop = true;
      config.rewind = true;
      /*config.animateOut="fadeOutDown";
      config.animateIn="fadeInDown";*/

      hotDealOwlC.owlCarousel(config);
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_1__["mapGetters"])(['discountProducts']), {
    checkDiscountProducts: function checkDiscountProducts() {
      return JSON.parse(JSON.stringify(this.discountProducts));
    }
  }),
  watch: {
    checkDiscountProducts: {
      handler: function handler(newValue) {
        if (this.discountProducts && this.discountProducts.length > 0) {
          vue__WEBPACK_IMPORTED_MODULE_2___default.a.nextTick(function () {
            this.installOwlCarousels();
          }.bind(this));
        }
      },
      deep: true
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_details_page_DetailsPageSidebar__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/details_page/DetailsPageSidebar */ "./resources/views/frontend/components/details_page/DetailsPageSidebar.vue");
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_2__);
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(source, true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(source).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  name: "ProductDetailPage",
  components: {
    DetailsPageSidebar: _components_details_page_DetailsPageSidebar__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
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
        discount: 0
      },
      max_qty: 0,
      disableBtn: false
    };
  },
  beforeRouteEnter: function beforeRouteEnter(to, from, next) {
    var slug = '';

    if (to.params.hasOwnProperty('slug')) {
      slug = to.params.slug;
    } else {
      vm.$router.push('/page_not_found');
    }

    next(function (vm) {
      vm.getProductDetails(slug).then(function (response) {
        if (response.status !== 200) {
          vm.$router.push('/page_not_found');
        }
      });
    });
  },
  beforeRouteUpdate: function beforeRouteUpdate(to, from, next) {
    var _this = this;

    var slug = '';

    if (to.params.hasOwnProperty('slug')) {
      slug = to.params.slug;
    } else {
      this.$router.push('/page_not_found');
    }

    this.getProductDetails(slug).then(function (response) {
      if (response.status !== 200) {
        _this.$router.push('/page_not_found');
      }
    });
    next();
  },
  mounted: function mounted() {},
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_1__["mapActions"])(['getProductDetails', 'addToCartProduct']), {
    installOwlCarousel: function installOwlCarousel() {
      this.owl_carousel = true;
      this.productOwlCarousel = $('.owl-carousel-product');
      var config = this.productOwlCarousel.data();
      config.navText = ['', ''];
      config.dots = false;
      this.productOwlCarousel.owlCarousel(config);
    },
    installElevateZoom: function installElevateZoom() {
      this.elevateZoom = true;
      this.productElevateZoom = $('#pro_img_zoom');
      var zoomConfig = {
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
      };
      this.productElevateZoom.elevateZoom(zoomConfig);
      $(".open_qv").on("click", function (e) {
        var ez = $(this).siblings('img').data('elevateZoom');
        $.fancybox(ez.getGalleryList());
        e.preventDefault();
      });
    },
    intProductInfo: function intProductInfo() {
      this.cartData.price = parseInt(this.productData.variation.price).toFixed(2);
      this.max_qty = parseInt(this.productData.variation.quantity);

      if (this.productData.product_type === 2) {
        if (this.productData.variation.color) {
          this.cartData.colorId = this.productData.variation.color.id;
        }

        if (this.productData.variation.size) {
          this.cartData.sizeId = this.productData.variation.size.id;
        }
      }

      if (this.productData.discount) {
        this.cartData.oldPrice = this.cartData.price;
        this.cartData.discount = this.cartData.oldPrice * this.productData.discount.percent / 100;
        this.cartData.price = this.cartData.oldPrice - this.cartData.discount.toFixed(0);
        this.cartData.price = parseFloat(this.cartData.price).toFixed(2);
      }
    },
    increaseQty: function increaseQty() {
      if (this.max_qty > this.cartData.qty) {
        this.cartData.qty++;
      } else {
        this.$noty.warning("Max Order Qty is ".concat(this.max_qty));
      }
    },
    reducedQty: function reducedQty() {
      this.cartData.qty--;

      if (this.cartData.qty < 1) {
        this.$noty.warning('Min 1 Qty Required');
        this.cartData.qty = 1;
      }
    },
    setProductPrice: function setProductPrice() {
      var _this2 = this;

      if (this.productData.product_type === 2) {
        var variations = this.productData.variations;
        var match = false;
        variations.filter(function (variation) {
          if (parseInt(variation.colorId) === _this2.cartData.colorId && parseInt(variation.sizeId) === _this2.cartData.sizeId) {
            match = true;
            _this2.cartData.price = parseInt(variation.price).toFixed(2);
            _this2.max_qty = parseInt(variation.quantity);

            if (_this2.productData.discount) {
              _this2.cartData.oldPrice = _this2.cartData.price;
              _this2.cartData.discount = _this2.cartData.oldPrice * _this2.productData.discount.percent / 100;
              _this2.cartData.price = _this2.cartData.oldPrice - _this2.cartData.discount.toFixed(0);
              _this2.cartData.price = parseFloat(_this2.cartData.price).toFixed(2);
            }
          }
        });

        if (!match) {
          this.disableBtn = true;
        } else {
          this.disableBtn = false;
        }
      }
    },
    addToCart: function addToCart() {
      this.cartData.id = this.productData.id;
      this.cartData.name = this.productData.name;
      this.addToCartProduct(this.cartData);
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_1__["mapGetters"])(['productData', 'variations']), {
    checkProductData: function checkProductData() {
      return JSON.parse(JSON.stringify(this.productData));
    }
  }),
  watch: {
    checkProductData: {
      handler: function handler(newValue, oldValue) {
        vue__WEBPACK_IMPORTED_MODULE_2___default.a.nextTick(function () {
          if (this.owl_carousel) {
            this.productOwlCarousel.trigger('destroy.owl.carousel');
          }

          this.installOwlCarousel();
          this.installElevateZoom();
          this.intProductInfo();
        }.bind(this));
      },
      deep: true
    },
    'cartData.colorId': {
      handler: function handler(newValue, oldValue) {
        if (newValue !== oldValue) {
          this.setProductPrice();
        }
      },
      deep: true
    },
    'cartData.sizeId': {
      handler: function handler(newValue, oldValue) {
        if (newValue !== oldValue) {
          this.setProductPrice();
        }
      },
      deep: true
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=style&index=0&id=305d2360&scoped=true&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=style&index=0&id=305d2360&scoped=true&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.btn-cart[data-v-305d2360]:disabled,\n.btn-cart[data-v-305d2360]:disabled:hover,\nbutton[disabled][data-v-305d2360]{\n    background-color: #ff336669;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=style&index=0&id=305d2360&scoped=true&lang=css&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=style&index=0&id=305d2360&scoped=true&lang=css& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductDetailPage.vue?vue&type=style&index=0&id=305d2360&scoped=true&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=style&index=0&id=305d2360&scoped=true&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/details_page/DetailsPageSidebar.vue?vue&type=template&id=eec81c6e&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/details_page/DetailsPageSidebar.vue?vue&type=template&id=eec81c6e&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("hot-deal-carousel-section"),
      _vm._v(" "),
      _c("owl-carousel-product-list", {
        attrs: { title: "Related Products", products: _vm.relatedProducts }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/section/HotDealCarouselSection.vue?vue&type=template&id=7ab047aa&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/section/HotDealCarouselSection.vue?vue&type=template&id=7ab047aa&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.discountProducts && _vm.discountProducts.length > 0
    ? _c("div", { staticClass: "block-deal-opt12" }, [
        _vm._m(0),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "block-content", staticStyle: { padding: "0" } },
          [
            _c(
              "div",
              {
                staticClass: "owl-carousel owl-carousel-hot-deal",
                attrs: {
                  "data-nav": "true",
                  "data-dots": "false",
                  "data-margin": "30",
                  "data-responsive":
                    '{\n                    "0":{"items":1},\n                    "480":{"items":1},\n                    "640":{"items":2},\n                    "992":{"items":1},\n                    "1200":{"items":1}\n                    }'
                }
              },
              _vm._l(_vm.discountProducts, function(disProduct) {
                return disProduct.product
                  ? _c(
                      "div",
                      {
                        key: disProduct.id,
                        staticClass: " product-item product-item-opt-1"
                      },
                      [
                        _c("hot-deal-product-item", {
                          attrs: {
                            product: disProduct.product,
                            start_at: disProduct.start_at,
                            expire_at: disProduct.expire_at,
                            percent: disProduct.percent
                          }
                        })
                      ],
                      1
                    )
                  : _vm._e()
              }),
              0
            )
          ]
        )
      ])
    : _vm._e()
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "block-title" }, [
      _c("span", { staticClass: "title" }, [_vm._v("hot deal of this week")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=template&id=305d2360&scoped=true&":
/*!***************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=template&id=305d2360&scoped=true& ***!
  \***************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("main", { staticClass: "site-main" }, [
    _c("div", { staticClass: "columns container" }, [
      _c("ol", { staticClass: "breadcrumb no-hide" }),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        typeof _vm.productData !== "undefined" && _vm.productData !== ""
          ? _c("div", { staticClass: "col-md-9  col-main" }, [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-sm-6 col-md-6 col-lg-6" }, [
                  _c("div", { staticClass: "product-media media-horizontal" }, [
                    _c(
                      "div",
                      { staticClass: "image_preview_container images-large" },
                      [
                        _vm.productData.image
                          ? _c("img", {
                              attrs: {
                                id: "pro_img_zoom",
                                "data-zoom-image":
                                  _vm.productData.image.image_path,
                                src: _vm.productData.image.image_path,
                                alt: _vm.productData.name
                              }
                            })
                          : _c("img", {
                              attrs: {
                                id: "pro_img_zoom",
                                "data-zoom-image":
                                  _vm.$baseUrl + "/images/loader.gif",
                                src: _vm.$baseUrl + "/images/loader.gif",
                                alt: _vm.productData.name
                              }
                            }),
                        _vm._v(" "),
                        _vm._m(0)
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "product_preview images-small" }, [
                      _vm.productData.productImages &&
                      _vm.productData.productImages.length > 0
                        ? _c(
                            "div",
                            {
                              staticClass: "owl-carousel owl-carousel-product",
                              attrs: {
                                id: "thumbnails",
                                "data-nav": "true",
                                "data-dots": "false",
                                "data-margin": "5",
                                "data-responsive":
                                  '{"0":{"items":3},"480":{"items":4},"600":{"items":5},"768":{"items":3}}'
                              }
                            },
                            [
                              _c(
                                "a",
                                {
                                  attrs: {
                                    href: "#",
                                    "data-image":
                                      _vm.productData.image.image_path,
                                    "data-zoom-image":
                                      _vm.productData.image.image_path
                                  }
                                },
                                [
                                  _c("img", {
                                    attrs: {
                                      "data-zoom-image":
                                        _vm.productData.image.image_path,
                                      src: _vm.productData.image.image_path,
                                      alt: _vm.productData.name
                                    }
                                  })
                                ]
                              ),
                              _vm._v(" "),
                              _vm._l(_vm.productData.productImages, function(
                                proImage
                              ) {
                                return proImage.attachment
                                  ? _c(
                                      "a",
                                      {
                                        key: proImage.attachment.attachment_id,
                                        attrs: {
                                          href: "#",
                                          "data-image":
                                            proImage.attachment.image_path,
                                          "data-zoom-image":
                                            proImage.attachment.image_path
                                        }
                                      },
                                      [
                                        _c("img", {
                                          attrs: {
                                            src: proImage.attachment.image_path,
                                            "data-large-image":
                                              proImage.attachment.image_path,
                                            alt: _vm.productData.name
                                          }
                                        })
                                      ]
                                    )
                                  : _vm._e()
                              })
                            ],
                            2
                          )
                        : _vm._e()
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-sm-6 col-md-6 col-lg-6" }, [
                  _c("div", { staticClass: "product-info-main" }, [
                    _c("h1", { staticClass: "page-title" }, [
                      _vm._v(" " + _vm._s(_vm.productData.name))
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "product-reviews-summary" }, [
                      _c("div", { staticClass: "rating-summary" }, [
                        _c(
                          "div",
                          {
                            staticClass: "rating-result",
                            attrs: { title: _vm.productData.rating }
                          },
                          [
                            _c(
                              "span",
                              {
                                style: {
                                  width: _vm.productData.rating * 100 + "%"
                                }
                              },
                              [
                                _c("span", [
                                  _c("span", [
                                    _vm._v(_vm._s(_vm.productData.rating))
                                  ]),
                                  _vm._v("% of "),
                                  _c("span", [_vm._v("100")])
                                ])
                              ]
                            )
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "reviews-actions" }, [
                        _c(
                          "a",
                          { staticClass: "action view", attrs: { href: "" } },
                          [
                            _vm._v(
                              "Based on " +
                                _vm._s(
                                  _vm.productData.reviews &&
                                    _vm.productData.reviews.length > 0
                                    ? _vm.productData.reviews.length
                                    : 0
                                ) +
                                " ratings"
                            )
                          ]
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "product-info-price" }, [
                      _c("div", { staticClass: "price-box" }, [
                        _c("span", { staticClass: "price" }, [
                          _vm._v(_vm._s(_vm.cartData.price))
                        ]),
                        _vm._v(" "),
                        _vm.cartData.oldPrice > 0
                          ? _c("span", { staticClass: "old-price" }, [
                              _vm._v(_vm._s(_vm.cartData.oldPrice))
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.cartData.discount > 0
                          ? _c("span", { staticClass: "label-sale" }, [
                              _vm._v(_vm._s(_vm.cartData.discount) + " %")
                            ])
                          : _vm._e()
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "product-code" }, [
                      _vm._v(
                        "\n                                    Item Code: " +
                          _vm._s(_vm.productData.sku) +
                          "\n                                "
                      )
                    ]),
                    _vm._v(" "),
                    _vm._m(1),
                    _vm._v(" "),
                    _vm.productData.brand
                      ? _c("div", { staticClass: "product-condition" }, [
                          _vm._v(
                            "\n                                    Brand: " +
                              _vm._s(_vm.productData.brand.name) +
                              "\n                                "
                          )
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _c("div", { staticClass: "product-overview" }, [
                      _c("div", {
                        staticClass: "overview-content",
                        domProps: {
                          innerHTML: _vm._s(_vm.productData.highlight)
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "product-add-form" }, [
                      _c("p", [_vm._v("Available Options:")]),
                      _vm._v(" "),
                      _c("div", { staticClass: "product-options-wrapper" }, [
                        _vm.productData.product_type === 2 &&
                        _vm.variations.colors.length > 0
                          ? _c("div", { staticClass: "swatch-opt" }, [
                              _c(
                                "div",
                                { staticClass: "swatch-attribute color" },
                                [
                                  _c(
                                    "span",
                                    { staticClass: "swatch-attribute-label" },
                                    [_vm._v("Color:")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "swatch-attribute-options clearfix"
                                    },
                                    _vm._l(_vm.variations.colors, function(
                                      color
                                    ) {
                                      return color !== ""
                                        ? _c("div", {
                                            key: color.name,
                                            staticClass: "swatch-option color",
                                            class: {
                                              selected:
                                                color.id ===
                                                _vm.cartData.colorId
                                            },
                                            style: {
                                              backgroundColor: color.code
                                            },
                                            attrs: { title: color.name },
                                            on: {
                                              click: function($event) {
                                                $event.preventDefault()
                                                _vm.cartData.colorId = color.id
                                              }
                                            }
                                          })
                                        : _vm._e()
                                    }),
                                    0
                                  )
                                ]
                              )
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _c("div", { staticClass: "form-qty" }, [
                          _c("label", { staticClass: "label" }, [
                            _vm._v("Qty: ")
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "control" }, [
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.cartData.qty,
                                  expression: "cartData.qty"
                                }
                              ],
                              staticClass: "form-control input-qty",
                              attrs: {
                                type: "text",
                                value: "1",
                                id: "qty1",
                                name: "qty1",
                                maxlength: _vm.max_qty.length,
                                minlength: "1"
                              },
                              domProps: { value: _vm.cartData.qty },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.cartData,
                                    "qty",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c(
                              "button",
                              {
                                staticClass: "btn-number qtyminus",
                                attrs: {
                                  "data-type": "minus",
                                  "data-field": "qty1"
                                },
                                on: {
                                  click: function($event) {
                                    $event.preventDefault()
                                    return _vm.reducedQty()
                                  }
                                }
                              },
                              [_c("span", [_vm._v("-")])]
                            ),
                            _vm._v(" "),
                            _c(
                              "button",
                              {
                                staticClass: "btn-number qtyplus",
                                attrs: {
                                  "data-type": "plus",
                                  "data-field": "qty1"
                                },
                                on: {
                                  click: function($event) {
                                    $event.preventDefault()
                                    return _vm.increaseQty()
                                  }
                                }
                              },
                              [_c("span", [_vm._v("+")])]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _vm.productData.product_type === 2 &&
                        _vm.variations.sizes.length > 0
                          ? _c("div", { staticClass: "form-configurable" }, [
                              _c(
                                "label",
                                {
                                  staticClass: "label",
                                  attrs: { for: "forSize" }
                                },
                                [_vm._v("Size: ")]
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "control" }, [
                                _c(
                                  "select",
                                  {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.cartData.sizeId,
                                        expression: "cartData.sizeId"
                                      }
                                    ],
                                    staticClass:
                                      "form-control attribute-select",
                                    attrs: { id: "forSize" },
                                    on: {
                                      change: function($event) {
                                        var $$selectedVal = Array.prototype.filter
                                          .call($event.target.options, function(
                                            o
                                          ) {
                                            return o.selected
                                          })
                                          .map(function(o) {
                                            var val =
                                              "_value" in o ? o._value : o.value
                                            return val
                                          })
                                        _vm.$set(
                                          _vm.cartData,
                                          "sizeId",
                                          $event.target.multiple
                                            ? $$selectedVal
                                            : $$selectedVal[0]
                                        )
                                      }
                                    }
                                  },
                                  _vm._l(_vm.variations.sizes, function(size) {
                                    return size !== ""
                                      ? _c(
                                          "option",
                                          {
                                            key: size.name,
                                            domProps: { value: size.id }
                                          },
                                          [
                                            _vm._v(
                                              _vm._s(size.name) +
                                                "\n                                                    "
                                            )
                                          ]
                                        )
                                      : _vm._e()
                                  }),
                                  0
                                )
                              ])
                            ])
                          : _vm._e()
                      ]),
                      _vm._v(" "),
                      _c(
                        "div",
                        { staticClass: "product-options-bottom clearfix" },
                        [
                          _c("div", { staticClass: "actions" }, [
                            _vm.disableBtn
                              ? _c(
                                  "p",
                                  { staticClass: "alert alert-warning" },
                                  [_vm._v("This combination is not availabel")]
                                )
                              : _vm._e(),
                            _vm._v(" "),
                            _c(
                              "button",
                              {
                                staticClass: "action btn-cart",
                                attrs: {
                                  type: "button",
                                  title: "Add to Cart",
                                  disabled: _vm.disableBtn
                                },
                                on: {
                                  click: function($event) {
                                    $event.preventDefault()
                                    return _vm.addToCart()
                                  }
                                }
                              },
                              [_c("span", [_vm._v("Add to Cart")])]
                            ),
                            _vm._v(" "),
                            _vm._m(2)
                          ])
                        ]
                      )
                    ])
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "product-info-detailed " }, [
                _c(
                  "ul",
                  { staticClass: "nav nav-pills", attrs: { role: "tablist" } },
                  [
                    _vm._m(3),
                    _vm._v(" "),
                    _c("li", { attrs: { role: "presentation" } }, [
                      _vm.productData.details &&
                      (_vm.productData.details.model ||
                        _vm.productData.details.materials ||
                        _vm.productData.details.pieces ||
                        _vm.productData.details.color_shade ||
                        _vm.productData.details.extra_details ||
                        _vm.productData.details.warranty_period ||
                        _vm.productData.details.warranty_policy)
                        ? _c(
                            "a",
                            {
                              attrs: {
                                href: "#extra_info",
                                role: "tab",
                                "data-toggle": "tab"
                              }
                            },
                            [_vm._v("Extra information ")]
                          )
                        : _vm._e()
                    ]),
                    _vm._v(" "),
                    _vm._m(4)
                  ]
                ),
                _vm._v(" "),
                _c("div", { staticClass: "tab-content" }, [
                  _c(
                    "div",
                    {
                      staticClass: "tab-pane active",
                      attrs: { role: "tabpanel", id: "description" }
                    },
                    [
                      _c("div", { staticClass: "block-title" }, [
                        _vm._v("Product Details")
                      ]),
                      _vm._v(" "),
                      _c("div", {
                        staticClass: "block-content",
                        domProps: {
                          innerHTML: _vm._s(_vm.productData.description)
                        }
                      })
                    ]
                  ),
                  _vm._v(" "),
                  _vm.productData.details &&
                  (_vm.productData.details.model ||
                    _vm.productData.details.materials ||
                    _vm.productData.details.pieces ||
                    _vm.productData.details.color_shade ||
                    _vm.productData.details.extra_details ||
                    _vm.productData.details.warranty_period ||
                    _vm.productData.details.warranty_policy)
                    ? _c(
                        "div",
                        {
                          staticClass: "tab-pane",
                          attrs: { role: "tabpanel", id: "extra_info" }
                        },
                        [
                          _c("div", { staticClass: "block-title" }, [
                            _vm._v("information")
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "block-content" }, [
                            _c("div", { staticClass: "table-responsive" }, [
                              _c(
                                "table",
                                {
                                  staticClass:
                                    "table table-bordered table-compare"
                                },
                                [
                                  _c("tbody", [
                                    _vm.productData.details.materials
                                      ? _c("tr", [
                                          _c(
                                            "td",
                                            { staticClass: "compare-label" },
                                            [_vm._v("Materials:")]
                                          ),
                                          _vm._v(" "),
                                          _c("td", [
                                            _vm._v(
                                              _vm._s(
                                                _vm.productData.details
                                                  .materials
                                              )
                                            )
                                          ])
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.productData.details.model
                                      ? _c("tr", [
                                          _c(
                                            "td",
                                            { staticClass: "compare-label" },
                                            [_vm._v("Product Model:")]
                                          ),
                                          _vm._v(" "),
                                          _c("td", [
                                            _vm._v(
                                              _vm._s(
                                                _vm.productData.details.model
                                              )
                                            )
                                          ])
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.productData.details.pieces
                                      ? _c("tr", [
                                          _c(
                                            "td",
                                            { staticClass: "compare-label" },
                                            [_vm._v("Number Of Pieces:")]
                                          ),
                                          _vm._v(" "),
                                          _c("td", [
                                            _vm._v(
                                              _vm._s(
                                                _vm.productData.details.pieces
                                              )
                                            )
                                          ])
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.productData.details.color_shade
                                      ? _c("tr", [
                                          _c(
                                            "td",
                                            { staticClass: "compare-label" },
                                            [_vm._v("Color Shade:")]
                                          ),
                                          _vm._v(" "),
                                          _c("td", [
                                            _vm._v(
                                              _vm._s(
                                                _vm.productData.details
                                                  .color_shade
                                              )
                                            )
                                          ])
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.productData.details.extra_details
                                      ? _c("tr", [
                                          _c(
                                            "td",
                                            { staticClass: "compare-label" },
                                            [_vm._v("Extra Details:")]
                                          ),
                                          _vm._v(" "),
                                          _c("td", [
                                            _vm._v(
                                              _vm._s(
                                                _vm.productData.details
                                                  .extra_details
                                              )
                                            )
                                          ])
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.productData.details.warranty_period
                                      ? _c("tr", [
                                          _c(
                                            "td",
                                            { staticClass: "compare-label" },
                                            [_vm._v("Warranty Period:")]
                                          ),
                                          _vm._v(" "),
                                          _c("td", [
                                            _vm._v(
                                              _vm._s(
                                                _vm.productData.details
                                                  .warranty_period
                                              ) + " (days)"
                                            )
                                          ])
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.productData.details.warranty_policy
                                      ? _c("tr", [
                                          _c(
                                            "td",
                                            { staticClass: "compare-label" },
                                            [_vm._v("Warranty Policy:")]
                                          ),
                                          _vm._v(" "),
                                          _c("td", [
                                            _c("p", {
                                              domProps: {
                                                innerHTML: _vm._s(
                                                  _vm.productData.details
                                                    .warranty_policy
                                                )
                                              }
                                            })
                                          ])
                                        ])
                                      : _vm._e()
                                  ])
                                ]
                              )
                            ])
                          ])
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "tab-pane",
                      attrs: { role: "tabpanel", id: "reviews" }
                    },
                    [
                      _c("div", { staticClass: "block-title" }, [
                        _vm._v("reviews")
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "block-content" }, [
                        _c("div", { staticClass: "single-box" }, [
                          _c("div", { staticClass: "comment-list" }, [
                            _vm.productData.reviews &&
                            _vm.productData.reviews.length > 0
                              ? _c(
                                  "ul",
                                  _vm._l(_vm.productData.reviews, function(
                                    review
                                  ) {
                                    return _c("li", { key: review.date }, [
                                      _c("div", { staticClass: "avartar" }, [
                                        _c("img", {
                                          attrs: {
                                            src:
                                              "https://ui-avatars.com/api/?name=" +
                                              review.user.name +
                                              "&color=7F9CF5&background=EBF4FF",
                                            alt: "Avatar"
                                          }
                                        })
                                      ]),
                                      _vm._v(" "),
                                      _c(
                                        "div",
                                        { staticClass: "comment-body" },
                                        [
                                          _c(
                                            "div",
                                            { staticClass: "comment-meta" },
                                            [
                                              _c(
                                                "span",
                                                { staticClass: "author" },
                                                [
                                                  review.user
                                                    ? _c(
                                                        "a",
                                                        {
                                                          attrs: { href: "#" }
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                                    " +
                                                              _vm._s(
                                                                review.user.name
                                                              ) +
                                                              "\n                                                                "
                                                          )
                                                        ]
                                                      )
                                                    : _c(
                                                        "a",
                                                        {
                                                          attrs: { href: "#" }
                                                        },
                                                        [_vm._v("Unknown User")]
                                                      )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "span",
                                                { staticClass: "date" },
                                                [_vm._v(_vm._s(review.date))]
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c("div", {
                                            staticClass: "comment",
                                            domProps: {
                                              innerHTML: _vm._s(review.review)
                                            }
                                          })
                                        ]
                                      )
                                    ])
                                  }),
                                  0
                                )
                              : _vm._e()
                          ])
                        ])
                      ])
                    ]
                  )
                ])
              ])
            ])
          : _vm._e(),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: " col-md-3   col-sidebar" },
          [_c("details-page-sidebar")],
          1
        )
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("button", { staticClass: "btn-zoom open_qv" }, [
      _c("span", [_vm._v("zoom")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "product-info-stock" }, [
      _c("div", { staticClass: "stock available" }, [
        _c("span", { staticClass: "label" }, [_vm._v("Availability: ")]),
        _vm._v("In stock\n                                    ")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "product-addto-links" }, [
      _c(
        "a",
        {
          staticClass: "action btn-wishlist",
          attrs: { href: "#", title: "Wish List" }
        },
        [_c("span", [_vm._v("Wishlist")])]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "li",
      { staticClass: "active", attrs: { role: "presentation" } },
      [
        _c(
          "a",
          {
            attrs: { href: "#description", role: "tab", "data-toggle": "tab" }
          },
          [_vm._v("Product\n                                Details ")]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("li", { attrs: { role: "presentation" } }, [
      _c(
        "a",
        { attrs: { href: "#reviews", role: "tab", "data-toggle": "tab" } },
        [_vm._v("reviews")]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/views/frontend/components/details_page/DetailsPageSidebar.vue":
/*!*********************************************************************************!*\
  !*** ./resources/views/frontend/components/details_page/DetailsPageSidebar.vue ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DetailsPageSidebar_vue_vue_type_template_id_eec81c6e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DetailsPageSidebar.vue?vue&type=template&id=eec81c6e&scoped=true& */ "./resources/views/frontend/components/details_page/DetailsPageSidebar.vue?vue&type=template&id=eec81c6e&scoped=true&");
/* harmony import */ var _DetailsPageSidebar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DetailsPageSidebar.vue?vue&type=script&lang=js& */ "./resources/views/frontend/components/details_page/DetailsPageSidebar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _DetailsPageSidebar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DetailsPageSidebar_vue_vue_type_template_id_eec81c6e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DetailsPageSidebar_vue_vue_type_template_id_eec81c6e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "eec81c6e",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/views/frontend/components/details_page/DetailsPageSidebar.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/views/frontend/components/details_page/DetailsPageSidebar.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************!*\
  !*** ./resources/views/frontend/components/details_page/DetailsPageSidebar.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DetailsPageSidebar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./DetailsPageSidebar.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/details_page/DetailsPageSidebar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DetailsPageSidebar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/views/frontend/components/details_page/DetailsPageSidebar.vue?vue&type=template&id=eec81c6e&scoped=true&":
/*!****************************************************************************************************************************!*\
  !*** ./resources/views/frontend/components/details_page/DetailsPageSidebar.vue?vue&type=template&id=eec81c6e&scoped=true& ***!
  \****************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DetailsPageSidebar_vue_vue_type_template_id_eec81c6e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./DetailsPageSidebar.vue?vue&type=template&id=eec81c6e&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/details_page/DetailsPageSidebar.vue?vue&type=template&id=eec81c6e&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DetailsPageSidebar_vue_vue_type_template_id_eec81c6e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DetailsPageSidebar_vue_vue_type_template_id_eec81c6e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/views/frontend/components/section/HotDealCarouselSection.vue":
/*!********************************************************************************!*\
  !*** ./resources/views/frontend/components/section/HotDealCarouselSection.vue ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _HotDealCarouselSection_vue_vue_type_template_id_7ab047aa_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./HotDealCarouselSection.vue?vue&type=template&id=7ab047aa&scoped=true& */ "./resources/views/frontend/components/section/HotDealCarouselSection.vue?vue&type=template&id=7ab047aa&scoped=true&");
/* harmony import */ var _HotDealCarouselSection_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./HotDealCarouselSection.vue?vue&type=script&lang=js& */ "./resources/views/frontend/components/section/HotDealCarouselSection.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _HotDealCarouselSection_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _HotDealCarouselSection_vue_vue_type_template_id_7ab047aa_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _HotDealCarouselSection_vue_vue_type_template_id_7ab047aa_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "7ab047aa",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/views/frontend/components/section/HotDealCarouselSection.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/views/frontend/components/section/HotDealCarouselSection.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************!*\
  !*** ./resources/views/frontend/components/section/HotDealCarouselSection.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_HotDealCarouselSection_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./HotDealCarouselSection.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/section/HotDealCarouselSection.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_HotDealCarouselSection_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/views/frontend/components/section/HotDealCarouselSection.vue?vue&type=template&id=7ab047aa&scoped=true&":
/*!***************************************************************************************************************************!*\
  !*** ./resources/views/frontend/components/section/HotDealCarouselSection.vue?vue&type=template&id=7ab047aa&scoped=true& ***!
  \***************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HotDealCarouselSection_vue_vue_type_template_id_7ab047aa_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./HotDealCarouselSection.vue?vue&type=template&id=7ab047aa&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/section/HotDealCarouselSection.vue?vue&type=template&id=7ab047aa&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HotDealCarouselSection_vue_vue_type_template_id_7ab047aa_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HotDealCarouselSection_vue_vue_type_template_id_7ab047aa_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/views/frontend/pages/ProductDetailPage.vue":
/*!**************************************************************!*\
  !*** ./resources/views/frontend/pages/ProductDetailPage.vue ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProductDetailPage_vue_vue_type_template_id_305d2360_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductDetailPage.vue?vue&type=template&id=305d2360&scoped=true& */ "./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=template&id=305d2360&scoped=true&");
/* harmony import */ var _ProductDetailPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductDetailPage.vue?vue&type=script&lang=js& */ "./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _ProductDetailPage_vue_vue_type_style_index_0_id_305d2360_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ProductDetailPage.vue?vue&type=style&index=0&id=305d2360&scoped=true&lang=css& */ "./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=style&index=0&id=305d2360&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _ProductDetailPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProductDetailPage_vue_vue_type_template_id_305d2360_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProductDetailPage_vue_vue_type_template_id_305d2360_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "305d2360",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/views/frontend/pages/ProductDetailPage.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=script&lang=js&":
/*!***************************************************************************************!*\
  !*** ./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductDetailPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductDetailPage.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductDetailPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=style&index=0&id=305d2360&scoped=true&lang=css&":
/*!***********************************************************************************************************************!*\
  !*** ./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=style&index=0&id=305d2360&scoped=true&lang=css& ***!
  \***********************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductDetailPage_vue_vue_type_style_index_0_id_305d2360_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductDetailPage.vue?vue&type=style&index=0&id=305d2360&scoped=true&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=style&index=0&id=305d2360&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductDetailPage_vue_vue_type_style_index_0_id_305d2360_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductDetailPage_vue_vue_type_style_index_0_id_305d2360_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductDetailPage_vue_vue_type_style_index_0_id_305d2360_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductDetailPage_vue_vue_type_style_index_0_id_305d2360_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductDetailPage_vue_vue_type_style_index_0_id_305d2360_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=template&id=305d2360&scoped=true&":
/*!*********************************************************************************************************!*\
  !*** ./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=template&id=305d2360&scoped=true& ***!
  \*********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductDetailPage_vue_vue_type_template_id_305d2360_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductDetailPage.vue?vue&type=template&id=305d2360&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductDetailPage.vue?vue&type=template&id=305d2360&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductDetailPage_vue_vue_type_template_id_305d2360_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductDetailPage_vue_vue_type_template_id_305d2360_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);