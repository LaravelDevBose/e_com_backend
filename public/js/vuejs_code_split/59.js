(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[59],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/order/OrderDetailsPage.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/order/OrderDetailsPage.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "OrderDetailsPage",
  props: ['orderid'],
  data: function data() {
    return {};
  },
  created: function created() {
    if (typeof this.orderid !== "undefined" && this.orderid !== '') {
      this.getOrderInfo(this.orderid).then(function (response) {
        if (typeof response.code !== "undefined" && response.code === 200) {// Notify.success(response.message);
        } else if (response.code === 404) {
          Notify.error(response.message);
          setTimeout(function () {
            location.href = '/admin/order';
          }, 3000);
        } else {
          Notify.error(response.message);
        }
      });
    }

    this.getOrderStatus();
  },
  methods: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['getOrderInfo', 'getOrderStatus', 'orderStatusChange', 'orderItemStatusUpdate']), {
    changeOrderItemStatus: function changeOrderItemStatus(itemId, status) {
      var reqData = {
        item_id: itemId,
        status: status
      };
      this.orderItemStatusUpdate(reqData).then(function (response) {
        if (typeof response.code !== "undefined" && response.code === 200) {
          Notify.success(response.message);
          setTimeout(function () {
            location.reload();
          }, 2000);
        } else if (response.status === 'validation') {
          Notify.warning(response.message);
        } else {
          Notify.error(response.message);
        }
      });
    },
    changeOrderStatus: function changeOrderStatus(orderNo, status) {
      //TODO use nice Global Modal For Confirm Action
      var conf = confirm('Are You Sure Want To change Order Status.?');

      if (!conf) {
        return false;
      }

      this.orderStatusChange({
        order_no: orderNo,
        status: status
      }).then(function (response) {
        if (typeof response.code !== "undefined" && response.code === 200) {
          Notify.success(response.message);
          setTimeout(function () {
            location.reload();
          }, 2000);
        } else {
          Notify.error(response.message);
        }
      });
    },
    invoicePrint: function invoicePrint() {
      window.open("/admin/order/".concat(this.orderid, "/print"));
    }
  }),
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['order', 'statusList']))
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/order/OrderDetailsPage.vue?vue&type=template&id=1744ea8f&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/order/OrderDetailsPage.vue?vue&type=template&id=1744ea8f&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************************************/
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
  return _vm.order
    ? _c("div", { staticClass: "content" }, [
        _c("div", { staticClass: "panel" }, [
          _vm._m(0),
          _vm._v(" "),
          _c("div", { staticClass: "panel-body no-padding-bottom" }, [
            _c("div", { staticClass: "text-right" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-sm btn-primary",
                  attrs: { type: "button" },
                  on: {
                    click: function($event) {
                      $event.preventDefault()
                      return _vm.invoicePrint()
                    }
                  }
                },
                [_c("i", { staticClass: "icon-printer" })]
              )
            ]),
            _vm._v(" "),
            _vm._m(1),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _vm.order.shipping
                ? _c("div", { staticClass: "col-sm-6 col-md-6 col-lg-6" }, [
                    _c("div", { staticClass: "content-group" }, [
                      _c("span", { staticClass: "text-muted" }, [
                        _vm._v("Shipping To:")
                      ]),
                      _vm._v(" "),
                      _c(
                        "ul",
                        { staticClass: "list-condensed list-unstyled" },
                        [
                          _c("li", [
                            _c("h5", [
                              _vm._v(
                                _vm._s(
                                  _vm.order.shipping.first_name +
                                    " " +
                                    _vm.order.shipping.last_name
                                )
                              )
                            ])
                          ]),
                          _vm._v(" "),
                          _c("li", [
                            _c("span", { staticClass: "text-semibold" }, [
                              _vm._v(_vm._s(_vm.order.shipping.phone_no))
                            ])
                          ]),
                          _vm._v(" "),
                          _c("li", [
                            _vm._v(_vm._s(_vm.order.shipping.address))
                          ]),
                          _vm._v(" "),
                          _c("li", [
                            _vm._v(_vm._s(_vm.order.shipping.district))
                          ]),
                          _vm._v(" "),
                          _c("li", [
                            _vm._v(_vm._s(_vm.order.shipping.region) + " "),
                            _vm.order.shipping.postal_code
                              ? _c("span", { staticClass: "text-semibold" }, [
                                  _vm._v(
                                    "- " +
                                      _vm._s(_vm.order.shipping.postal_code)
                                  )
                                ])
                              : _vm._e()
                          ])
                        ]
                      )
                    ])
                  ])
                : _vm._e(),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-6 col-md-6 col-lg-6" }, [
                _c(
                  "div",
                  {
                    staticClass: "invoice-details content-group",
                    staticStyle: { "text-align": "right" }
                  },
                  [
                    _c("h5", { staticClass: "text-uppercase text-semibold" }, [
                      _vm._v("Order No #" + _vm._s(_vm.order.order_no))
                    ]),
                    _vm._v(" "),
                    _c("ul", { staticClass: "list-condensed list-unstyled" }, [
                      _c("li", [
                        _vm._v("Order Date: "),
                        _c("span", { staticClass: "text-semibold" }, [
                          _vm._v(_vm._s(_vm.order.order_date))
                        ])
                      ]),
                      _vm._v(" "),
                      _c("li", [
                        _vm._v("Status:\n                                "),
                        _c("div", { staticClass: "btn-group" }, [
                          _c(
                            "span",
                            {
                              staticClass: "label  dropdown-toggle",
                              class: {
                                "bg-info": _vm.order.order_status == 1,
                                "bg-danger": _vm.order.order_status == 2,
                                "bg-warning": _vm.order.order_status == 3,
                                "bg-primary": _vm.order.order_status == 4,
                                "bg-indigo-400": _vm.order.order_status == 5,
                                "bg-teal": _vm.order.order_status == 6
                              },
                              attrs: {
                                "data-toggle": "dropdown",
                                "aria-expanded": "false"
                              }
                            },
                            [
                              _vm._v(
                                "\n                                        " +
                                  _vm._s(_vm.order.status_label) +
                                  "\n                                        "
                              ),
                              _vm.order.order_status != 2 &&
                              _vm.order.order_status != 6
                                ? _c("span", { staticClass: "caret" })
                                : _vm._e()
                            ]
                          ),
                          _vm._v(" "),
                          _vm.order.order_status != 2 &&
                          _vm.order.order_status != 6
                            ? _c("div", [
                                _vm.statusList
                                  ? _c(
                                      "ul",
                                      {
                                        staticClass:
                                          "dropdown-menu dropdown-menu-right"
                                      },
                                      _vm._l(_vm.statusList, function(
                                        status,
                                        index
                                      ) {
                                        return _vm.order.order_status != index
                                          ? _c("li", [
                                              _c(
                                                "a",
                                                {
                                                  attrs: { href: "#" },
                                                  on: {
                                                    click: function($event) {
                                                      $event.preventDefault()
                                                      return _vm.changeOrderStatus(
                                                        _vm.order.order_no,
                                                        index
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _c("span", {
                                                    staticClass:
                                                      "status-mark position-left",
                                                    class: {
                                                      "bg-info": index == 1,
                                                      "bg-danger": index == 2,
                                                      "bg-warning": index == 3,
                                                      "bg-primary": index == 4,
                                                      "bg-indigo-400":
                                                        index == 5,
                                                      "bg-teal": index == 6
                                                    }
                                                  }),
                                                  _vm._v(
                                                    " " +
                                                      _vm._s(status) +
                                                      "\n                                                "
                                                  )
                                                ]
                                              )
                                            ])
                                          : _vm._e()
                                      }),
                                      0
                                    )
                                  : _vm._e()
                              ])
                            : _vm._e()
                        ]),
                        _vm._v(" "),
                        _vm.order.order_status != 2 &&
                        _vm.order.order_status != 6
                          ? _c("div", [
                              _vm.statusList
                                ? _c(
                                    "ul",
                                    {
                                      staticClass:
                                        "dropdown-menu dropdown-menu-right"
                                    },
                                    _vm._l(_vm.statusList, function(
                                      status,
                                      index
                                    ) {
                                      return _vm.order.order_status != index
                                        ? _c("li", [
                                            _c(
                                              "a",
                                              {
                                                attrs: { href: "#" },
                                                on: {
                                                  click: function($event) {
                                                    $event.preventDefault()
                                                    return _vm.changeOrderStatus(
                                                      _vm.order.order_no,
                                                      index
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _c("span", {
                                                  staticClass:
                                                    "status-mark position-left",
                                                  class: {
                                                    "bg-info": index == 1,
                                                    "bg-danger": index == 2,
                                                    "bg-warning": index == 3,
                                                    "bg-primary": index == 4,
                                                    "bg-indigo-400": index == 5,
                                                    "bg-teal": index == 6
                                                  }
                                                }),
                                                _vm._v(
                                                  " " +
                                                    _vm._s(status) +
                                                    "\n                                            "
                                                )
                                              ]
                                            )
                                          ])
                                        : _vm._e()
                                    }),
                                    0
                                  )
                                : _vm._e()
                            ])
                          : _vm._e()
                      ])
                    ])
                  ]
                )
              ])
            ])
          ]),
          _vm._v(" "),
          _vm.order.order_items
            ? _c("div", [
                _c(
                  "table",
                  { staticClass: "table table-bordered table-striped" },
                  [
                    _vm._m(2),
                    _vm._v(" "),
                    _c(
                      "tbody",
                      _vm._l(_vm.order.order_items, function(item, index) {
                        return _c("tr", { key: index }, [
                          _c("td", { staticStyle: { "max-width": "100px" } }, [
                            _c("img", {
                              staticStyle: { width: "55px", height: "55px" },
                              attrs: {
                                src: item.image.image_path,
                                alt: item.product_name
                              }
                            })
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("h6", { staticClass: "no-margin" }, [
                              _vm._v(_vm._s(item.product.product_name))
                            ]),
                            _vm._v(" "),
                            _c("span", { staticClass: "text-muted" }, [
                              _c("span", { staticClass: "text-slate" }, [
                                _c("i", { staticClass: "icon-barcode2" }),
                                _vm._v(" " + _vm._s(item.product.product_sku))
                              ])
                            ]),
                            _vm._v(" "),
                            item.size
                              ? _c(
                                  "div",
                                  { staticClass: "text-muted text-size-small" },
                                  [
                                    _c(
                                      "span",
                                      {
                                        staticClass:
                                          "text-warning position-left text-bold"
                                      },
                                      [_vm._v("Size:")]
                                    ),
                                    _vm._v(
                                      "\n                            " +
                                        _vm._s(item.size.size_name) +
                                        "\n                        "
                                    )
                                  ]
                                )
                              : _vm._e(),
                            _vm._v(" "),
                            item.color
                              ? _c(
                                  "div",
                                  { staticClass: "text-muted text-size-small" },
                                  [
                                    _c(
                                      "span",
                                      {
                                        staticClass:
                                          "text-warning position-left text-bold"
                                      },
                                      [_vm._v("Color:")]
                                    ),
                                    _vm._v(
                                      "\n                            " +
                                        _vm._s(item.color.color_name) +
                                        "\n                        "
                                    )
                                  ]
                                )
                              : _vm._e()
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            item.seller
                              ? _c(
                                  "span",
                                  {
                                    staticClass: "text-teal",
                                    staticStyle: { "margin-right": ".5rem" }
                                  },
                                  [
                                    _c("i", { staticClass: "icon-store2" }),
                                    _vm._v(
                                      " " + _vm._s(item.seller.seller_name)
                                    )
                                  ]
                                )
                              : _vm._e()
                          ]),
                          _vm._v(" "),
                          _c("td", { staticClass: "text-center" }, [
                            _c("div", { staticClass: "btn-group" }, [
                              _c(
                                "span",
                                {
                                  staticClass: "label  dropdown-toggle",
                                  class: {
                                    "bg-info": item.item_status === 1,
                                    "bg-danger": item.item_status === 2,
                                    "bg-warning": item.item_status === 3,
                                    "bg-primary": item.item_status === 4,
                                    "bg-teal": item.item_status === 5,
                                    "bg-success": item.item_status === 6
                                  },
                                  attrs: {
                                    "data-toggle": "dropdown",
                                    "aria-expanded": "false"
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                " +
                                      _vm._s(item.item_status_label) +
                                      "\n\n                                "
                                  ),
                                  item.item_status != 2 && item.item_status != 6
                                    ? _c("span", { staticClass: "caret" })
                                    : _vm._e()
                                ]
                              ),
                              _vm._v(" "),
                              item.item_status === 2 && item.cancel_by !== null
                                ? _c("span", [
                                    item.cancel_by === 1
                                      ? _c("span", [_vm._v(" / Admin")])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    item.cancel_by === 2
                                      ? _c("span", [_vm._v(" / Buyer")])
                                      : _vm._e()
                                  ])
                                : _vm._e(),
                              _vm._v(" "),
                              item.item_status != 2 && item.item_status != 6
                                ? _c("div", [
                                    _vm.statusList
                                      ? _c(
                                          "ul",
                                          {
                                            staticClass:
                                              "dropdown-menu dropdown-menu-right"
                                          },
                                          _vm._l(_vm.statusList, function(
                                            status,
                                            index
                                          ) {
                                            return item.item_status != index
                                              ? _c("li", [
                                                  _c(
                                                    "a",
                                                    {
                                                      attrs: { href: "#" },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          $event.preventDefault()
                                                          return _vm.changeOrderItemStatus(
                                                            item.item_id,
                                                            index
                                                          )
                                                        }
                                                      }
                                                    },
                                                    [
                                                      _c("span", {
                                                        staticClass:
                                                          "status-mark position-left",
                                                        class: {
                                                          "bg-info": index == 1,
                                                          "bg-danger":
                                                            index == 2,
                                                          "bg-warning":
                                                            index == 3,
                                                          "bg-primary":
                                                            index == 4,
                                                          "bg-indigo-400":
                                                            index == 5,
                                                          "bg-teal": index == 6
                                                        }
                                                      }),
                                                      _vm._v(
                                                        " " +
                                                          _vm._s(status) +
                                                          "\n                                        "
                                                      )
                                                    ]
                                                  )
                                                ])
                                              : _vm._e()
                                          }),
                                          0
                                        )
                                      : _vm._e()
                                  ])
                                : _vm._e()
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", { staticClass: "text-right" }, [
                            _vm._v(" " + _vm._s(item.price))
                          ]),
                          _vm._v(" "),
                          _c("td", { staticClass: "text-center" }, [
                            _vm._v(_vm._s(item.qty))
                          ]),
                          _vm._v(" "),
                          _c("td", { staticClass: "text-right" }, [
                            _c("span", { staticClass: "text-semibold" }, [
                              _vm._v(" " + _vm._s(item.total_price))
                            ])
                          ])
                        ])
                      }),
                      0
                    )
                  ]
                )
              ])
            : _vm._e(),
          _vm._v(" "),
          _c("div", { staticClass: "panel-body" }, [
            _c("div", { staticClass: "row invoice-payment" }, [
              _vm.order.payment
                ? _c("div", { staticClass: "col-sm-6 col-md-6 col-lg-6" }, [
                    _c("div", { staticClass: " content-group" }, [
                      _c("span", { staticClass: "text-muted" }, [
                        _vm._v("Payment Details:")
                      ]),
                      _vm._v(" "),
                      _c(
                        "ul",
                        { staticClass: "list-condensed list-unstyled" },
                        [
                          _c("li", [
                            _c("h5", [
                              _vm._v("Total: "),
                              _c("span", { staticClass: "text-semibold" }, [
                                _vm._v("$ " + _vm._s(_vm.order.total))
                              ])
                            ])
                          ]),
                          _vm._v(" "),
                          _c("li", [
                            _vm._v("Paid By: "),
                            _c("span", { staticClass: "text-semibold" }, [
                              _vm._v(_vm._s(_vm.order.payment.paid_by))
                            ])
                          ]),
                          _vm._v(" "),
                          _c("li", [
                            _vm._v("Paid At: "),
                            _c("span", { staticClass: "text-semibold" }, [
                              _vm._v(_vm._s(_vm.order.payment.paid_at))
                            ])
                          ])
                        ]
                      )
                    ])
                  ])
                : _vm._e(),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "col-sm-5 ",
                  class: { "col-sm-offset-7": !_vm.order.payment }
                },
                [
                  _c("div", { staticClass: "content-group" }, [
                    _c("h6", [_vm._v("Summary")]),
                    _vm._v(" "),
                    _c("div", { staticClass: "table-responsive " }, [
                      _c(
                        "table",
                        { staticClass: "table table-striped table-bordered" },
                        [
                          _c("tbody", [
                            _c("tr", [
                              _c("th", [_vm._v("Subtotal:")]),
                              _vm._v(" "),
                              _c("td", { staticClass: "text-right" }, [
                                _vm._v(" " + _vm._s(_vm.order.sub_total))
                              ])
                            ]),
                            _vm._v(" "),
                            _c("tr", [
                              _c("th", [_vm._v("Delivery:")]),
                              _vm._v(" "),
                              _c("td", { staticClass: "text-right" }, [
                                _vm._v(" " + _vm._s(_vm.order.delivery_charge))
                              ])
                            ]),
                            _vm._v(" "),
                            _c("tr", [
                              _c("th", [_vm._v("Discount:")]),
                              _vm._v(" "),
                              _c("td", { staticClass: "text-right" }, [
                                _vm._v(" " + _vm._s(_vm.order.discount))
                              ])
                            ]),
                            _vm._v(" "),
                            _c("tr", [
                              _c("th", [_vm._v("Total:")]),
                              _vm._v(" "),
                              _c(
                                "td",
                                { staticClass: "text-right text-primary" },
                                [
                                  _c("h5", { staticClass: "text-semibold" }, [
                                    _vm._v(" " + _vm._s(_vm.order.total))
                                  ])
                                ]
                              )
                            ])
                          ])
                        ]
                      )
                    ])
                  ])
                ]
              )
            ])
          ])
        ])
      ])
    : _vm._e()
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-heading bg-teal-400" }, [
      _c("h5", { staticClass: "panel-title" }, [_vm._v("Order Details")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-sm-10 col-md-6 content-group" }, [
        _c("img", {
          staticStyle: { "max-width": "100px", "max-height": "80px" },
          attrs: { src: "/saliim.png", alt: "logo" }
        }),
        _vm._v(" "),
        _c("ul", { staticClass: "list-condensed list-unstyled" }, [
          _c("li", [
            _c("h5", { staticClass: "text-uppercase text-semibold" }, [
              _vm._v("Saliim")
            ])
          ]),
          _vm._v(" "),
          _c("li", [_vm._v("Address: Bakaaro,  Mogadishu, Somalia")]),
          _vm._v(" "),
          _c("li", [_vm._v("Phone: 00252617500005")]),
          _vm._v(" "),
          _c("li", [_vm._v("Email: info@saliim.com")])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", { staticStyle: { "max-width": "100px" } }, [
          _vm._v("Product Image")
        ]),
        _vm._v(" "),
        _c("th", [_vm._v("Product Description")]),
        _vm._v(" "),
        _c("th", [_vm._v("Seller Info")]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [
          _vm._v("Item Status/ Cancel By")
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "col-sm-1 text-right" }, [_vm._v("Rate")]),
        _vm._v(" "),
        _c("th", { staticClass: "col-sm-1 text-center" }, [_vm._v("QTY")]),
        _vm._v(" "),
        _c("th", { staticClass: "col-sm-1 text-right" }, [_vm._v("Subtotal")])
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

/***/ "./resources/js/components/order/OrderDetailsPage.vue":
/*!************************************************************!*\
  !*** ./resources/js/components/order/OrderDetailsPage.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _OrderDetailsPage_vue_vue_type_template_id_1744ea8f_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./OrderDetailsPage.vue?vue&type=template&id=1744ea8f&scoped=true& */ "./resources/js/components/order/OrderDetailsPage.vue?vue&type=template&id=1744ea8f&scoped=true&");
/* harmony import */ var _OrderDetailsPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./OrderDetailsPage.vue?vue&type=script&lang=js& */ "./resources/js/components/order/OrderDetailsPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _OrderDetailsPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _OrderDetailsPage_vue_vue_type_template_id_1744ea8f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _OrderDetailsPage_vue_vue_type_template_id_1744ea8f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "1744ea8f",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/order/OrderDetailsPage.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/order/OrderDetailsPage.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/order/OrderDetailsPage.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderDetailsPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./OrderDetailsPage.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/order/OrderDetailsPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderDetailsPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/order/OrderDetailsPage.vue?vue&type=template&id=1744ea8f&scoped=true&":
/*!*******************************************************************************************************!*\
  !*** ./resources/js/components/order/OrderDetailsPage.vue?vue&type=template&id=1744ea8f&scoped=true& ***!
  \*******************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderDetailsPage_vue_vue_type_template_id_1744ea8f_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./OrderDetailsPage.vue?vue&type=template&id=1744ea8f&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/order/OrderDetailsPage.vue?vue&type=template&id=1744ea8f&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderDetailsPage_vue_vue_type_template_id_1744ea8f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderDetailsPage_vue_vue_type_template_id_1744ea8f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);