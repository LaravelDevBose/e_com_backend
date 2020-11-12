(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[58],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/product/ShowProduct.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/product/ShowProduct.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "ShowProduct",
  data: function data() {
    return {
      slider: [],
      category: '',
      sec_category: '',
      trd_category: ''
    };
  },
  created: function created() {
    this.singleProduct(this.$attrs['productid']).then(function (response) {
      if (response.status === 'error') {
        Notify.error(response.message);
      }
    })["catch"](function (error) {// Notify.error(error.message);
    });
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['singleProduct'])),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['proData', 'proDetails', 'proVariations', 'proImages', 'validation'])),
  watch: {
    proData: {
      handler: function handler(newVal, oldVal) {
        var _this = this;

        this.proImages.forEach(function (image) {
          var img = '<img src="' + image.image.image_path + '" class="img-thumbnail">';

          _this.slider.push(img);
        });

        if (newVal.category !== null) {
          this.category = newVal.category;

          if (newVal.category.parent !== null) {
            this.sec_category = newVal.category.parent;

            if (newVal.category.parent.parent !== null) {
              this.trd_category = newVal.category.parent.parent;
            }
          }
        }
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/product/ShowProduct.vue?vue&type=template&id=5adc7a12&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/product/ShowProduct.vue?vue&type=template&id=5adc7a12&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "content" }, [
    _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-12" }, [
        _c("div", { staticClass: "panel panel-info" }, [
          _vm._m(0),
          _vm._v(" "),
          _c("div", { staticClass: "panel-body" }, [
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-md-6" },
                [
                  _c("carousel", {
                    attrs: { data: _vm.slider, indicators: "hover" }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-6" }, [
                _c(
                  "h3",
                  {
                    staticClass: "text-semibold",
                    staticStyle: { "margin-top": "0px" }
                  },
                  [
                    _c(
                      "a",
                      { staticClass: "text-default", attrs: { href: "#" } },
                      [_vm._v(_vm._s(_vm.proData.product_name))]
                    )
                  ]
                ),
                _vm._v(" "),
                _vm.proData.product_sku !== ""
                  ? _c(
                      "p",
                      {
                        staticClass: "text-bold text-teal",
                        staticStyle: { "margin-bottom": "5px" }
                      },
                      [
                        _vm._v(
                          "\n                                SKU:\n                                "
                        ),
                        _c(
                          "span",
                          { staticClass: "text text-bold text-teal " },
                          [_vm._v(" " + _vm._s(_vm.proData.product_sku))]
                        )
                      ]
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.category !== ""
                  ? _c(
                      "p",
                      {
                        staticClass: "text text-teal text-bold",
                        staticStyle: { "margin-bottom": "5px" }
                      },
                      [
                        _vm._v(
                          "\n                                Category:\n                                "
                        ),
                        _vm.trd_category !== ""
                          ? _c("span", [
                              _vm._v(" " + _vm._s(_vm.trd_category.name) + " "),
                              _c("i", { staticClass: "icon-arrow-right15" })
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.sec_category !== ""
                          ? _c("span", [
                              _vm._v(_vm._s(_vm.sec_category.name) + " "),
                              _c("i", { staticClass: "icon-arrow-right15" })
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _c("span", [_vm._v(_vm._s(_vm.category.name))])
                      ]
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.proData.brand
                  ? _c(
                      "p",
                      {
                        staticClass: "text-teal text-bold",
                        staticStyle: { "margin-bottom": "5px" }
                      },
                      [
                        _vm._v(
                          "\n                               Brand:\n                                "
                        ),
                        _c(
                          "span",
                          { staticClass: "text text-bold text-teal " },
                          [_vm._v(_vm._s(_vm.proData.brand.name))]
                        )
                      ]
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.proData.seller
                  ? _c(
                      "p",
                      {
                        staticClass: "text-teal text-bold",
                        staticStyle: { "margin-bottom": "5px" }
                      },
                      [
                        _vm._v(
                          "\n                                Seller:\n                                "
                        ),
                        _c(
                          "span",
                          { staticClass: "text text-bold text-teal " },
                          [_vm._v(_vm._s(_vm.proData.seller.name))]
                        )
                      ]
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.proData.product_type === 1
                  ? _c("div", [
                      _vm.proData.variation.seller_sku
                        ? _c("p", { staticStyle: { "margin-bottom": "5px" } }, [
                            _c(
                              "span",
                              { staticClass: "text text-bold text-teal " },
                              [
                                _vm._v(
                                  "Seller SKU: " +
                                    _vm._s(_vm.proData.variation.seller_sku)
                                )
                              ]
                            )
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.proData.variation.price
                        ? _c("p", { staticStyle: { "margin-bottom": "5px" } }, [
                            _c(
                              "span",
                              { staticClass: "text text-bold text-teal " },
                              [
                                _vm._v(
                                  "Price: " +
                                    _vm._s(_vm.proData.variation.price)
                                )
                              ]
                            )
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.proData.variation.quantity
                        ? _c("p", { staticStyle: { "margin-bottom": "5px" } }, [
                            _c(
                              "span",
                              { staticClass: "text text-bold text-teal " },
                              [
                                _vm._v(
                                  "Qty: " +
                                    _vm._s(_vm.proData.variation.quantity)
                                )
                              ]
                            )
                          ])
                        : _vm._e()
                    ])
                  : _vm._e(),
                _vm._v(" "),
                _c("div", { staticClass: "content-group" }, [
                  _c("span", { staticClass: "text text-bold text-primary " }, [
                    _vm._v(
                      "\n                                    Product Highlight:\n                               "
                    )
                  ]),
                  _vm._v(" "),
                  _c("p", {
                    domProps: { innerHTML: _vm._s(_vm.proData.highlight) }
                  })
                ])
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "panel panel-info" }, [
          _vm._m(1),
          _vm._v(" "),
          _c("div", { staticClass: "panel-body" }, [
            _c("div", {
              staticClass: "content-group",
              domProps: { innerHTML: _vm._s(_vm.proData.description) }
            })
          ])
        ]),
        _vm._v(" "),
        typeof _vm.proDetails !== "undefined" && _vm.proDetails !== ""
          ? _c("div", { staticClass: "panel" }, [
              _vm._m(2),
              _vm._v(" "),
              _c("div", { staticClass: "panel-body" }, [
                _c("div", { staticClass: "content-group" }, [
                  _c("p", { staticStyle: { "margin-bottom": ".5rem" } }, [
                    _c("span", { staticClass: "text-bold" }, [
                      _vm._v("Main Material: ")
                    ]),
                    _vm._v(" "),
                    _vm.proDetails.materials
                      ? _c("span", {
                          domProps: {
                            innerHTML: _vm._s(_vm.proDetails.materials)
                          }
                        })
                      : _c(
                          "span",
                          { staticClass: "text-size-small text-slate-400" },
                          [_vm._v("No Data")]
                        )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "content-group" }, [
                  _c("p", { staticStyle: { "margin-bottom": ".5rem" } }, [
                    _c("span", { staticClass: "text-bold" }, [
                      _vm._v("Product Model: ")
                    ]),
                    _vm._v(" "),
                    _vm.proDetails.model
                      ? _c("span", {
                          domProps: { innerHTML: _vm._s(_vm.proDetails.model) }
                        })
                      : _c(
                          "span",
                          { staticClass: "text-size-small text-slate-400" },
                          [_vm._v("No Data")]
                        )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "content-group" }, [
                  _c("p", { staticStyle: { "margin-bottom": ".5rem" } }, [
                    _c("span", { staticClass: "text-bold" }, [
                      _vm._v("No. Of Pieces : ")
                    ]),
                    _vm._v(" "),
                    _vm.proDetails.pieces
                      ? _c("span", {
                          domProps: { innerHTML: _vm._s(_vm.proDetails.pieces) }
                        })
                      : _c(
                          "span",
                          { staticClass: "text-size-small text-slate-400" },
                          [_vm._v("No Data")]
                        )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "content-group" }, [
                  _c("p", { staticStyle: { "margin-bottom": ".5rem" } }, [
                    _c("span", { staticClass: "text-bold" }, [
                      _vm._v("Color Shade : ")
                    ]),
                    _vm._v(" "),
                    _vm.proDetails.color_shade
                      ? _c("span", {
                          domProps: {
                            innerHTML: _vm._s(_vm.proDetails.color_shade)
                          }
                        })
                      : _c(
                          "span",
                          { staticClass: "text-size-small text-slate-400" },
                          [_vm._v("No Data")]
                        )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "content-group" }, [
                  _c("p", { staticStyle: { "margin-bottom": ".5rem" } }, [
                    _c("span", { staticClass: "text-bold" }, [
                      _vm._v("Extra Details : ")
                    ]),
                    _vm._v(" "),
                    _vm.proDetails.extra_details
                      ? _c("span", {
                          domProps: {
                            innerHTML: _vm._s(_vm.proDetails.extra_details)
                          }
                        })
                      : _c(
                          "span",
                          { staticClass: "text-size-small text-slate-400" },
                          [_vm._v("No Data")]
                        )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "content-group" }, [
                  _c("p", { staticStyle: { "margin-bottom": ".5rem" } }, [
                    _c("span", { staticClass: "text-bold" }, [
                      _vm._v("Warranty Policy: ")
                    ]),
                    _vm._v(" "),
                    _vm.proDetails.warranty_policy
                      ? _c("span", {
                          domProps: {
                            innerHTML: _vm._s(_vm.proDetails.warranty_policy)
                          }
                        })
                      : _c(
                          "span",
                          { staticClass: "text-size-small text-slate-400" },
                          [_vm._v("No Data")]
                        )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "content-group" }, [
                  _c("p", { staticStyle: { "margin-bottom": ".5rem" } }, [
                    _c("span", { staticClass: "text-bold" }, [
                      _vm._v("Warranty Period : ")
                    ]),
                    _vm._v(" "),
                    _vm.proDetails.warranty_period
                      ? _c("span", [
                          _vm._v(
                            _vm._s(_vm.proDetails.warranty_period) + " days"
                          )
                        ])
                      : _c(
                          "span",
                          { staticClass: "text-size-small text-slate-400" },
                          [_vm._v("0 Day")]
                        )
                  ])
                ])
              ])
            ])
          : _vm._e(),
        _vm._v(" "),
        _vm.proData.product_type === 2 &&
        _vm.proVariations.length !== 0 &&
        typeof _vm.proVariations !== "undefined"
          ? _c("div", { staticClass: "panel" }, [
              _vm._m(3),
              _vm._v(" "),
              _c("div", { staticClass: "panel-body" }, [
                _c(
                  "table",
                  {
                    staticClass:
                      "table table-sm table-responsive table-bordered"
                  },
                  [
                    _vm._m(4),
                    _vm._v(" "),
                    _c(
                      "tbody",
                      _vm._l(_vm.proVariations, function(variaction) {
                        return _c("tr", [
                          _c("td", [
                            _vm._v(_vm._s(variaction.color.color_name))
                          ]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(variaction.size.size_name))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(variaction.seller_sku))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(variaction.quantity))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(" " + _vm._s(variaction.price))])
                        ])
                      }),
                      0
                    )
                  ]
                )
              ])
            ])
          : _vm._e()
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading" }, [
      _c("h6", { staticClass: "panel-title" }, [_vm._v("Product Details")]),
      _vm._v(" "),
      _c("div", { staticClass: "heading-elements" }, [
        _c("ul", { staticClass: "icons-list" }, [
          _c("li", [_c("a", { attrs: { "data-action": "reload" } })])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading" }, [
      _c("h6", { staticClass: "panel-title" }, [
        _vm._v("Product Full Description")
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "heading-elements" }, [
        _c("ul", { staticClass: "icons-list" }, [
          _c("li", [_c("a", { attrs: { "data-action": "reload" } })])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading bg-teal-300" }, [
      _c("h6", { staticClass: "panel-title" }, [
        _vm._v("Product Extra Details")
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "heading-elements" }, [
        _c("ul", { staticClass: "icons-list" }, [
          _c("li", [_c("a", { attrs: { "data-action": "collapse" } })]),
          _vm._v(" "),
          _c("li", [_c("a", { attrs: { "data-action": "reload" } })]),
          _vm._v(" "),
          _c("li", [_c("a", { attrs: { "data-action": "close" } })])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading bg-teal" }, [
      _c("h6", { staticClass: "panel-title" }, [_vm._v("Product Variations")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("td", [_vm._v("Color")]),
        _vm._v(" "),
        _c("td", [_vm._v("Size")]),
        _vm._v(" "),
        _c("td", [_vm._v("SKU")]),
        _vm._v(" "),
        _c("td", [_vm._v("Quantity")]),
        _vm._v(" "),
        _c("td", [_vm._v("Price")])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/product/ShowProduct.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/product/ShowProduct.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ShowProduct_vue_vue_type_template_id_5adc7a12_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ShowProduct.vue?vue&type=template&id=5adc7a12&scoped=true& */ "./resources/js/components/product/ShowProduct.vue?vue&type=template&id=5adc7a12&scoped=true&");
/* harmony import */ var _ShowProduct_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ShowProduct.vue?vue&type=script&lang=js& */ "./resources/js/components/product/ShowProduct.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ShowProduct_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ShowProduct_vue_vue_type_template_id_5adc7a12_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ShowProduct_vue_vue_type_template_id_5adc7a12_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "5adc7a12",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/product/ShowProduct.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/product/ShowProduct.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/product/ShowProduct.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowProduct_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ShowProduct.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/product/ShowProduct.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowProduct_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/product/ShowProduct.vue?vue&type=template&id=5adc7a12&scoped=true&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/product/ShowProduct.vue?vue&type=template&id=5adc7a12&scoped=true& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowProduct_vue_vue_type_template_id_5adc7a12_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ShowProduct.vue?vue&type=template&id=5adc7a12&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/product/ShowProduct.vue?vue&type=template&id=5adc7a12&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowProduct_vue_vue_type_template_id_5adc7a12_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowProduct_vue_vue_type_template_id_5adc7a12_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);