(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[20],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/color/Color.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/color/Color.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var _helper_ImportData__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../helper/ImportData */ "./resources/js/components/helper/ImportData.vue");
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


/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Color",
  components: {
    ImportData: _helper_ImportData__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      form: {
        color_id: '',
        color_name: '',
        color_code: '#ffffff',
        color_status: false
      },
      btnDisabled: false,
      format_image: 'https://media.moddb.com/images/engines/1/1/984/img-placeholder.2.jpg',
      action_url: '/admin/import/color',
      format_file: 'http://e_com.pc/excel_demo/color.xlsx',
      is_edit: 0
    };
  },
  created: function created() {
    this.getColors();
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['getColors', 'storeColor', 'deleteColor', 'updateColor']), {
    colorManipulate: function colorManipulate() {
      var _this = this;

      this.btnDisabled = true;

      if (this.is_edit) {
        this.updateColor(this.form).then(function (response) {
          if (response.code === 200) {
            Notify.success(response.message);

            _this.clearFormData();

            _this.btnDisabled = false;
            _this.is_edit = false;
          } else if (response.status === 'validation') {
            Notify.validation(response.message);
          } else {
            Notify.error(response.message);
          }
        });
      } else {
        this.storeColor(this.form).then(function (response) {
          if (response.code === 201) {
            Notify.success(response.message);

            _this.clearFormData();

            _this.btnDisabled = false;
          } else if (response.status === 'validation') {
            Notify.validation(response.message);
          } else {
            Notify.error(response.message);
          }
        });
      }
    },
    clearFormData: function clearFormData() {
      this.form.color_id = '';
      this.form.color_code = '#ffffff';
      this.form.color_name = '';
      this.form.color_status = false;
    },
    removeColor: function removeColor(colorId) {
      if (confirm('Are You Sure..?')) {
        this.deleteColor(colorId).then(function (response) {
          if (response.code === 200) {
            Notify.success(response.message);
          } else {
            Notify.error(response.message);
          }
        });
      } else {
        return false;
      }
    },
    editColor: function editColor(colorId) {
      var _this2 = this;

      this.colors.filter(function (color) {
        if (color.id === colorId) {
          _this2.form.color_id = color.id;
          _this2.form.color_name = color.name;
          _this2.form.color_code = color.code;
          _this2.form.color_status = color.status;
          _this2.is_edit = 1;
        }
      });
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['colors', 'import_status'])),
  watch: {
    form: {
      handler: function handler(newValue, oldValue) {
        if (oldValue === newValue) {
          this.btnDisabled = false;
        }
      },
      deep: true
    },
    'this.import_status': {
      handler: function handler(newValue, oldValue) {
        alert('yyyy');

        if (newValue === 1) {
          this.getColors();
        }
      },
      deep: true
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/color/Color.vue?vue&type=style&index=0&id=419b05c8&scoped=true&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/color/Color.vue?vue&type=style&index=0&id=419b05c8&scoped=true&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.color-view[data-v-419b05c8]{\n    width: 50px;\n    height: 30px;\n    border: 1px solid #ddd;\n    border-radius:5px;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/color/Color.vue?vue&type=style&index=0&id=419b05c8&scoped=true&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/color/Color.vue?vue&type=style&index=0&id=419b05c8&scoped=true&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./Color.vue?vue&type=style&index=0&id=419b05c8&scoped=true&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/color/Color.vue?vue&type=style&index=0&id=419b05c8&scoped=true&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/color/Color.vue?vue&type=template&id=419b05c8&scoped=true&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/color/Color.vue?vue&type=template&id=419b05c8&scoped=true& ***!
  \**************************************************************************************************************************************************************************************************************************/
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
    { staticClass: "content" },
    [
      _c("div", { staticClass: "panel" }, [
        _c("div", { staticClass: "panel-heading bg-teal" }, [
          _vm.is_edit === 0
            ? _c("h5", { staticClass: "panel-title" }, [_vm._v("Create Color")])
            : _c("h5", { staticClass: "panel-title" }, [_vm._v("Update Color")])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "panel-body" }, [
          _c(
            "form",
            {
              attrs: { action: "" },
              on: {
                submit: function($event) {
                  $event.preventDefault()
                  return _vm.colorManipulate($event)
                }
              }
            },
            [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-4" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Color Name:")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.color_name,
                          expression: "form.color_name"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        placeholder: "Color Name ",
                        required: ""
                      },
                      domProps: { value: _vm.form.color_name },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "color_name", $event.target.value)
                        }
                      }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-4" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Color Code:")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.color_code,
                          expression: "form.color_code"
                        }
                      ],
                      staticClass: "form-control colorpicker-palette",
                      attrs: { type: "color", value: "#27ADCA" },
                      domProps: { value: _vm.form.color_code },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "color_code", $event.target.value)
                        }
                      }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-2" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Color Status:")]),
                    _vm._v(" "),
                    _c(
                      "label",
                      {
                        staticClass: "checkbox-style",
                        attrs: { for: "paypal_payment" }
                      },
                      [
                        _vm.form.color_status
                          ? _c(
                              "span",
                              { staticClass: "text-bold text-success" },
                              [_vm._v("Active")]
                            )
                          : _c(
                              "span",
                              { staticClass: "text-bold text-warning" },
                              [_vm._v("Inactive")]
                            ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.color_status,
                              expression: "form.color_status"
                            }
                          ],
                          attrs: { type: "checkbox", id: "paypal_payment" },
                          domProps: {
                            checked: _vm.form.color_status,
                            checked: Array.isArray(_vm.form.color_status)
                              ? _vm._i(_vm.form.color_status, null) > -1
                              : _vm.form.color_status
                          },
                          on: {
                            change: function($event) {
                              var $$a = _vm.form.color_status,
                                $$el = $event.target,
                                $$c = $$el.checked ? true : false
                              if (Array.isArray($$a)) {
                                var $$v = null,
                                  $$i = _vm._i($$a, $$v)
                                if ($$el.checked) {
                                  $$i < 0 &&
                                    _vm.$set(
                                      _vm.form,
                                      "color_status",
                                      $$a.concat([$$v])
                                    )
                                } else {
                                  $$i > -1 &&
                                    _vm.$set(
                                      _vm.form,
                                      "color_status",
                                      $$a
                                        .slice(0, $$i)
                                        .concat($$a.slice($$i + 1))
                                    )
                                }
                              } else {
                                _vm.$set(_vm.form, "color_status", $$c)
                              }
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("span", { staticClass: "checkmark" })
                      ]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-2" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v(" ")]),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-primary btn-block",
                        attrs: { type: "submit", disabled: _vm.btnDisabled }
                      },
                      [
                        _vm._v("Save Color "),
                        _c("i", {
                          staticClass: "icon-arrow-right14 position-right"
                        })
                      ]
                    )
                  ])
                ])
              ])
            ]
          )
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "panel panel-flat" }, [
        _vm._m(0),
        _vm._v(" "),
        _c("div", { staticClass: "table-responsive" }, [
          _c(
            "table",
            { staticClass: "table table-bordered table-striped table-sm" },
            [
              _vm._m(1),
              _vm._v(" "),
              _c(
                "tbody",
                _vm._l(_vm.colors, function(color, index) {
                  return _vm.colors
                    ? _c("tr", { key: color.id }, [
                        _c("td", [_vm._v(_vm._s(index))]),
                        _vm._v(" "),
                        _c("td", { staticClass: "text-bold" }, [
                          _vm._v(_vm._s(color.name))
                        ]),
                        _vm._v(" "),
                        _c("td", [_vm._v(_vm._s(color.code))]),
                        _vm._v(" "),
                        _c("td", [
                          _c("div", {
                            staticClass: "color-view",
                            style: { backgroundColor: color.code }
                          })
                        ]),
                        _vm._v(" "),
                        _c("td", { staticClass: "text text-center" }, [
                          color.status === 1
                            ? _c(
                                "span",
                                { staticClass: "badge badge-success" },
                                [_vm._v("Active")]
                              )
                            : _c(
                                "span",
                                { staticClass: "badge badge-warning" },
                                [_vm._v("De-active")]
                              )
                        ]),
                        _vm._v(" "),
                        _c("td", { staticClass: "text text-center" }, [
                          _c("ul", { staticClass: "icons-list" }, [
                            _c("li", { staticClass: "text-primary-600" }, [
                              _c(
                                "a",
                                {
                                  attrs: { href: "#" },
                                  on: {
                                    click: function($event) {
                                      $event.preventDefault()
                                      return _vm.editColor(color.id)
                                    }
                                  }
                                },
                                [_c("i", { staticClass: "icon-pencil7" })]
                              )
                            ]),
                            _vm._v(" "),
                            _c("li", { staticClass: "text-danger-600" }, [
                              _c(
                                "a",
                                {
                                  attrs: { href: "#" },
                                  on: {
                                    click: function($event) {
                                      $event.preventDefault()
                                      return _vm.removeColor(color.id)
                                    }
                                  }
                                },
                                [_c("i", { staticClass: "icon-trash" })]
                              )
                            ])
                          ])
                        ])
                      ])
                    : _vm._e()
                }),
                0
              )
            ]
          )
        ])
      ]),
      _vm._v(" "),
      _c("import-data", {
        attrs: {
          example_image: _vm.format_image,
          upload_url: _vm.action_url,
          example_file: _vm.format_file
        }
      })
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading" }, [
      _c("h5", { staticClass: "panel-title" }, [_vm._v("Color List")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("#")]),
        _vm._v(" "),
        _c("th", [_vm._v("Color Name")]),
        _vm._v(" "),
        _c("th", [_vm._v("Color Code")]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_vm._v("Color View")]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_vm._v("Color Status")]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_vm._v("Action")])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/color/Color.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/color/Color.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Color_vue_vue_type_template_id_419b05c8_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Color.vue?vue&type=template&id=419b05c8&scoped=true& */ "./resources/js/components/color/Color.vue?vue&type=template&id=419b05c8&scoped=true&");
/* harmony import */ var _Color_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Color.vue?vue&type=script&lang=js& */ "./resources/js/components/color/Color.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Color_vue_vue_type_style_index_0_id_419b05c8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Color.vue?vue&type=style&index=0&id=419b05c8&scoped=true&lang=css& */ "./resources/js/components/color/Color.vue?vue&type=style&index=0&id=419b05c8&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Color_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Color_vue_vue_type_template_id_419b05c8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Color_vue_vue_type_template_id_419b05c8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "419b05c8",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/color/Color.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/color/Color.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/color/Color.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Color_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Color.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/color/Color.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Color_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/color/Color.vue?vue&type=style&index=0&id=419b05c8&scoped=true&lang=css&":
/*!**********************************************************************************************************!*\
  !*** ./resources/js/components/color/Color.vue?vue&type=style&index=0&id=419b05c8&scoped=true&lang=css& ***!
  \**********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Color_vue_vue_type_style_index_0_id_419b05c8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./Color.vue?vue&type=style&index=0&id=419b05c8&scoped=true&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/color/Color.vue?vue&type=style&index=0&id=419b05c8&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Color_vue_vue_type_style_index_0_id_419b05c8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Color_vue_vue_type_style_index_0_id_419b05c8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Color_vue_vue_type_style_index_0_id_419b05c8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Color_vue_vue_type_style_index_0_id_419b05c8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Color_vue_vue_type_style_index_0_id_419b05c8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/color/Color.vue?vue&type=template&id=419b05c8&scoped=true&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/color/Color.vue?vue&type=template&id=419b05c8&scoped=true& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Color_vue_vue_type_template_id_419b05c8_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Color.vue?vue&type=template&id=419b05c8&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/color/Color.vue?vue&type=template&id=419b05c8&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Color_vue_vue_type_template_id_419b05c8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Color_vue_vue_type_template_id_419b05c8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);