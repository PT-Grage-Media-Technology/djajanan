<?php

namespace App\Http\Controllers;

use App\Models\AdminHistory;
use Illuminate\Http\Request;

class AdminHistoryController extends Controller
{
    public function index()
    {
        $histories = AdminHistory::with('admin')->latest()->paginate(10);
        return view('admin.history.index', compact('histories'));
    }
}
