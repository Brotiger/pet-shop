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

/***/ "./resources/js/singl/tableSettings.js":
/*!*********************************************!*\
  !*** ./resources/js/singl/tableSettings.js ***!
  \*********************************************/
/***/ (() => {

eval("$('body').delegate('#btn-modal-settings', 'click', function () {\n  $('#modal-table-settings').modal();\n});\n$('#settingsForm').submit(function () {\n  $('#modal-table-settings').modal('hide');\n  $.ajax({\n    type: $(this).attr('method'),\n    url: $(this).attr('action'),\n    data: $(this).serialize(),\n    headers: {\n      'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n    },\n    success: function success(data) {\n      $('#table').html(data.data.html.table);\n    },\n    error: function error(data) {\n      if (data.responseJSON.message) {\n        toastr.error(data.responseJSON.message);\n      }\n    }\n  });\n  return false;\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2luZ2wvdGFibGVTZXR0aW5ncy5qcz83Y2U4Il0sIm5hbWVzIjpbIiQiLCJkZWxlZ2F0ZSIsIm1vZGFsIiwic3VibWl0IiwiYWpheCIsInR5cGUiLCJhdHRyIiwidXJsIiwiZGF0YSIsInNlcmlhbGl6ZSIsImhlYWRlcnMiLCJzdWNjZXNzIiwiaHRtbCIsInRhYmxlIiwiZXJyb3IiLCJyZXNwb25zZUpTT04iLCJtZXNzYWdlIiwidG9hc3RyIl0sIm1hcHBpbmdzIjoiQUFBQUEsQ0FBQyxDQUFDLE1BQUQsQ0FBRCxDQUFVQyxRQUFWLENBQW1CLHFCQUFuQixFQUEwQyxPQUExQyxFQUFtRCxZQUFVO0FBQ3pERCxFQUFBQSxDQUFDLENBQUMsdUJBQUQsQ0FBRCxDQUEyQkUsS0FBM0I7QUFDSCxDQUZEO0FBSUFGLENBQUMsQ0FBQyxlQUFELENBQUQsQ0FBbUJHLE1BQW5CLENBQTBCLFlBQVU7QUFDaENILEVBQUFBLENBQUMsQ0FBQyx1QkFBRCxDQUFELENBQTJCRSxLQUEzQixDQUFpQyxNQUFqQztBQUNBRixFQUFBQSxDQUFDLENBQUNJLElBQUYsQ0FBTztBQUNIQyxJQUFBQSxJQUFJLEVBQUVMLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU0sSUFBUixDQUFhLFFBQWIsQ0FESDtBQUVIQyxJQUFBQSxHQUFHLEVBQUVQLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU0sSUFBUixDQUFhLFFBQWIsQ0FGRjtBQUdIRSxJQUFBQSxJQUFJLEVBQUVSLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVMsU0FBUixFQUhIO0FBSUhDLElBQUFBLE9BQU8sRUFBRTtBQUNMLHNCQUFnQlYsQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJNLElBQTdCLENBQWtDLFNBQWxDO0FBRFgsS0FKTjtBQU9ISyxJQUFBQSxPQUFPLEVBQUUsaUJBQVNILElBQVQsRUFBYztBQUNuQlIsTUFBQUEsQ0FBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZWSxJQUFaLENBQWlCSixJQUFJLENBQUNBLElBQUwsQ0FBVUksSUFBVixDQUFlQyxLQUFoQztBQUNILEtBVEU7QUFVSEMsSUFBQUEsS0FBSyxFQUFFLGVBQVNOLElBQVQsRUFBYztBQUNqQixVQUFHQSxJQUFJLENBQUNPLFlBQUwsQ0FBa0JDLE9BQXJCLEVBQTZCO0FBQ3pCQyxRQUFBQSxNQUFNLENBQUNILEtBQVAsQ0FBYU4sSUFBSSxDQUFDTyxZQUFMLENBQWtCQyxPQUEvQjtBQUNIO0FBQ0o7QUFkRSxHQUFQO0FBaUJBLFNBQU8sS0FBUDtBQUNILENBcEJEIiwic291cmNlc0NvbnRlbnQiOlsiJCgnYm9keScpLmRlbGVnYXRlKCcjYnRuLW1vZGFsLXNldHRpbmdzJywgJ2NsaWNrJywgZnVuY3Rpb24oKXtcbiAgICAkKCcjbW9kYWwtdGFibGUtc2V0dGluZ3MnKS5tb2RhbCgpO1xufSk7XG5cbiQoJyNzZXR0aW5nc0Zvcm0nKS5zdWJtaXQoZnVuY3Rpb24oKXtcbiAgICAkKCcjbW9kYWwtdGFibGUtc2V0dGluZ3MnKS5tb2RhbCgnaGlkZScpO1xuICAgICQuYWpheCh7XG4gICAgICAgIHR5cGU6ICQodGhpcykuYXR0cignbWV0aG9kJyksXG4gICAgICAgIHVybDogJCh0aGlzKS5hdHRyKCdhY3Rpb24nKSxcbiAgICAgICAgZGF0YTogJCh0aGlzKS5zZXJpYWxpemUoKSxcbiAgICAgICAgaGVhZGVyczoge1xuICAgICAgICAgICAgJ1gtQ1NSRi1UT0tFTic6ICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JylcbiAgICAgICAgfSxcbiAgICAgICAgc3VjY2VzczogZnVuY3Rpb24oZGF0YSl7XG4gICAgICAgICAgICAkKCcjdGFibGUnKS5odG1sKGRhdGEuZGF0YS5odG1sLnRhYmxlKTtcbiAgICAgICAgfSxcbiAgICAgICAgZXJyb3I6IGZ1bmN0aW9uKGRhdGEpe1xuICAgICAgICAgICAgaWYoZGF0YS5yZXNwb25zZUpTT04ubWVzc2FnZSl7XG4gICAgICAgICAgICAgICAgdG9hc3RyLmVycm9yKGRhdGEucmVzcG9uc2VKU09OLm1lc3NhZ2UpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfSk7XG5cbiAgICByZXR1cm4gZmFsc2U7XG59KTsiXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3NpbmdsL3RhYmxlU2V0dGluZ3MuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/singl/tableSettings.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/singl/tableSettings.js"]();
/******/ 	
/******/ })()
;