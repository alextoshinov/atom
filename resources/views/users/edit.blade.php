@extends('layouts.app')

@section('title', '| Edit User')

@section('content')
<div class="container">
    <div class="row">
        <h1>Edit User</h1>
        @if(!$errors->isEmpty())
            <ul>
                @foreach($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::model($user, [
            'method' => 'PUT',
            'route' => ['users.update', $user->id]
             ]) !!}
        <div class="form-group">
            {{ Form::label('first_name', 'First Name :') }}
            {{ Form::text('first_name', $user->first_name, ['class' => 'form-control','autofocus']) }}
        </div>
        <div class="form-group">
            {{ Form::label('last_name', 'Last Name :') }}
            {{ Form::text('last_name', $user->last_name, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('username', 'User Name:') }}
            {{ Form::text('username', $user->username, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            {{ Form::text('email', $user->email, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', null, ['class' => 'form-control']) }}
        </div>

          <button type="submit" class="btn btn-primary">Update</button>

        {!! Form::close() !!}
    </div>
</div>
@endsection
