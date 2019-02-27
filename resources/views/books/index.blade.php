@extends('layouts.app')

@section('title', '| Books')

@section('content')
<div class="container">
    <div class="row">
        <h1>Books lList</h1>
        @if(session()->has('message.level'))
            <div class="alert alert-{{ session('message.level') }}">
            {!! session('message.content') !!}
            </div>
        @endif
        <div class="col-md-12">
            <a href="{{ route('books.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Book</a>
            @if(!$books->isEmpty())
            Found: {{$count->count()}} records.
            <table class="table">
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>Name</th>
                        <th>ISBN</th>
                        <th>Description</th>
                        <th>Cover Image</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td><a href="{{ route('books.show', $book->id) }}" title="Preview" class="btn btn-success btn-xs pull-left"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{ route('books.edit', $book->id) }}" title="Update" class="btn btn-primary btn-xs pull-left"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                            {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'DELETE']) !!}

                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-xs','title'=> 'Delete', 'type' => 'submit']) !!}

                        {!! Form::close() !!}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->ISBN }}</td>
                            <td>{{ $book->description }}</td>
                            <td><img src="images/{{ $book->cover_image }}" alt="{{ $book->ISBN }}" width="60" height="100" /></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('books.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Book</a>
            <div class="text-center">
                {{ $books->links() }}
            </div>
            @else
            <h2>Not any books</h2>
            @endif
        </div>
    </div>
</div>
@endsection
