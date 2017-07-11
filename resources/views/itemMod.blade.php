@extends('layout.gxm')

@section('title', $itemGame->mods_name)
@section('description', $itemGame->mods_des)
@section('wallpaper',$itemGame->mods_thumbnail)

@section('content')
    <div class="content">
        <div class="container">
            <h1 class="title-game"><strong>{{$itemGame->mods_name}}</strong></h1>
            <div class="meta">
                <i class="fa fa-calendar"></i> {{date('d F Y', strtotime($itemGame->created_at))}}
                <i class="fa fa-gamepad"></i> <a href="/game/{{$itemGame->game_url}}"
                                                     title="{{$itemGame->game_name}} - Download Free">{{$itemGame->game_name}}</a>
                <i class="fa fa-cogs" aria-hidden="true"></i> <a href="/mod/{{$itemGame->mods_url}}" target="_blank"
                                                                    rel="nofollow"
                                                                    title="{{$itemGame->mods_seo}}">{{$itemGame->mods_name}}</a>
                <span class="pull-right">{{$itemGame->count_view}} Views </i><i class="fa fa-eye"></i></span>
            </div>
            <div class="blog">
                <div class="row">
                    <div class="col-md-8">
                        <div class="entry">
                            <div class="col-md-4">
                                <a href="/mod/{{$itemGame->mods_url}}"><img
                                            src="{{$itemGame->mods_thumbnail}}"
                                            alt="{{$itemGame->mods_seo}}"/></a>
                            </div>
                            <div class="col-md-8">
                                <p><span class="label label-primary">Mod Game:</span> {{$itemGame->game_name}}</p>
                                <p><span class="label label-success">Mod Name:</span> {{$itemGame->mods_name}}</p>
                                <p><span class="label label-info">Release Date:</span> Updating...</p>
                                <p><span class="label label-danger">Description:</span> {{$itemGame->mods_des}}</p>
                                <button class="btn btn-primary" id="download-click">Download</button>
                                <a class="btn btn-primary" href="/game/{{$itemGame->game_url}}" title="{{$itemGame->game_name}}">Download Game</a>
                            </div>
                            <div class="col-md-12">
                                @php
                                $game_content = str_replace('<img','<img alt="'.$itemGame->mods_name.' - Mod" width="100%"',$itemGame->mods_content);
                                $game_content = str_replace('<iframe','<iframe width="100%" ',$game_content);
                                @endphp
                                {!! $game_content !!}
                            </div>
                        </div>
                        <div id="fb-root"></div>
                        <script>(function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="comments col-md-12">
                            <div class="title"><h5>Comments</h5></div>
                            <div class="fb-comments" data-href="{{Request::url()}}" data-width="100%"
                                 data-numposts="10"></div>
                        </div>
                    </div>
                    @include('parts.colrightMod')
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $("#download-click").click(function() {
            $('html, body').animate({
                scrollTop: $( "h2:contains('Download')" ).offset().top
            }, 2000);
        });
        $("#requirement-click").click(function() {
            $('html, body').animate({
                scrollTop: $( "h2:contains('System Requirements')" ).offset().top
            }, 2000);
        });
    </script>
    @stop