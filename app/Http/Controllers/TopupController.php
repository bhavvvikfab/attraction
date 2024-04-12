<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserTransaction;
use Illuminate\Support\Str;

class TopupController extends Controller
{
    //
    public function index(){
        $userTransactions = UserTransaction::with('user')->get();

        // Filter transactions if the user is an agent
        if(Auth::user()->role == 2){
            $userTransactions = $userTransactions->where('user_id', Auth::user()->id);
        }

        return view('topup.topup', [
            'userTransactions' => $userTransactions,
            'pendingTransactions' => $userTransactions->where('status', 'pending'),
            'approvedTransactions' => $userTransactions->where('status', 'completed'),
            'failedTransactions' => $userTransactions->where('status', 'failed'),
        ]);
    }

    public function updateTopUpStatus(Request $request) {
        $transactionID = $request->transaction_id;
        $transactionStatus = $request->status;
        $message = $transactionStatus == "completed" ? "approved" : "rejected";
    
        $userTransaction = UserTransaction::find($transactionID);
    
        if (!$userTransaction) {
            return response()->json(['error' => 'Transaction not found'], 404);
        }
        $adminData = User::find(1);
        $userData = User::find($userTransaction->user_id);
        if (!$userData) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        if ($transactionStatus == "completed") {
            $userData->credit_balance += $userTransaction->amount;
            $userData->save();

            // $adminData->credit_balance -= $userTransaction->amount;
            // $adminData->save();
        }
    
        $userTransaction->status = $transactionStatus;
        $userTransaction->save();
    
        return response()->json(['message' => 'Topup request '.$message.' successfully'], 200);
    }

    public function requestTopUp(Request $request) {
        $requestedAmount = $request->requestedAmount;
    
        $finalBalance = Auth::user()->credit_balance + $requestedAmount;

        $transactionId = 'TX' . now()->timestamp . Str::random(6); // Example: TX1646886532abc123
    
        $transaction = new UserTransaction([
            'user_id' => Auth::user()->id,
            'transaction_id' => $transactionId,
            'amount' => $requestedAmount,
            'type' => "debit",
            'status' => "pending",
            'balance' => $finalBalance,
        ]);
    
        $transaction->save();
    
        return response()->json(['message' => 'Topup amount requested successfully'], 200);
    }    
    
    
}
