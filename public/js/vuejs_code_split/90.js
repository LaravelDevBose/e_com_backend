(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[90],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/passwords/PasswordResetPage.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/passwords/PasswordResetPage.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "PasswordResetPage",
  data: function data() {
    return {
      reqData: {
        token: '',
        email: '',
        password: '',
        password_confirmation: ''
      },
      btnDisable: false
    };
  },
  beforeRouteEnter: function beforeRouteEnter(to, form, next) {
    var token = '';
    var email = '';

    if (to.params.hasOwnProperty('token')) {
      token = to.params.token;
    }

    if (to.query.hasOwnProperty('email')) {
      email = to.query.email;
    }

    next(function (vm) {
      if (token) {
        vm.reqData.token = token;
        vm.reqData.email = email;
      } else {
        vm.$router.push('/page_not_found');
      }
    });
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['resetPasswordSubmit']), {
    submit: function submit() {
      var _this = this;

      this.btnDisable = true;
      this.resetPasswordSubmit(this.reqData).then(function (response) {
        _this.btnDisable = false;

        if (typeof response.status !== "undefined" && response.status === 200) {
          _this.$router.push({
            name: 'auth'
          });
        }
      });
    }
  }),
  watch: {
    reqData: {
      handler: function handler(newVal, oldVal) {
        if (newVal !== oldVal) {
          this.btnDisable = false;
        }
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/passwords/PasswordResetPage.vue?vue&type=template&id=459c0046&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/passwords/PasswordResetPage.vue?vue&type=template&id=459c0046&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************************************************/
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
      _vm._m(0),
      _vm._v(" "),
      _c("div", { staticClass: "page-content checkout-page" }, [
        _c("div", { staticClass: "box-border" }, [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-sm-6" }, [
              _c(
                "form",
                {
                  attrs: { action: "" },
                  on: {
                    submit: function($event) {
                      $event.preventDefault()
                      return _vm.submit()
                    }
                  }
                },
                [
                  _c("h4", [_vm._v("Reset Password")]),
                  _vm._v(" "),
                  _c("p", [
                    _vm._v("Enter your email address and your new password:")
                  ]),
                  _vm._v(" "),
                  _vm._m(1),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.reqData.email,
                        expression: "reqData.email"
                      }
                    ],
                    staticClass: "form-control input",
                    attrs: { type: "text", required: "" },
                    domProps: { value: _vm.reqData.email },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.reqData, "email", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm._m(2),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.reqData.password,
                        expression: "reqData.password"
                      }
                    ],
                    staticClass: "form-control input",
                    attrs: { type: "password", required: "" },
                    domProps: { value: _vm.reqData.password },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.reqData, "password", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm._m(3),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.reqData.password_confirmation,
                        expression: "reqData.password_confirmation"
                      }
                    ],
                    staticClass: "form-control input",
                    attrs: { type: "password", required: "" },
                    domProps: { value: _vm.reqData.password_confirmation },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(
                          _vm.reqData,
                          "password_confirmation",
                          $event.target.value
                        )
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c("br"),
                  _vm._v(" "),
                  _c(
                    "p",
                    [
                      _c(
                        "router-link",
                        { attrs: { to: { name: "password_reset_email" } } },
                        [_vm._v("Send forgot password mail?")]
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass: "submit",
                      attrs: { disabled: _vm.btnDisable }
                    },
                    [_vm._v("Reset Password")]
                  )
                ]
              )
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
    return _c("h2", { staticClass: "page-heading" }, [
      _c("span", { staticClass: "page-heading-title2" }, [
        _vm._v(" Reset Password")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Email address"),
      _c("span", { staticClass: "text text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("New Password"),
      _c("span", { staticClass: "text text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Confirm Password"),
      _c("span", { staticClass: "text text-danger" }, [_vm._v("*")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/views/frontend/pages/passwords/PasswordResetPage.vue":
/*!************************************************************************!*\
  !*** ./resources/views/frontend/pages/passwords/PasswordResetPage.vue ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PasswordResetPage_vue_vue_type_template_id_459c0046_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PasswordResetPage.vue?vue&type=template&id=459c0046&scoped=true& */ "./resources/views/frontend/pages/passwords/PasswordResetPage.vue?vue&type=template&id=459c0046&scoped=true&");
/* harmony import */ var _PasswordResetPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PasswordResetPage.vue?vue&type=script&lang=js& */ "./resources/views/frontend/pages/passwords/PasswordResetPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PasswordResetPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PasswordResetPage_vue_vue_type_template_id_459c0046_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PasswordResetPage_vue_vue_type_template_id_459c0046_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "459c0046",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/views/frontend/pages/passwords/PasswordResetPage.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/views/frontend/pages/passwords/PasswordResetPage.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************!*\
  !*** ./resources/views/frontend/pages/passwords/PasswordResetPage.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordResetPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./PasswordResetPage.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/passwords/PasswordResetPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordResetPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/views/frontend/pages/passwords/PasswordResetPage.vue?vue&type=template&id=459c0046&scoped=true&":
/*!*******************************************************************************************************************!*\
  !*** ./resources/views/frontend/pages/passwords/PasswordResetPage.vue?vue&type=template&id=459c0046&scoped=true& ***!
  \*******************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordResetPage_vue_vue_type_template_id_459c0046_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./PasswordResetPage.vue?vue&type=template&id=459c0046&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/passwords/PasswordResetPage.vue?vue&type=template&id=459c0046&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordResetPage_vue_vue_type_template_id_459c0046_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordResetPage_vue_vue_type_template_id_459c0046_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);