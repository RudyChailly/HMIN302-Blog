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

$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
console.log('Hello Webpack Encore! Edit me in assets/app.js');

/***/ }),

/***/ "./assets/scripts/ReportComment.js":
/*!*****************************************!*\
  !*** ./assets/scripts/ReportComment.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.split.js */ "./node_modules/core-js/modules/es.string.split.js");

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/*function reportCommentOnSubmit(comment) {
    $('#commentTargetId').val(comment);
}*/


$('.reportCommentButton').click(function () {
  var commentId = this.id.split('-')[1];
  $('#report_comment_target').val(commentId);
  var contentDiv = $('#comment-content-' + commentId);
  var contentP = contentDiv.children()[0].innerHTML;
  $('#form-report-comment-content > p').html(contentP); //$('#commentReportModal').show();
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zY3JpcHRzL1JlcG9ydENvbW1lbnQuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3N0eWxlcy9hcHAuY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zdHlsZXMvZ2xvYmFsLnNjc3MiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJkb2N1bWVudCIsInJlYWR5IiwidG9vbHRpcCIsImNvbnNvbGUiLCJsb2ciLCJjbGljayIsImNvbW1lbnRJZCIsImlkIiwic3BsaXQiLCJ2YWwiLCJjb250ZW50RGl2IiwiY29udGVudFAiLCJjaGlsZHJlbiIsImlubmVySFRNTCIsImh0bWwiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUE7QUFDQTtDQUdBOztBQUVBLElBQU1BLENBQUMsR0FBR0MsbUJBQU8sQ0FBQyxvREFBRCxDQUFqQjs7QUFDQUEsbUJBQU8sQ0FBQyxnRUFBRCxDQUFQOztBQUNBQSxtQkFBTyxDQUFDLGtFQUFELENBQVA7O0FBRUFELENBQUMsQ0FBQ0UsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUN6QkgsR0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJJLE9BQTdCO0FBQ0gsQ0FGRDtBQUlBQyxPQUFPLENBQUNDLEdBQVIsQ0FBWSxnREFBWixFOzs7Ozs7Ozs7Ozs7Ozs7QUNyQkEsSUFBTU4sQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFELENBQWpCO0FBRUE7QUFDQTtBQUNBOzs7QUFDQUQsQ0FBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJPLEtBQTFCLENBQWdDLFlBQVc7QUFDdkMsTUFBSUMsU0FBUyxHQUFHLEtBQUtDLEVBQUwsQ0FBUUMsS0FBUixDQUFjLEdBQWQsRUFBbUIsQ0FBbkIsQ0FBaEI7QUFDQVYsR0FBQyxDQUFDLHdCQUFELENBQUQsQ0FBNEJXLEdBQTVCLENBQWdDSCxTQUFoQztBQUNBLE1BQUlJLFVBQVUsR0FBR1osQ0FBQyxDQUFDLHNCQUFvQlEsU0FBckIsQ0FBbEI7QUFDQSxNQUFJSyxRQUFRLEdBQUdELFVBQVUsQ0FBQ0UsUUFBWCxHQUFzQixDQUF0QixFQUF5QkMsU0FBeEM7QUFFQWYsR0FBQyxDQUFDLGtDQUFELENBQUQsQ0FBc0NnQixJQUF0QyxDQUEyQ0gsUUFBM0MsRUFOdUMsQ0FPdkM7QUFDSCxDQVJELEU7Ozs7Ozs7Ozs7O0FDTEEsdUM7Ozs7Ozs7Ozs7O0FDQUEsdUMiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLypcclxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxyXG4gKlxyXG4gKiBXZSByZWNvbW1lbmQgaW5jbHVkaW5nIHRoZSBidWlsdCB2ZXJzaW9uIG9mIHRoaXMgSmF2YVNjcmlwdCBmaWxlXHJcbiAqIChhbmQgaXRzIENTUyBmaWxlKSBpbiB5b3VyIGJhc2UgbGF5b3V0IChiYXNlLmh0bWwudHdpZykuXHJcbiAqL1xyXG5cclxuLy8gYW55IENTUyB5b3UgaW1wb3J0IHdpbGwgb3V0cHV0IGludG8gYSBzaW5nbGUgY3NzIGZpbGUgKGFwcC5jc3MgaW4gdGhpcyBjYXNlKVxyXG5pbXBvcnQgJy4vc3R5bGVzL2FwcC5jc3MnO1xyXG5cclxuaW1wb3J0ICcuL3N0eWxlcy9nbG9iYWwuc2Nzcyc7XHJcbi8vcmVxdWlyZSgnLi9zdHlsZXMvZ2xvYmFsLnNjc3MnKTtcclxuXHJcbmNvbnN0ICQgPSByZXF1aXJlKCdqcXVlcnknKTtcclxucmVxdWlyZSgnYm9vdHN0cmFwJyk7XHJcbnJlcXVpcmUoJy4vc2NyaXB0cy9SZXBvcnRDb21tZW50Jyk7XHJcblxyXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcclxuICAgICQoJ1tkYXRhLXRvZ2dsZT1cInRvb2x0aXBcIl0nKS50b29sdGlwKCk7XHJcbn0pO1xyXG5cclxuY29uc29sZS5sb2coJ0hlbGxvIFdlYnBhY2sgRW5jb3JlISBFZGl0IG1lIGluIGFzc2V0cy9hcHAuanMnKTtcclxuIiwiY29uc3QgJCA9IHJlcXVpcmUoJ2pxdWVyeScpO1xyXG5cclxuLypmdW5jdGlvbiByZXBvcnRDb21tZW50T25TdWJtaXQoY29tbWVudCkge1xyXG4gICAgJCgnI2NvbW1lbnRUYXJnZXRJZCcpLnZhbChjb21tZW50KTtcclxufSovXHJcbiQoJy5yZXBvcnRDb21tZW50QnV0dG9uJykuY2xpY2soZnVuY3Rpb24gKCl7XHJcbiAgICBsZXQgY29tbWVudElkID0gdGhpcy5pZC5zcGxpdCgnLScpWzFdO1xyXG4gICAgJCgnI3JlcG9ydF9jb21tZW50X3RhcmdldCcpLnZhbChjb21tZW50SWQpO1xyXG4gICAgbGV0IGNvbnRlbnREaXYgPSAkKCcjY29tbWVudC1jb250ZW50LScrY29tbWVudElkKTtcclxuICAgIGxldCBjb250ZW50UCA9IGNvbnRlbnREaXYuY2hpbGRyZW4oKVswXS5pbm5lckhUTUw7XHJcblxyXG4gICAgJCgnI2Zvcm0tcmVwb3J0LWNvbW1lbnQtY29udGVudCA+IHAnKS5odG1sKGNvbnRlbnRQKTtcclxuICAgIC8vJCgnI2NvbW1lbnRSZXBvcnRNb2RhbCcpLnNob3coKTtcclxufSkiLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW4iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW4iXSwic291cmNlUm9vdCI6IiJ9