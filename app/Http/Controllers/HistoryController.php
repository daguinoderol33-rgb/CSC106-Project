<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginHistory;

class HistoryController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $histories = LoginHistory::with('user')->latest()->get();
        } else {
            $histories = $user->loginHistories()->latest()->get();
        }

        return view('history.index', compact('histories'));
    }
}

