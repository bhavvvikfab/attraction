@include('layouts.header');
@include('layouts.sidebar');


<style>
    @media only screen and (min-width: 1025px) {
      .sidebar {
        display: none;
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
              <div class="image-wrapper signlesttrimg mb-3" style="background:url('{{ asset('assets/img/' . (!empty($attraction_single->image) ? $attraction_single->image : 'default.jpg')) }}') center/cover;">
              </div>
              <div class="image-controls-wrapper d-flex justify-content-around align-items-center">
                <div class="icon-wrapper d-flex justify-content-between align-items-center pr-4 flex-lg-row flex-sm-column">
                  <span class="card-icons pr-1">
                    <i class="bi bi-camera-fill"></i>
                  </span>
                  <span class="card-icon-label">
                    More Images
                  </span>
                </div>
                <a href="">
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
                        <span class="label-tag ms-2">2368</span>
                      </div>
                      <h3 class="attraction-title">{{$attraction_single->name}}</h3>
                    </div>
                    <div class="col-md-3 pl-0 justify-content-end d-flex align-items-end">

                      <button class="btn btnmoreinfo btn-prime">
                        <a href="#">More Information</a>
                      </button>
                    </div>
                  </div>
                </div>

                <div class="mt-2" id="highlights">
                  <div class="row">
                    <div class="highlights font-style-primary col-12">
                      <div class="highlights-wrapper px-md-0 px-3 h-100">
                        <h4 class="highlights-title">Details</h4>
                        <div class="highlights-text detail-standard ">
                          <div class="col-12">
                            <ul class="details_point">
                              <li>all the generators on the Internet tend to repeat predefined chunks as necessary,</li>
                              <li>all the generators on the Internet tend to repeat predefined chunks as necessary,</li>
                              <li>all the generators on the Internet tend to repeat predefined chunks as necessary,</li>
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
                          <div class="col-lg-5 pe-0">
                            <div class="related-attr-wrapper text-end">
                              <h6 class="mb-0">
                              <a href="">See other related attractions > </a> </h6>
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
  </div>
        </div>


     <!-- -----------------------------------------Tabs................... -->
     <div class="custom-tabset">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active bg-white" id="pills-ticket-tab" data-bs-toggle="pill" data-bs-target="#pills-ticket" type="button" role="tab" aria-controls="pills-ticket" aria-selected="true">Ticket</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link bg-white" id="pills-package-tab" data-bs-toggle="pill" data-bs-target="#pills-package" type="button" role="tab" aria-controls="pills-package" aria-selected="false">Packages/Tansportation</button>
              </li>
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
                      <span class="favorite-icon pr-2 active-favorite search-fav-icon" >
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
                                SGD {{$attraction_single->display_final}}
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
                <i   class="bi bi-chevron-down hide-icon"></i>
                  <i   class="bi bi-chevron-up show-icon" style="display:none;"></i> &nbsp;
                  <p   class="show-text">Show Ticket Information</p>
                  <p   class="hide-text" style="display:none;">Hide Ticket Information</p>
                </div>

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
                    <p class="ml-3">Valid from 12 Sept 2022 to 31 Mar 2023</p>
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
                      <span class="favorite-icon pr-2 active-favorite search-fav-icon" >
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
                                SGD {{$attraction_single->display_final}}
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
                <i   class="bi bi-chevron-down hide-icon"></i>
                  <i   class="bi bi-chevron-up show-icon" style="display:none;"></i> &nbsp;
                  <p   class="show-text">Show Ticket Information</p>
                  <p   class="hide-text" style="display:none;">Hide Ticket Information</p>
                </div>

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
                    <p class="ml-3">Valid from 12 Sept 2022 to 31 Mar 2023</p>
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
                  <div class="col-lg-3 col-md-3 mb-md-2 mb-sm-0 pt-2 pl-0 pr-2 mx-md-0 favorite-id-container d-flex align-items-center justify-content-around">
                    <div class="option-id-wrapper mr-3">
                      <span class="ticket-card-header">
                        Product Option ID : 7775
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
                                SGD {{$attraction_single->display_final}}
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
                <div aria-expanded="false" class="col-sm-3 col pr-1 d-flex align-items-center collapsed ticket-toggle" data-toggle="collapse" data-target="#collapseInfor-7777" aria-controls="#collapseInfor-7775">
                <i   class="bi bi-chevron-down hide-icon"></i>
                  <i   class="bi bi-chevron-up show-icon" style="display:none;"></i> &nbsp;
                  <p   class="show-text">Show Ticket Information</p>
                  <p   class="hide-text" style="display:none;">Hide Ticket Information</p>
                </div>

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
  <a href="singleattraction.php">
  <div class="card">
    <img class="card-img-top" src="{{ asset('assets/img/' . (!empty($single->image) ? $single->image : 'default.jpg')) }}" alt="Card image cap">
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
</script>
    </main><!-- End #main -->

@include('layouts.footerwithnosidebar');