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

eval("/*window.$ = window.jQuery = require('jquery');\nwindow.hammerjs = require('hammerjs');*/\n\n$(function() {\n    $('#select_tag').material_select();\n    $(\".button-collapse\").sideNav();\n\n\tfunction validate() {\n\t\tvar id = $(this).attr('id');\n\t\tvar $label = $('label[for=\"' + id + '\"]');\n\n\t\tif ($label && $label.data('error')) {\n\t\t\t$(this).addClass('invalid');\n\t\t}\n\t}\n\n\t//$('.validate').on('keypress', validate);\n\t$('.validate').each(validate);\n});//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC5qcz84YjY3Il0sInNvdXJjZXNDb250ZW50IjpbIi8qd2luZG93LiQgPSB3aW5kb3cualF1ZXJ5ID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XG53aW5kb3cuaGFtbWVyanMgPSByZXF1aXJlKCdoYW1tZXJqcycpOyovXG5cbiQoZnVuY3Rpb24oKSB7XG4gICAgJCgnI3NlbGVjdF90YWcnKS5tYXRlcmlhbF9zZWxlY3QoKTtcbiAgICAkKFwiLmJ1dHRvbi1jb2xsYXBzZVwiKS5zaWRlTmF2KCk7XG5cblx0ZnVuY3Rpb24gdmFsaWRhdGUoKSB7XG5cdFx0dmFyIGlkID0gJCh0aGlzKS5hdHRyKCdpZCcpO1xuXHRcdHZhciAkbGFiZWwgPSAkKCdsYWJlbFtmb3I9XCInICsgaWQgKyAnXCJdJyk7XG5cblx0XHRpZiAoJGxhYmVsICYmICRsYWJlbC5kYXRhKCdlcnJvcicpKSB7XG5cdFx0XHQkKHRoaXMpLmFkZENsYXNzKCdpbnZhbGlkJyk7XG5cdFx0fVxuXHR9XG5cblx0Ly8kKCcudmFsaWRhdGUnKS5vbigna2V5cHJlc3MnLCB2YWxpZGF0ZSk7XG5cdCQoJy52YWxpZGF0ZScpLmVhY2godmFsaWRhdGUpO1xufSk7XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvYXBwLmpzIl0sIm1hcHBpbmdzIjoiQUFBQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);