@extends('layouts.app')

@section('title')
    {{ __('todos.create.title') }}
@endsection

@section('content')
    <div class="container">
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

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Name of your task</small>
            </div>

            <div class="form-group">
                <label for="name">Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="state">State</label>
                <select name="status_id">
                    @foreach ($states as $state)
                        <option class="form-control" value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>

            <input class="btn btn-primary" type="submit" value="{{ __('todos.create.submitButton') }}">

        </form>
    </div>


@endsection



