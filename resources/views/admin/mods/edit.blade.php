@extends('adminlte::page')
@section('title', 'Edit Mods - '.$modInfo->mods_name)
    @section('content_header')
        <h3>Edit Mod: {{$modInfo->mods_name}}</h3>
        @endsection
@section('content')
    @include ('errors.list')
    {{ Form::model($modInfo, ['route' => ['mod-cms.update', $modInfo->id], 'method' => 'PUT']) }}
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('mods_name', 'Title') }}
        {{ Form::text('mods_name', null, ['class' => 'form-control']) }}

        {{ Form::label('mods_active', 'Mod Status', ['class' => 'control-label']) }}
        <p>
            <label class="radio-inline"><input type="radio" name="mods_active" value="1" @if($modInfo->mods_active == 1) checked @endif ><small class="label bg-green">Active</small></label>
            <label class="radio-inline"><input type="radio" name="mods_active" value="0" @if($modInfo->mods_active == 0) checked @endif ><small class="label bg-red">Hide</small></label>
            <label class="radio-inline"><input type="radio" name="mods_active" value="2" @if($modInfo->mods_active == 2) checked @endif ><small class="label bg-aqua-active">Featured</small></label>
            <label class="radio-inline"><input type="radio" name="mods_active" value="3" @if($modInfo->mods_active == 3) checked @endif ><small class="label bg-fuchsia-active">Upcoming</small></label>
        </p>

        {{ Form::label('mods_thumbnail', 'Thumbnail') }}
        {{ Form::text('mods_thumbnail', null, ['class' => 'form-control']) }}

        {{ Form::label('mods_des', 'Description') }}
        {{ Form::textarea('mods_des', null, ['class' => 'form-control','rows' => 2]) }}

        {{ Form::label('mods_content', 'Content') }}
        {{ Form::textarea('mods_content', null, ['class' => 'form-control','rows' => 30,'id'=>'editor2']) }}

        {{ Form::label('mods_seo', 'SEO') }}
        {{ Form::text('mods_seo', null, ['class' => 'form-control']) }}

        {{ Form::submit('Update Mod', ['class' => 'btn btn-primary form-control']) }}

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