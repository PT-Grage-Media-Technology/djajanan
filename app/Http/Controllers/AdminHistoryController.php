<?php

namespace App\Http\Controllers;

use App\Models\AdminHistory;


class AdminHistoryController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $currentPage = request()->get('page', 1);  // Ambil halaman saat ini, default 1

        // Eager loading 'admin' dengan 'with' dan menerapkan pagination
        $histories = AdminHistory::with('admin')  // Eager load relasi 'admin'
            ->skip(($currentPage - 1) * $perPage)   // Menentukan halaman
            ->take($perPage)                        // Menentukan jumlah data per halaman
            ->get();

        $total = AdminHistory::count();  // Total data AdminHistory

        $lastPage = ceil($total / $perPage);  // Hitung jumlah halaman

        return view('admin.history.index', compact('histories', 'currentPage', 'lastPage', 'perPage'));
    }
}
