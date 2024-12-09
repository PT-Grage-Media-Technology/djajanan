<?php

namespace App\Http\Controllers;

use App\Models\AdminHistory;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHistoryController extends Controller
{
    public function index()
    {
        $histories = AdminHistory::with('admin')->latest();

        $histories = User::all(); // Mengambil semua user tanpa soft delete

        $histories = User::with('roles')->get();
        return view('admin.history.index', compact('histories'));

        $histories = User::all();
        return view('admin.history.index', compact('histories'));
    }
}
