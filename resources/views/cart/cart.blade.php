@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Cart</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
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
                  <h5 class="" style="font-weight: 900;">You have 0 item(s) in cart</h5>
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
<div class="text-dark mb-2 fs-3">{{$singlecart->attraction_id}}</div>
@foreach($singlecart->options as $single_option) 
<div class="mb-4 myticket">
          
            <div class="selectticket-card card text-dark mb-2">
              <div class="selectticket-infor col-md-12 px-2 py-1">
                <div class="row align-items-center h-100 p-2">
                  <div class="col-lg col-md d-flex align-items-center justify-content-center">
                    <div class="row w-100">
                      <div class="col-sm col">
                        <h5 class="ticket-card-header">
                          <!-- Ticket testing replicate -->
                       
                        </h5>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 mb-md-2 mb-sm-0 pt-2 pl-0 pr-2 mx-md-0 favorite-id-container d-flex align-items-center justify-content-around">
                    <div class="option-id-wrapper mr-3">
                      <span class="ticket-card-header">
                        Product Option ID : {{ $single_option->option_id}}
                      
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
@foreach($single_option->tickets as $single_ticket)
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
                          <span >Original Merchant Price:</span>
                        </th>
                        <th scope="col"><span >Minimum Selling Price:</span></th>

                        <th scope="col">
                          <span >Nett Price:</span>
                        </th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody >
                
                      <tr>

                        <td width="15%">
                          <div class="name-info-wrapper">
                            <h5 class="variation-title font-style-primary">
                              <span class="font-weight-bold"></span>
                            </h5>

                          </div>
                        </td>
                        <td>
                          <div class="variation-price d-inline">
                            <span>
                            {{ $single_ticket->ticket_id ? $single_ticket->ticket_id : 'NA' }}
                            <input type="hidden" name="ticket_ID[]" class="ticket_ID" value=" " >
                            </span>
                          </div>
                        </td>
                        <td>
                          <div class="variation-price d-inline">
                            <span>
                          
                            </span>
                          </div>
                        </td>
                        <td>
                          <div class="variation-price d-inline">
                            <span >
                              SGD 13
                            </span>
                          </div>
                        </td>
                        <td >
                          <div class="variation-price d-inline">
                            <span >
                              SGD 12.00
                            </span>

                          </div>
                        </td>

                        <td>
                          <div>
                            <h5 class="variation-title font-style-primary p-0">
                              <span class="font-weight-bold">
                                SGD 
                                <input type="hidden" name="agent_price[]" class="agent_price" value="">
                              </span>
                            </h5>
                          </div>
                        </td>

                        <td class="td-text-cart">
                        <div class="qty-container">
                          <button class="qty-btn-minus btn-light" data-id="" type="button"><i class="bi bi-dash-lg"></i></button>
                          <input type="text" name="qty" value="0" class="input-qty"/>
                          <button class="qty-btn-plus btn-light" data-id="" type="button"><i class="bi bi-plus-lg"></i></button>
                        </div>
                      </td>

                      </tr>
                   

                    </tbody>
                  </table>





                </div>
              </div>
@endforeach


              <div class="selectticket-btn font-weight-bold collapse-button row m-0 font-style-primary d-flex justify-content-end px-2">
                <!-- <div aria-expanded="false" class="col-sm-3 col pr-1 d-flex align-items-center collapsed ticket-toggle" data-toggle="collapse" data-target="#collapseInfor" aria-controls="#collapseInfor">
                <i   class="bi bi-chevron-down hide-icon"></i>
                  <i   class="bi bi-chevron-up show-icon" style="display:none;"></i> &nbsp;
                  <p   class="show-text">Show Ticket Information</p>
                  <p   class="hide-text" style="display:none;">Hide Ticket Information</p>
                </div> -->

                <div class="col-md-9 col-sm-12 col py-2 text-md-right text-sm-center row justify-content-end none">
                  <div class="row w-100">
                    <div class="col-md d-flex align-items-center justify-content-md-end mb-md-0 mb-3">
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
                          <button class="btn btn-danger btn-add" id="option" type="button">
                            <span class="font-14"><i class="mdi mdi-cart-outline"></i></span>
                            <span class="font-14">&nbsp;Delete</span>
                          </button>
                        <!-- </a> -->
                    </div>
                  </div>
                </div>
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
           @endforeach
           @endif
<!-- dfdfdf -->
              


              <form class="">
                <div class="row pt-4">
                  <div class="col-md-6">
                    <h6 class="font-weight-bold">Advanced</h6>
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

                    </div>
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
                              $150.00
                            </h6>

                          </div>
                        </div>

                        <div class="card-title-cart d-flex justify-content-between align-items-center">
                          <h6>Payable Amount</h6>
                          <h6 class="card-text font-weight-500">
                            $150.00
                          </h6>
                        </div>

                        <hr>
                        <div class="card-title-cart d-flex justify-content-between align-items-center">
                          <h5 class="text-pinky font-weight-bold">
                            Total (SGD)

                          </h5>
                          <h5 class="card-text text-pinky font-weight-bold">
                            $150.00
                          </h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <hr>
                <h5 class="font-weight-bold pt-2">Customer Information
                </h5>

                <div class="customer-info form-background mt-4 mb-4">
                  <div class="row">
                    <div class="col form-group cart-form">
                      <h6>Customer Name</h6>
                      <input class="form-control" formcontrolname="customerName" type="text" name="customerName">
                      <!--bindings={
  "ng-reflect-ng-if": "false"
}-->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group cart-form">
                      <h6>Email</h6>
                      <input class="form-control" formcontrolname="email" type="text" name="email">
                      <!--bindings={
  "ng-reflect-ng-if": "false"
}-->
                    </div>
                    <div class="col-md-6 form-group cart-form">
                      <h6>Alternate Email<span class="optional-field">(optional)</span></h6>
                      <input class="form-control" formcontrolname="alternateEmail" type="text" name="alternateEmail">
                      <!--bindings={
  "ng-reflect-ng-if": "false"
}-->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group cart-form">
                      <h6>NRIC / Passport No.<span class="optional-field">(optional)</span></h6>
                      <input class="form-control" formcontrolname="passport" type="text" name="passport">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group cart-form">
                      <h6>Mobile<span class="optional-field">(optional)</span></h6>
                      <div class="d-flex">
                        <div class="country-number">
                          <input class="form-control" formcontrolname="mobileCode" placeholder="Code" type="text"
                            name="mobileCode">
                        </div>
                        <div class="mobile-number w-100">
                          <input class="form-control" formcontrolname="mobileNumber" pattern="[0-9]*"
                            placeholder="Mobile Number" type="number" name="mobileNumber">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group cart-form">
                      <h6>Partner Reference<span class="optional-field">(optional)</span></h6>
                      <input class="form-control" formcontrolname="ownReferenceNumber" type="text"
                        name="ownReferenceNumber">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group cart-form">
                      <h6>Remarks<span class="optional-field">(optional)</span></h6>
                      <textarea class="form-control" formcontrolname="remarks" rows="3" name="remarks"></textarea>
                    </div>
                  </div>
                </div>
                <div class="shopping-btn">
                  <button class="btn btn-blue" type="button" disabled="">
                    <span class="btn-label"><i class="bi bi-check-lg"></i> </span>Checkout
                  </button>
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

