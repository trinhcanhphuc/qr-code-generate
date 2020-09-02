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
        { staticClass: "col-9" },
        [
          _c("input", { attrs: { name: "token", type: "hidden", value: "" } }),
          _vm._v(" "),
          _c(
            "CButtonGroup",
            { staticClass: "w-100 d-flex" },
            [
              _c("CButton", { attrs: { color: "info" } }, [
                _vm._v("\n          URL\n          "),
                _c("input", {
                  staticClass: "w-0",
                  attrs: { type: "radio", value: "url" }
                })
              ]),
              _vm._v(" "),
              _c("CButton", { attrs: { color: "info" } }, [
                _vm._v("\n          Text\n          "),
                _c("input", {
                  staticClass: "w-0",
                  attrs: { type: "radio", value: "text" }
                })
              ]),
              _vm._v(" "),
              _c("CButton", { attrs: { color: "info" } }, [
                _vm._v("\n          Phone\n          "),
                _c("input", {
                  staticClass: "w-0",
                  attrs: { type: "radio", value: "phone" }
                })
              ]),
              _vm._v(" "),
              _c("CButton", { attrs: { color: "info" } }, [
                _vm._v("\n          SMS\n          "),
                _c("input", {
                  staticClass: "w-0",
                  attrs: { type: "radio", value: "sms" }
                })
              ]),
              _vm._v(" "),
              _c("CButton", { attrs: { color: "info" } }, [
                _vm._v("\n          Email\n          "),
                _c("input", {
                  staticClass: "w-0",
                  attrs: { type: "radio", value: "email" }
                })
              ]),
              _vm._v(" "),
              _c("CButton", { attrs: { color: "info" } }, [
                _vm._v("\n          Card\n          "),
                _c("input", {
                  staticClass: "w-0",
                  attrs: { type: "radio", value: "card" }
                })
              ])
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _vm._m(0)
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-3", attrs: { id: "qrcode-img" } }, [
      _c("img", {
        staticClass: "border-8 border-gray-700",
        attrs: { src: "" }
      }),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass:
            "bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded block mx-auto mt-5 select-none",
          attrs: { id: "btn_save_qr" }
        },
        [
          _c("i", { staticClass: "fas fa-download" }),
          _vm._v(" "),
          _c("span", { staticClass: "ml-2" }, [_vm._v("Download")])
        ]
      )
    ])
  }
]
render._withStripped = true



/***/ })

}]);