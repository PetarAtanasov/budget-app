<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        return Transaction::where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:income,expense',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        return Transaction::create($validated);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'type' => 'required|in:income,expense',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $transaction->update($validated);

        return $transaction;
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return response()->json(['message' => 'Deleted']);
    }

    public function monthlySummary()
    {
        $userId = Auth::id();

        $income = Transaction::where('user_id', $userId)
            ->where('type', 'income')
            ->sum('amount');

        $expenses = Transaction::where('user_id', $userId)
            ->where('type', 'expense')
            ->sum('amount');

        return [
            'income' => $income,
            'expenses' => $expenses,
            'balance' => $income - $expenses,
        ];
    }
}
