<?php

namespace App\Http\Controllers;

use App\Models\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageCreditController extends Controller
{
    public function manage_credit()
    {

        $agent = Auth::user()->id;
        if ($agent) {
            $data = UserTransaction::where('user_id', $agent)->get();
            $total_topup = UserTransaction::where('user_id', $agent)
                ->where('type', 'credit')
                ->where('status', 'completed')
                ->get();

            $total_topup_Amount = 0;
            foreach ($total_topup as $transaction) {
                $total_topup_Amount += $transaction->amount;
            }

            $total_usage = UserTransaction::where('user_id', $agent)
                ->where('type', 'debit')
                ->where('status', 'completed')
                ->get();

            $total_usage_Amount = 0;
            foreach ($total_usage as $transaction) {
                $total_usage_Amount += $transaction->amount;
            }
            return view('statement.manage_credit', compact('data', 'total_usage_Amount', 'total_topup_Amount'));
        }
    }

    public function get_transaction(Request $request){

        if($request->id){
            $data = UserTransaction::where('id', $request->id)->get();
            return ['status'=>200,'results'=>$data];
        }
    }
    
}
