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

/***/ "./resources/js/singl/deleteProductRecord.js":
/*!***************************************************!*\
  !*** ./resources/js/singl/deleteProductRecord.js ***!
  \***************************************************/
/***/ (() => {

eval("var delete_url = '';\nvar delete_record = null;\n$('body').delegate('[delete-id]', 'click', function () {\n  delete_record = $(this);\n  $('#delete-record-id-block').text($(this).attr('delete-id'));\n  delete_url = $(this).attr('action');\n  $('#modal-warning').modal();\n});\n$('#deleteForm').submit(function () {\n  $('#modal-warning').modal('hide');\n  $.ajax({\n    type: 'DELETE',\n    url: delete_url,\n    headers: {\n      'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n    },\n    success: function success(data) {\n      if (data.data.message) {\n        toastr.success(data.data.message);\n      }\n\n      delete_record.parents('tr').remove();\n    },\n    error: function error() {\n      if (data.responseJSON.message) {\n        toastr.error(data.responseJSON.message);\n      }\n    }\n  });\n  return false;\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2luZ2wvZGVsZXRlUHJvZHVjdFJlY29yZC5qcz83OGQyIl0sIm5hbWVzIjpbImRlbGV0ZV91cmwiLCJkZWxldGVfcmVjb3JkIiwiJCIsImRlbGVnYXRlIiwidGV4dCIsImF0dHIiLCJtb2RhbCIsInN1Ym1pdCIsImFqYXgiLCJ0eXBlIiwidXJsIiwiaGVhZGVycyIsInN1Y2Nlc3MiLCJkYXRhIiwibWVzc2FnZSIsInRvYXN0ciIsInBhcmVudHMiLCJyZW1vdmUiLCJlcnJvciIsInJlc3BvbnNlSlNPTiJdLCJtYXBwaW5ncyI6IkFBQUEsSUFBSUEsVUFBVSxHQUFHLEVBQWpCO0FBQ0EsSUFBSUMsYUFBYSxHQUFHLElBQXBCO0FBRUFDLENBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVUMsUUFBVixDQUFtQixhQUFuQixFQUFrQyxPQUFsQyxFQUEyQyxZQUFVO0FBQ2pERixFQUFBQSxhQUFhLEdBQUdDLENBQUMsQ0FBQyxJQUFELENBQWpCO0FBQ0FBLEVBQUFBLENBQUMsQ0FBQyx5QkFBRCxDQUFELENBQTZCRSxJQUE3QixDQUFrQ0YsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRRyxJQUFSLENBQWEsV0FBYixDQUFsQztBQUNBTCxFQUFBQSxVQUFVLEdBQUdFLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUcsSUFBUixDQUFhLFFBQWIsQ0FBYjtBQUNBSCxFQUFBQSxDQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQkksS0FBcEI7QUFDSCxDQUxEO0FBT0FKLENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJLLE1BQWpCLENBQXdCLFlBQVU7QUFDOUJMLEVBQUFBLENBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CSSxLQUFwQixDQUEwQixNQUExQjtBQUNBSixFQUFBQSxDQUFDLENBQUNNLElBQUYsQ0FBTztBQUNIQyxJQUFBQSxJQUFJLEVBQUUsUUFESDtBQUVIQyxJQUFBQSxHQUFHLEVBQUVWLFVBRkY7QUFHSFcsSUFBQUEsT0FBTyxFQUFFO0FBQ0wsc0JBQWdCVCxDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkcsSUFBN0IsQ0FBa0MsU0FBbEM7QUFEWCxLQUhOO0FBTUhPLElBQUFBLE9BQU8sRUFBRSxpQkFBU0MsSUFBVCxFQUFjO0FBQ25CLFVBQUdBLElBQUksQ0FBQ0EsSUFBTCxDQUFVQyxPQUFiLEVBQXFCO0FBQ2pCQyxRQUFBQSxNQUFNLENBQUNILE9BQVAsQ0FBZUMsSUFBSSxDQUFDQSxJQUFMLENBQVVDLE9BQXpCO0FBQ0g7O0FBQ0RiLE1BQUFBLGFBQWEsQ0FBQ2UsT0FBZCxDQUFzQixJQUF0QixFQUE0QkMsTUFBNUI7QUFDSCxLQVhFO0FBWUhDLElBQUFBLEtBQUssRUFBRSxpQkFBVTtBQUNiLFVBQUdMLElBQUksQ0FBQ00sWUFBTCxDQUFrQkwsT0FBckIsRUFBNkI7QUFDekJDLFFBQUFBLE1BQU0sQ0FBQ0csS0FBUCxDQUFhTCxJQUFJLENBQUNNLFlBQUwsQ0FBa0JMLE9BQS9CO0FBQ0g7QUFDSjtBQWhCRSxHQUFQO0FBbUJBLFNBQU8sS0FBUDtBQUNILENBdEJEIiwic291cmNlc0NvbnRlbnQiOlsidmFyIGRlbGV0ZV91cmwgPSAnJ1xudmFyIGRlbGV0ZV9yZWNvcmQgPSBudWxsO1xuXG4kKCdib2R5JykuZGVsZWdhdGUoJ1tkZWxldGUtaWRdJywgJ2NsaWNrJywgZnVuY3Rpb24oKXtcbiAgICBkZWxldGVfcmVjb3JkID0gJCh0aGlzKTtcbiAgICAkKCcjZGVsZXRlLXJlY29yZC1pZC1ibG9jaycpLnRleHQoJCh0aGlzKS5hdHRyKCdkZWxldGUtaWQnKSk7XG4gICAgZGVsZXRlX3VybCA9ICQodGhpcykuYXR0cignYWN0aW9uJyk7XG4gICAgJCgnI21vZGFsLXdhcm5pbmcnKS5tb2RhbCgpO1xufSk7XG5cbiQoJyNkZWxldGVGb3JtJykuc3VibWl0KGZ1bmN0aW9uKCl7XG4gICAgJCgnI21vZGFsLXdhcm5pbmcnKS5tb2RhbCgnaGlkZScpO1xuICAgICQuYWpheCh7XG4gICAgICAgIHR5cGU6ICdERUxFVEUnLFxuICAgICAgICB1cmw6IGRlbGV0ZV91cmwsXG4gICAgICAgIGhlYWRlcnM6IHtcbiAgICAgICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpXG4gICAgICAgIH0sXG4gICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEpe1xuICAgICAgICAgICAgaWYoZGF0YS5kYXRhLm1lc3NhZ2Upe1xuICAgICAgICAgICAgICAgIHRvYXN0ci5zdWNjZXNzKGRhdGEuZGF0YS5tZXNzYWdlKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGRlbGV0ZV9yZWNvcmQucGFyZW50cygndHInKS5yZW1vdmUoKTtcbiAgICAgICAgfSxcbiAgICAgICAgZXJyb3I6IGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICBpZihkYXRhLnJlc3BvbnNlSlNPTi5tZXNzYWdlKXtcbiAgICAgICAgICAgICAgICB0b2FzdHIuZXJyb3IoZGF0YS5yZXNwb25zZUpTT04ubWVzc2FnZSk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9KTtcbiAgICBcbiAgICByZXR1cm4gZmFsc2U7XG59KTsiXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3NpbmdsL2RlbGV0ZVByb2R1Y3RSZWNvcmQuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/singl/deleteProductRecord.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/singl/deleteProductRecord.js"]();
/******/ 	
/******/ })()
;