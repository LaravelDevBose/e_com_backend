(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[88],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/buyer/ReviewPage.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/buyer/ReviewPage.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
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

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "ReviewPage",
  mounted: function mounted() {
    this.getBuyerReviews();
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['getBuyerReviews'])),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['reviewList']))
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/buyer/ReviewPage.vue?vue&type=template&id=c4900b3c&scoped=true&":
/*!**************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/buyer/ReviewPage.vue?vue&type=template&id=c4900b3c&scoped=true& ***!
  \**************************************************************************************************************************************************************************************************************************************/
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
  return _c("div", [
    _c("h3", [_vm._v("Review List")]),
    _vm._v(" "),
    _c("div", { staticClass: "table-responsive wow bounceInUp animated" }, [
      _c("table", { staticClass: "table table-bordered  cart_summary" }, [
        _vm._m(0),
        _vm._v(" "),
        _c(
          "tbody",
          _vm._l(_vm.reviewList, function(review) {
            return _vm.reviewList && _vm.reviewList.length > 0
              ? _c("tr", { key: review.id }, [
                  _c(
                    "td",
                    { staticClass: "cart_product text-center" },
                    [
                      _c(
                        "router-link",
                        {
                          attrs: {
                            to: {
                              name: "Product",
                              params: { slug: review.product.slug }
                            }
                          }
                        },
                        [
                          _c(
                            "clazy-load",
                            { attrs: { src: review.product.image.image_path } },
                            [
                              _c("img", {
                                staticStyle: { width: "40px", height: "40px" },
                                attrs: {
                                  title: review.product.name,
                                  src: review.product.image.image_path
                                }
                              }),
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
                                    staticStyle: {
                                      width: "100%",
                                      height: "auto"
                                    },
                                    attrs: {
                                      title: review.product.name,
                                      src: _vm.$baseUrl + "/images/loader.gif"
                                    }
                                  })
                                ]
                              )
                            ]
                          )
                        ],
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c("td", { staticClass: "cart_description" }, [
                    _c(
                      "p",
                      { staticClass: "product-name" },
                      [
                        _c(
                          "router-link",
                          {
                            attrs: {
                              to: {
                                name: "Product",
                                params: { slug: review.product.slug }
                              }
                            }
                          },
                          [
                            _vm._v(
                              "\n                            " +
                                _vm._s(review.product.name) +
                                "\n                        "
                            )
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("small", { staticClass: "cart_ref" }, [
                      _vm._v("SKU: " + _vm._s(review.product.sku))
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "td",
                    { staticClass: "text-center" },
                    [
                      _c("star-rating", {
                        attrs: {
                          "star-size": 25,
                          rating: Number(review.rating),
                          "read-only": true
                        }
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c("td", [_vm._v(_vm._s(review.review))]),
                  _vm._v(" "),
                  _c("td", [
                    _vm._v(
                      "\n                    " +
                        _vm._s(review.date) +
                        "\n                "
                    )
                  ])
                ])
              : _vm._e()
          }),
          0
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
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("Image")]),
        _vm._v(" "),
        _c("th", [_vm._v("Product Info")]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_vm._v("Rating")]),
        _vm._v(" "),
        _c("th", [_vm._v("Review")]),
        _vm._v(" "),
        _c("th", [_vm._v("Date")])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/views/frontend/pages/buyer/ReviewPage.vue":
/*!*************************************************************!*\
  !*** ./resources/views/frontend/pages/buyer/ReviewPage.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ReviewPage_vue_vue_type_template_id_c4900b3c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ReviewPage.vue?vue&type=template&id=c4900b3c&scoped=true& */ "./resources/views/frontend/pages/buyer/ReviewPage.vue?vue&type=template&id=c4900b3c&scoped=true&");
/* harmony import */ var _ReviewPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ReviewPage.vue?vue&type=script&lang=js& */ "./resources/views/frontend/pages/buyer/ReviewPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ReviewPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ReviewPage_vue_vue_type_template_id_c4900b3c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ReviewPage_vue_vue_type_template_id_c4900b3c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "c4900b3c",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/views/frontend/pages/buyer/ReviewPage.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/views/frontend/pages/buyer/ReviewPage.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/views/frontend/pages/buyer/ReviewPage.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ReviewPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ReviewPage.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/buyer/ReviewPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ReviewPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/views/frontend/pages/buyer/ReviewPage.vue?vue&type=template&id=c4900b3c&scoped=true&":
/*!********************************************************************************************************!*\
  !*** ./resources/views/frontend/pages/buyer/ReviewPage.vue?vue&type=template&id=c4900b3c&scoped=true& ***!
  \********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ReviewPage_vue_vue_type_template_id_c4900b3c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ReviewPage.vue?vue&type=template&id=c4900b3c&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/buyer/ReviewPage.vue?vue&type=template&id=c4900b3c&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ReviewPage_vue_vue_type_template_id_c4900b3c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ReviewPage_vue_vue_type_template_id_c4900b3c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);