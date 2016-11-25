/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.l = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };

/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};

/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};

/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

eval("/*window.$ = window.jQuery = require('jquery');\r\nwindow.hammerjs = require('hammerjs');*/\r\n\r\n$(function() {\r\n    $('#select_tag').material_select();\r\n    $(\".button-collapse\").sideNav();\r\n\r\n\tfunction validate() {\r\n\t\tvar id = $(this).attr('id');\r\n\t\tvar $label = $('label[for=\"' + id + '\"]');\r\n\r\n\t\tif ($label && $label.data('error')) {\r\n\t\t\t$(this).addClass('invalid');\r\n\t\t}\r\n\t}\r\n\r\n\t//$('.validate').on('keypress', validate);\r\n\t$('.validate').each(validate);\r\n});//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC5qcz84YjY3Il0sInNvdXJjZXNDb250ZW50IjpbIi8qd2luZG93LiQgPSB3aW5kb3cualF1ZXJ5ID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XHJcbndpbmRvdy5oYW1tZXJqcyA9IHJlcXVpcmUoJ2hhbW1lcmpzJyk7Ki9cclxuXHJcbiQoZnVuY3Rpb24oKSB7XHJcbiAgICAkKCcjc2VsZWN0X3RhZycpLm1hdGVyaWFsX3NlbGVjdCgpO1xyXG4gICAgJChcIi5idXR0b24tY29sbGFwc2VcIikuc2lkZU5hdigpO1xyXG5cclxuXHRmdW5jdGlvbiB2YWxpZGF0ZSgpIHtcclxuXHRcdHZhciBpZCA9ICQodGhpcykuYXR0cignaWQnKTtcclxuXHRcdHZhciAkbGFiZWwgPSAkKCdsYWJlbFtmb3I9XCInICsgaWQgKyAnXCJdJyk7XHJcblxyXG5cdFx0aWYgKCRsYWJlbCAmJiAkbGFiZWwuZGF0YSgnZXJyb3InKSkge1xyXG5cdFx0XHQkKHRoaXMpLmFkZENsYXNzKCdpbnZhbGlkJyk7XHJcblx0XHR9XHJcblx0fVxyXG5cclxuXHQvLyQoJy52YWxpZGF0ZScpLm9uKCdrZXlwcmVzcycsIHZhbGlkYXRlKTtcclxuXHQkKCcudmFsaWRhdGUnKS5lYWNoKHZhbGlkYXRlKTtcclxufSk7XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvYXBwLmpzIl0sIm1hcHBpbmdzIjoiQUFBQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);