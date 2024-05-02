@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>View Attraction</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">View Attraction</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Card with an image on left -->
    <section class="section" id="viewsup1021">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 class="card-title text-start">View Attraction</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="card-title text-end addsup">
                                    <a href="{{ route(session('prefix', 'agent') . '.all_attraction') }}"> Back </a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <form class="m-3">
                                <div class="row">

                                    <div class="col-lg-4 col-sm-12">

                                        <i class="bi bi-card-heading" aria-hidden="true"></i>
                                        <label class="form-label" for="inputNanme4"> <b> Attraction Image: </b>
                                        </label> <!-- <img src="assets/img/tourist-places-in-shillong.jpg"> -->
                                        <div class="attraction-thumbnail">
                                            @isset($all_data['attraction_single'])
                                                <?php   
                                                $attraction_single = $all_data['attraction_single'];
                                                if ($attraction_single['image']) {
                                                    $attraction_image = $attraction_single['image'];
                                                }
                                                $fields = json_decode($attraction_single['fields'], true);
                                                // dd($attraction_single);
                                                ?>
                                            @endisset
                                            <!-- @isset($attraction_image)
                                                <img height="300" width="300"
                                                    src="{{ env('API_IMAGE_URL') }}{{ $attraction_image }}" alt="No_image">
                                            @endisset -->

                                            @if($all_data['attraction_single']['attraction_id'])
                                            <div class="image-wrapper signlesttrimg mb-3" style="background:url('{{ env('API_IMAGE_URL') }}{{ $all_data['attraction_single']['image'] }}') center/cover;">
                                            </div>
                                            @else
                                            <div class="image-wrapper signlesttrimg mb-3" style="background:url('{{ asset('assets/img/' . (!empty($all_data['attraction_single']['image']) ? $all_data['attraction_single']['image'] : 'default.jpg')) }}') center/cover;">
                                            </div>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-12">

                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-person-circle" aria-hidden="true"></i><label
                                                    class="form-label" for="inputNanme05"> <b class="m-1"> Attraction
                                                        Name: </b></label>
                                                @isset($attraction_single['name'])
                                                    {{ $attraction_single['name'] }}
                                                @endisset
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i
                                                    class="bi bi-calendar-check-fill" aria-hidden="true"></i>
                                                <label class="form-label" for="inputNanme4"> <b class="m-1"> Opening
                                                        Date: </b>
                                                    @isset($fields['opening_date'])
                                                        {{ $fields['opening_date'] }}
                                                    @endisset
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-calendar-check-fill" aria-hidden="true"></i><label
                                                    class="form-label" for=""> <b class="m-1">
                                                        Duration:</b>
                                                    @isset($fields['duration'])
                                                        {{ $fields['duration'] }}
                                                    @endisset
                                                </label>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-cash"
                                                    aria-hidden="true"></i>
                                                <label class="form-label" for=""> <b class="m-1">Price :</b>
                                                    @isset($fields['original_price'])
                                                        {{ $fields['original_price'] }}
                                                    @endisset
                                                </label>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-geo-alt-fill" aria-hidden="true"></i><label
                                                    class="form-label" for=""> <b class="m-1">Location:
                                                    </b>
                                                    @isset($fields['city'])
                                                        {{ $fields['city'] }}
                                                    @endisset
                                                </label>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i
                                                    class="bi bi-cart-check-fill" aria-hidden="true"></i>
                                                {{-- <label class="form-label" for="inputNanme4"> <b class="m-1"> Bookings: </b> {{$field_data->booking}}
                                                </label> --}}
                                            </div>

                                        </div>

                                        <hr>
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12 pb-2 pb-lg-0">
                                                <div class="dropdown">
                                                    <a class=" dropdown-toggle text-decoration-none text-dark fw-bold" type="button" id="dropdownDescription" data-bs-toggle="dropdown" aria-expanded="false">
                                                         Description
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownDescription">
                                                        <li>
                                                            <label class="form-label pt- mx-2" for="inputNanme4">
                                                               
                                                                @isset($fields['description'])
                                                                    {{ $fields['description'] }}
                                                                @endisset
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="row">
                 
                 
                                            <div class=" col-12"><i class="bi bi-list-ul" aria-hidden="true"></i>
                                              <label class="form-label" for="inputNanme4"> <b> Store Description: </b> lorem ipsum
                                              </label>                
                                            </div> -->
                                        <!-- <div class=" col-6">
                                                <i class="bi bi-envelope-fill" aria-hidden="true"></i><label class="form-label" for="inputNanme05"> <b>Supplier Email:</b></label>mail123@gmail.com
                                              </div> -->

                                    </div>
                                </div>
                                
                                @isset($all_data['attraction_option'])
                                <?php
                                $ticket_option = $all_data['attraction_option'];
                                if (isset($ticket_option['data'])) {
                                    $att_datas = $ticket_option['data'];
                                    // dd($att_datas);
                                }
                                ?>
                            @endisset

                                @isset($att_datas)


                                    @foreach ($att_datas as $key => $ticket)
                                        <div class="">
                                            <div class="pt-4">
                                                <div id="">
                                                    <div class="pb-1">

                                                        <div>
                                                            <div class="mb-4 myticket">
                                                                <div class=" card text-dark mb-2">
                                                                    <div class="selectticket-infor col-md-12 px-2 py-1">
                                                                        <div class="row align-items-center h-100 p-2">
                                                                            <div
                                                                                class="col-lg col-md d-flex align-items-center justify-content-center">
                                                                                <div class="row w-100">
                                                                                    <div class="col-sm col">
                                                                                        <h5 class="ticket-card-header"
                                                                                           >
                                                                                          {{$ticket['name'] ?? ''}}
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-lg-3 col-md-3 mb-md-2 mb-sm-0 pt-2 pl-0 pr-2 mx-md-0 favorite-id-container d-flex align-items-center justify-content-around">
                                                                                <div class="option-id-wrapper mr-3">
                                                                                    <span class="ticket-card-header">
                                                                                        Ticket ID :
                                                                                       {{ $ticket['id'] ?? ''}}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="favorite-wrapper">
                                                                                    <span
                                                                                        class="favorite-icon pr-2 active-favorite search-fav-icon">
                                                                                        <i class="bi bi-star-fill"
                                                                                            style="font-size: 22px; color:gold;"></i>

                                                                                    </span>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="selectticket-quantity table-responsive border-top bg-white">
                                                                        <div>
                                                                            <table
                                                                                class="select-ticket-table table font-weight-normal m-10">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col" class="text-start" >
                                                                                            <span ></span>
                                                                                        </th>
                                                                                        <th scope="col">
                                                                                            <span>Ticket Type ID:</span>
                                                                                        </th>
                                                                                        <th scope="col">
                                                                                            <span>SKU:</span>
                                                                                        </th>
                                                                                        <th scope="col">
                                                                                            <span>Original Merchant
                                                                                                Price:</span>
                                                                                        </th>
                                                                                        <th scope="col"><span>Minimum
                                                                                                Selling
                                                                                                Price:</span></th>

                                                                                        <th scope="col">
                                                                                            <span>Nett Price:</span>
                                                                                        </th>
                                                                                        <th scope="col">
                                                                                            <span>Agent Price:</span>
                                                                                        </th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                   @foreach ($ticket['ticketType'] as $myticket)
                                                                                       
                                                                                   <tr>
                                                                                    <td width="15%">
                                                                                        <div class="">
                                                                                            <h5
                                                                                                class=" font-style-primary">
                                                                                                <span class=" fw-bold">
                                                                                                    @isset($myticket['name'])
                                                                                                        {{ $myticket['name']}}
                                                                                                    @endisset

                                                                                                </span>
                                                                                            </h5>

                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="variation-price d-inline">
                                                                                            <span>
                                                                                                @isset($myticket['id'])
                                                                                                    {{ $myticket['id'] }}
                                                                                                @endisset
                                                                                            </span>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="variation-price d-inline">
                                                                                            <span>
                                                                                                @isset($myticket['sku'])
                                                                                                    {{ $myticket['sku'] ?: 'N/A' }}
                                                                                                @endisset
                                                                                            </span>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="variation-price d-inline">
                                                                                            <span>
                                                                                                {{$ticket['currency'] ?? ''}}: {{$myticket['originalMerchantPrice'] ?? '0'}}
                                                                                            </span>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="variation-price d-inline">
                                                                                            <span>
                                                                                               {{$ticket['currency'] ?? ''}}:  {{ $myticket['minimumSellingPrice'] ?? 0}}

                                                                                            </span>

                                                                                        </div>
                                                                                    </td>

                                                                                    <td>
                                                                                        <div>
                                                                                            <h5
                                                                                                class="variation-title font-style-primary p-0">
                                                                                                @isset($myticket['nettPrice'])
                                                                                                    <span
                                                                                                        class="font-weight-bold">
                                                                                                        {{$ticket['currency']}}: {{ $myticket['nettPrice'] ?: 00 }}
                                                                                                    </span>
                                                                                                @endisset

                                                                                            </h5>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fw-bold" >{{$myticket['agent_price']}}</td>
                                                                                </tr>
                                                                                   @endforeach
                                                                                 
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="selectticket-btn font-weight-bold collapse-button row m-0 font-style-primary">
                                                                        <div aria-expanded="false"
                                                                            class="col-sm-3 col pr-1 d-flex align-items-center collapsed ticket-toggle"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseInfor<?= $key ?>"
                                                                            aria-controls="collapseInfor<?= $key ?>">
                                                                            <i class="bi bi-chevron-down hide-icon"></i>
                                                                            <i class="bi bi-chevron-up show-icon"
                                                                                style="display:none;"></i> &nbsp;
                                                                            <p class="show-text">Show Ticket Information
                                                                            </p>
                                                                            <p class="hide-text" style="display:none;">
                                                                                Hide
                                                                                Ticket
                                                                                Information</p>
                                                                        </div>

                                                                        <div
                                                                            class="col-md-9 col-sm-12 col py-2 text-md-right text-sm-center row justify-content-end none">
                                                                            <div class="row w-100">
                                                                                <div
                                                                                    class="col-md d-flex align-items-center justify-content-md-end mb-md-0 mb-3">
                                                                                    <div
                                                                                        class="icon-wrapper d-flex justify-content-between align-items-center pr-4">

                                                                                        @isset($ticket['redeemStart'])
                                                                                        <i class="bi bi-calendar3"></i>
                                                                                            <span class="calendar card-icon-label">
                                                                                                Valid from {{ date('Y-m-d', strtotime($ticket['redeemStart'])) }} to {{ date('Y-m-d', strtotime($ticket['redeemEnd'])) }}
                                                                                          
                                                                                            </span>
                                                                                        @endisset

                                                                                    </div>

                                                                                    <div
                                                                                        class="icon-wrapper d-flex justify-content-between align-items-center px-lg-4">
                                                                                        <span
                                                                                            class="lightning card-icons pr-1">
                                                                                            <i
                                                                                                class="bi bi-lightning-fill"></i>
                                                                                        </span>
                                                                                        <span class="card-icon-label">
                                                                                            Instant
                                                                                        </span>
                                                                                    </div><!---->
                                                                                    <div
                                                                                        class="icon-wrapper d-flex justify-content-between align-items-center pr-4">
                                                                                        <span
                                                                                            class="calendar card-icons pr-1">
                                                                                            <i class="bi bi-calendar3"></i>
                                                                                        </span>
                                                                                        <span class="card-icon-label">
                                                                                            Dated
                                                                                        </span>
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="selectticket-detail pb-4  collapse bg-white font-style-primary px-4"
                                                                            id="collapseInfor<?= $key ?>">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <h5
                                                                                        class="mb-0  font-style-primary text-head mb-2">
                                                                                        Cancellation Policy :
                                                                                    </h5>
                                                                                    <div class="mb-4 ml-3">
                                                                                        <p class="">
                                                                                            @isset($ticket['isCancellable'])
                                                                                                @if($ticket['isCancellable']==true)
                                                                                                Yes
                                                                                                @else
                                                                                                No
                                                                                                 @endif
                                                                                             
                                                                                            @endisset
                                                                                        </p>
                                                                                    </div>

                                                                                    <h5
                                                                                        class="mb-0  font-style-primary text-head mb-2">
                                                                                        Description</h5>

                                                                                        <p class="ml-3" style="font-weight: 400">
                                                                                            @isset($ticket['description'])
                                                                                                {{ $ticket['description'] ?: 'N/A' }}
                                                                                            @endisset
                                                                                        </p>
                                                                                   

                                                                                    <h5
                                                                                    class="mb-0  font-style-primary text-head mb-2">
                                                                                    Terms And Conditions</h5>

                                                                                <p class="ml-3"  style="font-weight: 400">
                                                                                    @isset($ticket['termsAndConditions'])
                                                                                       {{ $ticket['termsAndConditions'] ?: 'N/A' }}
                                                                                    @endisset
                                                                                </p>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                                <!---->

                                                                <!---->
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                    @endforeach
                                @endisset
                            </form>
                        </div>

                        <!-- <div class="row">
                <div class="col-lg-6">
                  
                  <h4> <i class="bi bi-image-fill" style="font-size: 18px;"></i> Supplier Image: </h4>
                  <div class="supplier-thumbnail">
                        <img src="assets/img/product-1.jpg">
                      </div>
                </div>

                 <div class="col-lg-6">

                  <h4> <i class="bi bi-shop-window" style="font-size: 18px;"></i> Supplier Name :  </h4>
                  Unity Pugh
                </div>

              </div> -->

                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- End Card with an image on left -->

</main><!-- End #main -->

@include('layouts.footer');
