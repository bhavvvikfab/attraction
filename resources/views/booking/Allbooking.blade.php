@include('layouts.header');
@include('layouts.sidebar');

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Booking</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">All Booking</li>
          </ol>
        </nav>
      </div>
    </div>
    </div><!-- End Page Title -->
   
    <section class="section" id="book509">
      <div class="row ">
        <div class="col-lg-12">

          <div class="card">
            
             <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Booking</h5>
                  </div>
                  <!-- <div class="col-lg-4">
                      <h5 class="card-title text-end">
                          <a href="addneworder.php"> Add New Booking </a></h5>
                  </div> -->
                </div>
             </div>

            <div class="card-body table-responsive view-all-order-table">
                          <!-- Table with stripped rows -->
              <!--<table class="table datatable table table-borderless datatable datatable-table allorder-table">-->

                <!-- <div class="datatable-top">
                  <div class="datatable-dropdown">
                      <label>
                        <select class="datatable-selector">
                            <option value="">Transaction Id</option>
                            <option value="" selected="">Product</option>
                            <option value="">Status</option>
                            <option value="-1">All</option></select> Search
                      </label>
                      </div>
                  <div class="datatable-search">
                          <input class="datatable-input" placeholder="Enter Keyword" type="search" title="Search within table">

                         <button class="btn search-button text-white" placement="top" type="submit"> Search
                          
                      </span>
                    </button>
                  </div>
                </div> -->

              <table class="table table-borderless allorder-table" id="booking_table">
                  <thead>
                    <tr>
                      <th scope="col">Sr no.</th>
                      <!-- <th scope="col">Transaction Id</th> -->
                      <th data-type="date" data-format="DD/MM/YYYY">Date Issued</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Attraction</th>
                      <th scope="col">Price</th>
                      <!-- <th scope="col">Action</th> -->
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i=1;
                    foreach($booking_data as $sinle_book){

                    // print_r($sinle_book->created_at);
                    ?>
                    <tr>
                      <td>{{$i++}}</td>
                      <!-- <td scope="row"><a href="#">#2457</a></td> -->
                      <td>{{ $sinle_book->created_at->format('Y-m-d') ?? 'NA' }}</td>
                      <td>{{$sinle_book->user->name ?? 'NA'}}</td>
                      <td>{{$sinle_book->attraction->name ?? 'NA'}}</td>
                      <td>{{$sinle_book->amount ?? 'NA'}}</td>
                      <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="viewbooking p-1">
                          <a href="{{ route(session('prefix', 'agent') . '.view_booking' ,['id'=>$sinle_book->id]) }}">
                            <button type="button" class="btn btn-primary"><i class='ri-eye-line'></i></button>
                          </a>
                        </div>
                        
                        <!-- <div class="deletbooking p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div> -->
                      </div>
                    </td>
                    <!-- <td>
                        <button type="button" class="btn btn-success">Approve</button>
                        
                    </td> -->
                    </tr>
                    
                    <?php } ?>
                  </tbody>
                </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->

  @include('layouts.footer');
  <script>
$(document).ready(function() {
    $('#booking_table').DataTable();
});
</script>