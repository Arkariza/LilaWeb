@extends('layouts.mainlayout')

@section('title', 'Users-Detail')

@section('content')
    <h1>User Detail</h1>

    <div class="mt-5 d-flex justify-content-end">
        @if ($user->status == 'inactive')
        <a href="/user-approve/{{ $user->slug }}" class="btn btn-info">Aprove User</a>
        @endif
    </div>

    @if (session('status'))
     <div class="alert alert-success">
        {{ session('status') }}
     </div>
     @endif

    <div class="my-5 w-25">
        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" class="form-control" readonly value="{{ $user->username }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Phone</label>
            <input type="text" class="form-control" readonly value="{{ $user->phone }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label"><Address></Address></label>
            <textarea name="" id="" cols="30" rows="10" class="form-control" style="resize: none">{{ $user->address }}</textarea>
            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <input type="text" class="form-control" readonly value="{{ $user->status }}">
            </div>
            
        </div>
    </div>
@endsection
    
