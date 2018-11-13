$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#hiring_party_type_code_id-id').on('change', function () {
        var hiringPartyTypeCodeId = $(this).val();
        if (hiringPartyTypeCodeId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'hiring_party_type_code_id=' + hiringPartyTypeCodeId,
                success: function (hiringParties) {
                    $select = $('#hiring_parties-id');
                    $select.find('option').remove();
                    $.each(hiringParties, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#hiring_parties-id').html('<option value="">Select hiring_party_type_code_id first</option>');
        }
    });
});


