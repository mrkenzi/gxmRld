@extends('adminlte::page')

@section('title', 'Craw Data Game')
@section('css')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.css')}}">
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">List New Game - Added: {{$sumAdded}} - New: {{$sumNew}}</h3>
        </div>
        <div class="box-body">
            <a class="btn btn-success btn-block" href="/admin/get-new"> Find New Game <i
                        class="fa fa-gamepad"></i></a>
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                       aria-describedby="example2_info">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listNew as $key => $craw)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$craw->productname}}</td>
                            <td>{{$craw->linkproduct}}</td>
                            @if($craw->exits == 0)
                                <td><span class="label label-success">New Game</span></td>
                            @else
                                <td><span class="label label-success">Added</span></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#example2').DataTable({
                'paging': false,
                'lengthChange': false,
                'searching': true,
                'info': true,
                'autoWidth': true
            })
        });
    </script>
@endsection