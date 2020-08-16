/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/home.js":
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

var qrcode_type = 'url';
$('.qr-type-radios').click(function (e) {
  $('.qrcode-input-form').hide();
  var qr_type_ele = $(e.target).parent().find("input[name='qr-type']");
  qrcode_type = qr_type_ele.val();

  switch (qrcode_type) {
    case 'email':
      $('#qrcode-email-form').show();
      break;

    case 'business_card':
      $('#qrcode-card-form').show();
      break;

    default:
      $('#qrcode-text').show();
      $('#qrcode-text').val('');
  }
});
$('#btn-create-qr').click(function () {
  switch (qrcode_type) {
    case 'email':
      data = {
        'email': $("#qrcode-email-form *[name='email']").val(),
        'subject': $("#qrcode-email-form *[name='subject']").val(),
        'body': $("#qrcode-email-form *[name='body']").val()
      };
      break;

    case 'business_card':
      data = {
        'type': 'detailed',
        'full_name': $("#qrcode-card-form input[name='full_name']").val(),
        'work_phone': $("#qrcode-card-form input[name='work_phone']").val(),
        'private_phone': $("#qrcode-card-form input[name='private_phone']").val(),
        'phone_cell': $("#qrcode-card-form input[name='phone_cell']").val(),
        'company': $("#qrcode-card-form input[name='company']").val(),
        'email': $("#qrcode-card-form input[name='email']").val(),
        'address_label': $("#qrcode-card-form input[name='address_label']").val(),
        'address_ext': $("#qrcode-card-form input[name='address_ext']").val(),
        'address_street': $("#qrcode-card-form input[name='address_street']").val(),
        'address_town': $("#qrcode-card-form input[name='address_town']").val(),
        'address_region': $("#qrcode-card-form input[name='address_region']").val(),
        'address_postcode': $("#qrcode-card-form input[name='address_postcode']").val(),
        'address_country': $("#qrcode-card-form input[name='address_country']").val()
      };
      break;

    default:
      data = {
        'content': $('#qrcode-text').val()
      };
  }

  data.fore_color = $("#qr-colors-section input[name='fore_color']").val().slice(1).convertToRGB();
  data.back_color = $("#qr-colors-section input[name='back_color']").val().slice(1).convertToRGB();
  data.logo = $("#qr-logo-section img[name='logo']").attr('src');
  $.ajax({
    method: 'POST',
    url: 'render_qr_code',
    data: {
      'type': qrcode_type,
      'data': data,
      '_token': '{{ csrf_token() }}'
    }
  }).done(function (result) {
    $('#qrcode-img img').attr('src', result + '?' + new Date().getTime());
    console.log();
    $("#qrcode-img img").css('border-color', $("#qr-colors-section input[name='back_color']").val());
  }).fail(function (error) {}).always(function () {});
});
$('#btn_save_qr').click(function () {
  return saveQRCode();
});
$('.qr-type-radios').click(function (e) {
  e.preventDefault();
  $('.qr-type-radios').removeClass('active');
  $(this).addClass('active');
});
$('.btn-menu-item').click(function () {
  $('.nav-menu-item').toggle();
});

function hexTo0x(color) {
  return eval('0x' + color.substr(1));
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#blah').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

String.prototype.convertToRGB = function () {
  if (this.length != 6) {
    throw "Only six-digit hex colors are allowed.";
  }

  var aRgbHex = this.match(/.{1,2}/g);
  var aRgb = [parseInt(aRgbHex[0], 16), parseInt(aRgbHex[1], 16), parseInt(aRgbHex[2], 16)];
  return aRgb;
};

function saveQRCode() {
  var qr_tag = document.createElement('a');
  qr_tag.href = $('#qrcode-img').find('img')[0].src;
  qr_tag.download = 'qr_code.png';
  qr_tag.click();
}

/***/ }),

/***/ 2:
/*!************************************!*\
  !*** multi ./resources/js/home.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/phuctc/Projects/qr-code-generate/resources/js/home.js */"./resources/js/home.js");


/***/ })

/******/ });