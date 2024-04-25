@include('layouts.header');
@include('layouts.sidebar');

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>View Attraction</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
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
                          <a href="{{ route(session('prefix', 'agent') . '.all_attraction') }}"> Back </a></h5>
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
                          <img src="{{ asset('assets/img/' . (!empty($attraction_single->image) ? $attraction_single->image : 'default.jpg')) }}" width="300px;">
                    </div>               

                </div>

                <div class="col-lg-8 col-sm-12">

                  <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                      <i class="bi bi-person-circle" aria-hidden="true"></i><label class="form-label" for="inputNanme05"> <b class="m-1">  Attraction Name: </b></label> {{$attraction_single->name}}    
                     </div>
                       <?php $field_data= json_decode($attraction_single->fields) ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-calendar-check-fill" aria-hidden="true"></i>
                      <label class="form-label" for="inputNanme4"> <b class="m-1"> Opening Date: </b> {{$field_data->opening_date}}
                    </label> 
                     </div>
                  </div>
              <hr>
              <div class="row">
                                            
                
                  <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-calendar-check-fill" aria-hidden="true"></i><label class="form-label" for=""> <b class="m-1">  Duration:</b></label> {{$field_data->duration}}  
                   </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-cash" aria-hidden="true"></i>
                        <label class="form-label" for=""> <b class="m-1"> Price: </b> {{$attraction_single->display_final}}
                        </label>
                     </div>
                 
              </div>
              <hr>
              <div class="row">
                                                
                   <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-geo-alt-fill" aria-hidden="true"></i><label class="form-label" for=""> <b class="m-1">Location: </b></label> {{$field_data->city}}   
                   </div>

                   <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-cart-check-fill" aria-hidden="true"></i>
                  <label class="form-label" for="inputNanme4"> <b class="m-1"> Bookings: </b> {{$field_data->booking}}
                  </label>
                </div>
                 
              </div>

              <hr>
              <div class="row">

                   <!-- <div class="col-lg-12 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-geo-alt-fill" aria-hidden="true"></i><label class="form-label" for=""> <b>Location: </b></label> Dargling, India   
                   </div>
 -->
                   <div class="col-lg-12 col-md-12 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-list-ul" aria-hidden="true"></i>
                  <label class="form-label" for="inputNanme4"> <b class="m-1"> Description: </b> {{$field_data->description}}
                  </label>
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
             
             
            </form>            </div>

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

              </div></div>

              </div>
            </div>
        </div>
      </div>
    </section>
         <!-- End Card with an image on left -->

  </main><!-- End #main -->

include('layouts.footer');