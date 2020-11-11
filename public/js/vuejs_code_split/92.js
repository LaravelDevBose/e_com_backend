(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[92],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/category/CategoryCreatePage.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/category/CategoryCreatePage.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _riophae_vue_treeselect_dist_vue_treeselect_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @riophae/vue-treeselect/dist/vue-treeselect.css */ "./node_modules/@riophae/vue-treeselect/dist/vue-treeselect.css");
/* harmony import */ var _riophae_vue_treeselect_dist_vue_treeselect_css__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_riophae_vue_treeselect_dist_vue_treeselect_css__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var _cropper_ImageCropper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../cropper/ImageCropper */ "./resources/js/components/cropper/ImageCropper.vue");
/* harmony import */ var _riophae_vue_treeselect__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @riophae/vue-treeselect */ "./node_modules/@riophae/vue-treeselect/dist/vue-treeselect.js");
/* harmony import */ var _riophae_vue_treeselect__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_riophae_vue_treeselect__WEBPACK_IMPORTED_MODULE_3__);
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




/* harmony default export */ __webpack_exports__["default"] = ({
  name: "CategoryCreatePage",
  components: {
    ImageCropper: _cropper_ImageCropper__WEBPACK_IMPORTED_MODULE_2__["default"],
    Treeselect: _riophae_vue_treeselect__WEBPACK_IMPORTED_MODULE_3___default.a
  },
  props: {
    categoryid: {
      type: [Number, String],
      "default": ''
    },
    isedit: {
      type: [Number, Boolean],
      "default": false
    }
  },
  data: function data() {
    return {
      formValue: {
        id: '',
        parent_id: null,
        category_name: null,
        category_status: false,
        banner_id: '',
        in_header: 1,
        icon_id: ''
      },
      normalizer: function normalizer(node) {
        return {
          id: node.id,
          label: node.label,
          children: node.children
        };
      },
      cropperData: {
        width: 1200,
        height: 400,
        placeholder: 'Choose a Banner image (1200 X 400)',
        file_size: 1.5,
        init_image: '',
        folder: 'category',
        modal_type: 4,
        modal_id: 'banner_image',
        serial: 1
      },
      iconCropperData: {
        width: 100,
        height: 100,
        placeholder: 'Image (100X100)',
        file_size: .5,
        init_image: '',
        folder: 'category',
        modal_type: 2,
        modal_id: 'icon_image',
        serial: 3
      },
      removeImage: false,
      btnDisabled: false
    };
  },
  created: function created() {
    this.getTreeListCategories();

    if (this.isedit) {
      this.getCategoryData(this.categoryid);
    }
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_1__["mapActions"])(['getTreeListCategories', 'storeCategory', 'updateCategory', 'getCategoryData']), {
    manipulateCategoryData: function manipulateCategoryData() {
      var banner_id = $(".".concat(this.cropperData.modal_id)).val();
      var icon_id = $(".".concat(this.iconCropperData.modal_id)).val();

      if (typeof banner_id !== "undefined" && banner_id !== '') {
        this.formValue.banner_id = banner_id;
      }

      if (typeof icon_id !== "undefined" && icon_id !== '') {
        console.log(icon_id);
        this.formValue.icon_id = icon_id;
      }

      if (this.isedit) {
        this.updateCategory(this.formValue).then(function (response) {
          if (typeof response.code !== "undefined" && response.code === 201) {
            Notify.success(response.message);

            if (response.hasOwnProperty('url')) {
              location.href = response.url;
            }
          } else if (response.status === 'validation') {
            Notify.validation(response.message);
          } else {
            Notify.error(response.message);
          }
        });
      } else {
        this.storeCategory(this.formValue).then(function (response) {
          if (typeof response.code !== "undefined" && response.code === 201) {
            Notify.success(response.message);

            if (response.hasOwnProperty('url')) {
              location.href = response.url;
            }
          } else if (response.status === 'validation') {
            Notify.validation(response.message);
          } else {
            Notify.error(response.message);
          }
        });
      }
    },
    emptyFormData: function emptyFormData() {
      this.formValue.parent_id = null;
      this.formValue.category_name = '';
      this.formValue.category_status = false;
      this.formValue.banner_id = '';
      this.formValue.icon_id = '';
      this.removeImage = true;
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_1__["mapGetters"])(['treeList', 'category']), {
    categoryCheck: function categoryCheck() {
      return JSON.parse(JSON.stringify(this.category));
    }
  }),
  watch: {
    categoryCheck: {
      handler: function handler(newValue, oldValue) {
        if (newValue !== oldValue) {
          this.formValue.id = this.category.id;
          this.formValue.parent_id = this.category.parent_id;
          this.formValue.category_name = this.category.name;

          if (this.category.status === 1) {
            this.formValue.category_status = true;
          }

          if (this.category.in_header === 1) {
            this.formValue.in_header = true;
          }

          if (this.category.attachment) {
            this.formValue.banner_id = this.category.banner_id;
            this.cropperData.init_image = this.category.attachment.image_path;
          }

          if (this.category.parent_id === null) {
            if (this.category.iconImage) {
              this.formValue.icon_id = this.category.iconImage.attachment_id;
              this.iconCropperData.init_image = this.category.iconImage.image_path;
            }
          }
        }
      },
      deep: true
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/category/CategoryCreatePage.vue?vue&type=template&id=fede43c2&scoped=true&":
/*!******************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/category/CategoryCreatePage.vue?vue&type=template&id=fede43c2&scoped=true& ***!
  \******************************************************************************************************************************************************************************************************************************************/
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
                return _vm.manipulateCategoryData($event)
              }
            }
          },
          [
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-4" }, [
                _c(
                  "div",
                  { staticClass: "form-group" },
                  [
                    _c("label", [_vm._v("Parent Category:")]),
                    _vm._v(" "),
                    _c("treeselect", {
                      attrs: {
                        options: _vm.treeList,
                        normalizer: _vm.normalizer
                      },
                      model: {
                        value: _vm.formValue.parent_id,
                        callback: function($$v) {
                          _vm.$set(_vm.formValue, "parent_id", $$v)
                        },
                        expression: "formValue.parent_id"
                      }
                    })
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", [_vm._v("Category Name:")]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.formValue.category_name,
                        expression: "formValue.category_name"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "Category Name ",
                      required: ""
                    },
                    domProps: { value: _vm.formValue.category_name },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(
                          _vm.formValue,
                          "category_name",
                          $event.target.value
                        )
                      }
                    }
                  })
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-2" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", [_vm._v("Category Show In:")]),
                  _vm._v(" "),
                  _c(
                    "label",
                    {
                      staticClass: "checkbox-style checkbox-inline",
                      attrs: { for: "in_header" }
                    },
                    [
                      _vm.formValue.in_header
                        ? _c(
                            "span",
                            { staticClass: "text-bold text-success" },
                            [_vm._v("Show In Header")]
                          )
                        : _c(
                            "span",
                            { staticClass: "text-bold text-warning" },
                            [_vm._v("Not Show In Header")]
                          ),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.formValue.in_header,
                            expression: "formValue.in_header"
                          }
                        ],
                        attrs: { type: "checkbox", id: "in_header" },
                        domProps: {
                          checked: _vm.formValue.in_header,
                          checked: Array.isArray(_vm.formValue.in_header)
                            ? _vm._i(_vm.formValue.in_header, null) > -1
                            : _vm.formValue.in_header
                        },
                        on: {
                          change: function($event) {
                            var $$a = _vm.formValue.in_header,
                              $$el = $event.target,
                              $$c = $$el.checked ? true : false
                            if (Array.isArray($$a)) {
                              var $$v = null,
                                $$i = _vm._i($$a, $$v)
                              if ($$el.checked) {
                                $$i < 0 &&
                                  _vm.$set(
                                    _vm.formValue,
                                    "in_header",
                                    $$a.concat([$$v])
                                  )
                              } else {
                                $$i > -1 &&
                                  _vm.$set(
                                    _vm.formValue,
                                    "in_header",
                                    $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                                  )
                              }
                            } else {
                              _vm.$set(_vm.formValue, "in_header", $$c)
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
                  _c("label", [_vm._v("Category Status:")]),
                  _vm._v(" "),
                  _c(
                    "label",
                    { staticClass: "checkbox-style", attrs: { for: "status" } },
                    [
                      _vm.formValue.category_status
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
                            value: _vm.formValue.category_status,
                            expression: "formValue.category_status"
                          }
                        ],
                        attrs: { type: "checkbox", id: "status" },
                        domProps: {
                          checked: _vm.formValue.category_status,
                          checked: Array.isArray(_vm.formValue.category_status)
                            ? _vm._i(_vm.formValue.category_status, null) > -1
                            : _vm.formValue.category_status
                        },
                        on: {
                          change: function($event) {
                            var $$a = _vm.formValue.category_status,
                              $$el = $event.target,
                              $$c = $$el.checked ? true : false
                            if (Array.isArray($$a)) {
                              var $$v = null,
                                $$i = _vm._i($$a, $$v)
                              if ($$el.checked) {
                                $$i < 0 &&
                                  _vm.$set(
                                    _vm.formValue,
                                    "category_status",
                                    $$a.concat([$$v])
                                  )
                              } else {
                                $$i > -1 &&
                                  _vm.$set(
                                    _vm.formValue,
                                    "category_status",
                                    $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                                  )
                              }
                            } else {
                              _vm.$set(_vm.formValue, "category_status", $$c)
                            }
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "checkmark" })
                    ]
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-4" }, [
                _c(
                  "div",
                  { staticClass: "form-group" },
                  [
                    _c("label", [_vm._v("Category Banner:")]),
                    _vm._v(" "),
                    _c("image-cropper", {
                      attrs: {
                        cropperData: _vm.cropperData,
                        removeImage: _vm.removeImage
                      }
                    })
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              !_vm.formValue.parent_id
                ? _c("div", { staticClass: "col-md-4" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _c("label", [_vm._v("Category Icon:")]),
                        _vm._v(" "),
                        _c("image-cropper", {
                          attrs: {
                            cropperData: _vm.iconCropperData,
                            removeImage: _vm.removeImage
                          }
                        })
                      ],
                      1
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-2" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-primary",
                      staticStyle: { "margin-top": "2em" },
                      attrs: { type: "submit", disabled: _vm.btnDisabled }
                    },
                    [
                      _vm.isedit === 1
                        ? _c("span", [_vm._v("Update Category ")])
                        : _c("span", [_vm._v("Save Category ")]),
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
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading" }, [
      _c("h5", { staticClass: "panel-title" }, [_vm._v("Category")]),
      _vm._v(" "),
      _c("div", { staticClass: "heading-elements" })
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/category/CategoryCreatePage.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/components/category/CategoryCreatePage.vue ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CategoryCreatePage_vue_vue_type_template_id_fede43c2_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CategoryCreatePage.vue?vue&type=template&id=fede43c2&scoped=true& */ "./resources/js/components/category/CategoryCreatePage.vue?vue&type=template&id=fede43c2&scoped=true&");
/* harmony import */ var _CategoryCreatePage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CategoryCreatePage.vue?vue&type=script&lang=js& */ "./resources/js/components/category/CategoryCreatePage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CategoryCreatePage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CategoryCreatePage_vue_vue_type_template_id_fede43c2_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CategoryCreatePage_vue_vue_type_template_id_fede43c2_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "fede43c2",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/category/CategoryCreatePage.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/category/CategoryCreatePage.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/category/CategoryCreatePage.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryCreatePage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./CategoryCreatePage.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/category/CategoryCreatePage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryCreatePage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/category/CategoryCreatePage.vue?vue&type=template&id=fede43c2&scoped=true&":
/*!************************************************************************************************************!*\
  !*** ./resources/js/components/category/CategoryCreatePage.vue?vue&type=template&id=fede43c2&scoped=true& ***!
  \************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryCreatePage_vue_vue_type_template_id_fede43c2_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./CategoryCreatePage.vue?vue&type=template&id=fede43c2&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/category/CategoryCreatePage.vue?vue&type=template&id=fede43c2&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryCreatePage_vue_vue_type_template_id_fede43c2_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryCreatePage_vue_vue_type_template_id_fede43c2_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);