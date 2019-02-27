@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @if($user)
        <h1>{{ $user }} books</h1>
        @else
        <h1>All Books</h1>
        @endif
        @if($books)
            @foreach ($books as $book)
            <!-- Book Starts -->
                    <div class="col-md-4 col-sm-6">
                        <div class="product-col">
                            <div class="image">
                                <img src="{{URL::asset('/images/'.$book->cover_image)}}" alt="{{ $book->name }}" class="img-responsive" />
                            </div>
                            <div class="caption">
                                <h4><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a></h4>
                                <div class="description">
                                    {{ $book->description }}
                                </div>
                                <div class="price">
                                    <span class="price-new">ISBN: {{ $book->ISBN }}</span>
                                </div>
                                @if($user)
                                <div class="cart-button button-group">
                                    {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'DELETE']) !!}

                                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', ['class' => 'btn btn-danger btn-xs','title'=> '', 'type' => 'submit']) !!}

                                    {!! Form::close() !!}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                <!-- Book Ends -->
            @endforeach
        @else
        <h1>No any books</h1>
        @endif
    </div>
    <div class="row">

        <a href="{{ route('books.create') }}" class="btn btn-primary">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Book
        </a>
    </div>
</div>
@endsection
