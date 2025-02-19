@extends('admin.layouts.app')

@section('content')
    {{--<div class="container">--}}

    <h1>Edit Tag {{ $tag->id }}</h1>

    <div id="success">
        @include('layouts.messages')
    </div>
    {!! Form::model($tag, [
        'method' => 'PATCH',
        'url' => ['/admin/tags', $tag->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}


    {{--</div>--}}
@endsection