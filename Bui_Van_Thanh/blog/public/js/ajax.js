$(document).ready(function() {

    $('.date').datepicker({
        dateFormat: "dd/mm/yy"
    });

    $(document).on("wheel", "input[type=number]", function(e) {
        $(this).blur();
    });


}); //end document.ready


//Search post info

function searchPost() {
    var searchKey = $.trim($('#txtName').val());
    var cateID = $('#valCategory').val();
    var fromDate = $.trim($('#txtFromDate').val());
    var toDate = $.trim($('#txtToDate').val());
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: 'search_Post',
        data: {
            serchKey: searchKey,
            categoryID: cateID,
            fromDate: fromDate,
            toDate: toDate,
            _token: token
        },
        type: "GET",
        success: function(response) {
            $('$tblPost').html(response);
            console.log(response);
        }
    })
}