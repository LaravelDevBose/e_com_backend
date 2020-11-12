(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[30],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/cms/pages/ShowGeneralPages.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/cms/pages/ShowGeneralPages.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['id'],
  name: "ShowGeneralPages",
  data: function data() {
    return {
      noImage: BASE_URL + '/assets/images/cover.jpg'
    };
  },
  created: function created() {
    var pageId = this.id;
    console.log(pageId);
    this.singleGeneralPageData(pageId);
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['singleGeneralPageData']), {
    goToEditPage: function goToEditPage(pageId) {
      window.location = '/admin/cms/pages/' + pageId + '/edit';
    },
    goBack: function goBack() {
      window.location = '/admin/cms/pages';
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['pageData']))
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/cms/pages/ShowGeneralPages.vue?vue&type=template&id=52786116&scoped=true&":
/*!*****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/cms/pages/ShowGeneralPages.vue?vue&type=template&id=52786116&scoped=true& ***!
  \*****************************************************************************************************************************************************************************************************************************************/
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
    _c("div", { staticClass: "container-detached" }, [
      _c("div", { staticClass: "content-detached" }, [
        _c("div", { staticClass: "panel" }, [
          _c(
            "div",
            {
              staticClass: "panel-heading bg-teal-400",
              staticStyle: { "line-height": "3.87rem" }
            },
            [
              _c(
                "h5",
                {
                  staticClass: "panel-title",
                  staticStyle: { display: "inline-block" }
                },
                [_vm._v(_vm._s(_vm.pageData.title) + " Details ")]
              ),
              _vm._v(" "),
              _c(
                "a",
                {
                  staticClass: "btn btn-sm btn-warning text-small",
                  staticStyle: { float: "right", "margin-top": "0px" },
                  attrs: { href: "" },
                  on: {
                    click: function($event) {
                      $event.preventDefault()
                      return _vm.goBack()
                    }
                  }
                },
                [_c("i", { staticClass: "icon-undo2" }), _vm._v(" Back")]
              )
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "panel-body" }, [
            _c("div", { staticClass: "content-group-lg row" }, [
              _c("h3", { staticClass: "text-semibold mb-5" }, [
                _c("a", { staticClass: "text-default", attrs: { href: "#" } }, [
                  _vm._v(_vm._s(_vm.pageData.title))
                ])
              ]),
              _vm._v(" "),
              _c(
                "ul",
                {
                  staticClass:
                    "list-inline list-inline-separate text-semibold content-group"
                },
                [
                  _vm._m(0),
                  _vm._v(" "),
                  _c("li", [
                    _vm._v("Created: "),
                    _c("span", { staticClass: "text-bold text-teal" }, [
                      _vm._v(" " + _vm._s(_vm.pageData.created_at))
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _vm._v("Menu Position: "),
                    _c("span", { staticClass: "text-bold text-teal" }, [
                      _vm._v(_vm._s(_vm.pageData.position))
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _vm._v("Status:\n                                "),
                    _vm.pageData.status == 1
                      ? _c(
                          "span",
                          { staticClass: "text-bold badge badge-success" },
                          [_vm._v("Active")]
                        )
                      : _vm.pageData.status == 2
                      ? _c(
                          "span",
                          { staticClass: "text-bold badge badge-danger" },
                          [_vm._v("Inactive")]
                        )
                      : _c(
                          "span",
                          { staticClass: "text-bold badge badge-info" },
                          [_vm._v("Undefined")]
                        )
                  ]),
                  _vm._v(" "),
                  _c("li", { staticStyle: { float: "right" } }, [
                    _c(
                      "a",
                      {
                        staticClass: "btn btn-sm bg-info-600",
                        attrs: { href: "" },
                        on: {
                          click: function($event) {
                            $event.preventDefault()
                            return _vm.goToEditPage(_vm.pageData.id)
                          }
                        }
                      },
                      [
                        _c("i", { staticClass: "icon-pencil7" }),
                        _vm._v(" Edit")
                      ]
                    )
                  ])
                ]
              ),
              _vm._v(" "),
              _c("hr"),
              _vm._v(" "),
              _c("label", { staticClass: "text text-bold" }, [
                _vm._v("Body Content: ")
              ]),
              _vm._v(" "),
              _c("br"),
              _vm._v(" "),
              _c("div", {
                staticClass: "content-group",
                domProps: { innerHTML: _vm._s(_vm.pageData.content) }
              }),
              _vm._v(" "),
              _c("div", {
                staticClass: "content-group",
                domProps: { innerHTML: _vm._s(_vm.pageData.extra_content) }
              })
            ])
          ])
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("li", [
      _vm._v("By "),
      _c("span", { staticClass: "text-bold text-teal" }, [_vm._v("Admin")])
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

/***/ "./resources/js/components/cms/pages/ShowGeneralPages.vue":
/*!****************************************************************!*\
  !*** ./resources/js/components/cms/pages/ShowGeneralPages.vue ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ShowGeneralPages_vue_vue_type_template_id_52786116_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ShowGeneralPages.vue?vue&type=template&id=52786116&scoped=true& */ "./resources/js/components/cms/pages/ShowGeneralPages.vue?vue&type=template&id=52786116&scoped=true&");
/* harmony import */ var _ShowGeneralPages_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ShowGeneralPages.vue?vue&type=script&lang=js& */ "./resources/js/components/cms/pages/ShowGeneralPages.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ShowGeneralPages_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ShowGeneralPages_vue_vue_type_template_id_52786116_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ShowGeneralPages_vue_vue_type_template_id_52786116_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "52786116",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/cms/pages/ShowGeneralPages.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/cms/pages/ShowGeneralPages.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/cms/pages/ShowGeneralPages.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowGeneralPages_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ShowGeneralPages.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/cms/pages/ShowGeneralPages.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowGeneralPages_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/cms/pages/ShowGeneralPages.vue?vue&type=template&id=52786116&scoped=true&":
/*!***********************************************************************************************************!*\
  !*** ./resources/js/components/cms/pages/ShowGeneralPages.vue?vue&type=template&id=52786116&scoped=true& ***!
  \***********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowGeneralPages_vue_vue_type_template_id_52786116_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ShowGeneralPages.vue?vue&type=template&id=52786116&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/cms/pages/ShowGeneralPages.vue?vue&type=template&id=52786116&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowGeneralPages_vue_vue_type_template_id_52786116_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowGeneralPages_vue_vue_type_template_id_52786116_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);