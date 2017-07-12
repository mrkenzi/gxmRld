@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('css')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.css')}}">
    @endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Category List</h3>
        </div>
        <div class="box-body">
            <a class="btn btn-success btn-block" href="/admin/category-cms/create"> Add New Category <i class="fa fa-gamepad"></i></a>
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                       aria-describedby="example2_info">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Thumbnail</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Categorys as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td><img src="{{$category->category_wallpaper}}" height="150px"/></td>
                            <td>{{$category->category_des}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('category-cms.edit', $category->id) }}" class="btn btn-info"
                                       role="button">Edit</a>
                                    <a href="{{ route('category-cms.destroy', $category->id) }}" class="btn btn-danger"
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
            <div class="col-md-12">{{$Categorys->links()}}</div>
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