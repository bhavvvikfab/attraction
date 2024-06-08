<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserTransaction;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StatementController extends Controller
{
    public function statement()
    {
        $agents = User::where('role', 2)->get();
        return view('statement.statement', compact('agents'));
    }


    public function get_agent_and_transaction($id, $startdate = '', $enddate = '')
    {
        if (isset($id)) {
            $startdate = date('Y-m-d',strtotime($startdate));
            $enddate = date('Y-m-d',strtotime($enddate));
            // $transactions = UserTransaction::where('user_id', $id)
            //     ->when($startdate, function ($query) use ($startdate) {
            //         return $query->whereDate('created_at', '>=', $startdate);
            //     })
            //     ->when($enddate, function ($query) use ($enddate) {
            //         return $query->whereDate('created_at', '<=', $enddate);
            //     })
            //     ->get();

                $transactions = UserTransaction::where('user_id', $id)->whereBetween('created_at', [$startdate, $enddate])->get();
            
            $agent = User::where('id', $id)->first();

            return ['transactions' => $transactions, 'agent' => $agent];
        }

        return null;
    }


    public function get_agent_statement(Request $request)
    {
        $id = $request->id ?? Auth::user()->id;
        $startdate = $request->start_date;
        $enddate = $request->end_date; 

        if ($request->session()->has('agent_statement_data')) {
            $request->session()->forget('agent_statement_data');
        }
        $data = $this->get_agent_and_transaction($id, $startdate, $enddate);

        if ($data && !empty($data['transactions']) && !empty($data['agent'])) {
            $request->session()->put('agent_statement_data', $data);
            return response()->json($data); 
        } else {
            return response()->json(['error' => 'Failed to retrieve agent statement or data is empty.'], 400);
        }
    }
    public function generatePDF(Request $request)
    {
        // Check if session variable exists and has data
        if ($request->session()->has('agent_statement_data')) {
            $data = $request->session()->get('agent_statement_data');

            // Ensure $data is an array
            if (is_array($data)) {
                $pdf = PDF::loadView('statement.statement_pdf');
                $fileName = now()->format('Ymd_His'). '_statement.pdf';
                return $pdf->download($fileName);

                // return $pdf->download('statement.pdf');
            } else {
                return redirect()->back()->with('error', 'Agent statement data is not in the expected format.');
            }
        } else {
            return redirect()->back()->with('error', 'Failed to retrieve agent statement data from session.');
        }
    }

}
