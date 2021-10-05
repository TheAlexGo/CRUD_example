@extends('layouts.main')

@section('title', (isset($user) ? 'Update '.$user->name : 'Create user'))

@section('content')
    <a role="button" class="btn btn-secondary" href="{{ route('users.index') }}">Back to users</a>
    <form
        method="POST"
        @if(isset($user))
        action="{{ route('users.update', $user) }}"
        @else
        action="{{ route('users.store') }}"
        @endif
        class="mt-3"
    >
        @csrf
        @isset($user)
            @method('PUT')
        @endisset
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                name="name"
                type="text"
                class="form-control"
                id="name"
                aria-label="Name"
                placeholder="Enter your name"
                value="{{ isset($user) ? $user->name : null }}"
            >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                name="email"
                type="email"
                class="form-control"
                id="email"
                aria-label="Email"
                placeholder="Enter your email"
                value="{{ isset($user) ? $user->email : null }}"
            >
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
