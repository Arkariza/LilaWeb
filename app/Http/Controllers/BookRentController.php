<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookRentController extends Controller
{
    public function showFormRent($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        return view('form-rent', compact('book'));
    }

    public function processRent(Request $request)
    {
        $book = Book::find($request->book_id);

        if ($book && $book->stok > 0) {
            RentLog::create([
                'book_id' => $book->id,
                'user_id' => Auth::id(),
                'status' => 'pending',
            ]);

            return redirect()->route('desk-book', $book->slug)->with('success', 'Peminjaman buku berhasil. Tunggu persetujuan admin.');
        }

        return redirect()->route('desk-book', $book->slug)->with('error', 'Stok buku tidak mencukupi.');
    }

    public function approveRent($id)
    {
        $rentLog = RentLog::findOrFail($id);
        $rentLog->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Peminjaman buku disetujui.');
    }

    public function dismissRent($id)
    {
        $rentLog = RentLog::findOrFail($id);
        $rentLog->update(['status' => 'dismissed']); 
        return redirect()->back()->with('success', 'Peminjaman buku ditolak.');
    }

    public function returnBook($id)
    {
        $rentLog = RentLog::findOrFail($id);
        $rentLog->update(['status' => 'returned']); 
        $book = Book::find($rentLog->book_id);
        $book->increment('stok');

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
    }
}
