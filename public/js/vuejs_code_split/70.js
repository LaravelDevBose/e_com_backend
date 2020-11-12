(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[70],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/product/CarouselProductListItem.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/product/CarouselProductListItem.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "CarouselProductListItem",
  props: {
    product: Object
  },
  data: function data() {
    return {
      oldPrice: 0,
      price: 0,
      rating: 0
    };
  },
  mounted: function mounted() {
    this.price = parseInt(this.product.variation.price).toFixed(2);

    if (this.product.discount) {
      this.oldPrice = this.price;
      var discount = this.oldPrice * this.product.discount.percent / 100;
      this.price = this.oldPrice - discount.toFixed(0);
      this.price = parseFloat(this.price).toFixed(2);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/section/OwlCarouselProductList.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/section/OwlCarouselProductList.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _product_CarouselProductListItem__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../product/CarouselProductListItem */ "./resources/views/frontend/components/product/CarouselProductListItem.vue");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_1__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "OwlCarouselProductList",
  components: {
    CarouselProductListItem: _product_CarouselProductListItem__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  props: {
    products: Array,
    title: {
      type: String,
      "default": 'Related Product'
    }
  },
  data: function data() {
    return {
      product_list: []
    };
  },
  mounted: function mounted() {},
  methods: {
    installOwlCarousel: function installOwlCarousel() {
      var owlProList = $('.owl-carousel-product-list');
      var config = owlProList.data();
      config.dotsData = false;
      config.smartSpeed = "800";
      config.animateOut = "fadeOutDown";
      config.animateIn = "fadeInDown";
      owlProList.owlCarousel(config);
    },
    createProductChuck: function createProductChuck() {
      Object.defineProperty(Array.prototype, 'chunk', {
        value: function value(chunkSize) {
          var R = [];

          for (var i = 0; i < this.length; i += chunkSize) {
            R.push(this.slice(i, i + chunkSize));
          }

          return R;
        }
      });
      this.product_list = this.products.chunk(5);
    }
  },
  computed: {
    checkProducts: function checkProducts() {
      return JSON.parse(JSON.stringify(this.products));
    }
  },
  watch: {
    checkProducts: {
      handler: function handler(newValue) {
        if (this.products && this.products.length > 0) {
          this.createProductChuck();
          vue__WEBPACK_IMPORTED_MODULE_1___default.a.nextTick(function () {
            this.installOwlCarousel();
          }.bind(this));
        }
      },
      deep: true
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/product/CarouselProductListItem.vue?vue&type=template&id=52e35bca&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/product/CarouselProductListItem.vue?vue&type=template&id=52e35bca&scoped=true& ***!
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
  return _c("div", { staticClass: "product-item-info" }, [
    _c(
      "div",
      { staticClass: "product-item-photo" },
      [
        _c(
          "router-link",
          {
            staticClass: "product-item-img",
            attrs: {
              to: { name: "Product", params: { slug: _vm.product.slug } }
            }
          },
          [
            _c("clazy-load", { attrs: { src: _vm.product.image.image_path } }, [
              _c("img", {
                attrs: {
                  title: _vm.product.name,
                  src: _vm.product.image.image_path
                }
              }),
              _vm._v(" "),
              _vm.product.discount
                ? _c(
                    "span",
                    { staticClass: "label-sale product-item-label-list" },
                    [_vm._v(_vm._s(_vm.product.discount.percent) + "%")]
                  )
                : _vm._e(),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "preloader",
                  attrs: { slot: "placeholder" },
                  slot: "placeholder"
                },
                [
                  _c("img", {
                    attrs: {
                      title: _vm.product.name,
                      src: _vm.$baseUrl + "/images/loader.gif"
                    }
                  })
                ]
              )
            ])
          ],
          1
        )
      ],
      1
    ),
    _vm._v(" "),
    _c("div", { staticClass: "product-item-detail" }, [
      _c(
        "strong",
        { staticClass: "product-item-name" },
        [
          _c(
            "router-link",
            {
              attrs: {
                to: { name: "Product", params: { slug: _vm.product.slug } }
              }
            },
            [
              _vm._v(
                "\n                " +
                  _vm._s(_vm.product.name) +
                  "\n            "
              )
            ]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("div", { staticClass: "product-item-price" }, [
        _c("span", { staticClass: "price" }, [_vm._v(_vm._s(_vm.price))]),
        _vm._v(" "),
        _vm.oldPrice > 0
          ? _c("span", { staticClass: "old-price" }, [
              _vm._v(_vm._s(_vm.oldPrice))
            ])
          : _vm._e()
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/section/OwlCarouselProductList.vue?vue&type=template&id=31559668&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/section/OwlCarouselProductList.vue?vue&type=template&id=31559668&scoped=true& ***!
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
  return _vm.products && _vm.products.length > 0
    ? _c("div", { staticClass: "block-new-product-opt12" }, [
        _c("div", { staticClass: "block-title" }, [
          _c("span", { staticClass: "title" }, [_vm._v(_vm._s(_vm.title))])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "block-content" }, [
          _c(
            "div",
            {
              staticClass: "owl-carousel owl-carousel-product-list",
              attrs: {
                "data-nav": "true",
                "data-dots": "false",
                "data-margin": "30",
                "data-responsive":
                  '{\n                "0":{"items":1},\n                "480":{"items":1},\n                "640":{"items":2},\n                "768":{"items":2},\n                "992":{"items":1},\n                "1200":{"items":1}\n            }'
              }
            },
            _vm._l(_vm.product_list, function(productsData, ind) {
              return _vm.product_list && _vm.product_list.length > 0
                ? _c(
                    "div",
                    { key: ind, staticClass: "item" },
                    _vm._l(productsData, function(productEl) {
                      return productsData && productsData.length > 0
                        ? _c(
                            "div",
                            {
                              key: productEl.slug,
                              staticClass: "product-item product-item-opt-12"
                            },
                            [
                              _c("carousel-product-list-item", {
                                attrs: { product: productEl }
                              })
                            ],
                            1
                          )
                        : _vm._e()
                    }),
                    0
                  )
                : _vm._e()
            }),
            0
          )
        ])
      ])
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/views/frontend/components/product/CarouselProductListItem.vue":
/*!*********************************************************************************!*\
  !*** ./resources/views/frontend/components/product/CarouselProductListItem.vue ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CarouselProductListItem_vue_vue_type_template_id_52e35bca_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CarouselProductListItem.vue?vue&type=template&id=52e35bca&scoped=true& */ "./resources/views/frontend/components/product/CarouselProductListItem.vue?vue&type=template&id=52e35bca&scoped=true&");
/* harmony import */ var _CarouselProductListItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CarouselProductListItem.vue?vue&type=script&lang=js& */ "./resources/views/frontend/components/product/CarouselProductListItem.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CarouselProductListItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CarouselProductListItem_vue_vue_type_template_id_52e35bca_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CarouselProductListItem_vue_vue_type_template_id_52e35bca_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "52e35bca",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/views/frontend/components/product/CarouselProductListItem.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/views/frontend/components/product/CarouselProductListItem.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************!*\
  !*** ./resources/views/frontend/components/product/CarouselProductListItem.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CarouselProductListItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./CarouselProductListItem.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/product/CarouselProductListItem.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CarouselProductListItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/views/frontend/components/product/CarouselProductListItem.vue?vue&type=template&id=52e35bca&scoped=true&":
/*!****************************************************************************************************************************!*\
  !*** ./resources/views/frontend/components/product/CarouselProductListItem.vue?vue&type=template&id=52e35bca&scoped=true& ***!
  \****************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CarouselProductListItem_vue_vue_type_template_id_52e35bca_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./CarouselProductListItem.vue?vue&type=template&id=52e35bca&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/product/CarouselProductListItem.vue?vue&type=template&id=52e35bca&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CarouselProductListItem_vue_vue_type_template_id_52e35bca_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CarouselProductListItem_vue_vue_type_template_id_52e35bca_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/views/frontend/components/section/OwlCarouselProductList.vue":
/*!********************************************************************************!*\
  !*** ./resources/views/frontend/components/section/OwlCarouselProductList.vue ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _OwlCarouselProductList_vue_vue_type_template_id_31559668_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./OwlCarouselProductList.vue?vue&type=template&id=31559668&scoped=true& */ "./resources/views/frontend/components/section/OwlCarouselProductList.vue?vue&type=template&id=31559668&scoped=true&");
/* harmony import */ var _OwlCarouselProductList_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./OwlCarouselProductList.vue?vue&type=script&lang=js& */ "./resources/views/frontend/components/section/OwlCarouselProductList.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _OwlCarouselProductList_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _OwlCarouselProductList_vue_vue_type_template_id_31559668_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _OwlCarouselProductList_vue_vue_type_template_id_31559668_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "31559668",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/views/frontend/components/section/OwlCarouselProductList.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/views/frontend/components/section/OwlCarouselProductList.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************!*\
  !*** ./resources/views/frontend/components/section/OwlCarouselProductList.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OwlCarouselProductList_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./OwlCarouselProductList.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/section/OwlCarouselProductList.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OwlCarouselProductList_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/views/frontend/components/section/OwlCarouselProductList.vue?vue&type=template&id=31559668&scoped=true&":
/*!***************************************************************************************************************************!*\
  !*** ./resources/views/frontend/components/section/OwlCarouselProductList.vue?vue&type=template&id=31559668&scoped=true& ***!
  \***************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OwlCarouselProductList_vue_vue_type_template_id_31559668_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./OwlCarouselProductList.vue?vue&type=template&id=31559668&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/section/OwlCarouselProductList.vue?vue&type=template&id=31559668&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OwlCarouselProductList_vue_vue_type_template_id_31559668_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OwlCarouselProductList_vue_vue_type_template_id_31559668_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);