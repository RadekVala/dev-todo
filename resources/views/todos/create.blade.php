@extends('layouts.app')

@section('title')
    {{ __('todos.create.title') }}
@endsection

@section('content')
    <h1>{{ __('todos.create.title') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('todos.store') }}">
        @csrf

        <input name="name" type="text">
        <textarea name="description"></textarea>

        <select name="status_id">
            @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach
        </select>

        <input type="submit" value="{{ __('todos.create.submitButton') }}">

    </form>


@endsection



