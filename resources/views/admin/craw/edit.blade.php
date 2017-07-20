@extends('adminlte::page')
@section('title', 'Edit Games - '.$gameInfo->game_name)
@section('content_header')
    <h3>Edit Game: {{$gameInfo->game_name}}</h3>
@endsection
@section('content')
    @include ('errors.list')
    {{ Form::model($gameInfo, ['route' => ['post.update', $gameInfo->id], 'method' => 'PUT']) }}
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('game_name', 'Title') }}
        {{ Form::text('game_name', null, ['class' => 'form-control']) }}

        {{ Form::label('game_category', 'Description') }}
        {{Form::select('game_category', $listCategory, $gameInfo->id, ['class' => 'form-control'])}}

        {{ Form::label('game_active', 'Games Status', ['class' => 'control-label']) }}
        <p>
            <label class="radio-inline"><input type="radio" name="game_active" value="1"
                                               @if($gameInfo->game_active == 1) checked @endif >
                <small class="label bg-green">Active</small>
            </label>
            <label class="radio-inline"><input type="radio" name="game_active" value="0"
                                               @if($gameInfo->game_active == 0) checked @endif>
                <small class="label bg-red">Hide</small>
            </label>
            <label class="radio-inline"><input type="radio" name="game_active" value="2"
                                               @if($gameInfo->game_active == 2) checked @endif>
                <small class="label bg-aqua-active">Featured</small>
            </label>
            <label class="radio-inline"><input type="radio" name="game_active" value="3"
                                               @if($gameInfo->game_active == 3) checked @endif>
                <small class="label bg-fuchsia-active">Upcoming</small>
            </label>
        </p>

        {{ Form::label('game_thumbnail', 'Image Thumbnail') }}
        {{ Form::text('game_thumbnail', null, ['class' => 'form-control']) }}

        {{ Form::label('game_wallpaper', 'Wallpaper') }}
        {{ Form::text('game_wallpaper', null, ['class' => 'form-control']) }}

        {{ Form::label('game_des', 'Description') }}
        {{ Form::textarea('game_des', null, ['class' => 'form-control','rows' => 2]) }}

        {{ Form::label('passunrar', 'Pass Unrar') }}
        {{ Form::text('passunrar', null, ['class' => 'form-control']) }}

        {{ Form::label('tags', 'Tags') }}
        {{ Form::text('tags', null, ['class' => 'form-control']) }}

        {{ Form::label('game_content', 'Content') }}
        {{ Form::textarea('game_content', null, ['class' => 'form-control','rows' => 30,'id'=>'editor2']) }}

        {{ Form::label('downloadzone', 'Download Zone') }}
        {{ Form::textarea('downloadzone', null, ['class' => 'form-control','rows' => 3,'id'=>'editor1']) }}

        {{ Form::submit('Save', ['class' => 'btn btn-primary form-control']) }}

        {{ Form::close() }}
    </div>
</div>
@endsection
@section('js')
    <script src="{{asset('js/tinymce.min.js')}}"></script>
    <script>
        UPLOADCARE_PUBLIC_KEY = 'b936cb0aa781d093bad3';
        tinymce.init({
            selector: 'textarea',
            height: 300,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image uploadcare charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image uploadcare',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Rajdhani:300,400,600,700',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });
    </script>
@endsection