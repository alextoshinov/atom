@extends('layouts.app')

@section('title', '| Edit Book')

@section('content')
<div class="container">
    <div class="row">
        <h1>Edit Book</h1>
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
        {!! Form::model($book, [
            'method' => 'PUT',
            'files' => true,
            'route' => ['books.update', $book->id],
            'name' => 'bookForm'
             ]) !!}
        {{ Form::hidden('user_id', $book->user_id) }}
        {{ Form::hidden('old_cover_image', $book->cover_image) }}
        <div class="col-xs-6 col-sm-3">
            {{ Form::label('name', 'Name *:') }}
            {{ Form::text('name', $book->name, ['class' => 'form-control','required','autofocus']) }}
        </div>
        <div class="col-xs-6 col-sm-3">
            {{ Form::label('ISBN', 'ISBN *:') }}
            {{ Form::text('ISBN', $book->ISBN, ['class' => 'form-control','required']) }}
        </div>

        <div class="col-xs-6 col-sm-3">
            {{ Form::label('cover_image', 'Cover image:') }}
            {{ Form::file('cover_image', ['class' => 'form-control']) }}
        </div>
        <div class="col-xs-6 col-sm-3">
            <img src="{{URL::asset('/images/'.$book->cover_image)}}" alt="{{ $book->ISBN }}" width="60" height="100" />
        </div>
        <div class="col-xs-6 col-sm-12">
            {{ Form::label('description', 'Description :') }}
            {{ Form::textarea('description', null,  ['class' => 'form-control','rows'=>"4", 'cols'=>"50"]) }}
        </div>
        <div class="col-xs-6 col-sm-12">
            <br /><button type="submit" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</button>
            {{ Html::linkRoute('books.index', 'All books', array(), ['class' => 'btn btn-default pull-right']) }}
        </div>
        {!! Form::close() !!}

    </div>
</div>
@endsection
