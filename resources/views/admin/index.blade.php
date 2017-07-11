@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('content_header')
    <h1>Backend CMS - Manager</h1>
@stop
@include('layouts.sidebar')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Thumbnail</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listGames as $game)
                    <tr>{{$game->id}}</tr>
                    <tr>{{$game->game_name}}</tr>
                    <tr>{{$game->game_thumbnail}}</tr>
                    <tr>{{$game->game_des}}</tr>
                    <tr>{{$game->created_at}}</tr>
                    <tr>
                        <div class="btn-group btn-group-justified">
                            <a href="{{ route('admin.post.edit', $game->id) }}" class="btn btn-info" role="button">Edit</a>
                            <a href="{{ route('admin.post.destroy', $game->id) }}" class="btn btn-danger" role="button">Remove</a>
                        </div>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop