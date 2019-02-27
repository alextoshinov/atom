@extends('layouts.app')

@section('title', '| Show Book')

@section('content')

<div class="container">
    <div class="row">
        <h1>Show Book {{$book->name}}</h1>
        @if(session()->has('message.level'))
            <div class="alert alert-{{ session('message.level') }}">
            {!! session('message.content') !!}
            </div>
        @endif
        <div class="col-md-12">
            {{ Html::linkRoute('books.index', 'All books', array(), ['class' => 'btn btn-default pull-right']) }}
            {!! Html::linkRoute('books.edit', 'Edit book', array($book->id), array('class' => 'btn btn-primary pull-right')) !!}
        </div>
        <div class="col-md-4">
            <img src="{{URL::asset('/images/'.$book->cover_image)}}" alt="{{ $book->ISBN }}" class="img-rounded img-responsive" />
        </div>
        <div class="col-md-8">
            <p>ISBN: <strong>{{$book->ISBN}}</strong></p>
            <p>{{$book->description}}</p>
        </div>
    </div>
</div>
@endsection
