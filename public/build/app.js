(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["app"],{

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_app_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles/app.css */ "./assets/styles/app.css");
/* harmony import */ var _styles_app_css__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_styles_app_css__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _styles_global_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./styles/global.scss */ "./assets/styles/global.scss");
/* harmony import */ var _styles_global_scss__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_styles_global_scss__WEBPACK_IMPORTED_MODULE_1__);
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)

 //require('./styles/global.scss');

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

__webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js");

__webpack_require__(/*! ./scripts/ReportComment */ "./assets/scripts/ReportComment.js");

console.log('Hello Webpack Encore! Edit me in assets/app.js');

/***/ }),

/***/ "./assets/scripts/ReportComment.js":
/*!*****************************************!*\
  !*** ./assets/scripts/ReportComment.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! core-js/modules/es.regexp.exec */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.split */ "./node_modules/core-js/modules/es.string.split.js");

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/*function reportCommentOnSubmit(comment) {
    $('#commentTargetId').val(comment);
}*/


$('.reportCommentButton').click(function () {
  console.log("REPORT COMMENT : " + this.id.split('-')[1]);
  $('#report_comment_target').val(this.id.split('-')[1]); //$('#commentReportModal').show();
});

/***/ }),

/***/ "./assets/styles/app.css":
/*!*******************************!*\
  !*** ./assets/styles/app.css ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/styles/global.scss":
/*!***********************************!*\
  !*** ./assets/styles/global.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

},[["./assets/app.js","runtime","vendors~app"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zY3JpcHRzL1JlcG9ydENvbW1lbnQuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3N0eWxlcy9hcHAuY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zdHlsZXMvZ2xvYmFsLnNjc3MiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJjb25zb2xlIiwibG9nIiwiY2xpY2siLCJpZCIsInNwbGl0IiwidmFsIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUVBO0FBQ0E7Q0FHQTs7QUFFQSxJQUFNQSxDQUFDLEdBQUdDLG1CQUFPLENBQUMsb0RBQUQsQ0FBakI7O0FBQ0FBLG1CQUFPLENBQUMsZ0VBQUQsQ0FBUDs7QUFDQUEsbUJBQU8sQ0FBQyxrRUFBRCxDQUFQOztBQUlBQyxPQUFPLENBQUNDLEdBQVIsQ0FBWSxnREFBWixFOzs7Ozs7Ozs7Ozs7Ozs7QUNuQkEsSUFBTUgsQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFELENBQWpCO0FBRUE7QUFDQTtBQUNBOzs7QUFDQUQsQ0FBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJJLEtBQTFCLENBQWdDLFlBQVc7QUFDdkNGLFNBQU8sQ0FBQ0MsR0FBUixDQUFZLHNCQUFvQixLQUFLRSxFQUFMLENBQVFDLEtBQVIsQ0FBYyxHQUFkLEVBQW1CLENBQW5CLENBQWhDO0FBQ0FOLEdBQUMsQ0FBQyx3QkFBRCxDQUFELENBQTRCTyxHQUE1QixDQUFnQyxLQUFLRixFQUFMLENBQVFDLEtBQVIsQ0FBYyxHQUFkLEVBQW1CLENBQW5CLENBQWhDLEVBRnVDLENBR3ZDO0FBQ0gsQ0FKRCxFOzs7Ozs7Ozs7OztBQ0xBLHVDOzs7Ozs7Ozs7OztBQ0FBLHVDIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8qXG4gKiBXZWxjb21lIHRvIHlvdXIgYXBwJ3MgbWFpbiBKYXZhU2NyaXB0IGZpbGUhXG4gKlxuICogV2UgcmVjb21tZW5kIGluY2x1ZGluZyB0aGUgYnVpbHQgdmVyc2lvbiBvZiB0aGlzIEphdmFTY3JpcHQgZmlsZVxuICogKGFuZCBpdHMgQ1NTIGZpbGUpIGluIHlvdXIgYmFzZSBsYXlvdXQgKGJhc2UuaHRtbC50d2lnKS5cbiAqL1xuXG4vLyBhbnkgQ1NTIHlvdSBpbXBvcnQgd2lsbCBvdXRwdXQgaW50byBhIHNpbmdsZSBjc3MgZmlsZSAoYXBwLmNzcyBpbiB0aGlzIGNhc2UpXG5pbXBvcnQgJy4vc3R5bGVzL2FwcC5jc3MnO1xuXG5pbXBvcnQgJy4vc3R5bGVzL2dsb2JhbC5zY3NzJztcbi8vcmVxdWlyZSgnLi9zdHlsZXMvZ2xvYmFsLnNjc3MnKTtcblxuY29uc3QgJCA9IHJlcXVpcmUoJ2pxdWVyeScpO1xucmVxdWlyZSgnYm9vdHN0cmFwJyk7XG5yZXF1aXJlKCcuL3NjcmlwdHMvUmVwb3J0Q29tbWVudCcpO1xuXG5cblxuY29uc29sZS5sb2coJ0hlbGxvIFdlYnBhY2sgRW5jb3JlISBFZGl0IG1lIGluIGFzc2V0cy9hcHAuanMnKTtcbiIsImNvbnN0ICQgPSByZXF1aXJlKCdqcXVlcnknKTtcblxuLypmdW5jdGlvbiByZXBvcnRDb21tZW50T25TdWJtaXQoY29tbWVudCkge1xuICAgICQoJyNjb21tZW50VGFyZ2V0SWQnKS52YWwoY29tbWVudCk7XG59Ki9cbiQoJy5yZXBvcnRDb21tZW50QnV0dG9uJykuY2xpY2soZnVuY3Rpb24gKCl7XG4gICAgY29uc29sZS5sb2coXCJSRVBPUlQgQ09NTUVOVCA6IFwiK3RoaXMuaWQuc3BsaXQoJy0nKVsxXSk7XG4gICAgJCgnI3JlcG9ydF9jb21tZW50X3RhcmdldCcpLnZhbCh0aGlzLmlkLnNwbGl0KCctJylbMV0pO1xuICAgIC8vJCgnI2NvbW1lbnRSZXBvcnRNb2RhbCcpLnNob3coKTtcbn0pIiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIl0sInNvdXJjZVJvb3QiOiIifQ==