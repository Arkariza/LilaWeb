@extends('layouts.mainlayout')

@section('title', 'Desk Book')

@section('content')
    <div class="container mt-5">
        <a href="/" class="btn btn-secondary mb-4">Back</a>
        <div class="row">
            <div class="col-md-4">
                @if($book->cover)
                    <img src="{{ asset('storage/cover/'.$book->cover) }}" alt="{{ $book->title }}" class="img-fluid rounded shadow-sm">
                @else
                    <img src="{{ asset('image/nocvr.jpg') }}" alt="No cover available" class="img-fluid rounded shadow-sm">
                @endif
            </div>
            <div class="col-md-8">
                <h1 class="mb-3">{{ $book->title }}</h1>
                <p class="mb-1"><strong>Code:</strong> {{ $book->book_code }}</p>
                <p class="mb-1"><strong>Status:</strong> 
                    <span class="fw-bold {{ $book->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                        {{ $book->status }}
                    </span>
                </p>
                <p class="mb-4"><strong>Stock:</strong> {{ $book->stok }}</p>
                <a href="{{ route('form.rent', $book->slug) }}" class="btn btn-primary">Pinjam</a>
            </div>
        </div>
    </div>
@endsection