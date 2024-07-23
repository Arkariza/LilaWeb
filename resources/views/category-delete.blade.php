@extends('layouts.mainlayout')

@section('title', 'Delete Category')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://static.vecteezy.com/system/resources/previews/013/390/802/non_2x/3d-rendering-exclamation-mark-sign-icon-free-png.png" class="img-fluid rounded-start" alt="Category Image">
          </div>
          <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Anda ingin menghapus kategori {{ $category->name }}?</h5>
              <p class="card-text">Tekan "Ya" untuk menghapus Tekan "Tidak" jika tidak ingin menghapus</p>
              <a href="/category-destroy/{{ $category->slug }}" class="btn btn-danger">Ya</a>
              <a href="/categories" class="btn btn-primary">Tidak</a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
    
