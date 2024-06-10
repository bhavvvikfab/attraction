@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Booking</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Booking</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <section class="section" id="adduserform123">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">Booking</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="{{ route(session('prefix', 'agent') . '.all_agent') }}"> Back </a>
                </h5>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
            @if(!empty($cart_info))
              @foreach($cart_info as $singlecart)
              <div class="selectticket-card card text-dark m-2">
                <div class="selectticket-infor col-md-12 px-2 py-1">
                  <div class="mb-2 fs-5 ticket-card-header">{{$singlecart['attractionDetails']['name']}}</div>
                </div>
                <div class="p-4">
                  @foreach($singlecart['options'] as $single_option)  
                  <div class="mb-4 myticket">          
                    <div class="selectticket-card card text-dark mb-2">
                      <div class="selectticket-infor col-md-12 px-2 py-1">
                        <div class="row align-items-center h-100 p-2">
                          <div class="col-lg col-md d-flex align-items-center justify-content-center">
                            <div class="row w-100">
                              <div class="col-sm col">
                                <h6 class="ticket-card-header">
                                  <!-- Ticket testing replicate -->
                                  {{$single_option['optionDetailsArray']['option_name']}}
                                </h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @if(!empty($single_option['tickets']))
                      <div class="selectticket-quantity table-responsive border-top bg-white">
                        <div>
                          <table class="select-ticket-table table font-weight-normal m-10">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">
                                  <span >Ticket Type ID:</span>
                                </th>
                                <th scope="col">
                                  <span >SKU:</span>
                                </th>
                                <th scope="col">
                                  <span >Nett Price:</span>
                                </th>
                                <th class="text-center" scope="col"><span >QTY:</span></th>                                
                              </tr>
                            </thead>
                            <tbody >
                      @foreach($single_option['tickets'] as $single_ticket)
                        
                              <tr>

                                <td width="15%">
                                  <div class="name-info-wrapper">
                                    <h6 class="variation-title font-style-primary">
                                      <span class="font-weight-bold">{{ $single_ticket['ticketdetails_array']['ticket_name'] ? $single_ticket['ticketdetails_array']['ticket_name']: 'NA' }}</span>
                                    </h6>

                                  </div>
                                </td>
                                <td data-cell="Ticket Type ID:">
                                  <div class="variation-price d-inline">
                                    <span>
                                    {{ $single_ticket['ticket_id'] ? $single_ticket['ticket_id']: 'NA' }}
                                    <input type="hidden" name="ticket_ID[]" class="ticket_ID" value=" " >
                                    </span>
                                  </div>
                                </td>
                                <td data-cell="SKU:">
                                  <div class="variation-price d-inline">
                                    <span>
                                    {{ $single_ticket['ticketdetails_array']['sku'] ? $single_ticket['ticketdetails_array']['sku']: 'NA' }}
                                    </span>
                                  </div>
                                </td>
                                <td data-cell="Nett Price:">
                                  <div>
                                    <h6 class="variation-title font-style-primary p-0">
                                      <span class="font-weight-bold">
                                      {{ $single_ticket['agent_price'] ? $single_ticket['agent_price']: 'NA' }}
                                        <input type="hidden" name="agent_price[]" class="agent_price" value="{{$single_ticket['agent_price']}}">
                                      </span>
                                    </h6>
                                  </div>
                                </td>

                                <td class="td-text-cart" data-cell="QTY:">
                                  <!-- <div class="qty-container">
                                    <button class="qty-btns qty-btn-minus btn-light" data-id="" type="button"><i class="bi bi-dash-lg"></i></button>
                                    <input type="text" data-attraction_id="{{$singlecart['attraction_id']}}" data-option_id="{{$single_option['option_id']}}" data-ticket_id="{{$single_ticket['ticket_id']}}" name="qty" value="{{ $single_ticket['count'] ? $single_ticket['count']: 0 }}" min="1" class="input-qty"/>
                                    <button class="qty-btns qty-btn-plus btn-light" data-id="" type="button"><i class="bi bi-plus-lg"></i></button>
                                    
                                  </div> -->
                                  <span class="font-weight-bold">
                                    {{ $single_ticket['count'] ? $single_ticket['count']: 0 }}
                                    </span>
                                </td>
                                
                                <!-- <td class="td-text-cart">
                                  <div class="qty-container">
                                    <button class="bg-white border-0 btn-danger text-danger remove_ticket" data-id="{{$single_ticket['ticket_id']}}" type="button" data-toggle="tooltip" title="Remove ticket"><i class="bi bi-x-circle-fill"></i></i></button>
                                  </div>
                                </td> -->

                              </tr>
                          
        @endforeach
                          </tbody>
                          </table>

                        </div>
                      </div>
        @endif

                      <div class="selectticket-btn font-weight-bold collapse-button row m-0 font-style-primary d-flex justify-content-end px-2">
                        <!-- <div aria-expanded="false" class="col-sm-3 col pr-1 d-flex align-items-center collapsed ticket-toggle" data-toggle="collapse" data-target="#collapseInfor" aria-controls="#collapseInfor">
                        <i   class="bi bi-chevron-down hide-icon"></i>
                          <i   class="bi bi-chevron-up show-icon" style="display:none;"></i> &nbsp;
                          <p   class="show-text">Show Ticket Information</p>
                          <p   class="hide-text" style="display:none;">Hide Ticket Information</p>
                        </div> -->

                        <!-- <div class="col-md-9 col-sm-12 col py-2 text-md-right text-sm-center row justify-content-end none">
                          <div class="row w-100">
                          <div class="add-cart-btn col-12 col-lg-2 p-0 text-right w-100">
                              
                                  <button class="btn btn-danger btn-add" id="option" data-id="option-{{ $single_option['option_id']}}" type="button">
                                    <span class="font-14"><i class="mdi mdi-cart-outline"></i></span>
                                    <span class="font-14">&nbsp;Remove</span>
                                  </button>
                            
                            </div>
                          </div>
                        </div> -->
                      </div>


                      <!-- <div class="selectticket-detail pb-4  collapse bg-white font-style-primary px-4" id="collapseInfor">
                        <div class="row">
                          <div class="col-12">
                            <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Description / Important Notes</h5>
                            <div class="mb-4 ml-3"><p></p></div>
                            <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Validity</h5>
                            <p class="ml-3">Valid from 12 Sept 2022 to 31 Mar 2023</p>
                            <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Cancellation Policy</h5>
                                <ul>
                                    <li>
                                      <strong>Non-refundable and No Cancellation</strong></li>
                                  </ul>
                                <h5 class="mb-0 font-weight-bold font-style-primary text-head mb-2">Terms &amp; Conditions</h5>
                                <div class="mb-4 ml-3"><p></p></div>

                          </div>
                        </div>
                      </div> -->

                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              @endforeach
            @endif
            </div>
            <div class="col-lg-6">
              <h5 class="font-weight-bold pt-2">Customer Information</h5>
              <form class="form-checkout">
                <div class="customer-info form-background mt-4 mb-4">
                  <div class="row">
                    <div class="col form-group cart-form">
                      <h6>Customer Name</h6>
                      <input class="form-control" name="customerName" type="text" name="customerName" onchange="functionName(this.value)" >
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group cart-form">
                      <h6>Email</h6>
                      <input class="form-control" name="email" type="text" name="email">
                    </div>
                    <div class="col-md-6 form-group cart-form">
                      <h6>Alternate Email<span class="optional-field">(optional)</span></h6>
                      <input class="form-control" name="alternateEmail" type="text" name="alternateEmail">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group cart-form">
                      <h6>NRIC / Passport No.<span class="optional-field">(optional)</span></h6>
                      <input class="form-control" name="passport" type="text" name="passport">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group cart-form">
                      <h6>Mobile<span class="optional-field">(optional)</span></h6>
                      <div class="d-flex">
                        <div class="country-number">
                          <input class="form-control" name="mobileCode" placeholder="Code" type="text"
                            name="mobileCode">
                        </div>
                        <div class="mobile-number w-100">
                          <input class="form-control" name="mobileNumber" pattern="[0-9]*"
                            placeholder="Mobile Number" type="number" name="mobileNumber">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group cart-form">
                      <h6>Partner Reference<span class="optional-field">(optional)</span></h6>
                      <input class="form-control" name="ownReferenceNumber" type="text"
                        name="ownReferenceNumber">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group cart-form">
                      <h6>Remarks<span class="optional-field">(optional)</span></h6>
                      <textarea class="form-control" name="remarks" rows="3" name="remarks"></textarea>
                    </div>
                  </div>
                </div>
              </form>

              <div class="card-body p-3">
                <div class="card-title-cart d-flex justify-content-between align-items-center">
                  <h6>Sub Total</h6>
                  <div class="text-right">
                    <h6 class="card-text font-weight-500">
                      <p class="sub_totle">{{$subtotal}}</p>
                    </h6>
                  </div>
                </div>

                <div class="card-title-cart d-flex justify-content-between align-items-center">
                  <h6>Payable Amount</h6>
                  <h6 class="card-text font-weight-500">                          
                    <p class="payble_amount">{{$subtotal}}</p>
                  </h6>
                </div>

                <hr>
                <div class="card-title-cart d-flex justify-content-between align-items-center">
                  <h5 class="text-pinky font-weight-bold">
                    Total (SGD)
                  </h5>
                  <h5 class="card-text text-pinky font-weight-bold">                            
                    <p class="final_subtotal">{{$subtotal}}</p>
                  </h5>
                </div>
              </div>
              <hr class="col-11 mx-auto mt-0">
              <div class="mb-4 shopping-btn text-center w-100">
                <!-- <a href="{{ route(session('prefix', 'agent') . '.reserve_booking') }} "> -->
                  <button class="btn btn-light-blue btn-blue disabled checkout_cart" type="button" class="disabled" id="checkout">
                    <span class="btn-label"><i class="bi bi-check-lg"></i> </span>
                    Confirm Booking
                  </button>
                <!-- </a> -->
              </div>
            </div>
          </div>          
        </div>

      </div>
      <!--  --><!-- End General Form Elements -->
    </div>
    </div>

    </div>
    </div>
  </section>
</main>

@include('layouts.footer');

<script>
  function functionName(value) {
      if (value==="") {
        $('.checkout_cart').addClass('disabled');
        $('.checkout_cart').addClass('btn-light-blue');
      }else{
        $('.checkout_cart').removeClass('disabled');
        $('.checkout_cart').removeClass('btn-light-blue');
      }
    }
  $(document).ready(function() {

    $(document).on('click', '#checkout', function (){
      var url = '<?php echo route(session('prefix', 'agent') . '.checkout'); ?>';
      var formData = $(".form-checkout").serialize();

      $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function (data) {
          if (data.status) {
            showMessage('Message', data.message, true);
            setTimeout(function() {
              window.location.href = '<?php  echo route(session('prefix', 'agent') . '.all_invoice'); ?>';
              location.reload();
            }, 2000);
            
          }else{
            console.log('ok');
            showMessage('Error', data.message, false);
            if(data.error){
              showMessage('Error', data.error, false);
            }            
          }
        }
        
      });
    });

  });
</script>
