@extends('layouts.app')

@section('title')
    {{ __('todos.edit.title') }}
@endsection

@section('content')
    <h1>{{ __('todos.edit.title') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('todos.update', [ 'id' => $todo->id ] ) }}">
        @csrf
        @method('PUT')

        <input name="name" type="text" value="{{ $todo->name }}">
        <textarea name="description">
            {{ $todo->description }}
        </textarea>

        <input type="submit" value="{{ __('todos.edit.submitButton') }}">

    </form>


@endsection



