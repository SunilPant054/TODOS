@extends('todos.layout')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message') }} </div>
    @elseif ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('todo.update', $todo->id) }}">
        @csrf
        @method('PUT')
        <div class="m-3">
            <h1>Update this todo list</h1>
            <input type="text" name="title" value="{{ $todo->title }}" class="form-control" id="title">
        </div>
        <button type="submit" class="btn btn-primary m-3">Update</button>
    </form>
@endsection
