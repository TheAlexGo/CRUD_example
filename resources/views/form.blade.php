@extends('layouts.main')

@section('title', (isset($user) ? 'Update '.$user->name : 'Create user'))

@section('content')
    <x-buttons.back />
    <form
        method="POST"
        @if(isset($user))
        action="{{ route('users.update', $user) }}"
        @else
        action="{{ route('users.store') }}"
        @endif
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
                value="{{ old('name', isset($user) ? $user->name : null) }}"
                maxlength="50"
            >
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
                value="{{ old('email', isset($user) ? $user->email : null) }}"
                maxlength="50"
            >
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
