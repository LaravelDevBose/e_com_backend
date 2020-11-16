(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[15],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/attachment/Attachment.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/attachment/Attachment.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['multi_file', 'folder'],
  name: "Attachment",
  data: function data() {
    return {
      attachmentData: []
    };
  },
  created: function created() {},
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['uploadAttachment']), {
    uploadFile: function uploadFile(e) {
      this.files = this.$refs.files.files;
      var formData;
      formData = new FormData();

      for (var i = 0; i < this.files.length; i++) {
        var file = this.files[i];
        formData.append(i, file);
      }

      formData.append('folder', this.folder);
      var vm = this;
      setTimeout(function () {
        vm.uploadAttachment(formData);
      }, 1000);
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['attachments']), {
    checkAttachmentsData: function checkAttachmentsData() {
      return JSON.parse(JSON.stringify(this.attachments));
    }
  }),
  watch: {
    checkAttachmentsData: {
      handler: function handler(newVal, oldVal) {
        if (newVal !== oldVal) {
          if (this.multi_file === true || this.multi_file === 'true' || this.multi_file === 1) {
            if (this.attachments.length > 1) {
              delete this.attachmentData[0];
              this.attachmentData[0] = this.attachments[0];
            } else {
              this.attachmentData = this.attachments;
            }
          } else {
            this.attachmentData = this.attachments;
          }
        }
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/brand/Brand.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/brand/Brand.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _attachment_Attachment__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../attachment/Attachment */ "./resources/js/components/attachment/Attachment.vue");
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var _cropper_ImageCropper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../cropper/ImageCropper */ "./resources/js/components/cropper/ImageCropper.vue");
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



/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Brand",
  components: {
    Attachment: _attachment_Attachment__WEBPACK_IMPORTED_MODULE_0__["default"],
    ImageCropper: _cropper_ImageCropper__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      formData: {
        id: '',
        brand_name: '',
        brand_status: '',
        attachment_id: ''
      },
      cropperData: {
        width: 200,
        height: 200,
        placeholder: 'Choose a image in 200X200',
        file_size: 1,
        init_image: '',
        folder: 'brand',
        modal_type: 1
      },
      removeImage: false,
      btnDisabled: false,
      isedit: false
    };
  },
  created: function created() {
    this.getBrands();
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_1__["mapActions"])(['getBrands', 'storeBrand', 'deleteBrand', 'updateBrandInfo']), {
    manipulateBrandData: function manipulateBrandData() {
      var _this = this;

      if (this.cropImageIds.length !== 0 && this.cropImageIds[0] !== '') {
        this.formData.attachment_id = this.cropImageIds[0];
      }

      if (this.isedit) {
        this.updateBrandInfo(this.formData).then(function (response) {
          if (typeof response.code !== "undefined" && response.code === 200) {
            Notify.success(response.message);
            _this.isedit = false;

            _this.formReset();
          } else if (response.status === "validation") {
            Notify.validation(response.message);
          } else {
            Notify.error(response.message);
          }
        })["catch"](function (error) {
          Notify.info(error.message);
        });
      } else {
        this.storeBrand(this.formData).then(function (response) {
          console.log(response);

          if (response.status === "success") {
            Notify.success(response.message);

            _this.formReset();
          } else if (response.status === "validation") {
            Notify.validation(response.message);
          } else {
            Notify.error(response.message);
          }
        })["catch"](function (error) {
          Notify.info(error.message);
        });
      }
    },
    formReset: function formReset() {
      this.formData.brand_name = '';
      this.formData.brand_status = false;
      this.formData.attachment_id = '';
      this.removeImage = true;
    },
    brandDelete: function brandDelete(brandId) {
      if (confirm('Are You Sure..?')) {
        this.deleteBrand(brandId).then(function (response) {
          if (response.status === "success") {
            Notify.success(response.message);
          } else {
            Notify.error(response.message);
          }
        });
      } else {
        return false;
      }
    },
    editBrand: function editBrand(brandId) {
      var _this2 = this;

      this.brands.filter(function (brand) {
        if (brand.id === brandId) {
          _this2.isedit = true;
          _this2.formData.id = brand.id;
          _this2.formData.brand_name = brand.name;
          _this2.formData.brand_status = brand.status;

          if (brand.attachment) {
            _this2.formData.attachment_id = brand.attachment.attachment_id;
            _this2.cropperData.init_image = brand.attachment.image_path;
          }
        }

        return brand;
      });
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_1__["mapGetters"])(['brands', 'cropImageIds']), {
    checkFormData: function checkFormData() {
      return JSON.parse(JSON.stringify(this.formData));
    }
  }),
  watch: {
    checkFormData: {
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/attachment/Attachment.vue?vue&type=template&id=5d3898f4&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/attachment/Attachment.vue?vue&type=template&id=5d3898f4&scoped=true& ***!
  \************************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { attrs: { id: "attachment" } }, [
    _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-12" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("input", {
            ref: "files",
            staticClass: "hidden",
            attrs: {
              type: "file",
              multiple: _vm.multi_file,
              id: "file_upload"
            },
            on: { change: _vm.uploadFile }
          }),
          _vm._v(" "),
          _vm._m(0)
        ])
      ])
    ]),
    _vm._v(" "),
    _vm.attachmentData
      ? _c(
          "div",
          { staticClass: "row" },
          _vm._l(_vm.attachmentData, function(attachment, index) {
            return _c(
              "div",
              { key: attachment.id, staticClass: "col-lg-4 col-sm-4" },
              [
                _c("div", { staticClass: "thumbnail" }, [
                  _c("div", { staticClass: "thumb" }, [
                    _c("img", { attrs: { src: attachment.img, alt: "" } })
                  ])
                ])
              ]
            )
          }),
          0
        )
      : _vm._e()
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "label",
      {
        staticClass: "btn btn-info btn-md btn-block",
        attrs: { for: "file_upload" }
      },
      [
        _c("i", { staticClass: "icon-file-media text-left" }),
        _vm._v(" Select File")
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/brand/Brand.vue?vue&type=template&id=1a1c2664&scoped=true&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/brand/Brand.vue?vue&type=template&id=1a1c2664&scoped=true& ***!
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
                return _vm.manipulateBrandData($event)
              }
            }
          },
          [
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", [_vm._v("Brand Name:")]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.formData.brand_name,
                        expression: "formData.brand_name"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "Brand Name ",
                      required: ""
                    },
                    domProps: { value: _vm.formData.brand_name },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(
                          _vm.formData,
                          "brand_name",
                          $event.target.value
                        )
                      }
                    }
                  })
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4" }, [
                _c(
                  "div",
                  { staticClass: "form-group" },
                  [
                    _c("label", [_vm._v("Brand Banner:")]),
                    _vm._v(" "),
                    _c("image-cropper", {
                      attrs: {
                        cropperData: _vm.cropperData,
                        removeImage: _vm.removeImage,
                        initImage: _vm.cropperData.init_image
                      }
                    })
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", [_vm._v("Brand Status:")]),
                  _vm._v(" "),
                  _c(
                    "label",
                    {
                      staticClass: "checkbox-style",
                      attrs: { for: "paypal_payment" }
                    },
                    [
                      _vm.formData.brand_status
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
                            value: _vm.formData.brand_status,
                            expression: "formData.brand_status"
                          }
                        ],
                        attrs: { type: "checkbox", id: "paypal_payment" },
                        domProps: {
                          checked: _vm.formData.brand_status,
                          checked: Array.isArray(_vm.formData.brand_status)
                            ? _vm._i(_vm.formData.brand_status, null) > -1
                            : _vm.formData.brand_status
                        },
                        on: {
                          change: function($event) {
                            var $$a = _vm.formData.brand_status,
                              $$el = $event.target,
                              $$c = $$el.checked ? true : false
                            if (Array.isArray($$a)) {
                              var $$v = null,
                                $$i = _vm._i($$a, $$v)
                              if ($$el.checked) {
                                $$i < 0 &&
                                  _vm.$set(
                                    _vm.formData,
                                    "brand_status",
                                    $$a.concat([$$v])
                                  )
                              } else {
                                $$i > -1 &&
                                  _vm.$set(
                                    _vm.formData,
                                    "brand_status",
                                    $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                                  )
                              }
                            } else {
                              _vm.$set(_vm.formData, "brand_status", $$c)
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
                      _vm.isedit
                        ? _c("span", [_vm._v("Update Brand")])
                        : _c("span", [_vm._v("Save Brand")]),
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
    ]),
    _vm._v(" "),
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
              _vm._l(_vm.brands, function(brand, index) {
                return _vm.brands
                  ? _c("tr", { key: brand.id }, [
                      _c("td", [_vm._v(_vm._s(index))]),
                      _vm._v(" "),
                      _c(
                        "td",
                        { staticStyle: { padding: "5px", width: "120px" } },
                        [
                          brand.attachment
                            ? _c("img", {
                                staticClass: "img-preview img-responsive",
                                staticStyle: { width: "100px", height: "35px" },
                                attrs: {
                                  src: brand.attachment.image_path,
                                  alt: brand.name
                                }
                              })
                            : _vm._e()
                        ]
                      ),
                      _vm._v(" "),
                      _c("td", [
                        _c("span", { staticClass: "text text-bold" }, [
                          _vm._v(" " + _vm._s(brand.name))
                        ])
                      ]),
                      _vm._v(" "),
                      _c("td", { staticClass: "text text-center" }, [
                        brand.status === 1
                          ? _c("span", { staticClass: "badge badge-success" }, [
                              _vm._v("Active")
                            ])
                          : brand.status === 3
                          ? _c("span", { staticClass: "badge badge-primary" }, [
                              _vm._v("Requested")
                            ])
                          : _c("span", { staticClass: "badge badge-warning" }, [
                              _vm._v("Inactive")
                            ])
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
                                    return _vm.editBrand(brand.id)
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
                                    return _vm.brandDelete(brand.id)
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
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading" }, [
      _c("h5", { staticClass: "panel-title" }, [_vm._v("Brand")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading" }, [
      _c("h5", { staticClass: "panel-title" }, [_vm._v("Brand List")])
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
        _c("th", { staticStyle: { padding: "5px" } }, [_vm._v("Banner Image")]),
        _vm._v(" "),
        _c("th", [_vm._v("Brand Name")]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_vm._v("Status")]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_vm._v("Action")])
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

/***/ "./resources/js/components/attachment/Attachment.vue":
/*!***********************************************************!*\
  !*** ./resources/js/components/attachment/Attachment.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Attachment_vue_vue_type_template_id_5d3898f4_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Attachment.vue?vue&type=template&id=5d3898f4&scoped=true& */ "./resources/js/components/attachment/Attachment.vue?vue&type=template&id=5d3898f4&scoped=true&");
/* harmony import */ var _Attachment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Attachment.vue?vue&type=script&lang=js& */ "./resources/js/components/attachment/Attachment.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Attachment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Attachment_vue_vue_type_template_id_5d3898f4_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Attachment_vue_vue_type_template_id_5d3898f4_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "5d3898f4",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/attachment/Attachment.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/attachment/Attachment.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/attachment/Attachment.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Attachment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Attachment.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/attachment/Attachment.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Attachment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/attachment/Attachment.vue?vue&type=template&id=5d3898f4&scoped=true&":
/*!******************************************************************************************************!*\
  !*** ./resources/js/components/attachment/Attachment.vue?vue&type=template&id=5d3898f4&scoped=true& ***!
  \******************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Attachment_vue_vue_type_template_id_5d3898f4_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Attachment.vue?vue&type=template&id=5d3898f4&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/attachment/Attachment.vue?vue&type=template&id=5d3898f4&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Attachment_vue_vue_type_template_id_5d3898f4_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Attachment_vue_vue_type_template_id_5d3898f4_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/brand/Brand.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/brand/Brand.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Brand_vue_vue_type_template_id_1a1c2664_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Brand.vue?vue&type=template&id=1a1c2664&scoped=true& */ "./resources/js/components/brand/Brand.vue?vue&type=template&id=1a1c2664&scoped=true&");
/* harmony import */ var _Brand_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Brand.vue?vue&type=script&lang=js& */ "./resources/js/components/brand/Brand.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Brand_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Brand_vue_vue_type_template_id_1a1c2664_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Brand_vue_vue_type_template_id_1a1c2664_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "1a1c2664",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/brand/Brand.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/brand/Brand.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/brand/Brand.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Brand_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Brand.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/brand/Brand.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Brand_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/brand/Brand.vue?vue&type=template&id=1a1c2664&scoped=true&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/brand/Brand.vue?vue&type=template&id=1a1c2664&scoped=true& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Brand_vue_vue_type_template_id_1a1c2664_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Brand.vue?vue&type=template&id=1a1c2664&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/brand/Brand.vue?vue&type=template&id=1a1c2664&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Brand_vue_vue_type_template_id_1a1c2664_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Brand_vue_vue_type_template_id_1a1c2664_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);