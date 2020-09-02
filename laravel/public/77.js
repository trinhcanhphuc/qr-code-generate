(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[77],{

/***/ "../coreui/src/views/Home.vue":
/*!************************************!*\
  !*** ../coreui/src/views/Home.vue ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Home_vue_vue_type_template_id_576fc809___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Home.vue?vue&type=template&id=576fc809& */ "../coreui/src/views/Home.vue?vue&type=template&id=576fc809&");
/* harmony import */ var _laravel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../laravel/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");

var script = {}


/* normalize component */

var component = Object(_laravel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  script,
  _Home_vue_vue_type_template_id_576fc809___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Home_vue_vue_type_template_id_576fc809___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "coreui/src/views/Home.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "../coreui/src/views/Home.vue?vue&type=template&id=576fc809&":
/*!*******************************************************************!*\
  !*** ../coreui/src/views/Home.vue?vue&type=template&id=576fc809& ***!
  \*******************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _laravel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_laravel_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_576fc809___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../laravel/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../laravel/node_modules/vue-loader/lib??vue-loader-options!./Home.vue?vue&type=template&id=576fc809& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../coreui/src/views/Home.vue?vue&type=template&id=576fc809&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _laravel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_laravel_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_576fc809___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _laravel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_laravel_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_576fc809___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../coreui/src/views/Home.vue?vue&type=template&id=576fc809&":
/*!*************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!../coreui/src/views/Home.vue?vue&type=template&id=576fc809& ***!
  \*************************************************************************************************************************************************************************************************/
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
  return _c("div", [
    _c("div", { staticClass: "row" }, [
      _c(
        "div",
        { staticClass: "col-md-9" },
        [
          _c("input", { attrs: { name: "token", type: "hidden", value: "" } }),
          _vm._v(" "),
          _c(
            "CButtonGroup",
            { staticClass: "w-100 d-flex", attrs: { size: "lg" } },
            [
              _c("CButton", { attrs: { color: "primary" } }, [
                _vm._v("\n          URL\n          "),
                _c("input", {
                  staticClass: "w-0",
                  attrs: { type: "radio", value: "url" }
                })
              ]),
              _vm._v(" "),
              _c("CButton", { attrs: { color: "primary" } }, [
                _vm._v("\n          Text\n          "),
                _c("input", {
                  staticClass: "w-0",
                  attrs: { type: "radio", value: "text" }
                })
              ]),
              _vm._v(" "),
              _c("CButton", { attrs: { color: "primary" } }, [
                _vm._v("\n          Phone\n          "),
                _c("input", {
                  staticClass: "w-0",
                  attrs: { type: "radio", value: "phone" }
                })
              ]),
              _vm._v(" "),
              _c("CButton", { attrs: { color: "primary" } }, [
                _vm._v("\n          SMS\n          "),
                _c("input", {
                  staticClass: "w-0",
                  attrs: { type: "radio", value: "sms" }
                })
              ]),
              _vm._v(" "),
              _c("CButton", { attrs: { color: "primary" } }, [
                _vm._v("\n          Email\n          "),
                _c("input", {
                  staticClass: "w-0",
                  attrs: { type: "radio", value: "email" }
                })
              ]),
              _vm._v(" "),
              _c("CButton", { attrs: { color: "primary" } }, [
                _vm._v("\n          Card\n          "),
                _c("input", {
                  staticClass: "w-0",
                  attrs: { type: "radio", value: "card" }
                })
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c("div", { staticClass: "mt-3" }, [
            _c(
              "div",
              { staticClass: "qrcode-text-form" },
              [
                _c(
                  "CRow",
                  [
                    _c(
                      "CCol",
                      { attrs: { sm: "12" } },
                      [
                        _c("CTextarea", {
                          attrs: {
                            id: "qrcode-text",
                            label: "URL",
                            placeholder: "https://www.facebook.com/",
                            rows: "2"
                          }
                        })
                      ],
                      1
                    )
                  ],
                  1
                )
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "div",
              { attrs: { id: "qrcode-email-form" } },
              [
                _c(
                  "CRow",
                  [
                    _c(
                      "CCol",
                      { attrs: { sm: "12" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Email",
                            name: "email",
                            placeholder: "example@email.com"
                          }
                        })
                      ],
                      1
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "CRow",
                  [
                    _c(
                      "CCol",
                      { attrs: { sm: "12" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Subject",
                            name: "subject",
                            placeholder: "Greeting!"
                          }
                        })
                      ],
                      1
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "CRow",
                  [
                    _c(
                      "CCol",
                      { attrs: { sm: "12" } },
                      [
                        _c("CTextarea", {
                          attrs: {
                            id: "qrcode-text",
                            label: "Body",
                            name: "body",
                            placeholder: "Today, I write this email to inform",
                            rows: "3"
                          }
                        })
                      ],
                      1
                    )
                  ],
                  1
                )
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "div",
              { attrs: { id: "qrcode-card-form" } },
              [
                _c(
                  "CRow",
                  [
                    _c(
                      "CCol",
                      { attrs: { sm: "12" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Full Name",
                            name: "full_name",
                            placeholder: "Your Name"
                          }
                        })
                      ],
                      1
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "CRow",
                  [
                    _c(
                      "CCol",
                      { attrs: { sm: "12" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Email",
                            name: "email",
                            placeholder: "example@email.com"
                          }
                        })
                      ],
                      1
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "CRow",
                  [
                    _c(
                      "CCol",
                      { attrs: { sm: "4" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Work Phone",
                            name: "work_phone",
                            placeholder: "0963*******"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "CCol",
                      { attrs: { sm: "4" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Private Phone",
                            name: "private_phone",
                            placeholder: "0963*******"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "CCol",
                      { attrs: { sm: "4" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Cell Phone",
                            name: "cell_phone",
                            placeholder: "0963*******"
                          }
                        })
                      ],
                      1
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "CRow",
                  [
                    _c(
                      "CCol",
                      { attrs: { sm: "8" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Your Company",
                            name: "address_label",
                            placeholder: "Your Office"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "CCol",
                      { attrs: { sm: "4" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Postcode",
                            name: "address_postcode",
                            placeholder: "700000"
                          }
                        })
                      ],
                      1
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "CRow",
                  [
                    _c(
                      "CCol",
                      { attrs: { sm: "3" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Street",
                            name: "address_street",
                            placeholder: "Nam Ki Khoi Nghia"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "CCol",
                      { attrs: { sm: "3" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Town",
                            name: "address_town",
                            placeholder: "District 1"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "CCol",
                      { attrs: { sm: "3" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Region",
                            name: "address_region",
                            placeholder: "Ho Chi Minh"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "CCol",
                      { attrs: { sm: "3" } },
                      [
                        _c("CInput", {
                          attrs: {
                            label: "Country",
                            name: "address_country",
                            placeholder: "Viet Nam"
                          }
                        })
                      ],
                      1
                    )
                  ],
                  1
                )
              ],
              1
            ),
            _vm._v(" "),
            _c("div", { attrs: { id: "qrcode-email-form" } }),
            _vm._v(" "),
            _c("div", { attrs: { id: "qr-colors-section" } })
          ])
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "col-md-3 text-center", attrs: { id: "qrcode-img" } },
        [
          _c("img", {
            staticClass: "w-100",
            attrs: { src: "img/brand/qr-logo.png" }
          }),
          _vm._v(" "),
          _c(
            "CButton",
            {
              staticClass: "mt-3",
              attrs: { id: "btn_save_qr", color: "primary", size: "lg" }
            },
            [_vm._v("\n        Download\n      ")]
          )
        ],
        1
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);