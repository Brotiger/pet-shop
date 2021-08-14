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

/***/ "./resources/js/singl/deleteRecord.js":
/*!********************************************!*\
  !*** ./resources/js/singl/deleteRecord.js ***!
  \********************************************/
/***/ (() => {

eval("var delete_url = '';\nvar delete_record = null;\n$('body').delegate('[delete-id]', 'click', function () {\n  delete_record = $(this);\n  $('#delete-record-id-block').text($(this).attr('delete-id'));\n  delete_url = $(this).attr('action');\n  $('#modal-warning').modal();\n});\n$('body').delegate('#btn-delete-record', 'click', function () {\n  $('#modal-warning').modal('hide');\n  $.ajax({\n    type: 'DELETE',\n    url: delete_url,\n    headers: {\n      'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n    },\n    success: function success(data) {\n      if (data.data.message) {\n        toastr.success(data.data.message);\n      }\n\n      $('#table').html(data.data.html.table);\n    },\n    error: function error() {\n      if (data.responseJSON.message) {\n        toastr.error(data.responseJSON.message);\n      }\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2luZ2wvZGVsZXRlUmVjb3JkLmpzPzBlY2IiXSwibmFtZXMiOlsiZGVsZXRlX3VybCIsImRlbGV0ZV9yZWNvcmQiLCIkIiwiZGVsZWdhdGUiLCJ0ZXh0IiwiYXR0ciIsIm1vZGFsIiwiYWpheCIsInR5cGUiLCJ1cmwiLCJoZWFkZXJzIiwic3VjY2VzcyIsImRhdGEiLCJtZXNzYWdlIiwidG9hc3RyIiwiaHRtbCIsInRhYmxlIiwiZXJyb3IiLCJyZXNwb25zZUpTT04iXSwibWFwcGluZ3MiOiJBQUFBLElBQUlBLFVBQVUsR0FBRyxFQUFqQjtBQUNBLElBQUlDLGFBQWEsR0FBRyxJQUFwQjtBQUVBQyxDQUFDLENBQUMsTUFBRCxDQUFELENBQVVDLFFBQVYsQ0FBbUIsYUFBbkIsRUFBa0MsT0FBbEMsRUFBMkMsWUFBVTtBQUNqREYsRUFBQUEsYUFBYSxHQUFHQyxDQUFDLENBQUMsSUFBRCxDQUFqQjtBQUNBQSxFQUFBQSxDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkUsSUFBN0IsQ0FBa0NGLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUcsSUFBUixDQUFhLFdBQWIsQ0FBbEM7QUFDQUwsRUFBQUEsVUFBVSxHQUFHRSxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFHLElBQVIsQ0FBYSxRQUFiLENBQWI7QUFDQUgsRUFBQUEsQ0FBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0JJLEtBQXBCO0FBQ0gsQ0FMRDtBQU9BSixDQUFDLENBQUMsTUFBRCxDQUFELENBQVVDLFFBQVYsQ0FBbUIsb0JBQW5CLEVBQXlDLE9BQXpDLEVBQWtELFlBQVU7QUFDeERELEVBQUFBLENBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CSSxLQUFwQixDQUEwQixNQUExQjtBQUNBSixFQUFBQSxDQUFDLENBQUNLLElBQUYsQ0FBTztBQUNIQyxJQUFBQSxJQUFJLEVBQUUsUUFESDtBQUVIQyxJQUFBQSxHQUFHLEVBQUVULFVBRkY7QUFHSFUsSUFBQUEsT0FBTyxFQUFFO0FBQ0wsc0JBQWdCUixDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkcsSUFBN0IsQ0FBa0MsU0FBbEM7QUFEWCxLQUhOO0FBTUhNLElBQUFBLE9BQU8sRUFBRSxpQkFBU0MsSUFBVCxFQUFjO0FBQ25CLFVBQUdBLElBQUksQ0FBQ0EsSUFBTCxDQUFVQyxPQUFiLEVBQXFCO0FBQ2pCQyxRQUFBQSxNQUFNLENBQUNILE9BQVAsQ0FBZUMsSUFBSSxDQUFDQSxJQUFMLENBQVVDLE9BQXpCO0FBQ0g7O0FBQ0RYLE1BQUFBLENBQUMsQ0FBQyxRQUFELENBQUQsQ0FBWWEsSUFBWixDQUFpQkgsSUFBSSxDQUFDQSxJQUFMLENBQVVHLElBQVYsQ0FBZUMsS0FBaEM7QUFDSCxLQVhFO0FBWUhDLElBQUFBLEtBQUssRUFBRSxpQkFBVTtBQUNiLFVBQUdMLElBQUksQ0FBQ00sWUFBTCxDQUFrQkwsT0FBckIsRUFBNkI7QUFDekJDLFFBQUFBLE1BQU0sQ0FBQ0csS0FBUCxDQUFhTCxJQUFJLENBQUNNLFlBQUwsQ0FBa0JMLE9BQS9CO0FBQ0g7QUFDSjtBQWhCRSxHQUFQO0FBa0JILENBcEJEIiwic291cmNlc0NvbnRlbnQiOlsidmFyIGRlbGV0ZV91cmwgPSAnJ1xudmFyIGRlbGV0ZV9yZWNvcmQgPSBudWxsO1xuXG4kKCdib2R5JykuZGVsZWdhdGUoJ1tkZWxldGUtaWRdJywgJ2NsaWNrJywgZnVuY3Rpb24oKXtcbiAgICBkZWxldGVfcmVjb3JkID0gJCh0aGlzKTtcbiAgICAkKCcjZGVsZXRlLXJlY29yZC1pZC1ibG9jaycpLnRleHQoJCh0aGlzKS5hdHRyKCdkZWxldGUtaWQnKSk7XG4gICAgZGVsZXRlX3VybCA9ICQodGhpcykuYXR0cignYWN0aW9uJyk7XG4gICAgJCgnI21vZGFsLXdhcm5pbmcnKS5tb2RhbCgpO1xufSk7XG5cbiQoJ2JvZHknKS5kZWxlZ2F0ZSgnI2J0bi1kZWxldGUtcmVjb3JkJywgJ2NsaWNrJywgZnVuY3Rpb24oKXtcbiAgICAkKCcjbW9kYWwtd2FybmluZycpLm1vZGFsKCdoaWRlJyk7XG4gICAgJC5hamF4KHtcbiAgICAgICAgdHlwZTogJ0RFTEVURScsXG4gICAgICAgIHVybDogZGVsZXRlX3VybCxcbiAgICAgICAgaGVhZGVyczoge1xuICAgICAgICAgICAgJ1gtQ1NSRi1UT0tFTic6ICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JylcbiAgICAgICAgfSxcbiAgICAgICAgc3VjY2VzczogZnVuY3Rpb24oZGF0YSl7XG4gICAgICAgICAgICBpZihkYXRhLmRhdGEubWVzc2FnZSl7XG4gICAgICAgICAgICAgICAgdG9hc3RyLnN1Y2Nlc3MoZGF0YS5kYXRhLm1lc3NhZ2UpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgJCgnI3RhYmxlJykuaHRtbChkYXRhLmRhdGEuaHRtbC50YWJsZSk7XG4gICAgICAgIH0sXG4gICAgICAgIGVycm9yOiBmdW5jdGlvbigpe1xuICAgICAgICAgICAgaWYoZGF0YS5yZXNwb25zZUpTT04ubWVzc2FnZSl7XG4gICAgICAgICAgICAgICAgdG9hc3RyLmVycm9yKGRhdGEucmVzcG9uc2VKU09OLm1lc3NhZ2UpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfSk7XG59KTsiXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3NpbmdsL2RlbGV0ZVJlY29yZC5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/singl/deleteRecord.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/singl/deleteRecord.js"]();
/******/ 	
/******/ })()
;