@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('css')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.css')}}">
    @endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Mod CMS</h3>
        </div>
        <div class="box-body">
            <a class="btn btn-success btn-block" href="/admin/mod-create-tool"> Add New Mod <i class="fa fa-cogs"></i></a>
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                       aria-describedby="example2_info">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Mod Name</th>
                        <th>Thumbnail</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listMods as $mod)
                        <tr>
                            <td>{{$mod->id}}</td>
                            <td>{{$mod->mods_name}}</td>
                            <td><img src="{{$mod->mods_thumbnail}}" height="100px"/></td>
                            <td>{{$mod->mods_des}}</td>
                            <td>{{$mod->created_at}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('mod-cms.edit', $mod->id) }}" class="btn btn-info"
                                       role="button">Edit</a>
                                    <a href="{{ route('mod-cms.destroy', $mod->id) }}" class="btn btn-danger"
                                       role="button">Remove</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Mod Name</th>
                        <th>Thumbnail</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-12">{{$listMods->links()}}</div>
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
                'info'        : true,
                'autoWidth'   : true
            })
        });
    </script>
    @endsection