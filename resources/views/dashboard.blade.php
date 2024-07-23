@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

    <h1>Welcome, {{ Auth::user()->username }}</h1>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Book</h5>
                    <p class="card-text">{{ $book_count }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Category</h5>
                    <p class="card-text">{{ $category_count }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">User</h5>
                    <p class="card-text">{{ $user_count }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h1>Rent Log</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Book Title</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentLogs as $log)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $log->book->title }}</td>
                        <td>{{ $log->user->name }}</td>
                        <td>{{ $log->status }}</td>
                        <td>
                            @if($log->status == 'pending')
                                <form action="{{ route('rent.approve', $log->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                                <form action="{{ route('rent.dismiss', $log->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Dismiss</button>
                                </form>
                            @elseif($log->status == 'approved')
                                <form action="{{ route('rent.return', $log->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-sm">Return</button>
                                </form>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
