@extends('adminlte::page')
@section('title', 'Create New Game')
@section('content_header')
    <h3>Create Post Game</h3>
@endsection
@section('content')
    @include ('errors.list')
    {{ Form::open(['route' => 'post.store']) }}
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('game_name', 'Title') }}
        {{ Form::text('game_name', null, ['class' => 'form-control']) }}

        {{ Form::label('game_category', 'Description') }}
        {{Form::select('game_category', $listCategory, null, ['class' => 'form-control'])}}

        {{ Form::label('game_active', 'Games Status', ['class' => 'control-label']) }}
        <p>
            <label class="radio-inline"><input type="radio" name="game_active" value="1"><small class="label bg-green">Active</small></label>
            <label class="radio-inline"><input type="radio" name="game_active" value="0"><small class="label bg-red">Hide</small></label>
            <label class="radio-inline"><input type="radio" name="game_active" value="2"><small class="label bg-aqua-active">Featured</small></label>
            <label class="radio-inline"><input type="radio" name="game_active" value="3"><small class="label bg-fuchsia-active">Upcoming</small></label>
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

        {{ Form::submit('Create', ['class' => 'btn btn-primary form-control']) }}

        {{ Form::close() }}
    </div>
@endsection
@section('js')
    <script src="{{asset('plugins/ckeditor.js')}}"></script>
    <script>
        UPLOADCARE_PUBLIC_KEY = 'b936cb0aa781d093bad3';
        CKEDITOR.editorConfig = function( config ) {
            // Define changes to default configuration here.
            // For complete reference see:
            // http://docs.ckeditor.com/#!/api/CKEDITOR.config

            // The toolbar groups arrangement, optimized for two toolbar rows.
            config.toolbarGroups = [
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'styles' },
                { name: 'colors' },
                { name: 'about' }
            ];

            // Remove some buttons provided by the standard plugins, which are
            // not needed in the Standard(s) toolbar.
            config.removeButtons = 'Underline,Subscript,Superscript';

            // Set the most common block elements.
            config.format_tags = 'p;h1;h2;h3;pre';

            // Simplify the dialog windows.
            config.removeDialogTabs = 'image:advanced;link:advanced';


        };
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            CKEDITOR.replace('editor2')
            //bootstrap WYSIHTML5 - text editor
            //$('.textarea').wysihtml5()
        })
    </script>
@endsection