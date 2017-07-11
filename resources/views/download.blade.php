@extends('layout.gxm')

@section('title', $downloadContent->game)
@section('description', $downloadContent->game)

@section('content')
    <div class="content">
        <div class="container">
            <div class="blog">
                <h1 class="title-game text-center"><strong>{{$downloadContent->game}}</strong></h1>
                    <div class="col-md-12">
                        <h3><a class="btn btn-block btn-success" id="download-now" rel="nofollow"
                           data-link="{{$downloadContent->link}}">Download Now</a></h3>
                    </div>
                <h2>RECOMMENDED</h2>
                <div class="col-md-12">
                    <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @foreach($suggestGame as $key => $game)
                                @if($key == 0)
                                    <div class="item active">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-3"><img src="{{$game->game_wallpaper}}"
                                                                           class="img-responsive"
                                                                           alt="{{$game->game_seo}}"></div>
                                                <div class="col-md-9">
                                                    <h3>{{$game->game_name}}</h3>
                                                    <p>
                                                        <span class="label label-primary">Category:</span> {{$game->category_name}}
                                                    </p>
                                                    <p>
                                                        <span class="label label-danger">Description:</span> {{$game->game_des}}
                                                    </p>
                                                    <h4><a class="btn btn-info" href="/game/{{$game->game_url}}"
                                                       target="_blank" title="{{$game->game_name}}">Download This
                                                            Game</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="item">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-3"><img src="{{$game->game_wallpaper}}"
                                                                           class="img-responsive"
                                                                           alt="{{$game->game_seo}}"></div>
                                                <div class="col-md-9">
                                                    <h3>{{$game->game_name}}</h3>
                                                    <p>
                                                        <span class="label label-primary">Category:</span> {{$game->category_name}}
                                                    </p>
                                                    <p>
                                                        <span class="label label-danger">Description:</span> {{$game->game_des}}
                                                    </p>
                                                    <h4><a class="btn btn-info" href="/game/{{$game->game_url}}"
                                                       target="_blank" title="{{$game->game_name}}">Download This
                                                                Game</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        @endforeach
                        <!-- End Item -->
                        </div>
                        <!-- End Carousel Inner -->
                        <div class="controls">
                            <ul class="nav">
                                @foreach($suggestGame as $key => $game)
                                    <li data-target="#custom_carousel" data-slide-to="{{$key}}"><a href="#"><img
                                                    src="{{$game->game_wallpaper}}" style="max-width: 100%">
                                            <small>{{$game->game_name}}</small>
                                        </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- End Carousel -->
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $("#download-now").click(function () {
            var linkDownload = $(this).data('link');
            var win = window.open(linkDownload, '_blank');
            win.focus();
        });
        $(document).ready(function (ev) {
            $('#custom_carousel').on('slide.bs.carousel', function (evt) {
                $('#custom_carousel .controls li.active').removeClass('active');
                $('#custom_carousel .controls li:eq(' + $(evt.relatedTarget).index() + ')').addClass('active');
            })
        });
    </script>
@stop