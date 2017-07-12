@extends('adminlte::page')
@isset($idGame)
    @section('title', 'Create New Mod For '.$idGame->game_name)
    @section('content_header')
        <h3>Create Post Mod For: {{$idGame->game_name}}</h3>
    @endsection
@endisset
@section('content')
    @include ('errors.list')
    {{ Form::open(['route' => 'mod-cms.store']) }}
    {{ csrf_field() }}
    @isset($idGame)
    {{ Form::hidden('mods_game', $idGame->id, ['class' => 'form-control']) }}
    @endisset
    <div class="form-group">
        {{ Form::label('mods_name', 'Title') }}
        {{ Form::text('mods_name', null, ['class' => 'form-control']) }}

        {{ Form::label('mods_active', 'Mod Status', ['class' => 'control-label']) }}
        <p>
            <label class="radio-inline"><input type="radio" name="mods_active" value="1"><small class="label bg-green">Active</small></label>
            <label class="radio-inline"><input type="radio" name="mods_active" value="0"><small class="label bg-red">Hide</small></label>
            <label class="radio-inline"><input type="radio" name="mods_active" value="2"><small class="label bg-aqua-active">Featured</small></label>
            <label class="radio-inline"><input type="radio" name="mods_active" value="3"><small class="label bg-fuchsia-active">Upcoming</small></label>
        </p>

        {{ Form::label('mods_thumbnail', 'Thumbnail') }}
        {{ Form::text('mods_thumbnail', null, ['class' => 'form-control']) }}

        {{ Form::label('mods_des', 'Description') }}
        {{ Form::textarea('mods_des', null, ['class' => 'form-control','rows' => 2]) }}

        {{ Form::label('mods_content', 'Content') }}
        {{ Form::textarea('mods_content', null, ['class' => 'form-control','rows' => 30,'id'=>'editor2']) }}

        {{ Form::label('mods_seo', 'SEO') }}
        {{ Form::text('mods_seo', null, ['class' => 'form-control']) }}

        {{ Form::submit('Create New Mod', ['class' => 'btn btn-primary form-control']) }}

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
            CKEDITOR.replace('editor2')
            //bootstrap WYSIHTML5 - text editor
            //$('.textarea').wysihtml5()
        })
    </script>
@endsection