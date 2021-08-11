/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/singl/forms.js":
/*!*************************************!*\
  !*** ./resources/js/singl/forms.js ***!
  \*************************************/
/***/ (() => {

eval("$('#form').submit(function () {\n  var formData = new FormData($('#form')[0]);\n  $.ajax({\n    type: $(this).attr('method'),\n    url: $(this).attr('action'),\n    data: formData,\n    cache: false,\n    contentType: false,\n    processData: false,\n    headers: {\n      'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n    },\n    success: function success(data) {\n      if (data.action == 'reset') {\n        $(\"#form\")[0].reset();\n      }\n\n      $(\"#alert-success span[data-text]\").text(data.data.message);\n      $(\"#alert-success\").slideDown(500);\n    }\n  });\n  return false;\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2luZ2wvZm9ybXMuanM/NTgwOSJdLCJuYW1lcyI6WyIkIiwic3VibWl0IiwiZm9ybURhdGEiLCJGb3JtRGF0YSIsImFqYXgiLCJ0eXBlIiwiYXR0ciIsInVybCIsImRhdGEiLCJjYWNoZSIsImNvbnRlbnRUeXBlIiwicHJvY2Vzc0RhdGEiLCJoZWFkZXJzIiwic3VjY2VzcyIsImFjdGlvbiIsInJlc2V0IiwidGV4dCIsIm1lc3NhZ2UiLCJzbGlkZURvd24iXSwibWFwcGluZ3MiOiJBQUFBQSxDQUFDLENBQUMsT0FBRCxDQUFELENBQVdDLE1BQVgsQ0FBa0IsWUFBVTtBQUN4QixNQUFJQyxRQUFRLEdBQUcsSUFBSUMsUUFBSixDQUFhSCxDQUFDLENBQUMsT0FBRCxDQUFELENBQVcsQ0FBWCxDQUFiLENBQWY7QUFFQUEsRUFBQUEsQ0FBQyxDQUFDSSxJQUFGLENBQU87QUFDSEMsSUFBQUEsSUFBSSxFQUFFTCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFNLElBQVIsQ0FBYSxRQUFiLENBREg7QUFFSEMsSUFBQUEsR0FBRyxFQUFFUCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFNLElBQVIsQ0FBYSxRQUFiLENBRkY7QUFHSEUsSUFBQUEsSUFBSSxFQUFFTixRQUhIO0FBSUhPLElBQUFBLEtBQUssRUFBRSxLQUpKO0FBS0hDLElBQUFBLFdBQVcsRUFBRSxLQUxWO0FBTUhDLElBQUFBLFdBQVcsRUFBRSxLQU5WO0FBT0hDLElBQUFBLE9BQU8sRUFBRTtBQUNMLHNCQUFnQlosQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJNLElBQTdCLENBQWtDLFNBQWxDO0FBRFgsS0FQTjtBQVVITyxJQUFBQSxPQUFPLEVBQUUsaUJBQVNMLElBQVQsRUFBYztBQUNuQixVQUFHQSxJQUFJLENBQUNNLE1BQUwsSUFBZSxPQUFsQixFQUEwQjtBQUN0QmQsUUFBQUEsQ0FBQyxDQUFDLE9BQUQsQ0FBRCxDQUFXLENBQVgsRUFBY2UsS0FBZDtBQUNIOztBQUVEZixNQUFBQSxDQUFDLENBQUMsZ0NBQUQsQ0FBRCxDQUFvQ2dCLElBQXBDLENBQXlDUixJQUFJLENBQUNBLElBQUwsQ0FBVVMsT0FBbkQ7QUFDQWpCLE1BQUFBLENBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9Ca0IsU0FBcEIsQ0FBOEIsR0FBOUI7QUFDSDtBQWpCRSxHQUFQO0FBbUJBLFNBQU8sS0FBUDtBQUNILENBdkJEIiwic291cmNlc0NvbnRlbnQiOlsiJCgnI2Zvcm0nKS5zdWJtaXQoZnVuY3Rpb24oKXtcbiAgICB2YXIgZm9ybURhdGEgPSBuZXcgRm9ybURhdGEoJCgnI2Zvcm0nKVswXSk7XG5cbiAgICAkLmFqYXgoe1xuICAgICAgICB0eXBlOiAkKHRoaXMpLmF0dHIoJ21ldGhvZCcpLFxuICAgICAgICB1cmw6ICQodGhpcykuYXR0cignYWN0aW9uJyksXG4gICAgICAgIGRhdGE6IGZvcm1EYXRhLFxuICAgICAgICBjYWNoZTogZmFsc2UsXG4gICAgICAgIGNvbnRlbnRUeXBlOiBmYWxzZSxcbiAgICAgICAgcHJvY2Vzc0RhdGE6IGZhbHNlLFxuICAgICAgICBoZWFkZXJzOiB7XG4gICAgICAgICAgICAnWC1DU1JGLVRPS0VOJzogJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKVxuICAgICAgICB9LFxuICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbihkYXRhKXtcbiAgICAgICAgICAgIGlmKGRhdGEuYWN0aW9uID09ICdyZXNldCcpe1xuICAgICAgICAgICAgICAgICQoXCIjZm9ybVwiKVswXS5yZXNldCgpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgXG4gICAgICAgICAgICAkKFwiI2FsZXJ0LXN1Y2Nlc3Mgc3BhbltkYXRhLXRleHRdXCIpLnRleHQoZGF0YS5kYXRhLm1lc3NhZ2UpO1xuICAgICAgICAgICAgJChcIiNhbGVydC1zdWNjZXNzXCIpLnNsaWRlRG93big1MDApO1xuICAgICAgICB9XG4gICAgfSk7XG4gICAgcmV0dXJuIGZhbHNlO1xufSk7Il0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9zaW5nbC9mb3Jtcy5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/singl/forms.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/singl/forms.js"]();
/******/ 	
/******/ })()
;