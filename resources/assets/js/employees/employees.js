'use strict';

let tableName = '#employeesTable';
$(tableName).DataTable({
    scrollX: true,
    deferRender: true,
    scroller: true,
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
        url: recordsURL,
    },
    columns: [
        {
            data: 'first_name',
            name: 'first_name'
        },{
            data: 'last_name',
            name: 'last_name'
        },{
            data: 'phone',
            name: 'phone'
        },{
            data: 'email',
            name: 'email'
        },{
            data: function (data){
                return data.company.name
            },
            name: 'company.name'
        },
        {
            data: function (row) {
                let url = recordsURL + row.id;
                let editURL = url+ '/edit';
    
                return `<a title="View"
                   class="btn btn-danger action-btn" data-id="${row.id}"
                     href="${url}">
                    <i class="fa fa-eye"></i>
                </a>
                <a title="Edit"
                          class="btn btn-warning action-btn"
                           href="${editURL}">
                    <i class="fa fa-edit"></i>
                </a>
                <a title="Delete"
                   class="btn btn-danger action-btn delete-btn" data-id="${row.id}"
                     href="javascript:void(0)">
                    <i class="fa fa-trash"></i>
                </a>`
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(recordsURL + recordId, tableName, 'Company');
});
