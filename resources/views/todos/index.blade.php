@extends('todos.layout')

@section('content')

    {{-- <div class="d-flex flex-row display-all"> --}}
    <div class="d-flex flex-row header">
        <h1>All your todos</h1>
        <a href="{{ route('todo.create') }}" class="btn btn-success">Create New</a>
    </div>
    <hr>
    <div class="d-flex flex-column">
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
        @foreach ($todos as $todo)
            <li class="d-flex justify-content-center">
                @if ($todo->completed)
                    <p class="text-decoration-line-through">{{ $todo->title }}</p>
                @else
                    <p>{{ $todo->title }}</p>
                @endif
                <div>
                    <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-default">
                        <span class="fas fa-edit" />
                    </a>
                    @if ($todo->completed)
                        <span class="fas fa-check text-success check" />
                    @else
                        <span
                            onclick="event.preventDefault();document.getElementById('form-complete-{{ $todo->id }}').submit()"
                            class="fas fa-check text-muted check" />
                        <form style="display:none" id="{{ 'form-complete-' . $todo->id }}" method="POST"
                            action="{{ route('todo.complete', $todo->id) }}">
                            @csrf
                            @method('PUT')
                        </form>
                    @endif
                </div>
            </li>
        @endforeach

    </div>
    </div>
@endsection
