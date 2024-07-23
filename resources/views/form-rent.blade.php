@extends('layouts.mainlayout')

@section('title', 'Form Rent')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="https://static.vecteezy.com/system/resources/previews/013/390/802/non_2x/3d-rendering-exclamation-mark-sign-icon-free-png.png" class="img-fluid rounded-start" alt="Warning">
        </div>
        <div class="col-md-8">
          <div class="card-body">
              <h5 class="card-title">Anda ingin meminjam Buku {{ $book->title }}?</h5>
            <p class="card-text">Tekan "Ya" untuk meminjam. Tekan "Tidak" jika tidak ingin meminjam.</p>
            <form action="{{ route('process.rent') }}" method="POST">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <button type="submit" class="btn btn-danger">Ya</button>
                <a href="{{ route('desk-book', $book->slug) }}" class="btn btn-primary">Tidak</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
