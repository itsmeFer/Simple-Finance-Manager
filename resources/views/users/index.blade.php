@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Last Login</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name ?? 'Unknown' }}</td>
                    <td>{{ $user->email ?? 'Unknown' }}</td>
                    <td>{{ $user->last_login_at ? $user->last_login_at->format('d M Y, H:i') : 'Never' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
