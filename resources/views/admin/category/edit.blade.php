@extends('adminlte::page')
@section('title', 'Edit Category - '.$categoryInfo->category_name)
    @section('content_header')
        <h3>Edit Category: {{$categoryInfo->category_name}}</h3>
        @endsection
@section('content')
    @include ('errors.list')
    {{ Form::model($categoryInfo, ['route' => ['category-cms.update', $categoryInfo->id], 'method' => 'PUT']) }}
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('category_name', 'Title') }}
        {{ Form::text('category_name', null, ['class' => 'form-control']) }}

        {{ Form::label('category_active', 'Category Status', ['class' => 'control-label']) }}
        <p>
        <label class="radio-inline"><input type="radio" name="category_active" value="1" @if($categoryInfo->category_active == 1) checked @endif ><small class="label bg-green">Active</small></label>
        <label class="radio-inline"><input type="radio" name="category_active" value="0" @if($categoryInfo->category_active == 0) checked @endif><small class="label bg-red">Hide</small></label>
        <label class="radio-inline"><input type="radio" name="category_active" value="2" @if($categoryInfo->category_active == 2) checked @endif><small class="label bg-aqua-active">Featured</small></label>
        <label class="radio-inline"><input type="radio" name="category_active" value="3" @if($categoryInfo->category_active == 3) checked @endif><small class="label bg-fuchsia-active">Upcoming</small></label>
        </p>

        {{ Form::label('category_wallpaper', 'Image Thumbnail') }}
        {{ Form::text('category_wallpaper', null, ['class' => 'form-control']) }}

        {{ Form::label('category_des', 'Description') }}
        {{ Form::textarea('category_des', null, ['class' => 'form-control','rows' => 4]) }}

        {{ Form::submit('Save', ['class' => 'btn btn-primary form-control']) }}

        {{ Form::close() }}
    </div>
@endsection
@section('js')

    @endsection