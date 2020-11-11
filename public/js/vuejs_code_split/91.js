(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[91],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/attachment/SingleAttachment.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/attachment/SingleAttachment.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************/
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
  props: ['folder'],
  name: "SingleAttachment",
  data: function data() {
    return {
      attachmentData: []
    };
  },
  created: function created() {},
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['uploadSingleAttachment']), {
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
        vm.uploadSingleAttachment(formData);
      }, 500);
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['singleAttachment']))
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/product/CreateProduct.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/product/CreateProduct.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _riophae_vue_treeselect__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @riophae/vue-treeselect */ "./node_modules/@riophae/vue-treeselect/dist/vue-treeselect.js");
/* harmony import */ var _riophae_vue_treeselect__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_riophae_vue_treeselect__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue2_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue2-editor */ "./node_modules/vue2-editor/dist/vue2-editor.esm.js");
/* harmony import */ var _riophae_vue_treeselect_dist_vue_treeselect_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @riophae/vue-treeselect/dist/vue-treeselect.css */ "./node_modules/@riophae/vue-treeselect/dist/vue-treeselect.css");
/* harmony import */ var _riophae_vue_treeselect_dist_vue_treeselect_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_riophae_vue_treeselect_dist_vue_treeselect_css__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var _cropper_ImageCropper__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../cropper/ImageCropper */ "./resources/js/components/cropper/ImageCropper.vue");
/* harmony import */ var _attachment_SingleAttachment__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../attachment/SingleAttachment */ "./resources/js/components/attachment/SingleAttachment.vue");
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
// import the component

 // import the styles





/* harmony default export */ __webpack_exports__["default"] = ({
  name: "CreateProduct",
  components: {
    SingleAttachment: _attachment_SingleAttachment__WEBPACK_IMPORTED_MODULE_5__["default"],
    ImageCropper: _cropper_ImageCropper__WEBPACK_IMPORTED_MODULE_4__["default"],
    Treeselect: _riophae_vue_treeselect__WEBPACK_IMPORTED_MODULE_0___default.a,
    VueEditor: vue2_editor__WEBPACK_IMPORTED_MODULE_1__["VueEditor"]
  },
  data: function data() {
    return {
      formData: {
        category_id: '',
        brand_id: '',
        product_name: '',
        highlight: '',
        description: '',
        product_status: false,
        video_url: '',
        main_materials: '',
        product_model: '',
        num_of_pieces: '',
        color_shade: '',
        extra_details: '',
        warranty_policy: '',
        warranty_period: '',
        variations: [],
        imageIds: '',
        thumb_id: '',
        product_type: 1,
        seller_id: 1,
        tag_ids: []
      },
      variations: [],
      btnDisabled: false,
      multiple: true,
      folder: 'product',
      multi_file: true,
      normalizer: function normalizer(node) {
        return {
          id: node.id,
          label: node.label,
          children: node.children
        };
      },
      total: 1,
      pri_id_total: 0,
      priId: '',
      pri_id: {},
      sec_id: {},
      pri_id_index: '',
      cat_Selected: false,
      cropperData: {
        width: 400,
        height: 400,
        placeholder: 'Choose a image in 400X400',
        file_size: 1,
        init_image: '',
        folder: 'thumbnail'
      },
      removeImage: false,
      vari_id: 'variaction_',
      seller_sku: '',
      qty: 1,
      price: 1
    };
  },
  created: function created() {
    this.allTreeListCategories();
  },
  mounted: function mounted() {
    this.getBrandList();
    this.getSellerSelectList();
    this.getTagList();
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_3__["mapActions"])(['allTreeListCategories', 'getBrandList', 'getProductCreateDependency', 'uploadProductImage', 'storeProductData', 'attachmentImageRemove', 'getSellerSelectList', 'getTagList']), {
    addPriId: function addPriId(PriID) {
      this.priId = PriID;
    },
    uploadImage: function uploadImage(e) {
      var files = e.target.files || e.dataTransfer.files;
      var formData = '';
      formData = new FormData();

      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        formData.append(i, file);
      }

      formData.append('folder', this.folder);
      formData.append('pri_id', this.priId);
      var vm = this;
      setTimeout(function () {
        vm.uploadProductImage(formData);
      }, 1000);
    },
    priIdIndex: function priIdIndex(index) {
      this.pri_id_index = index;
    },
    changeImageData: function changeImageData(newPriID, oldPriID) {
      var _this = this;

      if (!jQuery.isEmptyObject(this.productImages)) {
        this.productImages.filter(function (img) {
          return img.pri_id === oldPriID;
        }).forEach(function (image) {
          if (image.pri_id === oldPriID) {
            var index = _this.productImages.indexOf(image);

            _this.$delete(_this.productImages, index);

            var data = {
              'pri_id': newPriID,
              'img': image.img,
              'id': image.id,
              'no': image.no,
              'delete_url': image.delete_url
            };

            _this.productImages.push(data);
          }
        });
        this.imageIds.filter(function (img) {
          return img.pri_id === oldPriID;
        }).forEach(function (imageID) {
          var index = _this.imageIds.indexOf(imageID);

          _this.$delete(_this.imageIds, index);

          var data = {
            'pri_id': newPriID,
            'image_id': imageID.image_id
          };

          _this.imageIds.push(data);
        });
      }
    },
    changeVariationPriIDWish: function changeVariationPriIDWish(newPriID, oldPriID) {
      var vm = this;
      var color = '';
      this.productColors.filter(function (pColor) {
        if (pColor.id === parseInt(newPriID)) {
          color = pColor.text;
        }
      });

      if (!jQuery.isEmptyObject(vm.variations)) {
        vm.variations.filter(function (variation) {
          return variation.color_id === oldPriID;
        }).forEach(function (variation) {
          var index = vm.variations.indexOf(variation);
          vm.$delete(vm.variations, index);
          var data = {
            color_id: newPriID,
            color_name: color,
            size_id: variation.size_id,
            size_name: variation.size_name,
            seller_sku: variation.seller_sku,
            qty: variation.qty,
            price: variation.price,
            gift_product: variation.gift_product,
            status: variation.status
          };
          vm.variations.push(data);
        });
      }
    },
    addVariationPriIDWish: function addVariationPriIDWish(newPriID) {
      var _this2 = this;

      var vm = this;
      var color = '';
      this.productColors.filter(function (pColor) {
        if (pColor.id === parseInt(newPriID)) {
          color = pColor.text;
        }
      });

      if (!jQuery.isEmptyObject(this.sec_id)) {
        var _loop = function _loop(key) {
          var size = vm.sizes.find(function (element) {
            return element.id === parseInt(_this2.sec_id[key]);
          });
          var data = {
            color_id: newPriID,
            color_name: color,
            size_id: size.id,
            size_name: size.text,
            seller_sku: '',
            qty: '',
            price: '',
            status: 1
          };
          vm.variations.push(data);
        };

        for (var key in this.sec_id) {
          _loop(key);
        }
      }
    },
    addNewVariationSizeWish: function addNewVariationSizeWish(newVal, oldVal) {
      var _this3 = this;

      var newSize = newVal.filter(function (value) {
        if (jQuery.isEmptyObject(oldVal) || !oldVal.includes(value)) {
          return value;
        }
      });
      var size = this.sizes.find(function (element) {
        return element.id == newSize;
      });

      if (!jQuery.isEmptyObject(this.pri_id)) {
        var _loop2 = function _loop2(key) {
          var color = _this3.productColors.find(function (element) {
            return element.id == _this3.pri_id[key];
          });

          var data = {
            color_id: color.id,
            color_name: color.text,
            size_id: size.id,
            size_name: size.text,
            seller_sku: '',
            qty: '',
            price: '',
            status: 1
          };

          _this3.variations.push(data);
        };

        for (var key in this.pri_id) {
          _loop2(key);
        }
      }
    },
    removeVariationSizeWish: function removeVariationSizeWish(newVal, oldVal) {
      var vm = this;
      var oldSize = oldVal.filter(function (value) {
        if (jQuery.isEmptyObject(newVal) || !newVal.includes(value)) {
          return value;
        }
      });

      if (!jQuery.isEmptyObject(this.variations)) {
        vm.variations.filter(function (variation) {
          return variation.size_id == oldSize[0];
        }).forEach(function (variation) {
          var index = vm.variations.indexOf(variation);
          vm.$delete(vm.variations, index);
        });
      }
    },
    removeVariationData: function removeVariationData(index) {
      this.$delete(this.variations, index);
    },
    removePriIdData: function removePriIdData(index) {
      var _this4 = this;

      var PRIID = this.pri_id[index];

      if (PRIID) {
        //remove pri id from Pri_id
        this.$delete(this.pri_id, index);
        $('#' + index).empty();
        this.pri_id_total--; //remove images

        if (!jQuery.isEmptyObject(this.productImages)) {
          this.productImages.filter(function (img) {
            return img.pri_id === PRIID;
          }).forEach(function (image) {
            if (image.pri_id === PRIID) {
              var _index = _this4.productImages.indexOf(image);

              _this4.$delete(_this4.productImages, _index);
            }
          });
          this.imageIds.filter(function (img) {
            return img.pri_id === PRIID;
          }).forEach(function (imageID) {
            var index = _this4.imageIds.indexOf(imageID);

            _this4.$delete(_this4.imageIds, index);
          });
        } //remove variation Table data


        if (!jQuery.isEmptyObject(this.variations)) {
          this.variations.filter(function (variation) {
            return variation.color_id == PRIID;
          }).forEach(function (variation) {
            var index = _this4.variations.indexOf(variation);

            _this4.$delete(_this4.variations, index);
          });
        }
      }
    },
    submitFrom: function submitFrom() {
      var _this5 = this;

      // TODO Form Validation
      //Button Disable
      this.btnDisabled = true; // append variation data and images ids in form Data

      this.formData.thumb_id = this.cropImageIds[0];

      if (this.formData.product_type === 1) {
        this.formData.variations = [{
          seller_sku: this.seller_sku,
          qty: this.qty,
          price: this.price,
          status: 1
        }];
      } else {
        this.formData.variations = this.variations;
      }

      this.formData.imageIds = this.imageIds; //send Vuex request

      this.storeProductData(this.formData).then(function (response) {
        console.log(response);

        if (response.status === "success") {
          Notify.success(response.message);
          _this5.removeImage = true;
          setTimeout(function () {
            window.location = response.url;
          });
        } else if (response.status === "validation") {
          Notify.validation(response.message);
        } else if (response.status === "error") {
          Notify.error(response.message);
        } else {
          Notify.info(response.message);
        }
      })["catch"](function (error) {
        Notify.error(error.message);
      });
    },
    emptyPrvData: function emptyPrvData() {
      this.imageIds.length = 0;
      this.productImages.length = 0;
      this.priId = '';
      this.pri_id.length = 0;
      this.variations.length = 0;
      this.total = 1;
      this.pri_id_total = 0;
      this.priId = '';
      this.pri_id.length = 0;
      this.pri_id = {};
      this.sec_id.length = 0;
      this.sec_id = {};
      this.pri_id_index = '';
      this.seller_sku = '';
      this.qty = 1;
      this.price = 1;
      this.formData.product_qty = '';
      this.formData.product_price = '';
      this.formData.seller_sku = '';

      if (this.formData.variations.length > 0) {
        this.formData.variations.length = 0;
      }

      if (this.formData.imageIds.length > 0) {
        this.formData.imageIds.length = 0;
      }
    },
    removeAttachment: function removeAttachment(attachmentId) {
      var conf = confirm('Are You Sure.?');

      if (!conf) {
        return false;
      }

      this.attachmentImageRemove(attachmentId).then(function (response) {
        if (response.code === 200) {
          Notify.success(response.message);
        } else if (response.status === "validation") {
          Notify.validation(response.message);
        } else if (response.status === "error") {
          Notify.error(response.message);
        } else {
          Notify.info(response.message);
        }
      });
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_3__["mapGetters"])(['treeList', 'brandList', 'productColors', 'sizes', 'productImages', 'imageIds', 'cropImageIds', 'sellerListData', 'tagList']), {
    clonedPrimaryIds: function clonedPrimaryIds() {
      return JSON.parse(JSON.stringify(this.pri_id));
    },
    clonedSecondaryIds: function clonedSecondaryIds() {
      if (this.sec_id) {
        return JSON.parse(JSON.stringify(this.sec_id));
      }
    },
    formDataCheck: function formDataCheck() {
      return JSON.parse(JSON.stringify(this.formData));
    }
  }),
  watch: {
    clonedPrimaryIds: {
      handler: function handler(newVal, oldVal) {
        var pri_count = 0;

        for (var key in newVal) {
          pri_count++;
        }

        if (newVal[this.pri_id_index] !== oldVal[this.pri_id_index]) {
          if (typeof oldVal[this.pri_id_index] !== "undefined") {
            this.changeImageData(newVal[this.pri_id_index], oldVal[this.pri_id_index]);
            this.changeVariationPriIDWish(newVal[this.pri_id_index], oldVal[this.pri_id_index]);
          } else {
            this.addVariationPriIDWish(newVal[this.pri_id_index]);
          }
        }

        if (pri_count > this.pri_id_total) {
          this.total++;
          this.pri_id_total++;
        }
      },
      deep: true
    },
    clonedSecondaryIds: {
      handler: function handler(newVal, oldVal) {
        if (this.formData.product_type === 2) {
          if (jQuery.isEmptyObject(oldVal) || newVal.length > oldVal.length) {
            this.addNewVariationSizeWish(newVal, oldVal);
          } else if (jQuery.isEmptyObject(newVal) && !jQuery.isEmptyObject(newVal) || newVal.length < oldVal.length) {
            this.removeVariationSizeWish(newVal, oldVal);
          }
        }
      }
    },
    'formData.category_id': {
      handler: function handler(newValue, oldValue) {
        if (newValue !== oldValue) {
          this.emptyPrvData();

          if (this.formData.product_type === 2) {
            this.getProductCreateDependency(this.formData.category_id);
          }
        }

        if (newValue.length !== 0) {
          this.cat_Selected = true;
        }
      },
      deep: true
    },
    'formData.product_type': {
      handler: function handler(newValue, oldValue) {
        if (newValue !== oldValue) {
          this.emptyPrvData();

          if (this.formData.product_type === 2) {
            this.getProductCreateDependency(this.formData.category_id);
          }
        }
      },
      deep: true
    },
    formDataCheck: {
      handler: function handler(newVal, oldVal) {
        if (newVal !== oldVal) {
          this.btnDisabled = false;
        }
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/attachment/SingleAttachment.vue?vue&type=template&id=dd41c6c8&scoped=true&":
/*!******************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/attachment/SingleAttachment.vue?vue&type=template&id=dd41c6c8&scoped=true& ***!
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
  return _c("div", { attrs: { id: "attachment" } }, [
    _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-12" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("input", {
            ref: "files",
            staticClass: "hidden",
            attrs: { type: "file", id: "file_upload" },
            on: { change: _vm.uploadFile }
          }),
          _vm._v(" "),
          _vm._m(0)
        ])
      ])
    ]),
    _vm._v(" "),
    _vm.singleAttachment
      ? _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-lg-4 col-sm-4" }, [
            _c("div", { staticClass: "thumbnail" }, [
              _c("div", { staticClass: "thumb" }, [
                _c("img", { attrs: { src: _vm.singleAttachment.img, alt: "" } })
              ])
            ])
          ])
        ])
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/product/CreateProduct.vue?vue&type=template&id=46bbc058&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/product/CreateProduct.vue?vue&type=template&id=46bbc058&scoped=true& ***!
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
  return _c("div", { attrs: { id: "CreateProduct" } }, [
    _c("div", { staticClass: "content" }, [
      _c("div", { staticClass: "panel panel-info" }, [
        _vm._m(0),
        _vm._v(" "),
        _c("div", { staticClass: "panel-body" }, [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-md-12" }, [
              _c("div", { staticClass: "form-group" }, [
                _vm._m(1),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.formData.product_name,
                      expression: "formData.product_name"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: {
                    type: "text",
                    placeholder: "Product name",
                    required: ""
                  },
                  domProps: { value: _vm.formData.product_name },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(
                        _vm.formData,
                        "product_name",
                        $event.target.value
                      )
                    }
                  }
                })
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-md-3" }, [
              _c(
                "div",
                { staticClass: "form-group" },
                [
                  _vm._m(2),
                  _vm._v(" "),
                  _c("treeselect", {
                    attrs: {
                      options: _vm.treeList,
                      multiple: false,
                      normalizer: _vm.normalizer
                    },
                    model: {
                      value: _vm.formData.category_id,
                      callback: function($$v) {
                        _vm.$set(_vm.formData, "category_id", $$v)
                      },
                      expression: "formData.category_id"
                    }
                  })
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-3" }, [
              _c(
                "div",
                { staticClass: "form-group" },
                [
                  _c("label", { staticClass: "control-label" }, [
                    _vm._v("Brand:")
                  ]),
                  _vm._v(" "),
                  _c("v-select", {
                    attrs: {
                      label: "text",
                      options: _vm.brandList,
                      reduce: function(text) {
                        return text.id
                      }
                    },
                    model: {
                      value: _vm.formData.brand_id,
                      callback: function($$v) {
                        _vm.$set(_vm.formData, "brand_id", $$v)
                      },
                      expression: "formData.brand_id"
                    }
                  })
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-3" }, [
              _c(
                "div",
                { staticClass: "form-group" },
                [
                  _vm._m(3),
                  _vm._v(" "),
                  _c("v-select", {
                    attrs: {
                      label: "text",
                      options: _vm.sellerListData,
                      reduce: function(text) {
                        return text.id
                      }
                    },
                    model: {
                      value: _vm.formData.seller_id,
                      callback: function($$v) {
                        _vm.$set(_vm.formData, "seller_id", $$v)
                      },
                      expression: "formData.seller_id"
                    }
                  })
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-3" }, [
              _c("div", { staticClass: "form-group" }, [
                _vm._m(4),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("label", { staticClass: "radio-inline" }, [
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.formData.product_type,
                        expression: "formData.product_type"
                      }
                    ],
                    staticClass: "styled",
                    attrs: {
                      type: "radio",
                      name: "product_type",
                      checked: "checked"
                    },
                    domProps: {
                      value: 1,
                      checked: _vm._q(_vm.formData.product_type, 1)
                    },
                    on: {
                      change: function($event) {
                        return _vm.$set(_vm.formData, "product_type", 1)
                      }
                    }
                  }),
                  _vm._v(
                    "\n                                Simple Product\n                            "
                  )
                ]),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("label", { staticClass: "radio-inline" }, [
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.formData.product_type,
                        expression: "formData.product_type"
                      }
                    ],
                    staticClass: "styled",
                    attrs: { type: "radio", name: "product_type" },
                    domProps: {
                      value: 2,
                      checked: _vm._q(_vm.formData.product_type, 2)
                    },
                    on: {
                      change: function($event) {
                        return _vm.$set(_vm.formData, "product_type", 2)
                      }
                    }
                  }),
                  _vm._v(
                    "\n                                Variation Product\n                            "
                  )
                ])
              ])
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _c(
        "div",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.cat_Selected,
              expression: "cat_Selected"
            }
          ]
        },
        [
          _c("div", { staticClass: "panel" }, [
            _vm._m(5),
            _vm._v(" "),
            _c("div", { staticClass: "panel-body" }, [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-12" }, [
                  _c(
                    "div",
                    { staticClass: "form-group" },
                    [
                      _vm._m(6),
                      _vm._v(" "),
                      _c("vue-editor", {
                        attrs: { id: "highlight" },
                        model: {
                          value: _vm.formData.highlight,
                          callback: function($$v) {
                            _vm.$set(_vm.formData, "highlight", $$v)
                          },
                          expression: "formData.highlight"
                        }
                      })
                    ],
                    1
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-12" }, [
                  _c(
                    "div",
                    { staticClass: "form-group" },
                    [
                      _vm._m(7),
                      _vm._v(" "),
                      _c("vue-editor", {
                        attrs: { id: "description" },
                        model: {
                          value: _vm.formData.description,
                          callback: function($$v) {
                            _vm.$set(_vm.formData, "description", $$v)
                          },
                          expression: "formData.description"
                        }
                      })
                    ],
                    1
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-6" }, [
                  _c(
                    "div",
                    { staticClass: "form-group" },
                    [
                      _vm._m(8),
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
                _c("div", { staticClass: "col-md-3" }, [
                  _c(
                    "div",
                    { staticClass: "form-group" },
                    [
                      _vm._m(9),
                      _vm._v(" "),
                      _c("v-select", {
                        attrs: {
                          label: "text",
                          options: _vm.tagList,
                          multiple: true,
                          reduce: function(text) {
                            return text.id
                          }
                        },
                        model: {
                          value: _vm.formData.tag_ids,
                          callback: function($$v) {
                            _vm.$set(_vm.formData, "tag_ids", $$v)
                          },
                          expression: "formData.tag_ids"
                        }
                      })
                    ],
                    1
                  )
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "panel" }, [
            _vm._m(10),
            _vm._v(" "),
            _c("div", { staticClass: "panel-body" }, [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", { staticClass: "control-label" }, [
                      _vm._v("Warranty Period:")
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.formData.warranty_period,
                          expression: "formData.warranty_period"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "number",
                        maxlength: "2",
                        placeholder: "Total Number of Days"
                      },
                      domProps: { value: _vm.formData.warranty_period },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.formData,
                            "warranty_period",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-9" }, [
                  _c(
                    "div",
                    { staticClass: "form-group" },
                    [
                      _c("label", { staticClass: "control-label" }, [
                        _vm._v("Warranty Policy:")
                      ]),
                      _vm._v(" "),
                      _c("vue-editor", {
                        attrs: { id: "policy" },
                        model: {
                          value: _vm.formData.warranty_policy,
                          callback: function($$v) {
                            _vm.$set(_vm.formData, "warranty_policy", $$v)
                          },
                          expression: "formData.warranty_policy"
                        }
                      })
                    ],
                    1
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", { staticClass: "control-label" }, [
                      _vm._v("Main Material:")
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.formData.main_materials,
                          expression: "formData.main_materials"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { type: "text", placeholder: "Main Material" },
                      domProps: { value: _vm.formData.main_materials },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.formData,
                            "main_materials",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", { staticClass: "control-label" }, [
                      _vm._v("Product Model:")
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.formData.product_model,
                          expression: "formData.product_model"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { type: "text", placeholder: "Product Model" },
                      domProps: { value: _vm.formData.product_model },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.formData,
                            "product_model",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", { staticClass: "control-label" }, [
                      _vm._v("Number of pieces:")
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.formData.num_of_pieces,
                          expression: "formData.num_of_pieces"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { type: "text", placeholder: "Number of Pieces" },
                      domProps: { value: _vm.formData.num_of_pieces },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.formData,
                            "num_of_pieces",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-3" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", { staticClass: "control-label" }, [
                      _vm._v("Color Shade/Number:")
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.formData.color_shade,
                          expression: "formData.color_shade"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { type: "text", placeholder: "Color Shade" },
                      domProps: { value: _vm.formData.color_shade },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.formData,
                            "color_shade",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-12" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", { staticClass: "control-label" }, [
                      _vm._v("Extra Details:")
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.formData.extra_details,
                          expression: "formData.extra_details"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        maxlength: "255",
                        placeholder: "Extra Details"
                      },
                      domProps: { value: _vm.formData.extra_details },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.formData,
                            "extra_details",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _vm.formData.product_type === 1
            ? _c("div", { staticClass: "panel panel-warning" }, [
                _vm._m(11),
                _vm._v(" "),
                _c("div", { staticClass: "panel-body" }, [
                  _c("div", { staticClass: "form-group row" }, [
                    _c("div", { staticClass: "col-md-4" }, [
                      _c("div", { staticClass: "row" }, [
                        _vm._m(12),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-lg-9" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.seller_sku,
                                expression: "seller_sku"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: { type: "text", placeholder: "Seller Sku" },
                            domProps: { value: _vm.seller_sku },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.seller_sku = $event.target.value
                              }
                            }
                          })
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-4" }, [
                      _c("div", { staticClass: "row" }, [
                        _vm._m(13),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-lg-8" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.qty,
                                expression: "qty"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "number",
                              placeholder: "Product qty"
                            },
                            domProps: { value: _vm.qty },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.qty = $event.target.value
                              }
                            }
                          })
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-4" }, [
                      _c("div", { staticClass: "row" }, [
                        _vm._m(14),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-lg-8" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.price,
                                expression: "price"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "number",
                              placeholder: "product price"
                            },
                            domProps: { value: _vm.price },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.price = $event.target.value
                              }
                            }
                          })
                        ])
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _vm._m(15),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-11" }, [
                      _c("div", { attrs: { id: "simProductImg" } }, [
                        _c("div", { staticClass: "row" }, [
                          _c("div", { staticClass: "col-md-12" }, [
                            _c("div", { staticClass: "form-group" }, [
                              _c("input", {
                                ref: "files",
                                staticClass: "hidden",
                                attrs: {
                                  type: "file",
                                  accept: "image/*",
                                  multiple: _vm.multi_file,
                                  id: "simpleProductImg"
                                },
                                on: { change: _vm.uploadImage }
                              }),
                              _vm._v(" "),
                              _vm._m(16)
                            ])
                          ])
                        ]),
                        _vm._v(" "),
                        _vm.productImages
                          ? _c(
                              "div",
                              { staticClass: "row" },
                              _vm._l(_vm.productImages, function(image) {
                                return _c(
                                  "div",
                                  {
                                    key: image.id,
                                    staticClass:
                                      "col-xs-4 col-sm-4 col-md-3 col-lg-2"
                                  },
                                  [
                                    _c("div", { staticClass: "thumbnail" }, [
                                      _c("div", { staticClass: "thumb" }, [
                                        _c("img", {
                                          staticClass:
                                            "img-thumbnail img-responsive",
                                          attrs: { src: image.img, alt: "" }
                                        }),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          { staticClass: "caption-overflow" },
                                          [
                                            _c("span", [
                                              _c(
                                                "a",
                                                {
                                                  staticClass:
                                                    "btn btn-danger border-danger text-white  btn-icon btn-rounded",
                                                  attrs: { href: "#" },
                                                  on: {
                                                    click: function($event) {
                                                      $event.preventDefault()
                                                      return _vm.removeAttachment(
                                                        image.id
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _c("i", {
                                                    staticClass: "icon-trash"
                                                  })
                                                ]
                                              )
                                            ])
                                          ]
                                        )
                                      ])
                                    ])
                                  ]
                                )
                              }),
                              0
                            )
                          : _vm._e()
                      ])
                    ])
                  ])
                ])
              ])
            : _vm._e(),
          _vm._v(" "),
          _vm.formData.product_type === 2
            ? _c("div", { staticClass: "panel panel-warning" }, [
                _vm._m(17),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "panel-body" },
                  [
                    _vm._l(_vm.total, function(i) {
                      return _c("div", { key: i, attrs: { id: i } }, [
                        _c("div", { staticClass: "form-group row" }, [
                          _vm._m(18, true),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "col-lg-4",
                              on: {
                                click: function($event) {
                                  return _vm.priIdIndex(i)
                                }
                              }
                            },
                            [
                              _c("v-select", {
                                attrs: {
                                  label: "text",
                                  options: _vm.productColors,
                                  reduce: function(text) {
                                    return text.id
                                  }
                                },
                                model: {
                                  value: _vm.pri_id[i],
                                  callback: function($$v) {
                                    _vm.$set(_vm.pri_id, i, $$v)
                                  },
                                  expression: "pri_id[i]"
                                }
                              })
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-lg-1" }, [
                            _c(
                              "span",
                              {
                                staticClass: "text-danger",
                                on: {
                                  click: function($event) {
                                    return _vm.removePriIdData(i)
                                  }
                                }
                              },
                              [_c("i", { staticClass: "icon-trash" })]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            directives: [
                              {
                                name: "show",
                                rawName: "v-show",
                                value: _vm.pri_id[i],
                                expression: "pri_id[i]"
                              }
                            ],
                            staticClass: "form-group row"
                          },
                          [
                            _vm._m(19, true),
                            _vm._v(" "),
                            _c("div", { staticClass: "col-lg-10" }, [
                              _c("div", { attrs: { id: "productImage" } }, [
                                _c("div", { staticClass: "row" }, [
                                  _c("div", { staticClass: "col-md-12" }, [
                                    _c("div", { staticClass: "form-group" }, [
                                      _c("input", {
                                        ref: "files",
                                        refInFor: true,
                                        staticClass: "hidden",
                                        attrs: {
                                          type: "file",
                                          accept: "image/*",
                                          multiple: _vm.multi_file,
                                          id: _vm.vari_id + _vm.pri_id[i]
                                        },
                                        on: { change: _vm.uploadImage }
                                      }),
                                      _vm._v(" "),
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "btn btn-info btn-md btn-block",
                                          attrs: {
                                            for: _vm.vari_id + _vm.pri_id[i]
                                          },
                                          on: {
                                            click: function($event) {
                                              return _vm.addPriId(_vm.pri_id[i])
                                            }
                                          }
                                        },
                                        [
                                          _c("i", {
                                            staticClass:
                                              "icon-file-media text-left"
                                          }),
                                          _vm._v(" Select File")
                                        ]
                                      )
                                    ])
                                  ])
                                ]),
                                _vm._v(" "),
                                _vm.productImages
                                  ? _c(
                                      "div",
                                      { staticClass: "row" },
                                      _vm._l(
                                        _vm.productImages.filter(function(img) {
                                          return img.pri_id == _vm.pri_id[i]
                                        }),
                                        function(image, index) {
                                          return _c(
                                            "div",
                                            {
                                              key: image.id,
                                              staticClass:
                                                "col-xs-4 col-sm-4 col-lg-1"
                                            },
                                            [
                                              _c(
                                                "div",
                                                { staticClass: "thumbnail" },
                                                [
                                                  _c(
                                                    "div",
                                                    { staticClass: "thumb" },
                                                    [
                                                      _c("img", {
                                                        attrs: {
                                                          src: image.img,
                                                          alt: ""
                                                        }
                                                      }),
                                                      _vm._v(" "),
                                                      _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "caption-overflow"
                                                        },
                                                        [
                                                          _c("span", [
                                                            _c(
                                                              "a",
                                                              {
                                                                staticClass:
                                                                  "btn btn-danger border-danger text-white  btn-icon btn-rounded",
                                                                attrs: {
                                                                  href: "#"
                                                                },
                                                                on: {
                                                                  click: function(
                                                                    $event
                                                                  ) {
                                                                    $event.preventDefault()
                                                                    return _vm.removeAttachment(
                                                                      image.id
                                                                    )
                                                                  }
                                                                }
                                                              },
                                                              [
                                                                _c("i", {
                                                                  staticClass:
                                                                    "icon-trash"
                                                                })
                                                              ]
                                                            )
                                                          ])
                                                        ]
                                                      )
                                                    ]
                                                  )
                                                ]
                                              )
                                            ]
                                          )
                                        }
                                      ),
                                      0
                                    )
                                  : _vm._e()
                              ])
                            ])
                          ]
                        )
                      ])
                    }),
                    _vm._v(" "),
                    _c("div", { staticClass: "form-group row" }, [
                      _vm._m(20),
                      _vm._v(" "),
                      _c(
                        "div",
                        { staticClass: "col-lg-4 selectMulti" },
                        [
                          _c("v-select", {
                            attrs: {
                              label: "text",
                              options: _vm.sizes,
                              multiple: true,
                              reduce: function(text) {
                                return text.id
                              }
                            },
                            model: {
                              value: _vm.sec_id,
                              callback: function($$v) {
                                _vm.sec_id = $$v
                              },
                              expression: "sec_id"
                            }
                          })
                        ],
                        1
                      )
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-12" }, [
                        _c(
                          "div",
                          {
                            staticClass: "table-responsive",
                            staticStyle: { border: "1px solid #ddd" }
                          },
                          [
                            _c(
                              "table",
                              { staticClass: "table table-striped table-sm" },
                              [
                                _vm._m(21),
                                _vm._v(" "),
                                _c(
                                  "tbody",
                                  _vm._l(_vm.variations, function(
                                    variation,
                                    index
                                  ) {
                                    return _vm.variations
                                      ? _c("tr", { key: index }, [
                                          _c("td", [
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "checkbox checkbox-switchery"
                                              },
                                              [
                                                _c("label", [
                                                  _c("input", {
                                                    directives: [
                                                      {
                                                        name: "model",
                                                        rawName: "v-model",
                                                        value:
                                                          _vm.variations[index]
                                                            .status,
                                                        expression:
                                                          "variations[index].status"
                                                      }
                                                    ],
                                                    staticClass: "switchery",
                                                    attrs: { type: "checkbox" },
                                                    domProps: {
                                                      checked: variation.status,
                                                      checked: Array.isArray(
                                                        _vm.variations[index]
                                                          .status
                                                      )
                                                        ? _vm._i(
                                                            _vm.variations[
                                                              index
                                                            ].status,
                                                            null
                                                          ) > -1
                                                        : _vm.variations[index]
                                                            .status
                                                    },
                                                    on: {
                                                      change: function($event) {
                                                        var $$a =
                                                            _vm.variations[
                                                              index
                                                            ].status,
                                                          $$el = $event.target,
                                                          $$c = $$el.checked
                                                            ? true
                                                            : false
                                                        if (
                                                          Array.isArray($$a)
                                                        ) {
                                                          var $$v = null,
                                                            $$i = _vm._i(
                                                              $$a,
                                                              $$v
                                                            )
                                                          if ($$el.checked) {
                                                            $$i < 0 &&
                                                              _vm.$set(
                                                                _vm.variations[
                                                                  index
                                                                ],
                                                                "status",
                                                                $$a.concat([
                                                                  $$v
                                                                ])
                                                              )
                                                          } else {
                                                            $$i > -1 &&
                                                              _vm.$set(
                                                                _vm.variations[
                                                                  index
                                                                ],
                                                                "status",
                                                                $$a
                                                                  .slice(0, $$i)
                                                                  .concat(
                                                                    $$a.slice(
                                                                      $$i + 1
                                                                    )
                                                                  )
                                                              )
                                                          }
                                                        } else {
                                                          _vm.$set(
                                                            _vm.variations[
                                                              index
                                                            ],
                                                            "status",
                                                            $$c
                                                          )
                                                        }
                                                      }
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  variation.status
                                                    ? _c(
                                                        "span",
                                                        {
                                                          staticClass:
                                                            "text-success text-bold"
                                                        },
                                                        [_vm._v("Active")]
                                                      )
                                                    : _c(
                                                        "span",
                                                        {
                                                          staticClass:
                                                            "text-danger text-bold"
                                                        },
                                                        [_vm._v("Inactive")]
                                                      )
                                                ])
                                              ]
                                            )
                                          ]),
                                          _vm._v(" "),
                                          _c("td", [
                                            _c("span", {
                                              domProps: {
                                                innerHTML: _vm._s(
                                                  variation.color_name
                                                )
                                              }
                                            })
                                          ]),
                                          _vm._v(" "),
                                          _c("td", [
                                            _c("span", {
                                              domProps: {
                                                innerHTML: _vm._s(
                                                  variation.size_name
                                                )
                                              }
                                            })
                                          ]),
                                          _vm._v(" "),
                                          _c("td", [
                                            _c("input", {
                                              directives: [
                                                {
                                                  name: "model",
                                                  rawName: "v-model",
                                                  value:
                                                    _vm.variations[index]
                                                      .seller_sku,
                                                  expression:
                                                    "variations[index].seller_sku"
                                                }
                                              ],
                                              staticClass: "form-control",
                                              attrs: {
                                                type: "text",
                                                maxlength: "255"
                                              },
                                              domProps: {
                                                value:
                                                  _vm.variations[index]
                                                    .seller_sku
                                              },
                                              on: {
                                                input: function($event) {
                                                  if ($event.target.composing) {
                                                    return
                                                  }
                                                  _vm.$set(
                                                    _vm.variations[index],
                                                    "seller_sku",
                                                    $event.target.value
                                                  )
                                                }
                                              }
                                            })
                                          ]),
                                          _vm._v(" "),
                                          _c("td", [
                                            _c("input", {
                                              directives: [
                                                {
                                                  name: "model",
                                                  rawName: "v-model",
                                                  value:
                                                    _vm.variations[index].qty,
                                                  expression:
                                                    "variations[index].qty"
                                                }
                                              ],
                                              staticClass: "form-control",
                                              attrs: { type: "number" },
                                              domProps: {
                                                value: _vm.variations[index].qty
                                              },
                                              on: {
                                                input: function($event) {
                                                  if ($event.target.composing) {
                                                    return
                                                  }
                                                  _vm.$set(
                                                    _vm.variations[index],
                                                    "qty",
                                                    $event.target.value
                                                  )
                                                }
                                              }
                                            })
                                          ]),
                                          _vm._v(" "),
                                          _c("td", [
                                            _c("input", {
                                              directives: [
                                                {
                                                  name: "model",
                                                  rawName: "v-model",
                                                  value:
                                                    _vm.variations[index].price,
                                                  expression:
                                                    "variations[index].price"
                                                }
                                              ],
                                              staticClass: "form-control",
                                              attrs: {
                                                type: "number",
                                                step: "0.01"
                                              },
                                              domProps: {
                                                value:
                                                  _vm.variations[index].price
                                              },
                                              on: {
                                                input: function($event) {
                                                  if ($event.target.composing) {
                                                    return
                                                  }
                                                  _vm.$set(
                                                    _vm.variations[index],
                                                    "price",
                                                    $event.target.value
                                                  )
                                                }
                                              }
                                            })
                                          ]),
                                          _vm._v(" "),
                                          _c(
                                            "td",
                                            { staticClass: "text-center" },
                                            [
                                              _c(
                                                "ul",
                                                { staticClass: "icons-list" },
                                                [
                                                  _c("li", [
                                                    _c(
                                                      "a",
                                                      {
                                                        staticClass:
                                                          "text-danger",
                                                        attrs: { href: "#" },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            $event.preventDefault()
                                                            return _vm.removeVariationData(
                                                              index
                                                            )
                                                          }
                                                        }
                                                      },
                                                      [
                                                        _c("i", {
                                                          staticClass:
                                                            "icon-trash"
                                                        })
                                                      ]
                                                    )
                                                  ])
                                                ]
                                              )
                                            ]
                                          )
                                        ])
                                      : _vm._e()
                                  }),
                                  0
                                )
                              ]
                            )
                          ]
                        )
                      ])
                    ])
                  ],
                  2
                )
              ])
            : _vm._e(),
          _vm._v(" "),
          _c("div", { staticClass: "sticky-submit-btn" }, [
            _c("div", { staticClass: "panel panel-default" }, [
              _c("div", { staticClass: "panel-body" }, [
                _c("div", { staticClass: "row" }, [
                  _c("div", { staticClass: "col-md-2" }),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-2 col-md-offset-6" }, [
                    _c("div", { staticClass: "form-group" }, [
                      _c(
                        "label",
                        {
                          staticClass: "checkbox-style",
                          attrs: { for: "paypal_payment" }
                        },
                        [
                          _vm.formData.product_status
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
                                value: _vm.formData.product_status,
                                expression: "formData.product_status"
                              }
                            ],
                            attrs: { type: "checkbox", id: "paypal_payment" },
                            domProps: {
                              checked: _vm.formData.product_status,
                              checked: Array.isArray(
                                _vm.formData.product_status
                              )
                                ? _vm._i(_vm.formData.product_status, null) > -1
                                : _vm.formData.product_status
                            },
                            on: {
                              change: function($event) {
                                var $$a = _vm.formData.product_status,
                                  $$el = $event.target,
                                  $$c = $$el.checked ? true : false
                                if (Array.isArray($$a)) {
                                  var $$v = null,
                                    $$i = _vm._i($$a, $$v)
                                  if ($$el.checked) {
                                    $$i < 0 &&
                                      _vm.$set(
                                        _vm.formData,
                                        "product_status",
                                        $$a.concat([$$v])
                                      )
                                  } else {
                                    $$i > -1 &&
                                      _vm.$set(
                                        _vm.formData,
                                        "product_status",
                                        $$a
                                          .slice(0, $$i)
                                          .concat($$a.slice($$i + 1))
                                      )
                                  }
                                } else {
                                  _vm.$set(_vm.formData, "product_status", $$c)
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
                    _c(
                      "div",
                      {
                        staticClass: "text-right form-group",
                        staticStyle: { "margin-bottom": "0px" }
                      },
                      [
                        _c(
                          "button",
                          {
                            staticClass: "btn btn-success btn-block",
                            attrs: {
                              type: "submit",
                              disabled: _vm.btnDisabled
                            },
                            on: {
                              submit: function($event) {
                                $event.preventDefault()
                                return _vm.submitFrom($event)
                              },
                              click: function($event) {
                                $event.preventDefault()
                                return _vm.submitFrom($event)
                              }
                            }
                          },
                          [
                            _vm._v("Save Product "),
                            _c("i", {
                              staticClass: "icon-arrow-right14 position-right"
                            })
                          ]
                        )
                      ]
                    )
                  ])
                ])
              ])
            ])
          ])
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading" }, [
      _c("h5", { staticClass: "panel-title" }, [_vm._v("What You're Selling")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "control-label" }, [
      _vm._v("Product Name: "),
      _c("span", { staticClass: "text text-danger text-bold h4" }, [
        _vm._v("*")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "control-label" }, [
      _vm._v("Category: "),
      _c("span", { staticClass: "text text-danger text-bold " }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "control-label" }, [
      _vm._v("Seller: "),
      _c("span", { staticClass: "text text-danger text-bold " }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "control-label" }, [
      _vm._v("Product Type: "),
      _c("span", { staticClass: "text text-danger text-bold" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading bg-teal-700" }, [
      _c("h5", { staticClass: "panel-title" }, [_vm._v("Basic Information")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "control-label" }, [
      _vm._v("Highlights: "),
      _c("span", { staticClass: "text text-danger text-bold h4" }, [
        _vm._v("*")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "control-label" }, [
      _vm._v("Product Description: "),
      _c("span", { staticClass: "text text-danger text-bold h4" }, [
        _vm._v("*")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: " control-label" }, [
      _vm._v("Product Thumb Image: "),
      _c("span", { staticClass: "text text-danger text-bold h4" }, [
        _vm._v("*")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "control-label" }, [
      _vm._v("Tags: "),
      _c("span", { staticClass: "text text-danger text-bold " }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading bg-indigo-600" }, [
      _c("h5", { staticClass: "panel-title" }, [
        _vm._v("More Product Details")
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "heading-elements" }, [
        _c("ul", { staticClass: "icons-list" }, [
          _c("li", [_c("a", { attrs: { "data-action": "collapse" } })])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading" }, [
      _c("h5", { staticClass: "panel-title" }, [
        _vm._v("Product SKU information")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "col-lg-3 control-label" }, [
      _vm._v("Seller SKU: "),
      _c("span", { staticClass: "text text-danger text-bold h4" }, [
        _vm._v("*")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "col-lg-4 control-label" }, [
      _vm._v("Product Qty: "),
      _c("span", { staticClass: "text text-danger text-bold h4" }, [
        _vm._v("*")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "col-lg-4 control-label" }, [
      _vm._v("Product Price: "),
      _c("span", { staticClass: "text text-danger text-bold h4" }, [
        _vm._v("*")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "col-lg-1 control-label" }, [
      _vm._v("Images: "),
      _c("span", { staticClass: "text text-danger text-bold h4" }, [
        _vm._v("*")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "label",
      {
        staticClass: "btn btn-info btn-md btn-block",
        attrs: { for: "simpleProductImg" }
      },
      [
        _c("i", { staticClass: "icon-file-media text-left" }),
        _vm._v(" Select File")
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading" }, [
      _c("h5", { staticClass: "panel-title" }, [
        _vm._v("Product SKU information")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "col-lg-2 control-label" }, [
      _vm._v("Color: "),
      _c("span", { staticClass: "text text-danger text-bold h4" }, [
        _vm._v("*")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "col-lg-2 control-label" }, [
      _vm._v("Images: "),
      _c("span", { staticClass: "text text-danger text-bold h4" }, [
        _vm._v("*")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "col-lg-2 control-label" }, [
      _vm._v("Size: "),
      _c("span", { staticClass: "text text-danger text-bold h4" }, [
        _vm._v("*")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", { staticStyle: { "background-color": "#f5f2f2" } }, [
      _c("tr", [
        _c("td", { staticClass: "col-md-1" }, [
          _vm._v("Availability "),
          _c("span", { staticClass: "text text-danger text-semibold" }, [
            _vm._v("*")
          ])
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "col-md-2" }, [
          _vm._v("Color Family "),
          _c("span", { staticClass: "text text-danger text-semibold" }, [
            _vm._v("*")
          ])
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "col-md-1" }, [
          _vm._v("Size "),
          _c("span", { staticClass: "text text-danger text-semibold" }, [
            _vm._v("*")
          ])
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "col-md-3" }, [
          _vm._v("Seller SKU "),
          _c("span", { staticClass: "text text-danger text-semibold" }, [
            _vm._v("*")
          ])
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "col-md-1" }, [
          _vm._v("Quantity "),
          _c("span", { staticClass: "text text-danger text-semibold" }, [
            _vm._v("*")
          ])
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "col-md-2" }, [
          _vm._v("Price "),
          _c("span", { staticClass: "text text-danger text-semibold" }, [
            _vm._v("*")
          ])
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "col-md-2 text-center" }, [_vm._v("Remove")])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/attachment/SingleAttachment.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/components/attachment/SingleAttachment.vue ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SingleAttachment_vue_vue_type_template_id_dd41c6c8_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SingleAttachment.vue?vue&type=template&id=dd41c6c8&scoped=true& */ "./resources/js/components/attachment/SingleAttachment.vue?vue&type=template&id=dd41c6c8&scoped=true&");
/* harmony import */ var _SingleAttachment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SingleAttachment.vue?vue&type=script&lang=js& */ "./resources/js/components/attachment/SingleAttachment.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _SingleAttachment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _SingleAttachment_vue_vue_type_template_id_dd41c6c8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _SingleAttachment_vue_vue_type_template_id_dd41c6c8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "dd41c6c8",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/attachment/SingleAttachment.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/attachment/SingleAttachment.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/attachment/SingleAttachment.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleAttachment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./SingleAttachment.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/attachment/SingleAttachment.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleAttachment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/attachment/SingleAttachment.vue?vue&type=template&id=dd41c6c8&scoped=true&":
/*!************************************************************************************************************!*\
  !*** ./resources/js/components/attachment/SingleAttachment.vue?vue&type=template&id=dd41c6c8&scoped=true& ***!
  \************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleAttachment_vue_vue_type_template_id_dd41c6c8_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./SingleAttachment.vue?vue&type=template&id=dd41c6c8&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/attachment/SingleAttachment.vue?vue&type=template&id=dd41c6c8&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleAttachment_vue_vue_type_template_id_dd41c6c8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleAttachment_vue_vue_type_template_id_dd41c6c8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/product/CreateProduct.vue":
/*!***********************************************************!*\
  !*** ./resources/js/components/product/CreateProduct.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CreateProduct_vue_vue_type_template_id_46bbc058_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CreateProduct.vue?vue&type=template&id=46bbc058&scoped=true& */ "./resources/js/components/product/CreateProduct.vue?vue&type=template&id=46bbc058&scoped=true&");
/* harmony import */ var _CreateProduct_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CreateProduct.vue?vue&type=script&lang=js& */ "./resources/js/components/product/CreateProduct.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CreateProduct_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CreateProduct_vue_vue_type_template_id_46bbc058_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CreateProduct_vue_vue_type_template_id_46bbc058_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "46bbc058",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/product/CreateProduct.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/product/CreateProduct.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/product/CreateProduct.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateProduct_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./CreateProduct.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/product/CreateProduct.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateProduct_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/product/CreateProduct.vue?vue&type=template&id=46bbc058&scoped=true&":
/*!******************************************************************************************************!*\
  !*** ./resources/js/components/product/CreateProduct.vue?vue&type=template&id=46bbc058&scoped=true& ***!
  \******************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateProduct_vue_vue_type_template_id_46bbc058_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./CreateProduct.vue?vue&type=template&id=46bbc058&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/product/CreateProduct.vue?vue&type=template&id=46bbc058&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateProduct_vue_vue_type_template_id_46bbc058_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CreateProduct_vue_vue_type_template_id_46bbc058_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);