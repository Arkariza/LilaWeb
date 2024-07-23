@extends('layouts.mainlayout')

@section('title', 'Edit Profile')

@section('content')
<div class="container mt-4">
    <h2>Edit Profile</h2>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}">
        </div>
        <div class="form-group mb-3">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
        </div>
        <div class="form-group mb-3">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control">{{ $user->address }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
