@extends('layouts.mainlayout')

@section('title', 'Profile')

@section('content')
<div class="container mt-4">
    <div class="text-center">
        <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Profile Picture">
        <h2 class="mt-3">{{ $user->username }}</h2>
    </div>
    
    <div class="card mt-4">
        <div class="card-header">
          Information
        </div>
        <div class="card-body">
          <p><strong>Address:</strong> {{ $user->address }}</p>
          <p><strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}</p>
        </div>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>     
    </div>
</div>
@endsection
