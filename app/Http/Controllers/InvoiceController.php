<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //
    public function index()
    {
        return view('invoice.Admininvoice');
    }
    public function view_single_invoice()
    {
        return view('invoice.viewsingleinvoice');
    }
}
