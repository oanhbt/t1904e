$(document).ready(function(){
    $('#multy-delete').click(function(){
        $('#main-form').submit();
    });

    $('#check_all').change(function(){
        var checkStatus = this.checked;
        $('#main-form').find(':checkbox').each(function () {
        this.checked = checkStatus;

        });
    });

});
