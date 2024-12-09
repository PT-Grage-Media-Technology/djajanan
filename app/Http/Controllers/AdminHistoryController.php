<?php

namespace App\Http\Controllers;

use App\Models\AdminHistory;


class AdminHistoryController extends Controller
{
    public function index()
    {
        $histories = AdminHistory::with('admin')->latest()->paginate(1000);
        return view('admin.history.index', compact('histories'));
    }
}
