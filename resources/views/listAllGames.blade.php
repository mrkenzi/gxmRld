@extends('layout.gxm')

@section('title', 'List All Game Pc - Download Free')
@section('description', 'List All Game Pc - Download Free')
@section('wallpaper','')

@section('content')
    <div class="content">
        <div class="container">
            <h1 class="title-game"><strong>All Games Free Download - Sort By Game Name</strong></h1>

            <div class="col-md-12 list-allGames">
                @foreach($allGames as $game)
                    <div class="row gameon-list">
                        <div class="col-md-3">
                            <img src="{{$game->game_wallpaper}}" alt="{{$game->game_seo}}"/>
                        </div>
                        <div class="col-md-9">
                            <a href="/game/{{$game->game_url}}"
                               title="{{$game->game_name}}" rel="bookmark" data-html="true">
                                <h3 class="post-title">{{$game->game_name}}</h3>
                            </a>
                            <p class='label label-primary'>Category:</p> {{$game->category_name}}
                            <p class='label label-info'>Description:</p> {{$game->game_des}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">{{$allGames->links()}}</div>

        </div>
    </div>
@stop