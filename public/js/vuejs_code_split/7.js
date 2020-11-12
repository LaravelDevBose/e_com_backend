(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[7],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/products/ProductsSidebarSection.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/products/ProductsSidebarSection.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var _section_HotDealCarouselSection__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../section/HotDealCarouselSection */ "./resources/views/frontend/components/section/HotDealCarouselSection.vue");
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


/* harmony default export */ __webpack_exports__["default"] = ({
  name: "ProductsSidebarSection",
  components: {
    HotDealCarouselSection: _section_HotDealCarouselSection__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      sorting_data: {
        brand_ids: [],
        color_ids: [],
        size_ids: [],
        price: {
          min: 0,
          max: 10000
        }
      }
    };
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['getProductsSidebarData', 'updateSortingData'])),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['categories', 'slugsData', 'colorList', 'sizeList', 'brandList', 'tagList']), {
    checkSlugsData: function checkSlugsData() {
      return JSON.parse(JSON.stringify(this.slugsData));
    },
    checkSortingData: function checkSortingData() {
      return JSON.parse(JSON.stringify(this.sorting_data));
    }
  }),
  watch: {
    checkSlugsData: {
      handler: function handler(newValue, oldValue) {
        if (newValue !== oldValue) {
          this.getProductsSidebarData();
        }
      },
      deep: true
    },
    checkSortingData: {
      handler: function handler(newVal, oldVal) {
        if (newVal !== oldVal) {
          this.updateSortingData(this.sorting_data);
        }
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/products/ProductsToolbarBottom.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/products/ProductsToolbarBottom.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "ProductsToolbarBottom",
  data: function data() {
    return {
      reqData: {
        page: 1,
        per_page: 15
      }
    };
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['updateSortingData']), {
    goToNext: function goToNext() {
      this.reqData.page = this.nextPage;
      this.$router.push({
        name: this.$route.name,
        query: {
          page: this.reqData.page
        }
      });
    },
    goToPrev: function goToPrev() {
      this.reqData.page = this.prevPage;
      this.$router.push({
        name: this.$route.name,
        query: {
          page: this.reqData.page
        }
      });
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['metaData']), {
    nextPage: function nextPage() {
      if (!this.metaData || this.metaData.current_page === this.metaData.last_page) {
        return;
      }

      return this.metaData.current_page + 1;
    },
    prevPage: function prevPage() {
      if (!this.metaData || this.metaData.current_page === 1) {
        return;
      }

      return this.metaData.current_page - 1;
    },
    paginatonCount: function paginatonCount() {
      if (!this.metaData) {
        return;
      }

      var _this$metaData = this.metaData,
          current_page = _this$metaData.current_page,
          last_page = _this$metaData.last_page;
      return "".concat(current_page, " of ").concat(last_page);
    },
    checkReqData: function checkReqData() {
      return JSON.parse(JSON.stringify(this.reqData));
    }
  }),
  watch: {
    checkReqData: {
      handler: function handler(newVal, oldVal) {
        if (newVal !== oldVal) {
          console.log(this.reqData);
          this.updateSortingData(this.reqData);
        }
      },
      deep: true
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/products/ProductsToolbarTop.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/products/ProductsToolbarTop.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "ProductsToolbarTop",
  data: function data() {
    return {
      view: 1,
      reqData: {
        order_by: 'name',
        order_type: 'asc'
      }
    };
  },

  /*beforeDestroy() {
      this.$store.state.view = 1;
  },*/
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['updateViewAsData', 'updateSortingData']), {
    updateProductViewAs: function updateProductViewAs(data) {
      this.view = data;
      this.updateViewAsData(this.view);
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['pageTitle']), {
    checkReqData: function checkReqData() {
      return JSON.parse(JSON.stringify(this.reqData));
    }
  }),
  watch: {
    checkReqData: {
      handler: function handler(newVal, oldVal) {
        if (newVal !== oldVal) {
          this.updateSortingData(this.reqData);
        }
      }
    }
  }
});

/***/ }),

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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductsPage.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/ProductsPage.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_products_ProductsSidebarSection__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/products/ProductsSidebarSection */ "./resources/views/frontend/components/products/ProductsSidebarSection.vue");
/* harmony import */ var _components_products_ProductsToolbarBottom__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/products/ProductsToolbarBottom */ "./resources/views/frontend/components/products/ProductsToolbarBottom.vue");
/* harmony import */ var _components_product_ProductItem__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/product/ProductItem */ "./resources/views/frontend/components/product/ProductItem.vue");
/* harmony import */ var _components_products_ProductsToolbarTop__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../components/products/ProductsToolbarTop */ "./resources/views/frontend/components/products/ProductsToolbarTop.vue");
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_5__);
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






/* harmony default export */ __webpack_exports__["default"] = ({
  name: "ProductsPage",
  components: {
    ProductsToolbarTop: _components_products_ProductsToolbarTop__WEBPACK_IMPORTED_MODULE_3__["default"],
    ProductItem: _components_product_ProductItem__WEBPACK_IMPORTED_MODULE_2__["default"],
    ProductsToolbarBottom: _components_products_ProductsToolbarBottom__WEBPACK_IMPORTED_MODULE_1__["default"],
    ProductsSidebarSection: _components_products_ProductsSidebarSection__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      cat_slider: [],
      owl_carousel: false,
      hotDealOwl: {},
      view: 1
    };
  },
  beforeRouteEnter: function beforeRouteEnter(to, from, next) {
    var req_data = {
      category_slug: '',
      brand_slug: '',
      tag_slug: '',
      section_slug: ''
    };

    if (to.params.hasOwnProperty('category_slug')) {
      req_data.category_slug = to.params.category_slug;
    } else if (to.params.hasOwnProperty('brand_slug')) {
      req_data.brand_slug = to.params.brand_slug;
    } else if (to.params.hasOwnProperty('tag_slug')) {
      req_data.tag_slug = to.params.tag_slug;
    } else if (to.params.hasOwnProperty('section_slug')) {
      req_data.section_slug = to.params.section_slug;
    } else {
      this.$router.push('/page_not_found');
    }

    next(function (vm) {
      return vm.updateSlugData(req_data);
    });
  },
  beforeRouteUpdate: function beforeRouteUpdate(to, from, next) {
    var req_data = {
      category_slug: '',
      brand_slug: '',
      tag_slug: '',
      section_slug: ''
    };

    if (to.params.hasOwnProperty('category_slug')) {
      req_data.category_slug = to.params.category_slug;
    } else if (to.params.hasOwnProperty('brand_slug')) {
      req_data.brand_slug = to.params.brand_slug;
    } else if (to.params.hasOwnProperty('tag_slug')) {
      req_data.tag_slug = to.params.tag_slug;
    } else if (to.params.hasOwnProperty('section_slug')) {
      req_data.section_slug = to.params.section_slug;
    } else {
      this.$router.push('/page_not_found');
    }

    this.updateSlugData(req_data);
    this.getProductList();
    next();
  },
  updated: function updated() {
    this.view = this.viewAs;
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_4__["mapActions"])(['updateSlugData', 'getProductList']), {
    installOwlCarousel: function installOwlCarousel() {
      this.owl_carousel = true;
      this.hotDealOwl = $('.owl-carousel-category');
      var config = this.hotDealOwl.data();
      config.navText = ['', ''];
      config.dotsData = false;
      config.smartSpeed = "800";
      config.loop = true;
      config.rewind = true;
      this.hotDealOwl.owlCarousel(config);
    },
    mapCatSliderData: function mapCatSliderData() {
      var _this = this;

      if (this.categoryInfo !== '') {
        if (this.categoryInfo.attachment) {
          this.cat_slider.push({
            name: this.categoryInfo.name,
            slug: this.categoryInfo.slug,
            image_path: this.categoryInfo.attachment.image_path
          });
        }

        if (this.categoryInfo.children && this.categoryInfo.children.length > 0) {
          var data = {
            name: '',
            slug: '',
            image_path: ''
          };
          this.categoryInfo.children.forEach(function (subCategory) {
            if (subCategory.attachment) {
              data.name = subCategory.name;
              data.slug = subCategory.slug;
              data.image_path = subCategory.attachment.image_path;

              _this.cat_slider.push(data);
            }

            if (subCategory.children && subCategory.children.length > 0) {
              subCategory.children.forEach(function (cat) {
                if (cat.attachment) {
                  data.name = cat.name;
                  data.slug = cat.slug;
                  data.image_path = cat.attachment.image_path;

                  _this.cat_slider.push(data);
                }
              });
            }
          });
        }
      }
    },
    randomNumber: function randomNumber(slug) {
      return Math.floor(Math.random() * (10 - 1 + 1)) + 1 + slug;
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_4__["mapGetters"])(['reqData', 'categoryInfo', 'products', 'viewAs']), {
    checkReqData: function checkReqData() {
      return JSON.parse(JSON.stringify(this.reqData));
    },
    checkCategoryInfo: function checkCategoryInfo() {
      return JSON.parse(JSON.stringify(this.categoryInfo));
    },
    checkViewAs: function checkViewAs() {
      return JSON.parse(JSON.stringify(this.viewAs));
    }
  }),
  watch: {
    checkReqData: {
      handler: function handler(newValue, oldValue) {
        if (newValue !== oldValue) {
          this.getProductList();
        }
      },
      deep: true
    },
    checkCategoryInfo: {
      handler: function handler(newValue, oldValue) {
        if (newValue !== '' && newValue !== oldValue) {
          this.cat_slider.length = 0;
          this.mapCatSliderData();

          if (!this.owl_carousel) {
            vue__WEBPACK_IMPORTED_MODULE_5___default.a.nextTick(function () {
              this.installOwlCarousel();
            }.bind(this));
          } else {
            vue__WEBPACK_IMPORTED_MODULE_5___default.a.nextTick(function () {
              this.hotDealOwl.trigger('destroy.owl.carousel');
              this.installOwlCarousel();
            }.bind(this));
          }
        }
      },
      deep: true
    },
    checkViewAs: {
      handler: function handler(newVal, oldVal) {
        this.view = this.viewAs;
      },
      deep: true
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductsPage.vue?vue&type=style&index=0&id=0106b812&scoped=true&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/ProductsPage.vue?vue&type=style&index=0&id=0106b812&scoped=true&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.width-100[data-v-0106b812]{\n    width: 100%!important;\n    display: block;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductsPage.vue?vue&type=style&index=0&id=0106b812&scoped=true&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/ProductsPage.vue?vue&type=style&index=0&id=0106b812&scoped=true&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductsPage.vue?vue&type=style&index=0&id=0106b812&scoped=true&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductsPage.vue?vue&type=style&index=0&id=0106b812&scoped=true&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/products/ProductsSidebarSection.vue?vue&type=template&id=13798d93&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/products/ProductsSidebarSection.vue?vue&type=template&id=13798d93&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************************************/
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
    [
      _vm.categories && _vm.categories.length > 0
        ? _c("div", { staticClass: "block-sidebar block-sidebar-categorie" }, [
            _vm._m(0),
            _vm._v(" "),
            _c("div", { staticClass: "block-content" }, [
              _c(
                "ul",
                { staticClass: "items" },
                _vm._l(_vm.categories, function(category) {
                  return _c(
                    "li",
                    {
                      key: category.slug,
                      class: {
                        parent:
                          category.children && category.children.length > 0
                      }
                    },
                    [
                      _c(
                        "router-link",
                        {
                          attrs: {
                            to: {
                              name: "Category Products",
                              params: { category_slug: category.slug }
                            }
                          }
                        },
                        [
                          _vm._v(
                            "\n                        " +
                              _vm._s(category.name) +
                              "\n                    "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      category.children && category.children.length > 0
                        ? _c("span", { staticClass: "toggle-submenu" })
                        : _vm._e(),
                      _vm._v(" "),
                      category.children && category.children.length > 0
                        ? _c(
                            "ul",
                            { staticClass: "subcategory" },
                            _vm._l(category.children, function(subCategory) {
                              return _c(
                                "li",
                                {
                                  key: subCategory.slug,
                                  class: {
                                    parent:
                                      subCategory.children &&
                                      subCategory.children.length > 0
                                  }
                                },
                                [
                                  _c(
                                    "router-link",
                                    {
                                      attrs: {
                                        to: {
                                          name: "Category Products",
                                          params: {
                                            category_slug: subCategory.slug
                                          }
                                        }
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                " +
                                          _vm._s(subCategory.name) +
                                          "\n                            "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  subCategory.children &&
                                  subCategory.children.length > 0
                                    ? _c("span", {
                                        staticClass: "toggle-submenu"
                                      })
                                    : _vm._e(),
                                  _vm._v(" "),
                                  subCategory.children &&
                                  subCategory.children.length > 0
                                    ? _c(
                                        "ul",
                                        { staticClass: "subcategory" },
                                        _vm._l(subCategory.children, function(
                                          child
                                        ) {
                                          return _c(
                                            "li",
                                            { key: child.slug },
                                            [
                                              _c(
                                                "router-link",
                                                {
                                                  attrs: {
                                                    to: {
                                                      name: "Category Products",
                                                      params: {
                                                        category_slug:
                                                          child.slug
                                                      }
                                                    }
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    "\n                                        " +
                                                      _vm._s(child.name) +
                                                      "\n                                    "
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
                                ],
                                1
                              )
                            }),
                            0
                          )
                        : _vm._e()
                    ],
                    1
                  )
                }),
                0
              )
            ])
          ])
        : _vm._e(),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "block-sidebar block-filter no-hide",
          attrs: { id: "layered-filter-block" }
        },
        [
          _vm._m(1),
          _vm._v(" "),
          _vm._m(2),
          _vm._v(" "),
          _c("div", { staticClass: "block-content" }, [
            _vm.brandList && _vm.brandList.length > 0
              ? _c(
                  "div",
                  { staticClass: "filter-options-item filter-options-brand" },
                  [
                    _c("div", { staticClass: "filter-options-title" }, [
                      _vm._v("BRAND")
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "filter-options-content" }, [
                      _c(
                        "ol",
                        { staticClass: "items" },
                        _vm._l(_vm.brandList, function(brand) {
                          return _c(
                            "li",
                            { key: brand.name, staticClass: "item" },
                            [
                              _c("label", [
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.sorting_data.brand_ids,
                                      expression: "sorting_data.brand_ids"
                                    }
                                  ],
                                  attrs: { type: "checkbox" },
                                  domProps: {
                                    value: brand.id,
                                    checked: Array.isArray(
                                      _vm.sorting_data.brand_ids
                                    )
                                      ? _vm._i(
                                          _vm.sorting_data.brand_ids,
                                          brand.id
                                        ) > -1
                                      : _vm.sorting_data.brand_ids
                                  },
                                  on: {
                                    change: function($event) {
                                      var $$a = _vm.sorting_data.brand_ids,
                                        $$el = $event.target,
                                        $$c = $$el.checked ? true : false
                                      if (Array.isArray($$a)) {
                                        var $$v = brand.id,
                                          $$i = _vm._i($$a, $$v)
                                        if ($$el.checked) {
                                          $$i < 0 &&
                                            _vm.$set(
                                              _vm.sorting_data,
                                              "brand_ids",
                                              $$a.concat([$$v])
                                            )
                                        } else {
                                          $$i > -1 &&
                                            _vm.$set(
                                              _vm.sorting_data,
                                              "brand_ids",
                                              $$a
                                                .slice(0, $$i)
                                                .concat($$a.slice($$i + 1))
                                            )
                                        }
                                      } else {
                                        _vm.$set(
                                          _vm.sorting_data,
                                          "brand_ids",
                                          $$c
                                        )
                                      }
                                    }
                                  }
                                }),
                                _c("span", [_vm._v(_vm._s(brand.name))])
                              ])
                            ]
                          )
                        }),
                        0
                      )
                    ])
                  ]
                )
              : _vm._e(),
            _vm._v(" "),
            _vm.colorList && _vm.colorList.length > 0
              ? _c(
                  "div",
                  { staticClass: "filter-options-item filter-options-color" },
                  [
                    _c("div", { staticClass: "filter-options-title" }, [
                      _vm._v("COLOR")
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "filter-options-content" }, [
                      _c(
                        "ol",
                        { staticClass: "items" },
                        _vm._l(_vm.colorList, function(color) {
                          return _c(
                            "li",
                            { key: color.name, staticClass: "item" },
                            [
                              _c("label", { attrs: { title: color.name } }, [
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.sorting_data.color_ids,
                                      expression: "sorting_data.color_ids"
                                    }
                                  ],
                                  attrs: { type: "checkbox" },
                                  domProps: {
                                    value: color.id,
                                    checked: Array.isArray(
                                      _vm.sorting_data.color_ids
                                    )
                                      ? _vm._i(
                                          _vm.sorting_data.color_ids,
                                          color.id
                                        ) > -1
                                      : _vm.sorting_data.color_ids
                                  },
                                  on: {
                                    change: function($event) {
                                      var $$a = _vm.sorting_data.color_ids,
                                        $$el = $event.target,
                                        $$c = $$el.checked ? true : false
                                      if (Array.isArray($$a)) {
                                        var $$v = color.id,
                                          $$i = _vm._i($$a, $$v)
                                        if ($$el.checked) {
                                          $$i < 0 &&
                                            _vm.$set(
                                              _vm.sorting_data,
                                              "color_ids",
                                              $$a.concat([$$v])
                                            )
                                        } else {
                                          $$i > -1 &&
                                            _vm.$set(
                                              _vm.sorting_data,
                                              "color_ids",
                                              $$a
                                                .slice(0, $$i)
                                                .concat($$a.slice($$i + 1))
                                            )
                                        }
                                      } else {
                                        _vm.$set(
                                          _vm.sorting_data,
                                          "color_ids",
                                          $$c
                                        )
                                      }
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c("span", [
                                  _c("span", {
                                    staticClass: "img",
                                    style: { "background-color": color.code }
                                  })
                                ])
                              ])
                            ]
                          )
                        }),
                        0
                      )
                    ])
                  ]
                )
              : _vm._e(),
            _vm._v(" "),
            _vm.sizeList && _vm.sizeList.length > 0
              ? _c(
                  "div",
                  { staticClass: "filter-options-item filter-options-size" },
                  [
                    _c("div", { staticClass: "filter-options-title" }, [
                      _vm._v("SIZE")
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "filter-options-content" }, [
                      _c(
                        "ol",
                        { staticClass: "items" },
                        _vm._l(_vm.sizeList, function(size) {
                          return _c(
                            "li",
                            { key: size.name, staticClass: "item" },
                            [
                              _c("label", [
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.sorting_data.size_ids,
                                      expression: "sorting_data.size_ids"
                                    }
                                  ],
                                  attrs: { type: "checkbox" },
                                  domProps: {
                                    value: size.id,
                                    checked: Array.isArray(
                                      _vm.sorting_data.size_ids
                                    )
                                      ? _vm._i(
                                          _vm.sorting_data.size_ids,
                                          size.id
                                        ) > -1
                                      : _vm.sorting_data.size_ids
                                  },
                                  on: {
                                    change: function($event) {
                                      var $$a = _vm.sorting_data.size_ids,
                                        $$el = $event.target,
                                        $$c = $$el.checked ? true : false
                                      if (Array.isArray($$a)) {
                                        var $$v = size.id,
                                          $$i = _vm._i($$a, $$v)
                                        if ($$el.checked) {
                                          $$i < 0 &&
                                            _vm.$set(
                                              _vm.sorting_data,
                                              "size_ids",
                                              $$a.concat([$$v])
                                            )
                                        } else {
                                          $$i > -1 &&
                                            _vm.$set(
                                              _vm.sorting_data,
                                              "size_ids",
                                              $$a
                                                .slice(0, $$i)
                                                .concat($$a.slice($$i + 1))
                                            )
                                        }
                                      } else {
                                        _vm.$set(
                                          _vm.sorting_data,
                                          "size_ids",
                                          $$c
                                        )
                                      }
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c("span", [_vm._v(_vm._s(size.name))])
                              ])
                            ]
                          )
                        }),
                        0
                      )
                    ])
                  ]
                )
              : _vm._e()
          ])
        ]
      ),
      _vm._v(" "),
      _c("hot-deal-carousel-section"),
      _vm._v(" "),
      _vm.tagList && _vm.tagList.length > 0
        ? _c("div", { staticClass: "block-sidebar block-sidebar-tags" }, [
            _vm._m(3),
            _vm._v(" "),
            _c("div", { staticClass: "block-content" }, [
              _c(
                "ul",
                _vm._l(_vm.tagList, function(tag) {
                  return _c(
                    "li",
                    { key: tag.slug },
                    [
                      _c(
                        "router-link",
                        {
                          staticClass: "lv2",
                          attrs: {
                            to: {
                              name: "TagProducts",
                              params: { tag_slug: tag.slug }
                            }
                          }
                        },
                        [
                          _vm._v(
                            "\n                        " +
                              _vm._s(tag.title) +
                              "\n                    "
                          )
                        ]
                      )
                    ],
                    1
                  )
                }),
                0
              )
            ])
          ])
        : _vm._e()
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "block-title" }, [
      _c("strong", [_vm._v("Categories")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "close-filter-products" }, [
      _c("i", { staticClass: "fa fa-times", attrs: { "aria-hidden": "true" } })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "block-title" }, [
      _c("strong", [_vm._v("FILTER SELECTION")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "block-title" }, [
      _c("strong", [_vm._v("product tags")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/products/ProductsToolbarBottom.vue?vue&type=template&id=4700e34c&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/products/ProductsToolbarBottom.vue?vue&type=template&id=4700e34c&scoped=true& ***!
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
  return _c("div", { staticClass: "toolbar-products toolbar-bottom" }, [
    _c("div", { staticClass: "toolbar-option" }, [
      _c("div", { staticClass: "toolbar-limiter" }, [
        _vm._m(0),
        _vm._v(" "),
        _c(
          "select",
          {
            directives: [
              {
                name: "model",
                rawName: "v-model",
                value: _vm.reqData.per_page,
                expression: "reqData.per_page"
              }
            ],
            staticClass: "limiter-options form-control",
            on: {
              change: function($event) {
                var $$selectedVal = Array.prototype.filter
                  .call($event.target.options, function(o) {
                    return o.selected
                  })
                  .map(function(o) {
                    var val = "_value" in o ? o._value : o.value
                    return val
                  })
                _vm.$set(
                  _vm.reqData,
                  "per_page",
                  $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                )
              }
            }
          },
          [
            _c("option", { attrs: { value: "15" } }, [_vm._v("Show 15")]),
            _vm._v(" "),
            _c("option", { attrs: { value: "30" } }, [_vm._v("Show 30")]),
            _vm._v(" "),
            _c("option", { attrs: { value: "50" } }, [_vm._v("Show 50")])
          ]
        )
      ])
    ]),
    _vm._v(" "),
    _c("ul", { staticClass: "pagination" }, [
      _c("li", { staticClass: "action action-next" }, [
        _c(
          "button",
          {
            attrs: { disabled: !_vm.prevPage },
            on: {
              click: function($event) {
                $event.preventDefault()
                return _vm.goToPrev($event)
              }
            }
          },
          [_vm._m(1), _vm._v("\n                Previous\n            ")]
        )
      ]),
      _vm._v(" "),
      _c("li", [_c("p", [_vm._v(_vm._s(_vm.paginatonCount))])]),
      _vm._v(" "),
      _c("li", { staticClass: "action action-next" }, [
        _c(
          "button",
          {
            attrs: { disabled: !_vm.nextPage },
            on: {
              click: function($event) {
                $event.preventDefault()
                return _vm.goToNext($event)
              }
            }
          },
          [_vm._v("\n                Next\n                "), _vm._m(2)]
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
    return _c("label", { staticClass: "label" }, [
      _c("span", [_vm._v("Show:")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", [
      _c("i", {
        staticClass: "fa fa-angle-double-left",
        attrs: { "aria-hidden": "true" }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", [
      _c("i", {
        staticClass: "fa fa-angle-double-right",
        attrs: { "aria-hidden": "true" }
      })
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/products/ProductsToolbarTop.vue?vue&type=template&id=7f727bf8&scoped=true&":
/*!******************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/components/products/ProductsToolbarTop.vue?vue&type=template&id=7f727bf8&scoped=true& ***!
  \******************************************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: " toolbar-products toolbar-top row" }, [
    _c("div", { staticClass: " col-md-6 col-sm-12" }, [
      _c("h1", { staticClass: "cate-title" }, [_vm._v(_vm._s(_vm.pageTitle))])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: " col-md-6 col-sm-12" }, [
      _c("div", { staticClass: "toolbar-option" }, [
        _c("div", { staticClass: "toolbar-sorter " }, [
          _c("label", { staticClass: "label" }, [_vm._v("Sort by:")]),
          _vm._v(" "),
          _c(
            "select",
            {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.reqData.order_by,
                  expression: "reqData.order_by"
                }
              ],
              staticClass: "sorter-options form-control",
              on: {
                change: function($event) {
                  var $$selectedVal = Array.prototype.filter
                    .call($event.target.options, function(o) {
                      return o.selected
                    })
                    .map(function(o) {
                      var val = "_value" in o ? o._value : o.value
                      return val
                    })
                  _vm.$set(
                    _vm.reqData,
                    "order_by",
                    $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                  )
                }
              }
            },
            [
              _c("option", { attrs: { value: "name" } }, [_vm._v("Name")]),
              _vm._v(" "),
              _c("option", { attrs: { value: "price" } }, [_vm._v("Price")])
            ]
          ),
          _vm._v(" "),
          _c("a", { staticClass: "sorter-action", attrs: { href: "" } })
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "toolbar-limiter" }, [
          _vm._m(0),
          _vm._v(" "),
          _c(
            "select",
            {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.reqData.order_type,
                  expression: "reqData.order_type"
                }
              ],
              staticClass: "limiter-options form-control",
              on: {
                change: function($event) {
                  var $$selectedVal = Array.prototype.filter
                    .call($event.target.options, function(o) {
                      return o.selected
                    })
                    .map(function(o) {
                      var val = "_value" in o ? o._value : o.value
                      return val
                    })
                  _vm.$set(
                    _vm.reqData,
                    "order_type",
                    $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                  )
                }
              }
            },
            [
              _c("option", { attrs: { value: "asc" } }, [_vm._v("ASC")]),
              _vm._v(" "),
              _c("option", { attrs: { value: "desc" } }, [_vm._v("DESC")])
            ]
          )
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "modes" }, [
        _c("strong", { staticClass: "label" }, [_vm._v("View as:")]),
        _vm._v(" "),
        _c(
          "strong",
          {
            staticClass: "modes-mode mode-grid",
            class: { active: _vm.view === 1 },
            attrs: { title: "Grid" },
            on: {
              click: function($event) {
                return _vm.updateProductViewAs(1)
              }
            }
          },
          [_c("span", [_vm._v("grid")])]
        ),
        _vm._v(" "),
        _c(
          "strong",
          {
            staticClass: "modes-mode mode-list",
            class: { active: _vm.view === 2 },
            attrs: { title: "List" },
            on: {
              click: function($event) {
                return _vm.updateProductViewAs(2)
              }
            }
          },
          [_c("span", [_vm._v("list")])]
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
    return _c("label", { staticClass: "label" }, [
      _c("span", [_vm._v("Sort Type:")])
    ])
  }
]
render._withStripped = true



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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductsPage.vue?vue&type=template&id=0106b812&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/views/frontend/pages/ProductsPage.vue?vue&type=template&id=0106b812&scoped=true& ***!
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
  return _c("main", { staticClass: "site-main" }, [
    _c("div", { staticClass: "columns container" }, [
      _c("ol", { staticClass: "breadcrumb no-hide" }),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c(
          "div",
          { staticClass: "col-md-9 col-md-push-3  col-main" },
          [
            _vm.categoryInfo
              ? _c("div", { staticClass: "category-view" }, [
                  _c(
                    "div",
                    {
                      staticClass: "owl-carousel owl-carousel-category ",
                      attrs: {
                        "data-nav": "true",
                        "data-dots": "false",
                        "data-margin": "0",
                        "data-items": "1",
                        "data-autoplayTimeout": "700",
                        "data-autoplay": "true",
                        "data-loop": "true"
                      }
                    },
                    _vm._l(_vm.cat_slider, function(slider) {
                      return _c(
                        "div",
                        { staticClass: "item" },
                        [
                          _c(
                            "router-link",
                            {
                              attrs: {
                                to: {
                                  name: "Category Products",
                                  params: { category_slug: slider.slug }
                                }
                              }
                            },
                            [
                              _c("img", {
                                attrs: {
                                  src: slider.image_path,
                                  alt: slider.name,
                                  title: slider.name
                                }
                              })
                            ]
                          )
                        ],
                        1
                      )
                    }),
                    0
                  )
                ])
              : _vm._e(),
            _vm._v(" "),
            _vm.categoryInfo
              ? _c(
                  "ul",
                  { staticClass: "category-links" },
                  [
                    _c(
                      "li",
                      {
                        staticClass: "current-cate",
                        class: {
                          "text-center width-100":
                            _vm.categoryInfo.children.length <= 0
                        }
                      },
                      [
                        _c(
                          "router-link",
                          {
                            attrs: {
                              to: {
                                name: "Category Products",
                                params: { category_slug: _vm.categoryInfo.slug }
                              }
                            }
                          },
                          [
                            _vm._v(
                              "\n                            " +
                                _vm._s(_vm.categoryInfo.name) +
                                "\n                        "
                            )
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _vm._l(_vm.categoryInfo.children, function(category) {
                      return _vm.categoryInfo.children &&
                        _vm.categoryInfo.children.length > 0
                        ? _c(
                            "li",
                            { key: category.slug },
                            [
                              _c(
                                "router-link",
                                {
                                  attrs: {
                                    to: {
                                      name: "Category Products",
                                      params: { category_slug: category.slug }
                                    }
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(category.name) +
                                      "\n                        "
                                  )
                                ]
                              )
                            ],
                            1
                          )
                        : _vm._e()
                    })
                  ],
                  2
                )
              : _vm._e(),
            _vm._v(" "),
            _c("products-toolbar-top"),
            _vm._v(" "),
            _c(
              "div",
              {
                staticClass: "products",
                class: [_vm.view === 2 ? "products-list" : "products-grid"]
              },
              [
                _c(
                  "ol",
                  { staticClass: "product-items row" },
                  _vm._l(_vm.products, function(productEl, index) {
                    return _vm.products && _vm.products.length > 0
                      ? _c(
                          "li",
                          {
                            key: _vm.randomNumber(productEl.slug) + "-" + index,
                            staticClass: "product-item",
                            class: [_vm.view === 2 ? "col-sm-12" : "col-sm-3"]
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "product-item-opt-1" },
                              [
                                _c("product-item", {
                                  attrs: { product: productEl, page: true }
                                })
                              ],
                              1
                            )
                          ]
                        )
                      : _c("li", { staticClass: "col-sm-12 product-item" }, [
                          _vm._m(0)
                        ])
                  }),
                  0
                )
              ]
            ),
            _vm._v(" "),
            _c("products-toolbar-bottom")
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "col-md-3 col-md-pull-9  col-sidebar" },
          [_c("products-sidebar-section")],
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
    return _c("div", { staticClass: "alert alert-info text-center" }, [
      _c("h2", [_vm._v("No Product Found")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/views/frontend/components/products/ProductsSidebarSection.vue":
/*!*********************************************************************************!*\
  !*** ./resources/views/frontend/components/products/ProductsSidebarSection.vue ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProductsSidebarSection_vue_vue_type_template_id_13798d93_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductsSidebarSection.vue?vue&type=template&id=13798d93&scoped=true& */ "./resources/views/frontend/components/products/ProductsSidebarSection.vue?vue&type=template&id=13798d93&scoped=true&");
/* harmony import */ var _ProductsSidebarSection_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductsSidebarSection.vue?vue&type=script&lang=js& */ "./resources/views/frontend/components/products/ProductsSidebarSection.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProductsSidebarSection_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProductsSidebarSection_vue_vue_type_template_id_13798d93_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProductsSidebarSection_vue_vue_type_template_id_13798d93_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "13798d93",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/views/frontend/components/products/ProductsSidebarSection.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/views/frontend/components/products/ProductsSidebarSection.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************!*\
  !*** ./resources/views/frontend/components/products/ProductsSidebarSection.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsSidebarSection_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductsSidebarSection.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/products/ProductsSidebarSection.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsSidebarSection_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/views/frontend/components/products/ProductsSidebarSection.vue?vue&type=template&id=13798d93&scoped=true&":
/*!****************************************************************************************************************************!*\
  !*** ./resources/views/frontend/components/products/ProductsSidebarSection.vue?vue&type=template&id=13798d93&scoped=true& ***!
  \****************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsSidebarSection_vue_vue_type_template_id_13798d93_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductsSidebarSection.vue?vue&type=template&id=13798d93&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/products/ProductsSidebarSection.vue?vue&type=template&id=13798d93&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsSidebarSection_vue_vue_type_template_id_13798d93_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsSidebarSection_vue_vue_type_template_id_13798d93_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/views/frontend/components/products/ProductsToolbarBottom.vue":
/*!********************************************************************************!*\
  !*** ./resources/views/frontend/components/products/ProductsToolbarBottom.vue ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProductsToolbarBottom_vue_vue_type_template_id_4700e34c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductsToolbarBottom.vue?vue&type=template&id=4700e34c&scoped=true& */ "./resources/views/frontend/components/products/ProductsToolbarBottom.vue?vue&type=template&id=4700e34c&scoped=true&");
/* harmony import */ var _ProductsToolbarBottom_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductsToolbarBottom.vue?vue&type=script&lang=js& */ "./resources/views/frontend/components/products/ProductsToolbarBottom.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProductsToolbarBottom_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProductsToolbarBottom_vue_vue_type_template_id_4700e34c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProductsToolbarBottom_vue_vue_type_template_id_4700e34c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "4700e34c",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/views/frontend/components/products/ProductsToolbarBottom.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/views/frontend/components/products/ProductsToolbarBottom.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************!*\
  !*** ./resources/views/frontend/components/products/ProductsToolbarBottom.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsToolbarBottom_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductsToolbarBottom.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/products/ProductsToolbarBottom.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsToolbarBottom_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/views/frontend/components/products/ProductsToolbarBottom.vue?vue&type=template&id=4700e34c&scoped=true&":
/*!***************************************************************************************************************************!*\
  !*** ./resources/views/frontend/components/products/ProductsToolbarBottom.vue?vue&type=template&id=4700e34c&scoped=true& ***!
  \***************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsToolbarBottom_vue_vue_type_template_id_4700e34c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductsToolbarBottom.vue?vue&type=template&id=4700e34c&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/products/ProductsToolbarBottom.vue?vue&type=template&id=4700e34c&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsToolbarBottom_vue_vue_type_template_id_4700e34c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsToolbarBottom_vue_vue_type_template_id_4700e34c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/views/frontend/components/products/ProductsToolbarTop.vue":
/*!*****************************************************************************!*\
  !*** ./resources/views/frontend/components/products/ProductsToolbarTop.vue ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProductsToolbarTop_vue_vue_type_template_id_7f727bf8_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductsToolbarTop.vue?vue&type=template&id=7f727bf8&scoped=true& */ "./resources/views/frontend/components/products/ProductsToolbarTop.vue?vue&type=template&id=7f727bf8&scoped=true&");
/* harmony import */ var _ProductsToolbarTop_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductsToolbarTop.vue?vue&type=script&lang=js& */ "./resources/views/frontend/components/products/ProductsToolbarTop.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProductsToolbarTop_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProductsToolbarTop_vue_vue_type_template_id_7f727bf8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProductsToolbarTop_vue_vue_type_template_id_7f727bf8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "7f727bf8",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/views/frontend/components/products/ProductsToolbarTop.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/views/frontend/components/products/ProductsToolbarTop.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************!*\
  !*** ./resources/views/frontend/components/products/ProductsToolbarTop.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsToolbarTop_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductsToolbarTop.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/products/ProductsToolbarTop.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsToolbarTop_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/views/frontend/components/products/ProductsToolbarTop.vue?vue&type=template&id=7f727bf8&scoped=true&":
/*!************************************************************************************************************************!*\
  !*** ./resources/views/frontend/components/products/ProductsToolbarTop.vue?vue&type=template&id=7f727bf8&scoped=true& ***!
  \************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsToolbarTop_vue_vue_type_template_id_7f727bf8_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductsToolbarTop.vue?vue&type=template&id=7f727bf8&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/components/products/ProductsToolbarTop.vue?vue&type=template&id=7f727bf8&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsToolbarTop_vue_vue_type_template_id_7f727bf8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsToolbarTop_vue_vue_type_template_id_7f727bf8_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



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

/***/ "./resources/views/frontend/pages/ProductsPage.vue":
/*!*********************************************************!*\
  !*** ./resources/views/frontend/pages/ProductsPage.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProductsPage_vue_vue_type_template_id_0106b812_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductsPage.vue?vue&type=template&id=0106b812&scoped=true& */ "./resources/views/frontend/pages/ProductsPage.vue?vue&type=template&id=0106b812&scoped=true&");
/* harmony import */ var _ProductsPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductsPage.vue?vue&type=script&lang=js& */ "./resources/views/frontend/pages/ProductsPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _ProductsPage_vue_vue_type_style_index_0_id_0106b812_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ProductsPage.vue?vue&type=style&index=0&id=0106b812&scoped=true&lang=css& */ "./resources/views/frontend/pages/ProductsPage.vue?vue&type=style&index=0&id=0106b812&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _ProductsPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProductsPage_vue_vue_type_template_id_0106b812_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProductsPage_vue_vue_type_template_id_0106b812_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "0106b812",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/views/frontend/pages/ProductsPage.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/views/frontend/pages/ProductsPage.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/views/frontend/pages/ProductsPage.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductsPage.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductsPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/views/frontend/pages/ProductsPage.vue?vue&type=style&index=0&id=0106b812&scoped=true&lang=css&":
/*!******************************************************************************************************************!*\
  !*** ./resources/views/frontend/pages/ProductsPage.vue?vue&type=style&index=0&id=0106b812&scoped=true&lang=css& ***!
  \******************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsPage_vue_vue_type_style_index_0_id_0106b812_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductsPage.vue?vue&type=style&index=0&id=0106b812&scoped=true&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductsPage.vue?vue&type=style&index=0&id=0106b812&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsPage_vue_vue_type_style_index_0_id_0106b812_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsPage_vue_vue_type_style_index_0_id_0106b812_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsPage_vue_vue_type_style_index_0_id_0106b812_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsPage_vue_vue_type_style_index_0_id_0106b812_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsPage_vue_vue_type_style_index_0_id_0106b812_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/views/frontend/pages/ProductsPage.vue?vue&type=template&id=0106b812&scoped=true&":
/*!****************************************************************************************************!*\
  !*** ./resources/views/frontend/pages/ProductsPage.vue?vue&type=template&id=0106b812&scoped=true& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsPage_vue_vue_type_template_id_0106b812_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductsPage.vue?vue&type=template&id=0106b812&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/views/frontend/pages/ProductsPage.vue?vue&type=template&id=0106b812&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsPage_vue_vue_type_template_id_0106b812_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductsPage_vue_vue_type_template_id_0106b812_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);