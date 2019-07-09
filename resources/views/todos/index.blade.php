@extends('layouts.app')

@section('title')
    List of my todos
@endsection

@section('content')
    <h1>Todos</h1>

    <ul>
        @foreach ($todos as $todo)
            <li>
                {{ $todo->id }}: {{ $todo->name }}
            <a href="{{ route('todos.edit', [ 'id' => $todo->id ]) }}" title="">{{ __('todos.index.edit') }}</a>
            </li>
        @endforeach
    </ul>
@endsection



