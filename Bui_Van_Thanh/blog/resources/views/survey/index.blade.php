@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3 text-center"><label class="text-dark">Name:</label></div>
        <div class="col-md-7">
            <input class="form-control" id="txtName" placeholder="Enter name" />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3 text-center"><label class="text-dark">Phone:</label></div>
        <div class="col-md-7">
            <input class="form-control" id="txtPhone" type="number" placeholder="Enter phone number" />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3 text-center"><label class="text-dark">Email:</label></div>
        <div class="col-md-7">
            <input class="form-control" id="txtEmail" placeholder="Enter email" />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3 text-center"><label class="text-dark">Content survey:</label></div>
        <div class="col-md-7">
            <textarea class="form-control" id="txtContent" placeholder="Enter content survey" style="height:130px;"></textarea>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <button class="btn btn-success" onclick="saveFeedback()"><i class="fa fa-save mr-1"></i>Send</button>
        </div>
    </div>
</div>

<script>
    function saveFeedback() {
        var name = $.trim($('#txtName').val());
        var email = $.trim($('#txtEmail').val());
        var phone = $.trim($('#txtPhone').val());
        var content = $.trim($('#txtContent').val());
        var token = $('meta[name="csrf-token"]').attr('content');

        if (name.length == 0 || email.length == 0 || phone.length == 0 || content.length == 0) {
            swal({
                title: 'Please input full data',
                text: '',
                icon: 'warning'
            })
            return;
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'surveySave',
            data: {
                name,
                email,
                phone,
                content
            },
            type: 'POST',
            success: function(res) {
                swal({
                    title: res.message,
                    text: "",
                    icon: "success"
                }).then((success) => {
                    if (success) {
                        location.reload();
                    }
                })
            }
        })
    }
</script>
@endsection