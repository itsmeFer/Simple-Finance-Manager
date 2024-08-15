@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Last User Login Information</h1>

    @if($lastLoginUser)
        <p><strong>Last Login By:</strong> {{ $lastLoginUser->name }}</p>
        <p><strong>Last Login At:</strong> {{ $lastLoginUser->last_login_at->format('d M Y, H:i') }}</p>
    @else
        <p>No user has logged in yet.</p>
    @endif

    <a href="{{ route('transactions.index') }}" class="btn btn-secondary mt-3">Back to Transactions</a>
</div>
@endsection
