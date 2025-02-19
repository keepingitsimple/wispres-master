@extends('user.index')

@section('account-content')

    <div class="tex">
        <h1>Edit Account <a href="{{ url('user/account-details/password') }}">
                <button class="btn btn-primary">Change Password</button>
            </a></h1>
        <div id="success" class="tex2">
            @include('layouts.messages')
        </div>
        {!! Form::model($user->user(), [
            'method' => 'post',
            'url' => ['/user/account-details'],
            'class' => 'form-horizontal',
            'files' => true
        ]) !!}

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <div id="imagePreview" class="user-image"
                     style="background-image: url( {{ url('images/users/' . $user->user()->avatar)}} );"></div>
            </div>
        </div>

        @if($user->user()->avatar != 'user.png')
            <a href="{{ url('user/account-details/remove-avatar') }}"> Remove avatar </a>
        @endif

        <div class="form-group {{ $errors->has('avatar') ? 'has-error' : ''}}" id="file_avatar">
            {!! Form::label('avatar', 'Avatar', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::file('avatar', ['class' => 'form-control']) !!}
                {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('alias') ? 'has-error' : ''}}">
            {!! Form::label('alias', 'Alias', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('alias', null, ['class' => 'form-control']) !!}
                {!! $errors->first('alias', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            {!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('facebook') ? 'has-error' : ''}}">
            {!! Form::label('facebook', 'Facebook', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
                {!! $errors->first('facebook', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('twitter') ? 'has-error' : ''}}">
            {!! Form::label('twitter', 'Twitter', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
                {!! $errors->first('twitter', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('google') ? 'has-error' : ''}}">
            {!! Form::label('google', 'Google+', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('google', null, ['class' => 'form-control']) !!}
                {!! $errors->first('google', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('pinterest') ? 'has-error' : ''}}">
            {!! Form::label('pinterest', 'Pinterest', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('pinterest', null, ['class' => 'form-control']) !!}
                {!! $errors->first('pinterest', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('about') ? 'has-error' : ''}}">
            {!! Form::label('about', 'Dashboard Text', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::textarea('about', null, ['class' => 'form-control','cols' => "500", 'rows' => "3"]) !!}
                {!! $errors->first('about', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('account-script')
    <script>
        $(function () {
            $("#avatar").on("change", function () {
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
                    reader.onloadend = function () { // set image data as background of div
                        $("#imagePreview").css("background-image", "url(" + this.result + ")");
                    }
                }
            });
        });
    </script>
@endsection