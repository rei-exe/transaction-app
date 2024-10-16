<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function showAllTransactions(){
        $transactions = Transaction::orderBy('updated_at','desc')->get();
        return view('transactions', ['transactions' => $transactions]);
    }

    public function createTransactions(){
        return view('create'); 
    }

    public function storeTransactions(Request $request){
        $validated = $request->validate([
            'transaction_title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:successful,declined',
            'total_amount' => 'required|numeric|min:0', 
            'transaction_number' => 'required|string|unique:transactions,transaction_number|max:50'
            ]);
            $transaction = new Transaction();
            $transaction->transaction_title = $validated['transaction_title'];
            $transaction->description = $validated['description'];
            $transaction->status = $validated['status'];
            $transaction->total_amount = $validated['total_amount'];
            $transaction->transaction_number = $validated['transaction_number'];
            $transaction->save();

            return redirect()->route('showAllTransactions')->with('success', "Transaction Created Successfully.");
    }

    public function readTransactions(Request $request){
        $transaction = Transaction::findorFail($request->id);
        return view('read', ['transactions' => $transaction]);
    }

    public function editTransactions(Request $request){
        $transaction = Transaction::find($request->id);
        return view('edit', ['transactions' => $transaction]);
    }

    public function updateTransactions(Request $request){
        $validated = $request->validate([
            'transaction_title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:successful,declined',
            'total_amount' => 'required|numeric|min:0', 
            'transaction_number' => 'required|string|unique:transactions,transaction_number|max:50'
            ]);
            $transaction = Transaction::find($request->id);
            $transaction->transaction_title = $validated['transaction_title'];
            $transaction->description = $validated['description'];
            $transaction->status = $validated['status'];
            $transaction->total_amount = $validated['total_amount'];
            $transaction->transaction_number = $validated['transaction_number'];
            $transaction->save();

            return redirect()->route('readTransactions', ['id' => $transaction->id])->with('success', "Transaction Updated Successfully.");
    }

    public function deleteTransactions(Request $request){
        $transaction = Transaction::find($request->id);

        if ($transaction)
        {
            $transaction->delete();
        }
        return redirect()->route('showAllTransactions')->with('success', "Transaction Deleted Successfully.");
    }

}
