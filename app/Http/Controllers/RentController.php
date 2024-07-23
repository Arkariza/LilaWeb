<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function rentBook(Request $request)
{
    $book = Book::find($request->book_id);


    if ($book && $book->stok > 0) {
        RentLog::create([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'status' => 'pending',
        ]);

        return redirect()->route('book.show', $book->id)->with('success', 'Peminjaman buku berhasil. Tunggu persetujuan admin.');
    }

    return redirect()->route('book.show', $book->id)->with('error', 'Stok buku tidak mencukupi.');
}

}
