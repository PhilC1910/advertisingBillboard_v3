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
         requestType = 'POST';
        billboardData = convertFormToJSON($("#addForm").find('.form'));
    } else if (type == 'edit') {
          requestType = 'PUT';
		ajaxUrl = ajaxUrl + "/" + idEdit.value;
        billboardData = convertFormToJSON($("#editForm").find('.form'));
    } else {
        billboardData = 'action_type=' + type + '&id=' + id;
    }
    $.ajax({
       type: requestType,
        headers: {
          'X-CSRF-Token': csrfToken
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
            $('#billboard_idAdd').val(data.data.id);
            $('#billboard_detailsAdd').val(data.data.billboard_details);        
            $('#editForm').slideDown();
        }
    });
}