@extends('layout.gxm')

@section('title', 'Request Game Your Love')
@section('description', 'Would you like to send something to us?')

@section('content')
    <div class="content">
        <div class="container">
            <div class="blog">
                @if (Session::has('success_mes'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <h1 class="title-game text-center"><strong>Request Game Your Love <i class="fa fa-heart"></i> </strong>
                </h1>
                <div class="col-md-12">
                    {{Form::open(['route' => 'request-game.store'])}}
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="sr-only" for="game_request">Game Name:</label>
                        <input type="text" class="form-control" id="game_request" name="game_request"
                               placeholder="The Game You Love">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="email_request">Your Email:</label>
                        <input type="email" class="form-control" id="email_request" name="email_request"
                               placeholder="I will send to your email when uploaded">
                    </div>
                    <div class="form-group">
                        <label for="content_request">Would you like to send something to us?</label>
                        <textarea class="form-control" id="content_request" name="content_request" rows="3" placeholder="Type Something"></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning btn-block">Send Request</button>
                    {{Form::close()}}
                </div>
                <h2>Maybe You Love</h2>
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