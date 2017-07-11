<div class="col-md-4 col-sm-4">
    <div class="sidebar">
        <div class="widget">
            <h2><strong>Related Mods</strong></h2>
            @foreach($relatedGames as $game)
                <a href="/mod/{{$game->mods_url}}" title="{{$game->mods_name}} - {{$game->game_name}} " target="_blank"
                   data-html="true"
                   data-toggle="popover"
                   data-trigger="hover"
                   data-placement="left"
                   title="<div class='title-pop'>{{$game->mods_name}}</div>"
                   data-content="<div class='content-pop'>Description: {{$game->mods_des}}</div>">
                    <img src="{{$game->mods_thumbnail}}" width="100%" alt="{{$game->mods_seo}} - Mod {{$game->game_name}}">
                    <p class="linkbar">{{$game->mods_name}}
                    </p>
                </a>
            @endforeach
        </div>
        @isset($upcomingGames)
        <div class="widget">
            <h2><strong>Upcoming Mods</strong></h2>
            @foreach($upcomingGames as $game)
                <a href="/mod/{{$game->mods_url}}" title="{{$game->mods_name}} - {{$game->game_name}} " target="_blank"
                   data-html="true"
                   data-toggle="popover"
                   data-trigger="hover"
                   data-placement="left"
                   title="<div class='title-pop'>{{$game->mods_name}}</div>"
                   data-content="<div class='content-pop'>Description: {{$game->mods_des}}</div>">
                    <img src="{{$game->mods_thumbnail}}" width="100%" alt="{{$game->mods_seo}} - Mod {{$game->game_name}}">
                    <p class="linkbar">{{$game->mods_name}}
                    </p>
                </a>
            @endforeach
        </div>
        @endisset
        <div class="widget">
            <h2><strong>Popular Mods</strong></h2>
            @foreach($popularGames as $game)
                <a href="/mod/{{$game->mods_url}}" title="{{$game->mods_name}} - {{$game->game_name}} " target="_blank"
                   data-html="true"
                   data-toggle="popover"
                   data-trigger="hover"
                   data-placement="left"
                   title="<div class='title-pop'>{{$game->mods_name}}</div>"
                   data-content="<div class='content-pop'>Description: {{$game->mods_des}}</div>">
                    <img src="{{$game->mods_thumbnail}}" width="100%" alt="{{$game->mods_seo}} - Mod {{$game->game_name}}">
                    <p class="linkbar">{{$game->mods_name}}
                    </p>
                </a>
            @endforeach
        </div>
    </div>
</div>