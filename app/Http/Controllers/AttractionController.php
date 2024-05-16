<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\AttractionTicket;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AttractionController extends Controller
{  
    public function index(){

        // $attraction_data= Attraction::all();
        $attraction_data = array();
        return view('attraction.allattraction',compact('attraction_data'));
    }

    public function getAttractions(Request $request)
    {
        if ($request->ajax()) {
            $attraction_data = Attraction::all();
            return DataTables::of($attraction_data)
                ->addColumn('image', function($row){
                    $img = asset('assets/img/').'/'.$row->image;
                    if($row->attraction_id){
                        $img = env('API_IMAGE_URL').''.$row->image;
                    }
                    return '<img  height="100" width="100" src="'.$img.'" alt="Card image cap">';
                })
                ->addColumn('markup', function($row){
                    $Amount = ($row->markup_type==1)? "selected" : "";
                    $Percentage = ($row->markup_type==2)? "selected" : "";
                    return '<div class="input-group deposit d-grid">
                          <input type="hidden" name="attraction_id" class="attraction_id" value="'.$row->id.'">                      
                          
                          <select class="form-select attraction_mark_up_type w-100" id="attraction_mark_up_type"> 
                              <option value="1" '.$Amount.'>Amount</option>
                              <option value="2" '.$Percentage.'>Percentage</option>
                          </select>
                          <input type="number" class="form-control attraction_mark_up w-100 mt-2" name="attraction_mark_up" id="attraction_mark_up" value="'.$row->markup_value.'" aria-describedby="inputGroupPrepend9">
                          <p class="mark_up_error"></p>
                      </div>';
                })
                ->addColumn('action', function($row){
                    $href = route(session('prefix', 'agent') .'.view_single_attraction', ['id' => $row->id]);
                    return '<a href="' . $href . '">
                                <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                            </a>';
                })
                ->rawColumns(['image','markup', 'action'])
                ->make(true);
        }
    }
    

    public function view_attraction(Request $request)
    {
        $query = Attraction::query();

        if ($request->has('country_code')) {
            $countryCode = $request->input('country_code');
            $query->where('country', $request->input('country_code'));
        }else{ 
            if(isset(Auth::user()->country) && !empty(Auth::user()->country)){
                $countryCode = Auth::user()->country;
                $query->where('country', Auth::user()->country);
            }
        }

        // Filter by attraction name if provided
        if ($request->has('keyword')) {
            $query->where('name', 'like', '%' . $request->input('keyword') . '%');
        }
        $attractionsForCity = $query->get();
        $citiesPage = [];
        foreach ($attractionsForCity as $key => $value) {
            $fields = json_decode($value->fields);
            if (isset($fields->city)) {
                $citiesPage[] = $fields->city;
            }
        }
        $citiesPage = array_unique($citiesPage);
       // first we use json_contain but its not work on live 
        if ($request->has('city')) {
            $cities = explode(',', $request->input('city'));
            $query->where(function($query) use ($cities) {
                foreach ($cities as $city) {
                    $cityWithoutQuotes = trim($city, '"');
                    $query->orWhereRaw("fields LIKE ?", ['%"city":"'.$cityWithoutQuotes.'"%']);
                }
            });
        }
        

        $attractions = $query->paginate(9);
        $keyword = $request->input('keyword');

        return view('attraction.Viewallattraction', compact('attractions','countryCode','keyword','citiesPage'));
    }


    public function add_attraction(){
        return view('attraction.addattraction');
    }
    public function view_single_attraction($id){

      $all_data= $this->get_attraction_single_data($id);
    //   echo"<pre>";
    //   print_r ($all_data); die;
        $attraction_single=Attraction::with('attraction_ticket')->find($id);
        
        // echo "<pre>";
        // print_r(json_decode($attraction_single->fields)); die;
        // dd( $all_data);
        // $aa=json_decode($attraction_single->attraction_ticket->attraction_options);
        // foreach($aa->data as $key=>$sin){
        //  echo $sin->name;
        // }
        // die;
        $top_three_attractions = Attraction::latest()->take(3)->get();

        if(session('prefix')=='admin'){
           return view('attraction.viewattraction',compact('attraction_single','all_data'));
        }else{
           return view('attraction.singleatt',compact('attraction_single','top_three_attractions','all_data'));
        }
        
    }

     function get_attraction_single_data($id){
        $attraction_single=Attraction::find($id)->toArray();
        $attraction_single2=Attraction::with('attraction_ticket')->find($id)->toArray();
        $main_attraction_ticket=$attraction_single2['attraction_ticket'];
        if(!empty($main_attraction_ticket)){
            $attraction_option=json_decode($attraction_single2['attraction_ticket']['display_final_netprice'],true);
            $attraction_tickets=json_decode($attraction_single2['attraction_ticket']['attraction_tickets'],true);
        }else{
            $attraction_option=[];
            $attraction_tickets=[];
        }
    //    dd($attraction_option);

        return [
            "attraction_single" => $attraction_single,
            "main_attraction_ticket" => $main_attraction_ticket,
            "attraction_option" => $attraction_option ?? [],
            "attraction_tickets"=> $attraction_tickets
        ];

    }

    public function addcart_attraction(Request $request){

    // dd($request->all());
    // $attraction_single2=Attraction::with('attraction_ticket')->find(6)->toArray();
    // // dd($attraction_single2->attraction_ticket);
    // echo"<pre>";
    // // print_r($attraction_single2); 
    // print_r(json_decode($attraction_single2['attraction_ticket']['display_final_netprice'])); 
    // die;
    $attraction_ID=$request->attraction_ID;
    $attrInfo = Attraction::find($attraction_ID);
    if($attrInfo){
        $attractionDetailsArray =  array(
            'attractionID'=> $attrInfo->attraction_id ?? NULL,
            'name'=> $attrInfo->name,
            'img'=> $attrInfo->image,
        );
    }
    $ticket_ID=$request->ticket_ID;
    $option_ID=(int)$request->option_ID;
// dd($option_ID);
    $attrwith_ticketinfo=$attraction_single2=Attraction::with('attraction_ticket')->find($attraction_ID);
    if($attrwith_ticketinfo){
        $attraction_option=json_decode($attraction_single2['attraction_ticket']['display_final_netprice'],true);
        // dd($attraction_option['data']);
        $desiredItem = array_filter($attraction_option['data'], function ($item) use ($option_ID) {
            return (int)$item['id'] === $option_ID;
        });
       
        $resetdesiredItem=reset($desiredItem);
        // dd($resetdesiredItem);
        $optionDetailsArray=array(
            "option_name"=> $resetdesiredItem['name'] ?? 'NA',
            "description"=> $resetdesiredItem['description'] ?? 'NA',

        );
    }

   
    $agent_price=$request->agent_price;
    $quantity=$request->quantity;
    $ticketValidity=$request->ticketValidity;
    $duration=$request->duration;

    
   
    $inputArray = [
        "attraction_ID" => $attraction_ID,
        "ticket_ID" => $ticket_ID,
        "option_ID" => $option_ID,
        "agent_price" => $agent_price,
        "quantity" => $quantity,
        'ticketValidity'=>$ticketValidity,
        'duration'=>$duration
    ];
    
    $formatted_data = [];
    $ticket_data = [];
    
    // Loop through ticket_ID and agent_price once
    foreach ($inputArray["ticket_ID"] as $j => $ticket_id) {
        // Check if quantity is greater than 0
       
        $attraction_option=json_decode($attraction_single2['attraction_ticket']['display_final_netprice'],true);
        $desiredItem = array_filter($attraction_option['data'], function ($item) use ($option_ID) {
            return (int)$item['id'] === $option_ID;
        });
       
        $resetdesiredItem=reset($desiredItem);
       
        // dd($resetdesiredItem['ticketType']);
        $desiredataforticket=array_filter($resetdesiredItem['ticketType'], function($item2) use ($ticket_id){
            return (int)$item2['id'] == $ticket_id;
        });
        $arrtt= reset($desiredataforticket);
        // dd ($arrtt);
        $ticketdetails_array=array(
            "ticket_name"=> $arrtt['name'] ?? 'NA',
            "sku"=> $arrtt['sku'] ?? 'NA',

        );
        if ($inputArray["quantity"][$j] > 0) {

            $ticket_data[] = [
                "ticket_id" => $ticket_id,
                "count" => $inputArray["quantity"][$j],  
                "agent_price" => $inputArray["agent_price"][$j],
                "ticketdetails_array" => $ticketdetails_array
            ];
        }
    }
    
    $newOption = [
        "option_id" => $inputArray["option_ID"],
        "ticketValidity" => $inputArray["ticketValidity"],
        "duration" => $inputArray["duration"],
        "optionDetailsArray"=> $optionDetailsArray,
        "tickets" => $ticket_data
    ];
    
    $formatted_data[] = [
        "attraction_id" => $inputArray["attraction_ID"],
        "attractionDetails" => $attractionDetailsArray,
        "options" => [$newOption]
    ];
    
    $check_cart_data = Cart::where('user_id', Auth::user()->id)->first();
    if (!empty($check_cart_data)) {
        // Cart data exists for the user
        $cartData = json_decode($check_cart_data->more_info, true);
    
        // Check if the attraction already exists in the cart
        $attractionIndex = -1;
        foreach ($cartData as $i => $cartItem) {
            if ($cartItem['attraction_id'] == $inputArray['attraction_ID']) {
                $attractionIndex = $i;
                break;
            }
        }
    
        // if ($attractionIndex != -1) {
        //     // Attraction exists, check if the option exists
        //     $optionIndex = -1;
        //     foreach ($cartData[$attractionIndex]['options'] as $i => $option) {
        //         if ($option['option_id'] == $inputArray['option_ID']) {
        //             $optionIndex = $i;
        //             break;
        //         }
        //     }
        //     if ($optionIndex != -1) {
        //         // Option exists, append ticket data
        //         $cartData[$attractionIndex]['options'][$optionIndex]['tickets'] = array_merge($cartData[$attractionIndex]['options'][$optionIndex]['tickets'], $ticket_data);
        //     } else {
        //         // Option does not exist, add new option
        //         $cartData[$attractionIndex]['options'][] = $newOption;
        //     }
        // } else {
        //     // Attraction does not exist, add new entry
        //     $cartData[] = $formatted_data[0];
        // }
 
        //SPECIAL TICKET DATA 
        if ($attractionIndex != -1) {
            // Attraction exists, check if the option exists
            $optionIndex = -1;
            foreach ($cartData[$attractionIndex]['options'] as $i => $option) {
                if ($option['option_id'] == $inputArray['option_ID']) {
                    $optionIndex = $i;
                    break;
                }
            }
            if ($optionIndex != -1) {
                // Option exists, check if the ticket exists
                foreach ($ticket_data as $newTicket) {
                    $ticketExists = false;
                    foreach ($cartData[$attractionIndex]['options'][$optionIndex]['tickets'] as $existingTicket) {
                        if ($existingTicket['ticket_id'] == $newTicket['ticket_id']) {
                            // Ticket exists, update its count and price
                            $existingTicket['count'] += $newTicket['count'];
                            $existingTicket['agent_price'] = $newTicket['agent_price'];
                            $ticketExists = true;
                            break;
                        }
                    }
                    if (!$ticketExists) {
                        // Ticket does not exist, append it to the option
                        $cartData[$attractionIndex]['options'][$optionIndex]['tickets'][] = $newTicket;
                    }
                }
            } else {
                // Option does not exist, add new option
                $cartData[$attractionIndex]['options'][] = $newOption;
            }
        } else {
            // Attraction does not exist, add new entry
            $cartData[] = $formatted_data[0];
        }
        
        //SPECIAL TICKET DATA
        // echo"<pre>";
        // print_r($cartData); die;
        $check_cart_data->more_info = json_encode($cartData);
        $check_cart_data->save();
    
        $responseData = [
            'status' => true,
            'message' => 'Cart Updated successfully!'
        ];
        return response()->json($responseData, 200);
    } else {
        // Cart data does not exist for the user, create a new entry
        $new_cart_data = new Cart();
        $new_cart_data->user_id = Auth::user()->id; 
        $new_cart_data->attraction_id = 2;
        $new_cart_data->options = 2; 
        $new_cart_data->sub_total = 222;
        $new_cart_data->more_info = json_encode($formatted_data); // Assuming $formatted_data contains the new cart info
        $new_cart_data->save();
    
        $responseData = [
            'status' => true,
            'message' => 'Cart Added successfully!'
        ];
        return response()->json($responseData, 200);
    }
    

                // echo "<pre>";
                // print_r($formatted_data);



    }

    public function getAttractions_autosearch(Request $request){
         // Fetch attraction suggestions based on keyword and country ID
         $keyword = $request->input('keyword');
         $countryCode = $request->input('countryCode');
 
         // Example query to fetch attraction suggestions (replace with your logic)
         $attractions = Attraction::where('country', $countryCode)
                                   ->where('name', 'like', '%'.$keyword.'%')
                                   ->limit(10) // Limit to 10 suggestions
                                   ->get();
 
         return response()->json($attractions);
    }




}