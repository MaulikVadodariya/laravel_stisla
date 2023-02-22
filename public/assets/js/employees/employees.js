/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./resources/assets/js/employees/employees.js ***!
  \****************************************************/


var tableName = '#employeesTable';
$(tableName).DataTable({
  scrollX: true,
  deferRender: true,
  scroller: true,
  processing: true,
  serverSide: true,
  'order': [[0, 'desc']],
  ajax: {
    url: recordsURL
  },
  columns: [{
    data: 'first_name',
    name: 'first_name'
  }, {
    data: 'last_name',
    name: 'last_name'
  }, {
    data: 'phone',
    name: 'phone'
  }, {
    data: 'email',
    name: 'email'
  }, {
    data: function data(_data) {
      return _data.company.name;
    },
    name: 'company.name'
  }, {
    data: function data(row) {
      var url = recordsURL + row.id;
      var editURL = url + '/edit';
      return "<a title=\"View\"\n                   class=\"btn btn-danger action-btn\" data-id=\"".concat(row.id, "\"\n                     href=\"").concat(url, "\">\n                    <i class=\"fa fa-eye\"></i>\n                </a>\n                <a title=\"Edit\"\n                          class=\"btn btn-warning action-btn\"\n                           href=\"").concat(editURL, "\">\n                    <i class=\"fa fa-edit\"></i>\n                </a>\n                <a title=\"Delete\"\n                   class=\"btn btn-danger action-btn delete-btn\" data-id=\"").concat(row.id, "\"\n                     href=\"javascript:void(0)\">\n                    <i class=\"fa fa-trash\"></i>\n                </a>");
    },
    name: 'id'
  }]
});
$(document).on('click', '.delete-btn', function (event) {
  var recordId = $(event.currentTarget).data('id');
  deleteItem(recordsURL + recordId, tableName, 'Company');
});
/******/ })()
;