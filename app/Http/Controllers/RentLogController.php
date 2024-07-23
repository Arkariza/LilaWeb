<?php

namespace App\Http\Controllers;

use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RentLogController extends Controller
{
    public function index()
    {
        $rentLogs = RentLog::with(['book', 'user'])->get();
        return view('admin.rent-logs', compact('rentLogs'));
    }

    public function approve($id)
    {
        $rentLog = RentLog::findOrFail($id);

        Log::info('Stok sebelum dikurangi: ' . $rentLog->book->stok);

        if ($rentLog->book->stok > 0) {
            $rentLog->status = 'approved';
            $rentLog->save();

            Log::info('Stok setelah dikurangi: ' . $rentLog->book->stok);
            
            return redirect()->back()->with('success', 'Peminjaman disetujui.');
        }

        return redirect()->back()->with('error', 'Gagal menyetujui peminjaman. Stok buku tidak mencukupi.');
    }

    public function dismiss($id)
    {
        $rentLog = RentLog::findOrFail($id);
        $rentLog->status = 'dismissed';
        $rentLog->save();

        return redirect()->back()->with('success', 'Peminjaman ditolak.');
    }
}
