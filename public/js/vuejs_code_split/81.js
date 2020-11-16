(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[81],{

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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/SupportPage.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/SupportPage.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var vue2_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue2-editor */ "./node_modules/vue2-editor/dist/vue2-editor.esm.js");
/* harmony import */ var _components_section_HotDealCarouselSection__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/section/HotDealCarouselSection */ "./resources/views/frontend/components/section/HotDealCarouselSection.vue");
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



/* harmony default export */ __webpack_exports__["default"] = ({
  name: "SupportPage",
  components: {
    HotDealCarouselSection: _components_section_HotDealCarouselSection__WEBPACK_IMPORTED_MODULE_2__["default"],
    VueEditor: vue2_editor__WEBPACK_IMPORTED_MODULE_1__["VueEditor"]
  },
  data: function data() {
    return {
      customToolbar: [[]]
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
      vm.getPageDetails(slug).then(function (response) {
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

    this.getPageDetails(slug).then(function (response) {
      if (response.status !== 200) {
        _this.$router.push('/page_not_found');
      }
    });
    next();
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['getPageDetails'])),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['pages', 'pageInfo']))
});

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/SupportPage.vue?vue&type=template&id=7d1ab0cf&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/SupportPage.vue?vue&type=template&id=7d1ab0cf&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************************************/
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
        _c("div", { staticClass: "col-md-9 col-md-push-3   col-main" }, [
          _c("h2", { staticClass: "page-heading" }, [
            _c("span", { staticClass: "page-heading-title2" }, [
              _vm._v(_vm._s(_vm.pageInfo.title))
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "content-text clearfix" },
            [
              _c("vue-editor", {
                attrs: {
                  id: "body_content",
                  value: _vm.pageInfo.content,
                  disabled: true,
                  "editor-toolbar": _vm.customToolbar
                }
              })
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "col-md-3 col-md-pull-9   col-sidebar" },
          [
            _c(
              "div",
              { staticClass: "block-sidebar block-sidebar-categorie" },
              [
                _vm._m(0),
                _vm._v(" "),
                _c("div", { staticClass: "block-content" }, [
                  _vm.pages && _vm.pages.length > 0
                    ? _c(
                        "ul",
                        { staticClass: "items" },
                        _vm._l(_vm.pages, function(page) {
                          return _c(
                            "li",
                            { key: page.slug },
                            [
                              _c(
                                "router-link",
                                {
                                  attrs: {
                                    to: {
                                      name: "page",
                                      params: { slug: page.slug }
                                    }
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(page.menuTitle) +
                                      "\n                                "
                                  )
                                ]
                              )
                            ],
                            1
                          )
                        }),
                        0
                      )
                    : _vm._e()
                ])
              ]
            ),
            _vm._v(" "),
            _c("hot-deal-carousel-section")
          ],
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
    return _c("div", { staticClass: "block-title" }, [
      _c("strong", [_vm._v("Useful Links")])
    ])
  }
]
render._withStripped = true



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

/***/ "./resources/views/frontend/pages/SupportPage.vue":
/*!********************************************************!*\
  !*** ./resources/views/frontend/pages/SupportPage.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SupportPage_vue_vue_type_template_id_7d1ab0cf_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SupportPage.vue?vue&type=template&id=7d1ab0cf&scoped=true& */ "./resources/views/frontend/pages/SupportPage.vue?vue&type=template&id=7d1ab0cf&scoped=true&");
/* harmony import */ var _SupportPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SupportPage.vue?vue&type=script&lang=js& */ "./resources/views/frontend/pages/SupportPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _SupportPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _SupportPage_vue_vue_type_template_id_7d1ab0cf_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _SupportPage_vue_vue_type_template_id_7d1ab0cf_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "7d1ab0cf",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/views/frontend/pages/SupportPage.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/views/frontend/pages/SupportPage.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/views/frontend/pages/SupportPage.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SupportPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./SupportPage.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/SupportPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SupportPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/views/frontend/pages/SupportPage.vue?vue&type=template&id=7d1ab0cf&scoped=true&":
/*!***************************************************************************************************!*\
  !*** ./resources/views/frontend/pages/SupportPage.vue?vue&type=template&id=7d1ab0cf&scoped=true& ***!
  \***************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SupportPage_vue_vue_type_template_id_7d1ab0cf_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./SupportPage.vue?vue&type=template&id=7d1ab0cf&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/SupportPage.vue?vue&type=template&id=7d1ab0cf&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SupportPage_vue_vue_type_template_id_7d1ab0cf_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SupportPage_vue_vue_type_template_id_7d1ab0cf_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);