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
            {{dd($data)}}
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