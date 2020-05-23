@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row nt-3">
        <div class="col-md-4">
            <h4>Post management</h4>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-3 col-md-3 col-lg-3">
            <input class="form-control" placeholder="Enter title" id="txtName" />
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <select class="form-control" id="valCategory">
                <option>Category</option>
                @foreach($lstCategory as $c)
                <option value="{{ $c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3" style="writing-mode: vertical-lr;">
            <input type="text" id="txtFromDate" class="form-control relative-icon-calendar date" placeholder="From date" />
            <i class="fa fa-calendar absolute-icon-calendar"></i>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3" style="writing-mode: vertical-lr;">
            <input type="text" id="txtToDate" class="form-control relative-icon-calendar date" placeholder="To date" />
            <i class="fa fa-calendar absolute-icon-calendar"></i>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-4 col-md-4 col-lg-4 offset-md-8 text-right">
            <button class="btn btn-primary" style="width:85px;" onclick="searchPost()"><i class="fa fa-search mr-1"></i>Search</button>
            <button class="btn btn-success" style="width:85px;"><i class="fa fa-plus mr-1"></i>Add</button>
        </div>
    </div>

    <div class="row mt-5" id="tblPost">
        <table class="table table-light table-bordered table-hover table-responsive-sm table-responsive-md">
            <thead class="text-center  bg-thead">
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Ngày tạo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-center">
                @if($lstPost -> count() == 0)
                <tr class="text-center">
                    <td colspan="5">Không có dữ liệu</td>
                </tr>
                @else
                <?php $stt = 1 ?>
                @foreach($lstPost as $dt)
                <tr>
                    <td>{{$stt}}</td>
                    <td>{{$dt->title}}</td>
                    <td>{{$dt ->summary}}</td>
                    <td>{{$dt->created_at->format('d / m / Y')}}</td>
                    <td></td>
                </tr>
                <?php $stt++ ?>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="row mt-3">
        {{$lstPost->links()}}
    </div>
</div>
<style>
    .absolute-icon-calendar {
        position: absolute;
        right: 25px;
        top: 10px;
        font-size: 20px;
    }

    .relative-icon-calendar {
        position: relative;
    }

    .absolute-icon-calendar-warranty {
        position: absolute;
        right: 25px;
        top: 30px;
        font-size: 20px;
    }
</style>
@endsection