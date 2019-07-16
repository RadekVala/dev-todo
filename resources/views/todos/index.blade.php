@extends('layouts.app')

@section('title')
    List of my todos
@endsection

@section('content')
    <div class="container">
        <h1>Todos</h1>

        <a class="btn btn-primary" href="{{ route('todos.create') }}" title="">{{ __('todos.index.new') }}</a>

        <div class="row">

            @foreach ($todos as $todo)
                <div class="col-md-4 col-lg-3">
                    <div class="row">
                        <div class="col-10">
                                {{ $todo->name }}
                                | {{ $todo->state->name }}
                        </div>

                        <div class="col-2 text-right">
                                {{ $todo->id }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            {{ $todo->description }}
                        </div>
                    </div>

                    <a class="btn btn-primary" href="{{ route('todos.edit', [ 'id' => $todo->id ]) }}" title="">{{ __('todos.index.edit') }}</a>
                    <form method="POST" action="{{ route('todos.destroy', [ 'id' => $todo->id ]) }}">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="{{ __('todos.index.delete') }}">
                    </form>
                </div>
            @endforeach

        </div>
    </div>
@endsection



