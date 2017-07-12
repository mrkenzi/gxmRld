@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('css')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.css')}}">
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Backend CMS - Manager</h3>
        </div>
        <div class="box-body">
            <a class="btn btn-success btn-block" href="/admin/post/create"> Add New Game <i
                        class="fa fa-gamepad"></i></a>
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                       aria-describedby="example2_info">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th class="col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listGames as $game)
                        <tr>
                            <td>{{$game->id}}</td>
                            <td>{{$game->game_name}}</td>
                            <td><img src="{{$game->game_thumbnail}}" height="150px"/></td>
                            <td>{{$game->game_des}}</td>
                            <td>{{$game->created_at}}</td>
                            <td>
                                <div class="btn-group pull-right">
                                    <a href="{{ route('post.edit', $game->id) }}" class="btn btn-info"
                                       role="button"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('post.destroy', $game->id) }}" class="btn btn-danger"
                                       role="button"><i class="fa fa-remove"></i></a>
                                    <a href="/admin/mod-create/{{ $game->id }}" class="btn btn-primary"
                                       role="button"><i class="fa fa-cog"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-12">{{$listGames->links()}}</div>
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