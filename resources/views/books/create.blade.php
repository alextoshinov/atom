@extends('layouts.app')

@section('title', '| Create Book')

@section('content')
<div class="container">
    <div class="row">
        <h1>Create Book</h1>
        @if(!$errors->isEmpty())
            <ul>
                @foreach($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if(session()->has('message.level'))
            <div class="alert alert-{{ session('message.level') }}">
            {!! session('message.content') !!}
            </div>
        @endif
        {!! Form::open(['route' => 'books.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="col-xs-6 col-sm-4">
            {{ Form::label('name', 'Name *:') }}
            {{ Form::text('name', null, ['class' => 'form-control','required','autofocus']) }}
        </div>
        <div class="col-xs-6 col-sm-4">
            {{ Form::label('ISBN', 'ISBN *:') }}
            {{ Form::text('ISBN', null, ['class' => 'form-control','required']) }}
        </div>

        <div class="col-xs-6 col-sm-4">
            {{ Form::label('cover_image', 'Cover image:') }}
            {{ Form::file('cover_image', ['class' => 'form-control']) }}
        </div>
        <div class="col-xs-6 col-sm-12">
            {{ Form::label('description', 'Description :') }}
            {{ Form::textarea('description', null,  ['class' => 'form-control','rows'=>"4", 'cols'=>"50"]) }}
        </div>
        <div class="col-xs-6 col-sm-12">
            <br /><button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Insert</button>
            {{ Html::linkRoute('books.index', 'All books', array(), ['class' => 'btn btn-default pull-right']) }}
        </div>
        {!! Form::close() !!}

    </div>
</div>
@endsection
