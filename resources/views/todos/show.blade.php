@extends('todos.layout')

@section('content')
    <div class="d-flex flex-row header">
        <h1>{{ $todo->title }}</h1>
        <a href="{{ route('todo.index') }}"><span class="fas fa-arrow-left" /></a>
    </div>

    <div>
        <p>{{ $todo->description }}</p>
    </div>

@endsection
