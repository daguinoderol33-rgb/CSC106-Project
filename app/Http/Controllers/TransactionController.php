<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    
public function index(Request $request)
{
    $user = auth()->user();

    $query = $user->role === 'admin' 
        ? Transaction::with('user')
        : $user->transactions()->with('user');

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('borrower_name', 'like', "%{$search}%")
              ->orWhere('address', 'like', "%{$search}%")
              ->orWhere('contact_number', 'like', "%{$search}%")
              ->orWhere('work', 'like', "%{$search}%")
              ->orWhere('amount', 'like', "%{$search}%")
              ->orWhere('status', 'like', "%{$search}%");
        });
    }

    $sortField = $request->sort_field ?? 'created_at';
    $sortDirection = $request->sort_direction ?? 'desc';

    $transactions = $query->orderBy($sortField, $sortDirection)->paginate(10)->withQueryString();

    return view('transactions.index', compact('transactions'));
}



  public function updateStatus(Transaction $transaction)
{
    // Anyone can mark as paid
    $transaction->status = 'done';
    $transaction->save();

    return redirect()->back()->with('success', 'Transaction marked as Paid.');
}



    // Show create form
    public function create()
    {
        return view('transactions.create');
    }

public function dashboard()
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        // ADMIN: count ALL transactions
        $totalPending = \App\Models\Transaction::where('status', 'pending')->count();
        $totalDone = \App\Models\Transaction::where('status', 'done')->count();
    } else {
        // USER: count ONLY their transactions
        $totalPending = \App\Models\Transaction::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();

        $totalDone = \App\Models\Transaction::where('user_id', $user->id)
            ->where('status', 'done')
            ->count();
    }

    if ($user->role === 'admin') {
        return view('admin.admin-dashboard', compact('totalPending', 'totalDone'));
    }

    return view('dashboard', compact('totalPending', 'totalDone'));
}



public function filterByStatus($status)
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        $transactions = Transaction::where('status', $status)->latest()->get();
    } else {
        $transactions = $user->transactions()->where('status', $status)->latest()->get();
    }

    return view('transactions.index', compact('transactions'));
}


    // Store new transaction
public function store(Request $request)
{
    $request->validate([
        'borrower_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'contact_number' => 'required|string|max:20',
        'work' => 'required|string|max:255',
        'amount' => 'required|numeric|min:1',
    ]);

    $normalizedName = trim(strtolower($request->borrower_name));

    $existingTransaction = Transaction::whereRaw(
            'LOWER(TRIM(borrower_name)) = ?',
            [$normalizedName]
        )
        ->where('contact_number', $request->contact_number)
        ->where('status', 'pending')
        ->where('user_id', auth()->id()) // IMPORTANT
        ->first();

    if ($existingTransaction) {
        $existingTransaction->amount += $request->amount;
        $existingTransaction->save();
    } else {
        Auth::user()->transactions()->create([
            'borrower_name' => trim($request->borrower_name),
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'work' => $request->work,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);
    }

    return redirect()->route('transactions.index')
        ->with('success', 'Borrower transaction saved successfully.');
}





}
