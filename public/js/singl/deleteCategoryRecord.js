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

/***/ "./resources/js/singl/deleteCategoryRecord.js":
/*!****************************************************!*\
  !*** ./resources/js/singl/deleteCategoryRecord.js ***!
  \****************************************************/
/***/ (() => {

eval("var delete_url = '';\nvar delete_record = null;\n$('body').delegate('[delete-id]', 'click', function () {\n  delete_record = $(this);\n  $('#delete-record-id-block').text($(this).attr('delete-id'));\n  delete_url = $(this).attr('action');\n  $('#modal-warning').modal();\n});\n$('#deleteForm').submit(function () {\n  $('#modal-warning').modal('hide');\n  $.ajax({\n    type: 'DELETE',\n    url: delete_url,\n    data: $(this).serialize(),\n    headers: {\n      'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n    },\n    success: function success(data) {\n      if (data.data.message) {\n        toastr.success(data.data.message);\n      }\n\n      delete_record.parents('tr').remove();\n    },\n    error: function error() {\n      if (data.responseJSON.message) {\n        toastr.error(data.responseJSON.message);\n      }\n    }\n  });\n  return false;\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2luZ2wvZGVsZXRlQ2F0ZWdvcnlSZWNvcmQuanM/NjE1NCJdLCJuYW1lcyI6WyJkZWxldGVfdXJsIiwiZGVsZXRlX3JlY29yZCIsIiQiLCJkZWxlZ2F0ZSIsInRleHQiLCJhdHRyIiwibW9kYWwiLCJzdWJtaXQiLCJhamF4IiwidHlwZSIsInVybCIsImRhdGEiLCJzZXJpYWxpemUiLCJoZWFkZXJzIiwic3VjY2VzcyIsIm1lc3NhZ2UiLCJ0b2FzdHIiLCJwYXJlbnRzIiwicmVtb3ZlIiwiZXJyb3IiLCJyZXNwb25zZUpTT04iXSwibWFwcGluZ3MiOiJBQUFBLElBQUlBLFVBQVUsR0FBRyxFQUFqQjtBQUNBLElBQUlDLGFBQWEsR0FBRyxJQUFwQjtBQUVBQyxDQUFDLENBQUMsTUFBRCxDQUFELENBQVVDLFFBQVYsQ0FBbUIsYUFBbkIsRUFBa0MsT0FBbEMsRUFBMkMsWUFBVTtBQUNqREYsRUFBQUEsYUFBYSxHQUFHQyxDQUFDLENBQUMsSUFBRCxDQUFqQjtBQUNBQSxFQUFBQSxDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkUsSUFBN0IsQ0FBa0NGLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUcsSUFBUixDQUFhLFdBQWIsQ0FBbEM7QUFDQUwsRUFBQUEsVUFBVSxHQUFHRSxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFHLElBQVIsQ0FBYSxRQUFiLENBQWI7QUFDQUgsRUFBQUEsQ0FBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0JJLEtBQXBCO0FBQ0gsQ0FMRDtBQU9BSixDQUFDLENBQUMsYUFBRCxDQUFELENBQWlCSyxNQUFqQixDQUF3QixZQUFVO0FBQzlCTCxFQUFBQSxDQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQkksS0FBcEIsQ0FBMEIsTUFBMUI7QUFDQUosRUFBQUEsQ0FBQyxDQUFDTSxJQUFGLENBQU87QUFDSEMsSUFBQUEsSUFBSSxFQUFFLFFBREg7QUFFSEMsSUFBQUEsR0FBRyxFQUFFVixVQUZGO0FBR0hXLElBQUFBLElBQUksRUFBRVQsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRVSxTQUFSLEVBSEg7QUFJSEMsSUFBQUEsT0FBTyxFQUFFO0FBQ0wsc0JBQWdCWCxDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkcsSUFBN0IsQ0FBa0MsU0FBbEM7QUFEWCxLQUpOO0FBT0hTLElBQUFBLE9BQU8sRUFBRSxpQkFBU0gsSUFBVCxFQUFjO0FBQ25CLFVBQUdBLElBQUksQ0FBQ0EsSUFBTCxDQUFVSSxPQUFiLEVBQXFCO0FBQ2pCQyxRQUFBQSxNQUFNLENBQUNGLE9BQVAsQ0FBZUgsSUFBSSxDQUFDQSxJQUFMLENBQVVJLE9BQXpCO0FBQ0g7O0FBQ0RkLE1BQUFBLGFBQWEsQ0FBQ2dCLE9BQWQsQ0FBc0IsSUFBdEIsRUFBNEJDLE1BQTVCO0FBQ0gsS0FaRTtBQWFIQyxJQUFBQSxLQUFLLEVBQUUsaUJBQVU7QUFDYixVQUFHUixJQUFJLENBQUNTLFlBQUwsQ0FBa0JMLE9BQXJCLEVBQTZCO0FBQ3pCQyxRQUFBQSxNQUFNLENBQUNHLEtBQVAsQ0FBYVIsSUFBSSxDQUFDUyxZQUFMLENBQWtCTCxPQUEvQjtBQUNIO0FBQ0o7QUFqQkUsR0FBUDtBQW9CQSxTQUFPLEtBQVA7QUFDSCxDQXZCRCIsInNvdXJjZXNDb250ZW50IjpbInZhciBkZWxldGVfdXJsID0gJydcbnZhciBkZWxldGVfcmVjb3JkID0gbnVsbDtcblxuJCgnYm9keScpLmRlbGVnYXRlKCdbZGVsZXRlLWlkXScsICdjbGljaycsIGZ1bmN0aW9uKCl7XG4gICAgZGVsZXRlX3JlY29yZCA9ICQodGhpcyk7XG4gICAgJCgnI2RlbGV0ZS1yZWNvcmQtaWQtYmxvY2snKS50ZXh0KCQodGhpcykuYXR0cignZGVsZXRlLWlkJykpO1xuICAgIGRlbGV0ZV91cmwgPSAkKHRoaXMpLmF0dHIoJ2FjdGlvbicpO1xuICAgICQoJyNtb2RhbC13YXJuaW5nJykubW9kYWwoKTtcbn0pO1xuXG4kKCcjZGVsZXRlRm9ybScpLnN1Ym1pdChmdW5jdGlvbigpe1xuICAgICQoJyNtb2RhbC13YXJuaW5nJykubW9kYWwoJ2hpZGUnKTtcbiAgICAkLmFqYXgoe1xuICAgICAgICB0eXBlOiAnREVMRVRFJyxcbiAgICAgICAgdXJsOiBkZWxldGVfdXJsLFxuICAgICAgICBkYXRhOiAkKHRoaXMpLnNlcmlhbGl6ZSgpLFxuICAgICAgICBoZWFkZXJzOiB7XG4gICAgICAgICAgICAnWC1DU1JGLVRPS0VOJzogJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKVxuICAgICAgICB9LFxuICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbihkYXRhKXtcbiAgICAgICAgICAgIGlmKGRhdGEuZGF0YS5tZXNzYWdlKXtcbiAgICAgICAgICAgICAgICB0b2FzdHIuc3VjY2VzcyhkYXRhLmRhdGEubWVzc2FnZSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBkZWxldGVfcmVjb3JkLnBhcmVudHMoJ3RyJykucmVtb3ZlKCk7XG4gICAgICAgIH0sXG4gICAgICAgIGVycm9yOiBmdW5jdGlvbigpe1xuICAgICAgICAgICAgaWYoZGF0YS5yZXNwb25zZUpTT04ubWVzc2FnZSl7XG4gICAgICAgICAgICAgICAgdG9hc3RyLmVycm9yKGRhdGEucmVzcG9uc2VKU09OLm1lc3NhZ2UpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfSk7XG5cbiAgICByZXR1cm4gZmFsc2U7XG59KTsiXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3NpbmdsL2RlbGV0ZUNhdGVnb3J5UmVjb3JkLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/singl/deleteCategoryRecord.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/singl/deleteCategoryRecord.js"]();
/******/ 	
/******/ })()
;