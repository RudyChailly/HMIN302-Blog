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

__webpack_require__(/*! core-js/modules/es.regexp.exec */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.split */ "./node_modules/core-js/modules/es.string.split.js");

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zY3JpcHRzL1JlcG9ydENvbW1lbnQuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3N0eWxlcy9hcHAuY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zdHlsZXMvZ2xvYmFsLnNjc3MiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJkb2N1bWVudCIsInJlYWR5IiwidG9vbHRpcCIsImNvbnNvbGUiLCJsb2ciLCJjbGljayIsImNvbW1lbnRJZCIsImlkIiwic3BsaXQiLCJ2YWwiLCJjb250ZW50RGl2IiwiY29udGVudFAiLCJjaGlsZHJlbiIsImlubmVySFRNTCIsImh0bWwiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUE7QUFDQTtDQUdBOztBQUVBLElBQU1BLENBQUMsR0FBR0MsbUJBQU8sQ0FBQyxvREFBRCxDQUFqQjs7QUFDQUEsbUJBQU8sQ0FBQyxnRUFBRCxDQUFQOztBQUNBQSxtQkFBTyxDQUFDLGtFQUFELENBQVA7O0FBRUFELENBQUMsQ0FBQ0UsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUN6QkgsR0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJJLE9BQTdCO0FBQ0gsQ0FGRDtBQUlBQyxPQUFPLENBQUNDLEdBQVIsQ0FBWSxnREFBWixFOzs7Ozs7Ozs7Ozs7Ozs7QUNyQkEsSUFBTU4sQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFELENBQWpCO0FBRUE7QUFDQTtBQUNBOzs7QUFDQUQsQ0FBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJPLEtBQTFCLENBQWdDLFlBQVc7QUFDdkMsTUFBSUMsU0FBUyxHQUFHLEtBQUtDLEVBQUwsQ0FBUUMsS0FBUixDQUFjLEdBQWQsRUFBbUIsQ0FBbkIsQ0FBaEI7QUFDQVYsR0FBQyxDQUFDLHdCQUFELENBQUQsQ0FBNEJXLEdBQTVCLENBQWdDSCxTQUFoQztBQUNBLE1BQUlJLFVBQVUsR0FBR1osQ0FBQyxDQUFDLHNCQUFvQlEsU0FBckIsQ0FBbEI7QUFDQSxNQUFJSyxRQUFRLEdBQUdELFVBQVUsQ0FBQ0UsUUFBWCxHQUFzQixDQUF0QixFQUF5QkMsU0FBeEM7QUFFQWYsR0FBQyxDQUFDLGtDQUFELENBQUQsQ0FBc0NnQixJQUF0QyxDQUEyQ0gsUUFBM0MsRUFOdUMsQ0FPdkM7QUFDSCxDQVJELEU7Ozs7Ozs7Ozs7O0FDTEEsdUM7Ozs7Ozs7Ozs7O0FDQUEsdUMiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLypcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcbiAqXG4gKiBXZSByZWNvbW1lbmQgaW5jbHVkaW5nIHRoZSBidWlsdCB2ZXJzaW9uIG9mIHRoaXMgSmF2YVNjcmlwdCBmaWxlXG4gKiAoYW5kIGl0cyBDU1MgZmlsZSkgaW4geW91ciBiYXNlIGxheW91dCAoYmFzZS5odG1sLnR3aWcpLlxuICovXG5cbi8vIGFueSBDU1MgeW91IGltcG9ydCB3aWxsIG91dHB1dCBpbnRvIGEgc2luZ2xlIGNzcyBmaWxlIChhcHAuY3NzIGluIHRoaXMgY2FzZSlcbmltcG9ydCAnLi9zdHlsZXMvYXBwLmNzcyc7XG5cbmltcG9ydCAnLi9zdHlsZXMvZ2xvYmFsLnNjc3MnO1xuLy9yZXF1aXJlKCcuL3N0eWxlcy9nbG9iYWwuc2NzcycpO1xuXG5jb25zdCAkID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XG5yZXF1aXJlKCdib290c3RyYXAnKTtcbnJlcXVpcmUoJy4vc2NyaXB0cy9SZXBvcnRDb21tZW50Jyk7XG5cbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgICQoJ1tkYXRhLXRvZ2dsZT1cInRvb2x0aXBcIl0nKS50b29sdGlwKCk7XG59KTtcblxuY29uc29sZS5sb2coJ0hlbGxvIFdlYnBhY2sgRW5jb3JlISBFZGl0IG1lIGluIGFzc2V0cy9hcHAuanMnKTtcbiIsImNvbnN0ICQgPSByZXF1aXJlKCdqcXVlcnknKTtcblxuLypmdW5jdGlvbiByZXBvcnRDb21tZW50T25TdWJtaXQoY29tbWVudCkge1xuICAgICQoJyNjb21tZW50VGFyZ2V0SWQnKS52YWwoY29tbWVudCk7XG59Ki9cbiQoJy5yZXBvcnRDb21tZW50QnV0dG9uJykuY2xpY2soZnVuY3Rpb24gKCl7XG4gICAgbGV0IGNvbW1lbnRJZCA9IHRoaXMuaWQuc3BsaXQoJy0nKVsxXTtcbiAgICAkKCcjcmVwb3J0X2NvbW1lbnRfdGFyZ2V0JykudmFsKGNvbW1lbnRJZCk7XG4gICAgbGV0IGNvbnRlbnREaXYgPSAkKCcjY29tbWVudC1jb250ZW50LScrY29tbWVudElkKTtcbiAgICBsZXQgY29udGVudFAgPSBjb250ZW50RGl2LmNoaWxkcmVuKClbMF0uaW5uZXJIVE1MO1xuXG4gICAgJCgnI2Zvcm0tcmVwb3J0LWNvbW1lbnQtY29udGVudCA+IHAnKS5odG1sKGNvbnRlbnRQKTtcbiAgICAvLyQoJyNjb21tZW50UmVwb3J0TW9kYWwnKS5zaG93KCk7XG59KSIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiJdLCJzb3VyY2VSb290IjoiIn0=