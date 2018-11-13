function getBillboards() {
    $.ajax({
      type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                    function (billboards) {
                    var billboardTable = $('#billboardData');
                    billboardTable.empty();
                    var count = 1;
                    $.each(billboards.data, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editbillboard(' + value.id + ')"></a>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\') ? billboardAction(\'delete\', ' + value.id + ') : false;"></a>' +
                                '</td></tr>';
                        billboardTable.append('<tr><td>' + count + '</td><td>' + value.billboardDetails + '</td><td>' + editDeleteButtons);
                        count++;
                    });

                }
    });
}

 function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}

function billboardsAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var billboardData = '';
    if (type == 'add') {
        billboardData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&id=' + id;
    } else if (type == 'edit') {
        billboardData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        billboardData = 'action_type=' + type + '&id=' + id;
    }
    $.ajax({
       type: requestType,
        headers: {
            'X-CSRF-Token': $('[name="_csrfToken"]').val()
        },
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(billboardData),
        success: function (msg) {
            if (msg) {
                alert('billboard data has been ' + statusArr[type] + ' successfully.');
                getBillboards();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}

function editBillboards(id) {
    $.ajax({
          type: 'GET',
        dataType: 'JSON',
        url: urlToRestApi+ "/" + id,
        success: function (data) {
            $('#billboard_idEdit').val(data.data.id);
            $('#billboard_detailsEdit').val(data.data.billboard_details);        
            $('#editForm').slideDown();
        }
    });
}