(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[64],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/tag/Tag.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/tag/Tag.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************/
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


/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Tag",
  components: {
    'import-data': _helper_ImportData__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      form: {
        tag_id: '',
        tag_name: '',
        tag_status: false
      },
      btnDisabled: false,
      format_image: 'https://media.moddb.com/images/engines/1/1/984/img-placeholder.2.jpg',
      action_url: '/admin/import/tags',
      format_file: 'http://e_com.pc/excel_demo/tags.xlsx',
      is_edit: 0
    };
  },
  created: function created() {
    this.getTags();
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['getTags', 'storeTag', 'deleteTag', 'updateTag']), {
    tagManipulate: function tagManipulate() {
      var _this = this;

      this.btnDisabled = true;

      if (this.is_edit === 1 || this.is_edit === true) {
        this.updateTag(this.form).then(function (response) {
          if (response.status === 'success' && response.code === 200) {
            Notify.success(response.message);

            _this.resetForm();

            _this.btnDisabled = false;
            _this.is_edit = 0;
          } else if (response.status === 'validation') {
            Notify.validation(response.message);
          } else {
            Notify.error(response.message);
          }
        });
      } else {
        this.storeTag(this.form).then(function (response) {
          if (response.status === 'success' && response.code === 201) {
            Notify.success(response.message);

            _this.resetForm();

            _this.btnDisabled = false;
          } else if (response.status === 'validation') {
            Notify.validation(response.message);
          } else {
            Notify.error(response.message);
          }
        });
      }
    },
    resetForm: function resetForm() {
      this.form.tag_id = '';
      this.form.tag_title = '';
      this.form.tag_status = false;
    },
    removeTag: function removeTag(tagID) {
      if (confirm('Are You Sure..?')) {
        this.deleteTag(tagID).then(function (response) {
          if (response.status === 'success' && response.code === 200) {
            Notify.success(response.message);
          } else if (response.status === 'validation') {
            Notify.validation(response.message);
          } else {
            Notify.error(response.message);
          }
        });
      }
    },
    editTag: function editTag(tagId) {
      var _this2 = this;

      this.tags.filter(function (tag) {
        if (tag.id === tagId) {
          _this2.form.tag_id = tag.id;
          _this2.form.tag_title = tag.title;
          _this2.form.tag_status = tag.status;
          _this2.is_edit = 1;
        }
      });
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['tags'])),
  watch: {
    form: {
      handler: function handler(newValue, oldValue) {
        if (oldValue !== newValue) {
          this.btnDisabled = false;
        }
      },
      deep: true
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/tag/Tag.vue?vue&type=template&id=3c4d3e8a&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/tag/Tag.vue?vue&type=template&id=3c4d3e8a&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-3" }, [
          _c("div", { staticClass: "panel panel-info" }, [
            _vm._m(0),
            _vm._v(" "),
            _c("div", { staticClass: "panel-body" }, [
              _c(
                "form",
                {
                  attrs: { action: "" },
                  on: {
                    submit: function($event) {
                      $event.preventDefault()
                      return _vm.tagManipulate($event)
                    }
                  }
                },
                [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-12" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", [_vm._v("Tag Title:")]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.tag_title,
                              expression: "form.tag_title"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            placeholder: "Tag Title ",
                            required: ""
                          },
                          domProps: { value: _vm.form.tag_title },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "tag_title",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", [_vm._v("Tag Status:")]),
                        _vm._v(" "),
                        _c(
                          "label",
                          {
                            staticClass: "checkbox-style",
                            attrs: { for: "paypal_payment" }
                          },
                          [
                            _vm.form.tag_status
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
                                  value: _vm.form.tag_status,
                                  expression: "form.tag_status"
                                }
                              ],
                              attrs: { type: "checkbox", id: "paypal_payment" },
                              domProps: {
                                checked: _vm.form.tag_status,
                                checked: Array.isArray(_vm.form.tag_status)
                                  ? _vm._i(_vm.form.tag_status, null) > -1
                                  : _vm.form.tag_status
                              },
                              on: {
                                change: function($event) {
                                  var $$a = _vm.form.tag_status,
                                    $$el = $event.target,
                                    $$c = $$el.checked ? true : false
                                  if (Array.isArray($$a)) {
                                    var $$v = null,
                                      $$i = _vm._i($$a, $$v)
                                    if ($$el.checked) {
                                      $$i < 0 &&
                                        _vm.$set(
                                          _vm.form,
                                          "tag_status",
                                          $$a.concat([$$v])
                                        )
                                    } else {
                                      $$i > -1 &&
                                        _vm.$set(
                                          _vm.form,
                                          "tag_status",
                                          $$a
                                            .slice(0, $$i)
                                            .concat($$a.slice($$i + 1))
                                        )
                                    }
                                  } else {
                                    _vm.$set(_vm.form, "tag_status", $$c)
                                  }
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c("span", { staticClass: "checkmark" })
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "text-right form-group" }, [
                        _c(
                          "button",
                          {
                            staticClass: "btn btn-success",
                            attrs: { type: "submit", disabled: _vm.btnDisabled }
                          },
                          [
                            _vm.is_edit
                              ? _c("span", [_vm._v("Update Tag")])
                              : _c("span", [_vm._v("Save Tag")]),
                            _vm._v(" "),
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
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-9" }, [
          _c("div", { staticClass: "panel panel-flat" }, [
            _vm._m(1),
            _vm._v(" "),
            _c("div", { staticClass: "table-responsive" }, [
              _c(
                "table",
                { staticClass: "table table-bordered table-striped table-sm" },
                [
                  _vm._m(2),
                  _vm._v(" "),
                  _c(
                    "tbody",
                    _vm._l(_vm.tags, function(tag, index) {
                      return _vm.tags
                        ? _c("tr", { key: tag.id }, [
                            _c("td", [_vm._v(_vm._s(index))]),
                            _vm._v(" "),
                            _c("td", [_vm._v(_vm._s(tag.title))]),
                            _vm._v(" "),
                            _c("td", { staticClass: "text text-center" }, [
                              tag.status === 1
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
                                          return _vm.editTag(tag.id)
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
                                          return _vm.removeTag(tag.id)
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
          ])
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
      _c("h5", { staticClass: "panel-title" }, [_vm._v("Product Tag/Keywords")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading" }, [
      _c("h5", { staticClass: "panel-title" }, [_vm._v("Tag List")])
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
        _c("th", [_vm._v("Tag Title")]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_vm._v("Tag Status")]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_vm._v("Action")])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/tag/Tag.vue":
/*!*********************************************!*\
  !*** ./resources/js/components/tag/Tag.vue ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Tag_vue_vue_type_template_id_3c4d3e8a_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Tag.vue?vue&type=template&id=3c4d3e8a&scoped=true& */ "./resources/js/components/tag/Tag.vue?vue&type=template&id=3c4d3e8a&scoped=true&");
/* harmony import */ var _Tag_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Tag.vue?vue&type=script&lang=js& */ "./resources/js/components/tag/Tag.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Tag_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Tag_vue_vue_type_template_id_3c4d3e8a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Tag_vue_vue_type_template_id_3c4d3e8a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "3c4d3e8a",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/tag/Tag.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/tag/Tag.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/components/tag/Tag.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Tag_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Tag.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/tag/Tag.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Tag_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/tag/Tag.vue?vue&type=template&id=3c4d3e8a&scoped=true&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/tag/Tag.vue?vue&type=template&id=3c4d3e8a&scoped=true& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Tag_vue_vue_type_template_id_3c4d3e8a_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Tag.vue?vue&type=template&id=3c4d3e8a&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/tag/Tag.vue?vue&type=template&id=3c4d3e8a&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Tag_vue_vue_type_template_id_3c4d3e8a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Tag_vue_vue_type_template_id_3c4d3e8a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);