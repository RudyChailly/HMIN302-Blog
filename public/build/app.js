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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zY3JpcHRzL1JlcG9ydENvbW1lbnQuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3N0eWxlcy9hcHAuY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zdHlsZXMvZ2xvYmFsLnNjc3MiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJjb25zb2xlIiwibG9nIiwiY2xpY2siLCJpZCIsInNwbGl0IiwidmFsIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUVBO0FBQ0E7Q0FHQTs7QUFFQSxJQUFNQSxDQUFDLEdBQUdDLG1CQUFPLENBQUMsb0RBQUQsQ0FBakI7O0FBQ0FBLG1CQUFPLENBQUMsZ0VBQUQsQ0FBUDs7QUFDQUEsbUJBQU8sQ0FBQyxrRUFBRCxDQUFQOztBQUlBQyxPQUFPLENBQUNDLEdBQVIsQ0FBWSxnREFBWixFOzs7Ozs7Ozs7Ozs7Ozs7QUNuQkEsSUFBTUgsQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFELENBQWpCO0FBRUE7QUFDQTtBQUNBOzs7QUFDQUQsQ0FBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJJLEtBQTFCLENBQWdDLFlBQVc7QUFDdkNGLFNBQU8sQ0FBQ0MsR0FBUixDQUFZLHNCQUFvQixLQUFLRSxFQUFMLENBQVFDLEtBQVIsQ0FBYyxHQUFkLEVBQW1CLENBQW5CLENBQWhDO0FBQ0FOLEdBQUMsQ0FBQyx3QkFBRCxDQUFELENBQTRCTyxHQUE1QixDQUFnQyxLQUFLRixFQUFMLENBQVFDLEtBQVIsQ0FBYyxHQUFkLEVBQW1CLENBQW5CLENBQWhDLEVBRnVDLENBR3ZDO0FBQ0gsQ0FKRCxFOzs7Ozs7Ozs7OztBQ0xBLHVDOzs7Ozs7Ozs7OztBQ0FBLHVDIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8qXHJcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcclxuICpcclxuICogV2UgcmVjb21tZW5kIGluY2x1ZGluZyB0aGUgYnVpbHQgdmVyc2lvbiBvZiB0aGlzIEphdmFTY3JpcHQgZmlsZVxyXG4gKiAoYW5kIGl0cyBDU1MgZmlsZSkgaW4geW91ciBiYXNlIGxheW91dCAoYmFzZS5odG1sLnR3aWcpLlxyXG4gKi9cclxuXHJcbi8vIGFueSBDU1MgeW91IGltcG9ydCB3aWxsIG91dHB1dCBpbnRvIGEgc2luZ2xlIGNzcyBmaWxlIChhcHAuY3NzIGluIHRoaXMgY2FzZSlcclxuaW1wb3J0ICcuL3N0eWxlcy9hcHAuY3NzJztcclxuXHJcbmltcG9ydCAnLi9zdHlsZXMvZ2xvYmFsLnNjc3MnO1xyXG4vL3JlcXVpcmUoJy4vc3R5bGVzL2dsb2JhbC5zY3NzJyk7XHJcblxyXG5jb25zdCAkID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XHJcbnJlcXVpcmUoJ2Jvb3RzdHJhcCcpO1xyXG5yZXF1aXJlKCcuL3NjcmlwdHMvUmVwb3J0Q29tbWVudCcpO1xyXG5cclxuXHJcblxyXG5jb25zb2xlLmxvZygnSGVsbG8gV2VicGFjayBFbmNvcmUhIEVkaXQgbWUgaW4gYXNzZXRzL2FwcC5qcycpO1xyXG4iLCJjb25zdCAkID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XHJcblxyXG4vKmZ1bmN0aW9uIHJlcG9ydENvbW1lbnRPblN1Ym1pdChjb21tZW50KSB7XHJcbiAgICAkKCcjY29tbWVudFRhcmdldElkJykudmFsKGNvbW1lbnQpO1xyXG59Ki9cclxuJCgnLnJlcG9ydENvbW1lbnRCdXR0b24nKS5jbGljayhmdW5jdGlvbiAoKXtcclxuICAgIGNvbnNvbGUubG9nKFwiUkVQT1JUIENPTU1FTlQgOiBcIit0aGlzLmlkLnNwbGl0KCctJylbMV0pO1xyXG4gICAgJCgnI3JlcG9ydF9jb21tZW50X3RhcmdldCcpLnZhbCh0aGlzLmlkLnNwbGl0KCctJylbMV0pO1xyXG4gICAgLy8kKCcjY29tbWVudFJlcG9ydE1vZGFsJykuc2hvdygpO1xyXG59KSIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiJdLCJzb3VyY2VSb290IjoiIn0=