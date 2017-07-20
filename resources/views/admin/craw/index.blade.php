@extends('adminlte::page')

@section('title', 'Craw Data Game')
@section('css')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.css')}}">
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Craw Data Game</h3>
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
                        <th class="col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listCraw as $craw)
                        <tr>
                            <td>{{$craw->id}}</td>
                            <td>{{$craw->craw_title}}</td>
                            <td>{{$craw->craw_url}}</td>
                            @if($craw->craw_status == 0)
                                <td><span class="label label-warning">Crawled</span></td>
                            @elseif($craw->craw_status == 1)
                                <td><span class="label label-success">Saved</span></td>
                            @else
                                <td><span class="label label-danger">Removed</span></td>
                            @endif
                            <td>
                                <div class="btn-group pull-right">
                                    <a href="/admin/craw-game/{{ $craw->id }}" target=_blank class="btn btn-info"
                                       role="button"><i class="fa fa-paper-plane"></i></a>
                                    <a href="/admin/craw-remove/{{ $craw->id }}" class="btn btn-danger"
                                       role="button"><i class="fa fa-remove"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Status</th>
                        <th class="col-sm-2">Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-12">{{$listCraw->links()}}</div>
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