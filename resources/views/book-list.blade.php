@extends('layouts.mainlayout')

@section('title', 'Book-List')

@section('content')
    <h1>List Buku</h1>

    <form action="" method="get">
        <div class="row">
            <div class="col-12 col-sm-6">
                <select name="category" id="" class="form-control">
                    <option value="">Select category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Book" name="title">
                    <button class="btn btn-primary" type="submit">Search</button>
                  </div>
            </div>
        </div>
    </form>

    <div class="my-5">
        <div class="row">
            @foreach ($books as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <a href="{{ route('desk-book', $item->slug) }}" class="stretched-link">
                            <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('image/nocvr.jpg') }}" class="card-img-top" draggable="false">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->book_code }}</h5>
                            <p class="card-text">{{ $item->title }}</p>
                            <p class="card-text text-end fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                                {{ $item->status }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
