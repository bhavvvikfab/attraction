@include('layouts.header');
@include('layouts.sidebar');
<style>
    .container_padding{
        padding : 3 rem;
    }
   @media only screen and (max-width: 765px) {
           .container_padding{
                padding : .25 rem;
            }
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

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Cart</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Cart</li>
          </ol>
        </nav>
      </div>
    </div>
  </div><!-- End Page Title -->

  <section class="section" id="order509">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="shopping-page">

            <div class="container-fluid mb-2 p-5">

              <div class="row">
                <div class="col-md-5">
                  <h5 class="" style="font-weight: 900;">You have {{count($cart_info) ?? 0}} item(s) in cart</h5>
                </div>
                <div class="col-md-7 d-flex justify-content-end">
                  <!--bindings={
  "ng-reflect-ng-if": "false"
}-->
                  <!--bindings={
  "ng-reflect-ng-if": "false"
}-->
                </div>
              </div>
<!-- fdfdf -->
@if(!empty($cart_info))
@foreach($cart_info as $singlecart)
<div class="selectticket-card card text-dark m-2">
  <div class="selectticket-infor col-md-12 px-2 py-1">
    <div class="mb-2 fs-3 ticket-card-header">{{$singlecart['attractionDetails']['name']}}</div>
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
                        <h5 class="ticket-card-header">
                          <!-- Ticket testing replicate -->
                          {{$single_option['optionDetailsArray']['option_name']}}
                        </h5>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 mb-md-2 mb-sm-0 pt-2 pl-0 pr-2 mx-md-0 favorite-id-container d-flex align-items-center justify-content-around">
                    <div class="option-id-wrapper mr-3">
                      <span class="ticket-card-header">
                        Product Option ID : {{ $single_option['option_id']}}
                      
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
                        <!-- <th scope="col">
                          <span >Original Merchant Price:</span>
                        </th>
                        <th scope="col"><span >Minimum Selling Price:</span></th> -->

                        <th scope="col">
                          <span >Nett Price:</span>
                        </th>
                        <th class="text-center" scope="col"><span >QTY:</span></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody >
              @foreach($single_option['tickets'] as $single_ticket)
                
                      <tr>

                        <td width="15%">
                          <div class="name-info-wrapper">
                            <h5 class="variation-title font-style-primary">
                              <span class="font-weight-bold">{{ $single_ticket['ticketdetails_array']['ticket_name'] ? $single_ticket['ticketdetails_array']['ticket_name']: 'NA' }}</span>
                            </h5>

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
                            <h5 class="variation-title font-style-primary p-0">
                              <span class="font-weight-bold">
                              {{ $single_ticket['agent_price'] ? $single_ticket['agent_price']: 'NA' }}
                                <input type="hidden" name="agent_price[]" class="agent_price" value="{{$single_ticket['agent_price']}}">
                              </span>
                            </h5>
                          </div>
                        </td>

                        <td class="td-text-cart" data-cell="QTY:">
                          <div class="qty-container">
                            <button class="qty-btns qty-btn-minus btn-light" data-id="" type="button"><i class="bi bi-dash-lg"></i></button>
                            <input type="text" data-attraction_id="{{$singlecart['attraction_id']}}" data-option_id="{{$single_option['option_id']}}" data-ticket_id="{{$single_ticket['ticket_id']}}" name="qty" value="{{ $single_ticket['count'] ? $single_ticket['count']: 0 }}" min="1" class="input-qty"/>
                            <button class="qty-btns qty-btn-plus btn-light" data-id="" type="button"><i class="bi bi-plus-lg"></i></button>
                          </div>
                        </td>
                        
                        <td class="td-text-cart">
                          <div class="qty-container">
                            <button class="bg-white border-0 btn-danger text-danger remove_ticket" data-id="{{$single_ticket['ticket_id']}}" type="button" data-toggle="tooltip" title="Remove ticket"><i class="bi bi-x-circle-fill"></i></i></button>
                          </div>
                        </td>

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
<!-- dfdfdf -->
              


              <form class="">
                <div class="row pt-4">
                  <div class="col-md-6">
                    <!-- <h6 class="font-weight-bold">Advanced</h6>
                    <div class="shopping-advanced ml-3">
                      <div class="form-group custom-control custom-checkbox mb-0">
                        <input class="custom-control-input" formcontrolname="groupBooking" id="group_booking"
                          type="checkbox" ng-reflect-name="groupBooking" disabled="">
                        <label class="custom-control-label" for="group_booking">Group Booking</label>
                      </div>
                      <div class="row">
                        <div class="col">

                        </div>
                      </div>
                    </div>
                    <div class="shopping-promo ml-3 pt-md-0 pt-3">
                      <div class="form-group custom-control custom-checkbox mb-0">
                        <input class="custom-control-input" formcontrolname="applyPromo" id="apply_promo_code"
                          type="checkbox" name="applyPromo" disabled="">
                        <label class="custom-control-label" for="apply_promo_code">Apply Discount</label>
                      </div>

                    </div> -->
                  </div>
                  <div class="col-md-6 pt-md-0 pt-3">
                    <div class="card cart-body">
                      <!--<div   class="card-header-cart">-->
                      <!--  <div   class="row">-->
                      <!--    <div   class="col-md-7">-->
                      <!--      <div   class="form-group mb-2">-->
                      <!--        <label   class="font-weight-bold font-24 mb-3" for="">Pay By</label>-->
                      <!--        <form  class="form">-->


                      <!--          <select class="form-cart" formcontrolname="paymentMethod" id="paymentMethod" name="paymentMethod">-->
                      <!--              <option value="0: Credit">Credit</option>-->

                      <!--          </select>-->
                      <!--          </form>-->
                      <!--      </div>-->

                      <!--    </div>-->


                      <!--  </div>-->
                      <!--</div>-->
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
                    </div>
                  </div>
                </div>

                

                
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

@include('layouts.footer');

<script>
  const operations = {
    'qty-btn-minus': function(qty) { return Math.max(Number(qty) - 1, 1); },
    'qty-btn-plus': function(qty) { return Number(qty) + 1; }
  };
$(document).on('click','.qty-btns',function(){
  var $this = $(this);
  var qty_container = $this.parent();
  var input_qty = qty_container.find('.input-qty');
  var qty = input_qty.val();
  var new_qty = qty; 
  var operation = $this.hasClass('qty-btn-minus') ? 'qty-btn-minus' : 'qty-btn-plus';
  new_qty = operations[operation](new_qty);
  input_qty.val(new_qty).trigger('change');
})

$(document).on('change','.input-qty',function(){
  var $this = $(this);
  var qty_container = $this.parent();
  var qty = $(this).val();
  var attraction_id = $this.attr('data-attraction_id');
  var option_id = $this.attr('data-option_id');
  var ticket_id = $this.attr('data-ticket_id');
  console.log('attraction_id:',attraction_id,',option_id:',option_id,",ticket_id:",ticket_id);
  formData = '{}';
  var fd = new FormData();
  fd.append('attraction_id',attraction_id);
  fd.append('option_id',option_id);
  fd.append('ticket_id',ticket_id);
  fd.append('qty',qty);

  var url = '<?php echo route(session('prefix', 'agent') . '.updateCartQTY'); ?>';

  makeAjaxRequest(url, 'POST', fd, 
        function(response) {
            // Handle success response
            console.log(response);
            showMessage('Message', response.msg, true);
            $('.sub_totle').text(response.subtotal);
            $('.payble_amount').text(response.subtotal);
            $('.final_subtotal').text(response.subtotal);
        },
        function(xhr, status, error) {
            // Handle error
            console.log(xhr.responseJSON,status,error)
            showMessage('Message', xhr.responseJSON.msg, false);
        }
    );

})

$(document).on('click', '.remove_ticket', function (){
    //  alert('kk');
     var ticket_id=$(this).attr("data-id");
      // alert (ticket_id);
      var url = '<?php echo route(session('prefix', 'agent') . '.remove_ticket'); ?>';
     if (confirm('Are you sure delete this record?')) {
       // alert ($user_id);
       $.ajax({
         type: 'POST',
         url: url,
         data: { ticket_id:ticket_id },
        //  contentType: false,
        //   processData: false,
         success: function (data) {
          if (data.status) {
            showMessage('Message', data.message, true);
                       
            setTimeout(function(){            
                window.location.reload();           
            },2000);            
          }else {
            showMessage('Message', data.message, false);
            $.each(data.errors, function(index, value) {
              showMessage('Error', value, false)
              
          });
            
          }
         //   console.log(data);
         
         }


       });
     }
});

</script>
