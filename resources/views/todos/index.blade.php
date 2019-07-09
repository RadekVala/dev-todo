@extends('layouts.app')

@section('title')
    List of my todos
@endsection

@section('content')
    <h1>Todos</h1>

    <a class="btn btn-primary" href="{{ route('todos.create') }}" title="">{{ __('todos.index.new') }}</a>

    <ul>
        @foreach ($todos as $todo)
            <li>
                {{ $todo->id }}: {{ $todo->name }}
            <a class="btn btn-primary" href="{{ route('todos.edit', [ 'id' => $todo->id ]) }}" title="">{{ __('todos.index.edit') }}</a>
            <form action="{{ route('todos.destroy', [ 'id' => $todo->id ]) }}">
                @method('delete')
                <input class="btn btn-danger" type="submit" value="{{ __('todos.index.delete') }}">
            </form>
            </li>
        @endforeach
    </ul>
@endsection



