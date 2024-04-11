<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\UserTransaction;

class TopupController extends Controller
{
    //
    public function index(){
        $data['userTransactions'] = UserTransaction::findAll();
        return view('topup.topup');
    }
}
