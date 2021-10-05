@extends('layouts.main')

@section('title', 'Users')

@section('content')
    <a class="btn btn-primary" role="button" href="{{ route('users.create') }}">Create</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>
                    <a href="{{ route('users.show', $user) }}">
                        {{ $user->name }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('users.show', $user) }}">
                        {{ $user->email }}
                    </a>
                </td>
                <td>
                    <x-user-actions :user="$user" />
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
