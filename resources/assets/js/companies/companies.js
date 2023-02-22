'use strict';

let tableName = '#companiesTable';
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
            data: function (row){
                if(!isEmpty(row.logo_url))
                {
                    return `<img src="${row.logo_url}" width="50px" height="50px">`
                }
                return 'N/A'
            },
            name: 'id'
        },
        {
            data: 'name',
            name: 'name'
        },{
            data: 'email',
            name: 'email'
        },{
            data: 'website',
            name: 'website'
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
