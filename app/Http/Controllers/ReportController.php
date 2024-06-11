<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;
use App\Models\Booking;
use App\Models\Attraction;
use PDF;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon; 



use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function all_report(){
        $report_agents = Booking::with('user')
        ->get()
        ->unique('customer_id');
// dd($report_agents);
        return view('report.all_report',compact('report_agents'));

    }

    // public function get_report_data(Request $request){
    //     $searchDateRange = $request->get('search_date_range');
    //     $agentId = $request->get('agent_id');
    //     $reportQuery = Booking::query();
    
    //     // Apply the searchDateRange filter if provided
    //     if ($searchDateRange) {
    //         $dates = explode(' - ', $searchDateRange);
    //         $startDate = Carbon::createFromFormat('Y-m-d', trim($dates[0]))->startOfDay();
    //         $endDate = Carbon::createFromFormat('Y-m-d', trim($dates[1]))->endOfDay();
    //         $reportQuery->whereBetween('created_at', [$startDate, $endDate]);
    //     }

        


    //     if ($agentId) {
    //         $reportQuery->where('customer_id', $agentId);
    //     } elseif (session('prefix') != 'admin') {
    //         // Apply the agent filter for the logged-in agent if not admin and no agent filter is applied
    //         $reportQuery->where('customer_id', Auth::user()->id);
    //     }
    
    //     // Include agent details only if the user is an admin
    //     if (session('prefix') == 'admin') {
    //         $reportQuery->with('user');
    //     }

    //     $reportData = $reportQuery->get();

    //     if ($request->ajax()) {
    //         $attraction_data = Booking::all();
    //         return DataTables::of($reportData)
               
    //             ->addColumn('action', function($row){
    //                 $href = route(session('prefix', 'agent') .'.view_single_attraction', ['id' => $row->id]);
    //                 return '<a href="' . $href . '">
    //                             <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
    //                         </a>';
    //             })
    //             ->addColumn('agent_name', function($row) {
    //                 // Only add the agent_name column if the user is an admin
    //                 if (session('prefix') == 'admin' && $row->user) {
    //                     return $row->user->name;
    //                 }
    //                 return null;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    // }

    public function get_report_data1(Request $request){
        



$booking_maindata = Booking::with('bookingItems', 'user')->get();
$b_array = [];

foreach ($booking_maindata as $single_booking) {
    $b_array1['booking_id'] = $single_booking->id;
    $b_array1['customer_id'] = $single_booking->customer_id;
    $b_array1['agent_name'] = $single_booking->user->name ?? 'NA';
    $b_array1['created_at'] = $single_booking->created_at ?? 'NA';

    $items = json_decode($single_booking->bookingItems->items, true);
    foreach ($items as $single_item) {
        $b_array2['attraction_id'] = $single_item['attraction_id'];
        $b_array2['attraction_name'] = $single_item['attractionDetails']['name'] ?? 'NA';

        foreach ($single_item['options'] as $single_option) {
            $b_array3['option_id'] = $single_option['option_id'];
            $b_array3['option_name'] = $single_option['optionDetailsArray']['option_name'];

            foreach ($single_option['tickets'] as $single_ticket) {
                $b_array4['ticket_id'] = $single_ticket['ticket_id'];
                $b_array4['count'] = $single_ticket['count'];
                $b_array4['agent_price'] = $single_ticket['agent_price'];
                $b_array4['ticket_name'] = $single_ticket['ticketdetails_array']['ticket_name'];
                $b_array4['sku'] = $single_ticket['ticketdetails_array']['sku'];

                // Merging all arrays into one array and adding it to $b_array
                $b_array[] = array_merge($b_array1, $b_array2, $b_array3, $b_array4);
            }
        }
    }
}

// dd($b_array);

    $searchDateRange = $request->get('search_date_range');
        $agentId = $request->get('agent_id');
        $reportQuery = $b_array::query();   // $b_array is not class that why is genrate error updated code below new function
    
        // Apply the searchDateRange filter if provided
        if ($searchDateRange) {
            $dates = explode(' - ', $searchDateRange);
            $startDate = Carbon::createFromFormat('Y-m-d', trim($dates[0]))->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', trim($dates[1]))->endOfDay();
            $reportQuery->whereBetween('created_at', [$startDate, $endDate]);
        }

        


        if ($agentId) {
            $reportQuery->where('customer_id', $agentId);
        } elseif (session('prefix') != 'admin') {
            // Apply the agent filter for the logged-in agent if not admin and no agent filter is applied
            $reportQuery->where('customer_id', Auth::user()->id);
        }
    
        // Include agent details only if the user is an admin
        if (session('prefix') == 'admin') {
            $reportQuery->with('user');
        }

        $reportData = $reportQuery->get();

            if ($request->ajax()) {
            $attraction_data = Booking::all();
            return DataTables::of($reportData)
               
               
                ->addColumn('agent_name', function($row) {
                    // Only add the agent_name column if the user is an admin
                    if (session('prefix') == 'admin' && $row->user) {
                        return $row->user->name;
                    }
                    return null;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

       


    }

    public function get_report_data(Request $request) {
        // Retrieve bookings with related data
        $booking_maindata = Booking::with('bookingItems', 'user')
                                    ->orderByDesc('id')
                                    ->get();
        $b_array = [];
    
        // Transform data
        foreach ($booking_maindata as $single_booking) {
            $b_array1['booking_id'] = $single_booking->id;
            $b_array1['customer_id'] = $single_booking->customer_id;
            $b_array1['agent_name'] = $single_booking->user->name ?? 'NA';
            $b_array1['created_at'] = $single_booking->created_at ?? 'NA';
    
            $items = json_decode($single_booking->bookingItems->items, true);
            foreach ($items as $single_item) {
                $b_array2['attraction_id'] = $single_item['attraction_id'];
                $b_array2['attraction_name'] = $single_item['attractionDetails']['name'] ?? 'NA';
    
                foreach ($single_item['options'] as $single_option) {
                    $b_array3['option_id'] = $single_option['option_id'] ?? 'NA';
                    $b_array3['option_name'] = $single_option['optionDetailsArray']['option_name'] ?? 'NA';
    
                    foreach ($single_option['tickets'] as $single_ticket) {
                        $b_array4['ticket_id'] = $single_ticket['ticket_id'] ?? 'NA';
                        $b_array4['count'] = $single_ticket['count'] ?? 'NA';
                        $b_array4['agent_price'] = $single_ticket['agent_price'] ?? 'NA';
                        $b_array4['ticket_name'] = $single_ticket['ticketdetails_array']['ticket_name'] ?? 'NA';
                        $b_array4['sku'] = $single_ticket['ticketdetails_array']['sku'] ?? 'NA';
    
                        // Merge all arrays into one array and add it to $b_array
                        $b_array[] = array_merge($b_array1, $b_array2, $b_array3, $b_array4);
                    }
                }
            }
        }
    
        // Filtering
        $searchDateRange = $request->get('search_date_range');
        $agentId = $request->get('agent_id');
        $filtered_data = collect($b_array);
    
        if ($searchDateRange) {
            $dates = explode(' - ', $searchDateRange);
            $startDate = Carbon::createFromFormat('Y-m-d', trim($dates[0]))->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', trim($dates[1]))->endOfDay();
            $filtered_data = $filtered_data->filter(function($item) use ($startDate, $endDate) {
                return Carbon::parse($item['created_at'])->between($startDate, $endDate);
            });
        }
    
        if ($agentId) {
            $filtered_data = $filtered_data->where('customer_id', $agentId);
        } elseif (session('prefix') != 'admin') {
            $filtered_data = $filtered_data->where('customer_id', Auth::user()->id);
        }
    
        $filtered_data = $filtered_data->values(); // Reindex the array after filtering
    
        // DataTables return
        if ($request->ajax()) {
            return DataTables::of($filtered_data)
                ->addColumn('action', function($row) {
                    $href = route(session('prefix', 'agent') . '.view_single_attraction', ['id' => $row['booking_id']]);
                    return '<a href="' . $href . '">
                                <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                            </a>';
                })
                ->addColumn('date2', function($row) {
                    // Format date column
                    $formattedDate = Carbon::parse($row['created_at'])->format('d-m-Y');
                    return $formattedDate;
                })
                ->addColumn('agent_name', function($row) {
                    // Only add the agent_name column if the user is an admin
                    if (session('prefix') == 'admin') {
                        return $row['agent_name'];
                    }
                    return null;
                })
                ->rawColumns(['action','date2'])
                ->make(true);
        }
    }
    
}
