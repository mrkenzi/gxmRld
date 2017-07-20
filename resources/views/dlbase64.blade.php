@extends('layout.gxm')

@section('title', $nameGame)
@section('description', $nameGame)

@section('content')
    <div class="content">
        <div class="container blog">
            <div class="row">
                <h1 class="title-game text-center"><strong>{{$nameGame}}</strong></h1>
                <p class="text-center">Support Us By Click ADS ! Thanks u</p>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <div id="countDown" data-timer="10"></div>
                    <h3>
                        <a id="downloadNow" class="btn btn-block btn-success" id="download-now" rel="nofollow" href="{{$dlUrl}}" target="_blank" style="display: none">Download Now</a>
                    </h3>
                </div>
                <div class="col-md-4">

                </div>
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
@section('css')
    <link href="{{asset('download/TimeCircles.css')}}" rel="stylesheet">
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('download/TimeCircles.js')}}"></script>
    <script>
        $(function(){
            $("#countDown").TimeCircles({
                "direction": "Counter-clockwise",
                "total_duration": 10,
                "count_past_zero": 0,
                "animation": "smooth",
                "bg_width": 0.5,
                "fg_width": 0.03666666666666667,
                "circle_bg_color": "#60686F",
                "time": {
                    "Days": {
                        "text": "Days",
                        "color": "#FFCC66",
                        "show": false
                    },
                    "Hours": {
                        "text": "Hours",
                        "color": "#99CCFF",
                        "show": false
                    },
                    "Minutes": {
                        "text": "Minutes",
                        "color": "#BBFFBB",
                        "show": false
                    },
                    "Seconds": {
                        "text": "Seconds",
                        "color": "#17d0e8",
                        "show": true
                    }
                }
            }).addListener(function(unit, amount, total) {
                if(total == 0){
                    $("#downloadNow").css("display","block");
                }
            });
        });
    </script>
@stop