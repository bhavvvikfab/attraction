@include('layouts.header');
@include('layouts.sidebar');


<style>
    @media only screen and (min-width: 1025px) {
      .sidebar {
        display: none;
      }
}

/* Hide certain columns on mobile screens */
/* @media screen and (max-width: 768px) {
    
    .sku,
    .minimum-selling-price {
        display: none;
    }
} */

/* Prevent horizontal scrolling on mobile screens */
/* @media screen and (max-width: 768px) {
    body {
        overflow-x: hidden;
    }
    .select-ticket-table-wrapper {
        overflow-x: auto;
    }
} */

  @media only screen and (max-width: 765px) {
          table.select-ticket-table.table.font-weight-normal tr th {
            display: none;
          }

          .d-flex-sm-column {
              flex-direction: column;
          }

          table.select-ticket-table.table.font-weight-normal tr td {
            display: block;
            width: 100% !important;
          }

          table.select-ticket-table.table.font-weight-normal tr td::before {
            content: attr(data-cell) " ";
            font-weight: 800;
            text-transform: capitalize;
          }
          .x1,.x2{
            display:none !important;
          }
        }

</style>
  <main id="main1" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-10 col-lg-10 col-md-10 col-sm-12">
        <h1>Attraction</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Attraction</li>
          </ol>
        </nav>
      </div>
      <div class="col-xxl-2 col-lg-2 col-md-2 col-sm-12 d-flex justify-content-md-end">
          <!-- <a href="index.php"> <h5 class="text-back">Back</h5></a> -->
      </div>
    </div>
    </div>

    <section id="singleatt">
    <?php $field_data= json_decode($attraction_single->fields) ?>
      <div class="row">
        <div class="col-lg-12 bg-white">
          <div class="product-detail-header container-fluid bg-white py-4 px-0">
          <div class="row w-100">
            <div class="product-image-container col-md-4 d-flex flex-column">
              @if($attraction_single->attraction_id)
              <div class="image-wrapper signlesttrimg mb-3" style="background:url('{{ env('API_IMAGE_URL') }}{{ $attraction_single->image }}') center/cover;">
              </div>
              @else
              <div class="image-wrapper signlesttrimg mb-3" style="background:url('{{ asset('assets/img/' . (!empty($attraction_single->image) ? $attraction_single->image : 'default.jpg')) }}') center/cover;">
              </div>
              @endif
             
              <div class="image-controls-wrapper d-flex justify-content-around align-items-center">
                <!-- <div class="icon-wrapper d-flex justify-content-between align-items-center pr-4 flex-lg-row flex-sm-column">
                  <span class="card-icons pr-1">
                    <i class="bi bi-camera-fill"></i>
                  </span>
                  <span class="card-icon-label">
                    More Images 
                  </span>
                </div> -->
                @if($attraction_single->attraction_id)
                <a href="{{ env('API_IMAGE_URL') }}{{ $attraction_single->image }}" download>
                @else
                <a href="{{ asset('assets/img/' . (!empty($attraction_single->image) ? $attraction_single->image : 'default.jpg')) }}" download>
                @endif
                    <div class="icon-wrapper d-flex justify-content-between align-items-center flex-lg-row flex-sm-column">
                  <span class="card-icons pr-1">
                    <i class="bi bi-download"></i>
                  </span>
                  <span class="card-icon-label">
                    Download
                  </span>
                </div>
                </a>
              </div>
            </div>
            <div class="container col-md-8" id="parentDiv">
              <div class="margin-pages d-flex flex-column">
                <div id="attractions" class="font-style-primary custom-border-bottom pb-3 mb-4 pt-3 px-3 pt-md-0 px-md-0 border-bottom" >
                  <div class="row attraction">
                    <div class="col-md-9">
                      <div class="attraction-note d-flex align-items-center mb-2 font-style-primary detail-standard text-detail">
                        <h6 class="mb-0">Attraction</h6>
                        <span class="label-tag ms-2">{{isset($attraction_single->attraction_id) ? $attraction_single->attraction_id : 'NA';}}</span>
                      </div>
                      <h3 class="attraction-title">{{$attraction_single->name}}</h3>
                    </div>
                    <div class="col-md-3 pl-0 justify-content-end d-flex align-items-end">

                      <button class="btn btnmoreinfo btn-prime" id="moreinfo_btn">
                        <a href="#pills-info-tab">More Information</a>
                      </button>
                    </div>
                  </div>
                </div>

                <div class="mt-2" id="highlights">
                  <div class="row">
                    <div class="highlights font-style-primary col-12">
                      <div class="highlights-wrapper px-md-0 px-3 h-100">
                        <h4 class="highlights-title">Highlights</h4>
                        <div class="highlights-text detail-standard ">
                          <div class="col-12">
                            <ul class="details_point"> 
                              @if(isset($field_data->highlights) && !empty(json_decode($field_data->highlights)))
                              @foreach(json_decode($field_data->highlights) as $single_highlight)
                              <li>{{$single_highlight}}</li>
                              @endforeach
                              @else
                              <li>Highlights are not available as of the moment. Please try again later.</li>
                              @endif
                              <!-- <li>all the generators on the Internet tend to repeat predefined chunks as necessary,</li>
                              <li>all the generators on the Internet tend to repeat predefined chunks as necessary,</li>
                              <li>all the generators on the Internet tend to repeat predefined chunks as necessary,</li> -->
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">

                      <div class="info-wrapper mt-4 px-md-0 px-3 col-lg-12">
                        <div class="row">
                          <div class="col-lg-7">
                            <div class="location-wrapper">
                              <div class="country-address ps-3">
                                <!-- <span> Dargling, </span>
                                <span>Singapore, </span>
                                <span>Singapore</span> -->
                                {{$field_data->city}}
                              </div>
                            </div>
                          </div>
                          <!-- <div class="col-lg-5 pe-0">
                            <div class="related-attr-wrapper text-end">
                              <h6 class="mb-0">
                              <a href="">See other related attractions > </a> </h6>
                            </div>
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


        </div>
      </div>
    </div>
  </div>
        </div>


     <!-- -----------------------------------------Tabs................... -->
     <div class="custom-tabset">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active bg-white" id="pills-ticket-tab" data-bs-toggle="pill" data-bs-target="#pills-ticket" type="button" role="tab" aria-controls="pills-ticket" aria-selected="true">Ticket</button>
              </li>
              <!-- <li class="nav-item" role="presentation">
                <button class="nav-link bg-white" id="pills-package-tab" data-bs-toggle="pill" data-bs-target="#pills-package" type="button" role="tab" aria-controls="pills-package" aria-selected="false">Packages/Tansportation</button>
              </li> -->
              <li class="nav-item" role="presentation">
                <button class="nav-link bg-white" id="pills-relatt-tab" data-bs-toggle="pill" data-bs-target="#pills-relatt" type="button" role="tab" aria-controls="pills-relatt" aria-selected="false">Related Attraction</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link bg-white" id="pills-info-tab" data-bs-toggle="pill" data-bs-target="#pills-info" type="button" role="tab" aria-controls="pills-info" aria-selected="false">More Info</button>
              </li>
          </ul>
</div>

          <div class="tab-content selectticket" id="pills-tabContent">
               <div class="tab-pane fade show active" id="pills-ticket" role="tabpanel" aria-labelledby="pills-ticket-tab">

                <div class="pt-lg-4 pt-3 px-lg-4 px-3">

                    <!-- <div class="availability-button-container mb-4">
                      <div class="check-avail-date">
                        
                        <button class="btn btn-blue" type="button">
                          <span>
                            Check Availability
                          </span>
                        </button>
                      </div>
                      <div class="check-avail-clear">
                        <button class="btn btn-outline-blue mx-3">
                          Clear All
                        </button>
                      </div>
                    </div> -->

                    <div>
                      <h4 class="font-weight-bold mb-2">Select Ticket Type Option</h4>
                      <span>Click on <i class="bi bi-star search-fav-icon"></i> to favourite your ticket types</span>
                    </div>
                    <div class="1stticket">
<div class="pt-4">
  <div id="selectticket">
    <div class="pb-1">

     <div>
      
      @if(!empty($all_data['attraction_option']['data']))
      @foreach($all_data['attraction_option']['data'] as $key=>$single_data)
          <div class="mb-4 myticket">
          <input type="hidden" name="attraction_ID" class="attraction_ID"value="{{$attraction_single->id}}">
            <div class="selectticket-card card text-dark mb-2">
              <div class="selectticket-infor col-md-12 px-2 py-1">
                <div class="row align-items-center h-100 p-2">
                  <div class="col-lg col-md d-flex align-items-center justify-content-center">
                    <div class="row w-100">
                      <div class="col-sm col">
                        <h5 class="ticket-card-header">
                          <!-- Ticket testing replicate -->
                          {{$single_data['name'];}}
                        </h5>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 mb-md-2 mb-sm-0 pt-2 pl-0 pr-2 mx-md-0 favorite-id-container d-flex align-items-center justify-content-around">
                    <div class="option-id-wrapper mr-3">
                      <span class="ticket-card-header">
                        Product Option ID : {{$single_data['id'];}}
                        <input type="hidden" name="option_ID[]" class="option_ID" value=" {{$single_data['id'];}}" >
                        <input type="hidden" name="ticketValidity[]" class="ticketValidity" value=" {{$single_data['ticketValidity'];}}" >
                        <input type="hidden" name="duration[]" class="duration" value=" {{$single_data['definedDuration'];}}" >
                      </span>
                    </div>
                    <div class="favorite-wrapper">
                      <span class="favorite-icon pr-2 active-favorite search-fav-icon" >
                        <i class="bi bi-star-fill" style="font-size: 22px; color:gold;"></i>

                      </span>
                    </div>
                  </div>

                </div>
              </div>

              <div class="selectticket-quantity table-responsive border-top bg-white">
                <div>
                <div class="select-ticket-table-wrapper">
                  <table class="select-ticket-table table font-weight-normal m-10">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">
                          <span >Ticket Type ID:</span>
                        </th>
                        <th scope="col" class="sku">
                          <span >SKU:</span>
                        </th>
                        <th scope="col">
                          <span >Original Merchant Price:</span>
                        </th>
                        <th scope="col" class="minimum-selling-price"><span >Minimum Selling Price:</span></th>

                        <th scope="col">
                          <span >Nett Price:</span>
                        </th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody >
                      @foreach($single_data['ticketType'] as $single_ticket)
                      <tr>

                        <td width="15%">
                          <div class="name-info-wrapper">
                            <h5 class="variation-title font-style-primary">
                              <span class="font-weight-bold">{{ $single_ticket['name'] ? $single_ticket['name'] : 'NA' }}</span>
                            </h5>

                          </div>
                        </td>
                        <td data-cell="Ticket Type ID:">
                          <div class="variation-price d-inline">
                            <span>
                            {{ $single_ticket['id'] ? $single_ticket['id'] : 'NA' }}
                            <input type="hidden" name="ticket_ID[]" class="ticket_ID" value=" {{$single_ticket['id'];}}" >
                            </span>
                          </div>
                        </td>
                        <td class="sku" data-cell="SKU:">
                          <div class="variation-price d-inline">
                            <span>
                            {{ $single_ticket['sku'] ? $single_ticket['sku'] : 'NA' }}
                            </span>
                          </div>
                        </td>
                        <td data-cell="Original Merchant Price:">
                          <div class="variation-price d-inline">
                            <span >
                              SGD 13
                            </span>
                          </div>
                        </td>
                        <td class="minimum-selling-price" data-cell="Minimum Selling Price:">
                          <div class="variation-price d-inline ">
                            <span >
                              SGD 12.00
                            </span>

                          </div>
                        </td>

                        <td data-cell="Nett Price:">
                          <div>
                            <h5 class="variation-title font-style-primary p-0">
                              <span class="font-weight-bold">
                                SGD {{ $single_ticket['agent_price'] ? $single_ticket['agent_price'] : 'NA' }}
                                <input type="hidden" name="agent_price[]" class="agent_price" value="{{ $single_ticket['agent_price'] ? $single_ticket['agent_price'] : 'NA' }}">
                              </span>
                            </h5>
                          </div>
                        </td>

                        <td class="td-text-cart">
                        <div class="qty-container">
                          <button class="qty-btn-minus btn-light" data-id="option{{$key}}" type="button"><i class="bi bi-dash-lg"></i></button>
                          <input type="text" name="qty" value="0" class="input-qty"/>
                          <button class="qty-btn-plus btn-light" data-id="option{{$key}}" type="button"><i class="bi bi-plus-lg"></i></button>
                        </div>
                      </td>

                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                  </div>




                </div>
              </div>



              <div class="selectticket-btn font-weight-bold collapse-button row m-0 font-style-primary">
                <div aria-expanded="false" class="col-sm-3 col pr-1 d-flex align-items-center collapsed ticket-toggle x1" data-toggle="collapse" data-target="#collapseInfor-{{$single_data['id'];}}" aria-controls="#collapseInfor-{{$single_data['id'];}}">
                <i   class="bi bi-chevron-down hide-icon"></i>
                  <i   class="bi bi-chevron-up show-icon" style="display:none;"></i> &nbsp;
                  <p   class="show-text">Show Ticket Information</p>
                  <p   class="hide-text" style="display:none;">Hide Ticket Information</p>
                </div>

                <div class="col-md-9 col-sm-12 col py-2 text-md-right text-sm-center row justify-content-end none">
                  <div class="row w-100">
                    <div class="col-md d-flex align-items-center justify-content-md-end mb-md-0 mb-3 x2">
                      <div class="icon-wrapper d-flex justify-content-between align-items-center pr-4">
                        <span class="calendar card-icons pr-1">
                          <i class="bi bi-calendar3"></i>
                        </span>
                        <span class="card-icon-label">
                          Valid from 12 Sept 2022 to 31 Mar 2023
                        </span>
                      </div>

                      <div class="icon-wrapper d-flex justify-content-between align-items-center px-lg-4" >
                        <span class="lightning card-icons pr-1">
                          <i class="bi bi-lightning-fill"></i>
                        </span>
                        <span class="card-icon-label">
                          Instant
                        </span>
                      </div><!---->
                      <div class="icon-wrapper d-flex justify-content-between align-items-center pr-4" >
                        <span class="calendar card-icons pr-1">
                          <i class="bi bi-calendar3"></i>
                        </span>
                        <span class="card-icon-label">
                           Dated
                        </span>
                      </div>

                    </div>
                   <div class="add-cart-btn col-12 col-lg-2 p-0 text-right">
                      <!-- <a href="cart.php" role="button"> -->
                          <button class="btn btn-success btn-add disabled" id="option{{$key}}" type="button">
                            <span class="font-14"><i class="mdi mdi-cart-outline"></i></span>
                            <span class="font-14">&nbsp;Add to Cart</span>
                          </button>
                        <!-- </a> -->
                    </div>
                  </div>
                </div>
              </div>


              <div class="selectticket-detail pb-4  collapse bg-white font-style-primary px-4" id="collapseInfor-{{$single_data['id'];}}">
                <div class="row">
                  <div class="col-12">
                    <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Description / Important Notes</h5>
                    <div class="mb-4 ml-3"><p>{{$single_data['description'];}}</p></div>
                    <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Validity</h5>
                    <p class="ml-3">Valid from 12 Sept 2022 to 31 Mar 2023</p>
                    <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Cancellation Policy</h5>
                        <ul>
                          @if($single_data['cancellationNotes'])
                          @foreach($single_data['cancellationNotes'] as $single_cancelnotes)
                            <li>
                              <strong>{{$single_cancelnotes}}</strong>
                            </li>
                            @endforeach

                            @else
                            <li>
                              <strong>Non-refundable and No Cancellation</strong>
                            </li>
                            @endif
                          </ul>
                        <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Terms &amp; Conditions</h5>
                        <div class="mb-4 ml-3"><p>{{$single_data['termsAndConditions'];}}</p></div>

                  </div>
                </div>
              </div>

            </div>
           </div>
           @endforeach
           @else
           <div class=""><h3>No Ticket Available</h3></div>
           @endif
        <!---->
          <!-- mobview startcode  -->
          

          <!-- mobview endcode  -->
        <!---->
        

    </div>
  </div>
</div>

</div>
                  </div>

                  <!-- <div class="row ">
                    <div class="col-lg-12">

                      <div class="card">

                         <div class="card-header">
                           <div class="row">
                              <div class="col-lg-8">
                                  <h5 class="card-title text-start">Invoice</h5>
                              </div>

                            </div>
                          </div>
                      </div>
                    </div>
                  </div> -->

</div>

               </div>

              <div class="tab-pane fade" id="pills-package" role="tabpanel" aria-labelledby="pills-package-tab">

<div class="pt-lg-4 pt-3 px-lg-4 px-3">

    <div class="availability-button-container mb-4">
      <div class="check-avail-date">
        <!-- <input class="check-avail-input" name="dp" placeholder="yyyy-mm-dd" > -->
        <button class="btn btn-blue" type="button">
          <span>
            Check Availability
          </span>
        </button>
      </div>
      <div class="check-avail-clear">
        <button class="btn btn-outline-blue mx-3">
          Clear All
        </button>
      </div>
    </div>

    <div>
      <h4 class="font-weight-bold mb-2">Select Ticket Type Option</h4>
      <span>Click on <i class="bi bi-star search-fav-icon"></i> to favourite your ticket types</span>
    </div>
    <div class="1stticket">
<div class="pt-4">
<div id="selectticket">
<div class="pb-1">

<div>
<div class="mb-4 myticket">
<div class="selectticket-card card text-dark mb-2">
<div class="selectticket-infor col-md-12 px-2 py-1">
<div class="row align-items-center h-100 p-2">
  <div class="col-lg col-md d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <div class="col-sm col">
        <h5 class="ticket-card-header">
          Ticket testing replicate
        </h5>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 mb-md-2 mb-sm-0 pt-2 pl-0 pr-2 mx-md-0 favorite-id-container d-flex align-items-center justify-content-around">
    <div class="option-id-wrapper mr-3">
      <span class="ticket-card-header">
        Product Option ID : 7775
      </span>
    </div>
    <div class="favorite-wrapper">
      <span class="favorite-icon pr-2 active-favorite search-fav-icon">
        <i class="bi bi-star-fill" style="font-size: 22px; color:gold;"></i>

      </span>
    </div>
  </div>

</div>
</div>

<div class="selectticket-quantity table-responsive border-top bg-white">
<div>
  <table class="select-ticket-table table font-weight-normal m-10">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">
          <span>Ticket Type ID:</span>
        </th>
        <th scope="col">
          <span>SKU:</span>
        </th>
        <th scope="col">
          <span>Original Merchant Price:</span>
        </th>
        <th scope="col"><span>Minimum Selling Price:</span></th>

        <th scope="col">
          <span>Nett Price:</span>
        </th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>

        <td width="15%">
          <div class="name-info-wrapper">
            <h5 class="variation-title font-style-primary">
              <span class="font-weight-bold">Adult</span>
            </h5>

          </div>
        </td>
        <td>
          <div class="variation-price d-inline">
            <span>
              11566
            </span>
          </div>
        </td>
        <td>
          <div class="variation-price d-inline">
            <span>
              01E7K0100603A
            </span>
          </div>
        </td>
        <td>
          <div class="variation-price d-inline">
            <span>
              SGD 13
            </span>
          </div>
        </td>
        <td>
          <div class="variation-price d-inline">
            <span>
              SGD 12.00
            </span>

          </div>
        </td>

        <td>
          <div>
            <h5 class="variation-title font-style-primary p-0">
              <span class="font-weight-bold">
                SGD 10.00
              </span>
            </h5>
          </div>
        </td>

        <td class="td-text-cart">
                        <div class="qty-container">
                          <button class="qty-btn-minus btn-light" type="button"><i class="bi bi-dash-lg"></i></button>
                          <input type="text" name="qty" value="0" class="input-qty"/>
                          <button class="qty-btn-plus btn-light" type="button"><i class="bi bi-plus-lg"></i></button>
                        </div>
                      </td>

      </tr>

    </tbody>
  </table>





</div>
</div>



<div class="selectticket-btn font-weight-bold collapse-button row m-0 font-style-primary">
<div aria-expanded="false" class="col-sm-3 col pr-1 d-flex align-items-center collapsed ticket-toggle" data-toggle="collapse" data-target="#collapseInfor-7775" aria-controls="#collapseInfor-7775">
<i class="bi bi-chevron-down hide-icon"></i>
  <i class="bi bi-chevron-up show-icon" style="display:none;"></i> &nbsp;
  <p class="show-text">Show Ticket Information</p>
  <p class="hide-text" style="display:none;">Hide Ticket Information</p>
</div>

<div class="col-md-9 col-sm-12 col py-2 text-md-right text-sm-center row justify-content-end none">
  <div class="row w-100">
    <div class="col-md d-flex align-items-center justify-content-md-end mb-md-0 mb-3">
      <div class="icon-wrapper d-flex justify-content-between align-items-center pr-4">
        <span class="calendar card-icons pr-1">
          <i class="bi bi-calendar3"></i>
        </span>
        <span class="card-icon-label">
          Valid for 30 days
        </span>
      </div>

      <div class="icon-wrapper d-flex justify-content-between align-items-center px-lg-4">
        <span class="lightning card-icons pr-1">
          <i class="bi bi-lightning-fill"></i>
        </span>
        <span class="card-icon-label">
          Instant
        </span>
      </div><!---->
      <div class="icon-wrapper d-flex justify-content-between align-items-center pr-4">
        <span class="calendar card-icons pr-1">
          <i class="bi bi-calendar3"></i>
        </span>
        <span class="card-icon-label">
           Dated
        </span>
      </div>

    </div>
    <div class="add-cart-btn col-12 col-lg-2 p-0 text-right">
       <a href="cart.php" role="button">
          <button class="btn btn-success btn-add" type="button">
            <span class="font-14"><i class="mdi mdi-cart-outline"></i></span>
            <span class="font-14">&nbsp;Add to Cart</span>
          </button>
        </a>

    </div>
  </div>
</div>
</div>


<div class="selectticket-detail pb-4  collapse bg-white font-style-primary px-4" id="collapseInfor-7775">
<div class="row">
  <div class="col-12">
    <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Description / Important Notes</h5>
    <div class="mb-4 ml-3"><p>abc</p></div>
    <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Validity</h5>
    <p class="ml-3"> Valid for 30 days</p>
    <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Cancellation Policy</h5>
        <ul>
            <li>
              <strong>Non-refundable and No Cancellation</strong></li>
          </ul>
        <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Terms &amp; Conditions</h5>
        <div class="mb-4 ml-3"><p>def</p></div>

  </div>
</div>
</div>

</div>
</div>
<!---->
<div class="mb-4 myticket">
<div class="selectticket-card card text-dark mb-2">
<div class="selectticket-infor col-md-12 px-2 py-1">
<div class="row align-items-center h-100 p-2">
  <div class="col-lg col-md d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <div class="col-sm col">
        <h5 class="font-weight-bold mb-0 text-break text-white font-style-primary">
          Ticket testing replicate
        </h5>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 mb-md-2 mb-sm-0 pt-2 pl-0 pr-2 mx-md-0 favorite-id-container d-flex align-items-center justify-content-around">
    <div class="option-id-wrapper mr-3">
      <span class="ticket-card-header">
        Product Option ID : 7775
      </span>
    </div>
    <div class="favorite-wrapper">
      <span class="favorite-icon pr-2 active-favorite search-fav-icon">
        <i class="bi bi-star-fill" style="font-size: 22px; color:gold;"></i>

      </span>
    </div>
  </div>


</div>
</div>

<div class="selectticket-quantity table-responsive border-top bg-white">
<div>
  <table class="select-ticket-table table font-weight-normal m-10">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">
          <span>Ticket Type ID:</span>
        </th>
        <th scope="col">
          <span>SKU:</span>
        </th>
        <th scope="col">
          <span>Original Merchant Price:</span>
        </th>
        <th scope="col"><span>Minimum Selling Price:</span></th>

        <th scope="col">
          <span>Nett Price:</span>
        </th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>

        <td width="20%">
          <div class="name-info-wrapper">
            <h5 class="variation-title font-style-primary">
              <span class="font-weight-bold">Adult</span>
            </h5>

          </div>
        </td>
        <td>
          <div class="variation-price d-inline">
            <span>
              11566
            </span>
          </div>
        </td>
        <td>
          <div class="variation-price d-inline">
            <span>
              01E7K0100603A
            </span>
          </div>
        </td>
        <td>
          <div class="variation-price d-inline">
            <span>
              SGD 13
            </span>
          </div>
        </td>
        <td>
          <div class="variation-price d-inline">
            <span>
              SGD 12.00
            </span>

          </div>
        </td>

        <td>
          <div>
            <h5 class="variation-title font-style-primary p-0">
              <span class="font-weight-bold">
                SGD 10.00
              </span>
            </h5>
          </div>
        </td>

        <td class="td-text-cart">
                        <div class="qty-container">
                          <button class="qty-btn-minus btn-light" type="button"><i class="bi bi-dash-lg"></i></button>
                          <input type="text" name="qty" value="0" class="input-qty"/>
                          <button class="qty-btn-plus btn-light" type="button"><i class="bi bi-plus-lg"></i></button>
                        </div>
                      </td>

      </tr>

    </tbody>
  </table>





</div>
</div>



<div class="selectticket-btn font-weight-bold collapse-button row m-0 font-style-primary">
<div aria-expanded="false" class="col-sm-3 col pr-1 d-flex align-items-center collapsed ticket-toggle" data-toggle="collapse" data-target="#collapseInfor-7776" aria-controls="#collapseInfor-7775">
<i class="bi bi-chevron-down hide-icon"></i>
  <i class="bi bi-chevron-up show-icon" style="display:none;"></i> &nbsp;
  <p class="show-text">Show Ticket Information</p>
  <p class="hide-text" style="display:none;">Hide Ticket Information</p>
</div>

<div class="col-md-9 col-sm-12 col py-2 text-md-right text-sm-center row justify-content-end none">
  <div class="row w-100">
    <div class="col-md d-flex align-items-center justify-content-md-end mb-md-0 mb-3">
      <div class="icon-wrapper d-flex justify-content-between align-items-center pr-4">
        <span class="calendar card-icons pr-1">
          <i class="bi bi-calendar3"></i>
        </span>
        <span class="card-icon-label">
        Valid for 30 days
        </span>
      </div>

      <div class="icon-wrapper d-flex justify-content-between align-items-center px-lg-4">
        <span class="lightning card-icons pr-1">
          <i class="bi bi-lightning-fill"></i>
        </span>
        <span class="card-icon-label">
          Instant
        </span>
      </div><!---->
      <div class="icon-wrapper d-flex justify-content-between align-items-center pr-4">
        <span class="calendar card-icons pr-1">
          <i class="bi bi-calendar3"></i>
        </span>
        <span class="card-icon-label">
           Dated
        </span>
      </div>

    </div>
    <div class="add-cart-btn col-12 col-lg-2 p-0 text-right">
 <a href="cart.php" role="button">
          <button class="btn btn-success btn-add" type="button">
            <span class="font-14"><i class="mdi mdi-cart-outline"></i></span>
            <span class="font-14">&nbsp;Add to Cart</span>
          </button>
        </a>

    </div>
  </div>
</div>
</div>


<div class="selectticket-detail pb-4  collapse bg-white font-style-primary px-4" id="collapseInfor-7776">
<div class="row">
  <div class="col-12">
    <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Description / Important Notes</h5>
    <div class="mb-4 ml-3"><p>abc</p></div>
    <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Validity</h5>
    <p class="ml-3"> Valid for 30 days</p>
    <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Cancellation Policy</h5>
        <ul>
            <li>
              <strong>Non-refundable and No Cancellation</strong></li>
          </ul>
        <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Terms &amp; Conditions</h5>
        <div class="mb-4 ml-3"><p>def</p></div>

  </div>
</div>
</div>

</div>
</div>
<!---->
<div class="mb-4 myticket">
<div class="selectticket-card card text-dark mb-2">
<div class="selectticket-infor col-md-12 px-2 py-1">
<div class="row align-items-center h-100 p-2">
  <div class="col-lg col-md d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <div class="col-sm col">
        <h5 class="ticket-card-header">
          Ticket testing replicate
        </h5>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 mb-md-2 mb-sm-0 pt-2 pl-0 pr-2 mx-lg-4 mx-md-0 favorite-id-container d-flex align-items-center justify-content-around">
    <div class="option-id-wrapper mr-3">
      <span class="ticket-card-header">
        Product Option ID : 7775
      </span>
    </div>
    <div class="favorite-wrapper">
      <span class="favorite-icon pr-2 active-favorite search-fav-icon">
        <i class="bi bi-star-fill" style="font-size: 22px; color:gold;"></i>

      </span>
    </div>
  </div>


</div>
</div>

<div class="selectticket-quantity table-responsive border-top bg-white">
<div>
  <table class="select-ticket-table table font-weight-normal m-10">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">
          <span>Ticket Type ID:</span>
        </th>
        <th scope="col">
          <span>SKU:</span>
        </th>
        <th scope="col">
          <span>Original Merchant Price:</span>
        </th>
        <th scope="col"><span>Minimum Selling Price:</span></th>

        <th scope="col">
          <span>Nett Price:</span>
        </th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>

        <td width="20%">
          <div class="name-info-wrapper">
            <h5 class="variation-title font-style-primary">
              <span class="font-weight-bold">Adult</span>
            </h5>

          </div>
        </td>
        <td>
          <div class="variation-price d-inline">
            <span>
              11566
            </span>
          </div>
        </td>
        <td>
          <div class="variation-price d-inline">
            <span>
              01E7K0100603A
            </span>
          </div>
        </td>
        <td>
          <div class="variation-price d-inline">
            <span>
              SGD 13
            </span>
          </div>
        </td>
        <td>
          <div class="variation-price d-inline">
            <span>
              SGD 12.00
            </span>

          </div>
        </td>

        <td>
          <div>
            <h5 class="variation-title font-style-primary p-0">
              <span class="font-weight-bold">
                SGD 10.00
              </span>
            </h5>
          </div>
        </td>

        <td class="td-text-cart">
                        <div class="qty-container">
                          <button class="qty-btn-minus btn-light" type="button"><i class="bi bi-dash-lg"></i></button>
                          <input type="text" name="qty" value="0" class="input-qty"/>
                          <button class="qty-btn-plus btn-light" type="button"><i class="bi bi-plus-lg"></i></button>
                        </div>
                      </td>

        <!-- <td class="input-field-td">
          <div class="d-flex">
          <button class="btn btn-primary"><i class="bi bi-plus-lg"></i></button>
            <button class="btn btn-cart-nu">0</button>
            <button class="btn btn-primary"><i class="bi bi-dash-lg"></i></button>
            </div>
        </td> -->

      </tr>

    </tbody>
  </table>

</div>
</div>



<div class="selectticket-btn font-weight-bold collapse-button row m-0 font-style-primary">
<div aria-expanded="false" class="col-sm-3 col pr-1 d-flex align-items-center collapsed ticket-toggle" data-toggle="collapse" data-target="#collapseInfor-7777" aria-controls="#collapseInfor-7775">
<i class="bi bi-chevron-down hide-icon"></i>
  <i class="bi bi-chevron-up show-icon" style="display:none;"></i> &nbsp;
  <p class="show-text">Show Ticket Information</p>
  <p class="hide-text" style="display:none;">Hide Ticket Information</p>
</div>

<div class="col-md-9 col-sm-12 col py-2 text-md-right text-sm-center row justify-content-end none">
  <div class="row w-100">
    <div class="col-md d-flex align-items-center justify-content-md-end mb-md-0 mb-3">
      <div class="icon-wrapper d-flex justify-content-between align-items-center pr-4">
        <span class="calendar card-icons pr-1">
          <i class="bi bi-calendar3"></i>
        </span>
        <span class="card-icon-label">
        Valid for 30 days
        </span>
      </div>

      <div class="icon-wrapper d-flex justify-content-between align-items-center px-lg-4">
        <span class="lightning card-icons pr-1">
          <i class="bi bi-lightning-fill"></i>
        </span>
        <span class="card-icon-label">
          Instant
        </span>
      </div><!---->
      <div class="icon-wrapper d-flex justify-content-between align-items-center pr-4">
        <span class="calendar card-icons pr-1">
          <i class="bi bi-calendar3"></i>
        </span>
        <span class="card-icon-label">
           Dated
        </span>
      </div>

    </div>
   <div class="add-cart-btn col-12 col-lg-2 p-0 text-right">
        <a href="cart.php" role="button">
          <button class="btn btn-success btn-add" type="button">
            <span class="font-14"><i class="mdi mdi-cart-outline"></i></span>
            <span class="font-14">&nbsp;Add to Cart</span>
          </button>
        </a>

    </div>
  </div>
</div>
</div>


<div class="selectticket-detail pb-4  collapse bg-white font-style-primary px-4" id="collapseInfor-7777">
<div class="row">
  <div class="col-12">
    <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Description / Important Notes</h5>
    <div class="mb-4 ml-3"><p>abc</p></div>
    <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Validity</h5>
    <p class="ml-3"> Valid for 30 days</p>
    <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Cancellation Policy</h5>
        <ul>
            <li>
              <strong>Non-refundable and No Cancellation</strong></li>
          </ul>
        <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Terms &amp; Conditions</h5>
        <div class="mb-4 ml-3"><p>def</p></div>

  </div>
</div>
</div>

</div>
</div>

</div>
</div>
</div>

</div>
  </div>

  <!-- <div class="row ">
    <div class="col-lg-12">

      <div class="card">

         <div class="card-header">
           <div class="row">
              <div class="col-lg-8">
                  <h5 class="card-title text-start">Invoice</h5>
              </div>

            </div>
          </div>
      </div>
    </div>
  </div> -->

</div>

</div>
              </div>

 <div class="tab-pane fade" id="pills-relatt" role="tabpanel" aria-labelledby="pills-relatt-tab">
    <div class="pt-lg-4 pt-3 pb-3 px-lg-4 px-3 bg-white">
      <div class="row">
         <!-- <div class="col-lg-4">

<div class="bg-white attr grow px-2">
  <a href="singleattraction.php">
  <div class="card">
    <img class="card-img-top" src="assets/img/tourist-places-in-shillong.jpg" alt="Card image cap">
        <div class="card-body">
                              <div class="row">
                                <div class="col-lg-10">
                                  <h5 class="search-title-card">Attraction</h5>
                                </div>
                                <div class="col-lg-2">
                                  <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                </div>
                              </div>
                                <p class="card-text">Dargling, North East, India</p>
                                <p><i class="bi bi-calendar3 aticon1" ></i> Open Date  <i class="bi bi-lightning-fill aticon2"></i> Instant</p>

                             </div>
  </div>
</a>
</div>
</div> -->

<?php foreach($top_three_attractions as $single){
  $field=json_decode($single->fields);
  ?>
<div class="col-lg-4">

<div class="bg-white attr grow px-2">
  <a href="{{ route(session('prefix', 'agent') . '.view_single_attraction' ,['id'=>$single->id]) }}">
  <div class="card">
  @if($single->attraction_id)
              
              <img class="card-img-top" src="{{ env('API_IMAGE_URL') }}{{ $single->image }}" alt="Card image cap">
              @else
              
              <img class="card-img-top" src="{{ asset('assets/img/' . (!empty($single->image) ? $single->image : 'default.jpg')) }}" alt="Card image cap">
              @endif
    
        <div class="card-body">
                              <div class="row">
                                <div class="col-lg-10">
                                  <h5 class="search-title-card">{{$single->name}}</h5>
                                </div>
                                <div class="col-lg-2">
                                  <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                </div>
                              </div>
                                <p class="card-text">{{$field->city}}</p>
                                <p><i class="bi bi-calendar3 aticon1" ></i> {{$field->opening_date}} <i class="bi bi-lightning-fill aticon2"></i> Instant</p>

                             </div>
  </div>
</a>
</div>
</div>
<?php } ?>
<!-- <div class="col-lg-4">

<div class="bg-white attr grow px-2">
  <a href="singleattraction.php">
  <div class="card">
    <img class="card-img-top" src="assets/img/tourist-places-in-shillong.jpg" alt="Card image cap">
      <div class="card-body">
                              <div class="row">
                                <div class="col-lg-10">
                                  <h5 class="search-title-card">Attraction</h5>
                                </div>
                                <div class="col-lg-2">
                                  <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                </div>
                              </div>
                                <p class="card-text">Dargling, North East, India</p>
                                <p><i class="bi bi-calendar3 aticon1" ></i> Open Date  <i class="bi bi-lightning-fill aticon2"></i> Instant</p>

                             </div>
  </div>
</a>
</div>
</div> -->


</div>
</div>
              </div>




              <div class="tab-pane fade" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
              <div   class="row pt-5 bg-white">
                <div   class="col-12 pt-lg-4 pt-3 px-lg-4 px-3">
<div  class="col pb-3 ">
    <h5  class="font-weight-bold text-black">
      <i class="bi bi-ticket-detailed-fill"></i> Description</h5>
    <div  class="content-container custom-border-bottom">

    <div >{{$field_data->description}}</div>


    </div>
</div>

<div  class="col pb-3 ">
    <h5  class="font-weight-bold text-black">
      <i class="bi bi-ticket-detailed-fill"></i> What to Expect</h5>
    <div  class="content-container custom-border-bottom">

    <div >

    </div>


    </div>
</div>

<div  class="col pb-3 ">
    <h5  class="font-weight-bold text-black">
       <i class="bi bi-ticket-detailed-fill"></i> Things to Note</h5>
    <div  class="content-container custom-border-bottom">

    <p >No available information as of the moment. Please check again later.</p>
    </div>
</div>

<div  class="col pb-3 ">
    <h5  class="font-weight-bold text-black">
      <i class="bi bi-ticket-detailed-fill"></i> Operating Hours</h5>
    <div  class="content-container pt-3 custom-border-bottom">
        <div  class="row">


                <div  class="col-3">
                    <div  class="table-responsive">
                        <table  class="table table-bordered">
                            <tbody >

                            <tr >
                                    <td ><strong >SUNDAY</strong></td>
                                    <td >00:30 to 02:30</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>



        </div>
    </div>
</div>


<div  class="col pb-3">
    <h5  class="font-weight-bold text-black">
      <i class="bi bi-ticket-detailed-fill"></i> Blocked Out Dates</h5>
    <div  class="content-container form-group mb-2 pt-3">
        <div  class="row">
            <div  class="col-12">
                <div >
                    <table  class="table font-weight-normal table-borderless border-table si-bg-table">
                        <thead  class="">
                            <tr >
                                <th  class="custom-min-width">Month &amp; Year</th>
                                <th  class="custom-min-width">Date</th>
                                <th  class="custom-min-width">Day</th>
                                <th  class="custom-min-width">Remarks</th>
                            </tr>
                        </thead>
                        <tbody >



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
</div>

                </div>
              </div>
              </div>

          </div>

      </div>
    </section>

   <!-- jQuery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Your custom script -->
<script>
// $(document).ready(function(){
//   $('.ticket-toggle').click(function(){
//     $('.show-text, .hide-text').toggle();
//   });
// });

$(document).ready(function(){
  $('.ticket-toggle').click(function(){
    // Get the show and hide text elements relative to the clicked toggle button
    var showText = $(this).find('.show-text');
    var hideText = $(this).find('.hide-text');

    // Toggle the visibility of the show and hide text elements
    showText.toggle();
    hideText.toggle();

    // Get the target collapse ID from data attribute
    var targetCollapseId = $(this).data('target');

    // Check if the corresponding collapse content is currently open
    var isCollapsed = $(targetCollapseId).hasClass('collapse');

    // Toggle the visibility of the collapse content
    $(targetCollapseId).collapse(isCollapsed ? 'show' : 'hide');
    $(this).find('.show-icon').toggle();
    $(this).find('.hide-icon').toggle();

  });
});
$(document).ready(function(){
    // Increment quantity
    $(document).on('click', '.qty-btn-plus', function(){
      var opbtn= $(this).attr('data-id');
        var input = $(this).closest('.qty-container').find('.input-qty');
        var value = parseInt(input.val());
        input.val(value + 1);
        updateAddBtn(input,opbtn);
    });

    // Decrement quantity
    $(document).on('click', '.qty-btn-minus', function(){
      var opbtn= $(this).attr('data-id');
        var input = $(this).closest('.qty-container').find('.input-qty');
        var value = parseInt(input.val());
        if(value > 0) {
            input.val(value - 1);
            updateAddBtn(input,opbtn);
        }
    });
});
// Function to update add button based on quantity
function updateAddBtn(input,opbtn) {
        var quantity = parseInt(input.val());
        var addBtn = $('#'+opbtn);
        if (quantity > 0) {
            addBtn.removeClass('disabled');
        } else {
            addBtn.addClass('disabled');
        }
    }

$(document).on('click','.btn-add',function(){
    // alert('jj');
    var myTicketDiv = $(this).closest('.myticket');
    var attraction_ID = myTicketDiv.find('.attraction_ID').val();
    // var ticket_ID = myTicketDiv.find('.ticket_ID').val();
    
    var option_ID = myTicketDiv.find('.option_ID').val();
    var ticketValidity = myTicketDiv.find('.ticketValidity').val();
    var duration = myTicketDiv.find('.duration').val();
    
    ticket_ID=[];
    myTicketDiv.find('.ticket_ID').each(function(){
      ticket_ID.push($(this).val()); // Push each value into the optionIds array
    });
    agent_price=[];
    myTicketDiv.find('.agent_price').each(function(){
      agent_price.push($(this).val()); // Push each value into the optionIds array
    });
    quantity=[];
    myTicketDiv.find('.input-qty').each(function(){
      quantity.push($(this).val()); // Push each value into the optionIds array
    });
    

    // Now you can use optionId and netId as needed
    console.log("attraction_ID:", attraction_ID);
    console.log("ticket_ID:", ticket_ID);
    console.log("option_ID:", option_ID);
    console.log("agent_price:", agent_price);
    console.log("input-qty:", quantity);

    $.ajax({
           type: 'POST',
           url: 'addcart_attraction',
           data: { attraction_ID:attraction_ID,ticket_ID:ticket_ID,option_ID:option_ID,agent_price:agent_price,quantity:quantity,ticketValidity:ticketValidity,duration:duration },
          //  contentType: false,
          //   processData: false,
           success: function (data) {
  
            console.log(data);
            if(data.status){
              showMessage('message', data.message, true)
              
                // setTimeout(function(){
              
                // window.location.reload();
             
                //   },2000);
            }
           }
  
  
         });

  });

  $(document).ready(function(){
    $('#moreinfo_btn').click(function(){
        $('#pills-info-tab').click(); // Trigger click event on element with ID 'set2'
    });
});
</script>
    </main><!-- End #main -->

@include('layouts.footerwithnosidebar');