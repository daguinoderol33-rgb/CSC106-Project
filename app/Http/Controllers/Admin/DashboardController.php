<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPending = Transaction::where('status', 'pending')->count();
        $totalDone = Transaction::where('status', 'done')->count();

        return view('admin.admin-dashboard', compact(
            'totalPending',
            'totalDone'
        ));
    }
}
