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
        <?php $stt = 1 ?>
        @if ($lstPostSearch -> count() == 0)
        <tr class="text-center">
            <td colspan="5">Không có dữ liệu</td>
        </tr>
        @else
        @foreach($lstPostSearch as $dt)
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