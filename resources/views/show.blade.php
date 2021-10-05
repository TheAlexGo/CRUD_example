@extends('layouts.main')

@section('title', 'User ' . $user->name)

@section('content')
    <x-buttons.back />
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Id: {{ $user->id }}</li>
            <li class="list-group-item">Name: {{ $user->name }}</li>
            <li class="list-group-item">Email: {{ $user->email }}</li>
            <li class="list-group-item">Created: {{ $user->created_at->format('d.m.y H:m') }}</li>
            <li class="list-group-item">Updated: {{ $user->updated_at->format('d.m.y H:m') }}</li>
        </ul>
    </div>

    <div class="mt-3">
        <x-user-actions :user="$user" />
    </div>
@endsection
