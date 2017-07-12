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
            <a class="btn btn-success btn-block" href="/admin/post/create"> Add New Game <i class="fa fa-gamepad"></i></a>
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                       aria-describedby="example2_info">
                    <thead>
                    <tr>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Title</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Thumbnail</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Description</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Created</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Action</th>
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
                                <div class="btn-group">
                                    <a href="{{ route('post.edit', $game->id) }}" class="btn btn-info"
                                       role="button">Edit</a>
                                    <a href="{{ route('post.destroy', $game->id) }}" class="btn btn-danger"
                                       role="button">Remove</a>
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
        $(document).ready(function() {
            $('#example2').DataTable({
                'paging'      : false,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            })
        });
    </script>
    @endsection