@extends('adminlte::page')
@section('title', 'Create Category Game')
@section('content_header')
    <h3>Create Category Game</h3>
@endsection
@section('content')
    @include ('errors.list')
    {{ Form::open(['route' => 'category-cms.store']) }}
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('category_name', 'Title') }}
        {{ Form::text('category_name', null, ['class' => 'form-control']) }}

        {{ Form::label('category_active', 'Category Status', ['class' => 'control-label']) }}
        <p>
            <label class="radio-inline"><input type="radio" name="category_active" value="1"><small class="label bg-green">Active</small></label>
            <label class="radio-inline"><input type="radio" name="category_active" value="0"><small class="label bg-red">Hide</small></label>
            <label class="radio-inline"><input type="radio" name="category_active" value="2"><small class="label bg-aqua-active">Featured</small></label>
            <label class="radio-inline"><input type="radio" name="category_active" value="3"><small class="label bg-fuchsia-active">Upcoming</small></label>
        </p>

        {{ Form::label('category_wallpaper', 'Image Thumbnail') }}
        {{ Form::text('category_wallpaper', null, ['class' => 'form-control']) }}

        {{ Form::label('category_des', 'Description') }}
        {{ Form::textarea('category_des', null, ['class' => 'form-control','rows' => 4]) }}

        {{ Form::submit('Create', ['class' => 'btn btn-primary form-control']) }}

        {{ Form::close() }}
    </div>
@endsection
@section('js')

@endsection