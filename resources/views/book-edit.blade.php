@extends('layouts.mainlayout')

@section('title', 'Edit-Book')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


@section('content')
    <h1>Edit Book</h1>

    <div class="mt-5 w-50">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/book-edit/{{ $book->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="book_code" id="code" class="form-control" placeholder="Book Code" value="{{ $book->book_code }}">
            </div>
            <div class="mb-2">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Books Title" value="{{ $book->title }}">
            </div>
            <div class="mb-2">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-2">
                <label for="currentImage" class="form-label" style="display: block">Current Image</label>
                @if($book->cover!='')
                    <img src="{{ asset('storage/cover/'.$book->cover) }}" alt="" width="200px">             
                    @else   
                        <img src="{{ asset('image/nocvr.jpg') }}" alt="" width="200px">
                @endif
            </div>
            <div class="mb-2">
                <label for="category" class="form-label">Category</label>
                <select name="categories[]" id="category" class="form-control select-multiple"  multiple>
                    @foreach($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label for="currentCategory" class="form-label">Current Category</label>
                <ul>
                    @foreach($book->categories as $category)
                    <li>
                        {{ $category->name }}
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-5">
                <button class="btn btn-success" type="submit">Save</button>
                <a href="/books" class="btn btn-primary">Kembali</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
    });
    </script>
@endsection
    
