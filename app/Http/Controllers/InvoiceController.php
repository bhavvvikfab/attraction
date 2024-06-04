<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;
use PDF;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon; 

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //
    public function index()
    {
        // dd(Auth::user()->id);
        // dd(Invoice::all());
        // if(session('prefix')=='admin'){
        //     $invoice_data=Invoice::get();
        // }else{
        //     $invoice_data=Invoice::where('agent_id',Auth::user()->id)->get();
        // }
        $invo= $invoice_data=Invoice::with('agent_details')->get();
        // dd($invo);

        $invoice_data = [];
        // dd($invoice_data);

        return view('invoice.all_invoice',compact('invoice_data','invo'));
    }
    public function get_invoice_data(Request $request){
        // if ($request->ajax()) {
        //     if(session('prefix')=='admin'){
        //         // dd('adddd');
        //     $invoice_data=Invoice::get();
        // }else{
        //     // dd('agggee');
        //     $invoice_data=Invoice::where('agent_id',Auth::user()->id)->get();
        // }


        //     // $invoice_data=Invoice::get();
    
        //     return Datatables::of($invoice_data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $btn = '<div class="d-flex justify-content-around align-items-center">';
        //             $btn .= '<div class="viewinc">';
        //             $btn .= '<a href="'.route(session('prefix', 'agent').'.view_single_invoice', ['id' => $row->id]).'">';
        //             $btn .= '<button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>';
        //             $btn .= '</a>';
        //             $btn .= '</div>';
                  
        //             $btn .= '</div>';
        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }



    //     if ($request->ajax()) {
    //     $query = Invoice::query();

    //     // Apply filters
    //     if ($request->get('search')['value']) {
    //         $search = $request->get('search')['value'];
    //         $query->where(function($q) use ($search) {
    //             $q->where('id', 'like', "%{$search}%")
    //               ->orWhere('invoice_no', 'like', "%{$search}%")
    //               ->orWhere('booking_id', 'like', "%{$search}%")
    //               ->orWhere('invoice_status', 'like', "%{$search}%");
    //         });
    //     }

    //     if(session('prefix')!='admin'){
    //         $query->where('agent_id',Auth::user()->id)->get();
    //     }elseif(session('prefix')=='admin'){
    //         $query->where('agent_id',Auth::user()->id)->get();
    //     }
    //     // dd($query);

    //     return Datatables::of($query)
    //         ->addIndexColumn()
    //         ->addColumn('action', function($row) {
    //             $btn = '<div class="d-flex justify-content-around align-items-center">';
    //             $btn .= '<div class="viewinc">';
    //             $btn .= '<a href="' . route(session('prefix', 'agent') . '.view_single_invoice', ['id' => $row->id]) . '">';
    //             $btn .= '<button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>';
    //             $btn .= '</a>';
    //             $btn .= '</div>';
    //             $btn .= '</div>';
    //             return $btn;
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }



    // if ($request->ajax()) {
    //     $searchDate = $request->get('search_date'); // Retrieve search date from request
    
    //     if (session('prefix') == 'admin') {
    //       $invoiceData = Invoice::where(function($query) use ($searchDate) {
    //         if ($searchDate) {
    //           $query->whereDate('created_at', $searchDate);
    //         }
    //       })->get();
    //     } else {
    //       $invoiceData = Invoice::where('agent_id', Auth::user()->id)
    //         ->where(function($query) use ($searchDate) {
    //           if ($searchDate) {
    //             $query->whereDate('created_at', $searchDate);
    //           }
    //         })->get();
    //     }
    
    //     return Datatables::of($invoiceData)
    //       ->addIndexColumn()
    //       ->addColumn('action', function($row) {
    //         // ... (Action column logic remains the same)
    //         $btn = '<div class="d-flex justify-content-around align-items-center">';
    //         $btn .= '<div class="viewinc">';
    //         $btn .= '<a href="'.route(session('prefix', 'agent').'.view_single_invoice', ['id' => $row->id]).'">';
    //         $btn .= '<button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>';
    //         $btn .= '</a>';
    //         $btn .= '</div>';
          
    //         $btn .= '</div>';
    //         return $btn;
    //       })
    //       ->rawColumns(['action'])
    //       ->make(true);
    //   }


      if ($request->ajax()) {
        $searchDate = $request->get('search_date');
        $agentId = $request->get('agent_id');
      // Initialize the query builder
      $invoiceQuery = Invoice::query();

      // Apply the searchDate filter if provided
      if ($searchDate) {
          $invoiceQuery->whereDate('created_at', $searchDate);
      }
  
      // Apply the agentId filter if provided
      if ($agentId) {
          $invoiceQuery->where('agent_id', $agentId);
      } elseif (session('prefix') != 'admin') {
          // Apply the agent filter for the logged-in agent if not admin and no agent filter is applied
          $invoiceQuery->where('agent_id', Auth::user()->id);
      }
  
      // Execute the query and get the results
      $invoiceData = $invoiceQuery->get();
    // dd( $invoiceData);
        return Datatables::of($invoiceData)
          ->addIndexColumn()
          ->addColumn('action', function($row) {
            // ... (Action column logic remains the same)
            $btn = '<div class="d-flex justify-content-around align-items-center">';
                    $btn .= '<div class="viewinc">';
                    $btn .= '<a href="'.route(session('prefix', 'agent').'.view_single_invoice', ['id' => $row->id]).'">';
                    $btn .= '<button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>';
                    $btn .= '</a>';
                    $btn .= '</div>';
                  
                    $btn .= '</div>';
                    return $btn;
          })
          ->addColumn('date2', function($row) {
            // ... (Action column logic remains the same)
            $formattedDate = Carbon::parse($row->created_at)->format('d-m-Y');
            return $formattedDate;
          })
          ->rawColumns(['action','date2'])
          ->make(true);
      }

      

    }
    public function view_single_invoice($id)
    {
        // dd($id);
        $invoice_data=Invoice::with(['bookingItem','booking'])->where('id',$id)->first();
        // dd($invoice_data);
        $invoice_items=$invoice_data['bookingItem']['items'];
     $items = isset($invoice_items)? json_decode($invoice_items,true) : array();

     $subtotal = 0;

     foreach ($items as $attraction) {
         foreach ($attraction['options'] as $option) {
             foreach ($option['tickets'] as $ticket) {
                 $agent_price = !empty($ticket['agent_price']) ? floatval($ticket['agent_price']) : 0;
                 $subtotal += $agent_price * $ticket['count'];
             }
         }
     }
    
        return view('invoice.viewsingleinvoice',compact('invoice_data','items','subtotal'));
    }

    public function downloadInvoice($id)
    {    
        $id=1;
        // Retrieve the invoice data
        // $invoice = Invoice::findOrFail($id);
        // dd($invoice);
        // Share data to view
        // $data = ['invoice' => $invoice];
        $invoice_data=Invoice::with(['bookingItem','booking'])->where('id',$id)->first();
        // dd($invoice_data);
        $invoice_items=$invoice_data['bookingItem']['items'];
     $items = isset($invoice_items)? json_decode($invoice_items,true) : array();

     $subtotal = 0;

     foreach ($items as $attraction) {
         foreach ($attraction['options'] as $option) {
             foreach ($option['tickets'] as $ticket) {
                 $agent_price = !empty($ticket['agent_price']) ? floatval($ticket['agent_price']) : 0;
                 $subtotal += $agent_price * $ticket['count'];
             }
         }
     }
     $data = compact('items', 'subtotal');
        // Load the view and pass the data
        $pdf = PDF::loadView('invoice.invoice', $data);

        // Download the PDF file
        return $pdf->download('invoice.pdf');
    }
}
