@include('layouts.header');
@include('layouts.sidebar');

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Attraction</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">All Attraction</li>
          </ol>
        </nav>
      </div>
    </div>
    </div><!-- End Page Title -->
   
    <section class="section" id="attr001">
      <div class="row ">
        <div class="col-lg-12">

          <div class="card">
            
             <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Attraction</h5>
                  </div>
                  
                </div>
             </div>

            <div class="card-body view-attraction-table table-responsive">
                          <!-- Table with stripped rows -->
                          
                <!-- <div class="datatable-top">
                  <div class="datatable-dropdown">
                      <label>
                        <select class="datatable-selector">
                            <option value="">Attraction Name</option>
                            <option value="" selected="">Opening Date</option>
                            <option value="">Booking</option>
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
                
              <table class="table table-borderless attraction-table" id="attractiontable">
             
                <thead>
                  <tr>
                    <th> Sr. No. </th>
                    <th>
                      Attraction Image
                    </th>
                    <th>Atrraction Name</th>
                    <th data-type="date" data-format="DD/MM/YYYY">Opening Date</th>
                    <th>Duration</th>
 
                    <th>Country</th>
                    <!-- <th>Bookings</th> -->
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i= 1; ?>
             @foreach($attraction_data as $single_att)
             <?php $ff = json_decode($single_att->fields); 
            //  print_r($single_att->fields); die;
             ?>

                  <tr>
                    <td>{{$i++}}</td>
                    
                    <td>
                      <div class="attr-thumbnail">
                      <img src="{{ asset('assets/img/' . (!empty($single_att->image) ? $single_att->image : 'default.jpg')) }}" height="100" width="100">
                      </div>
                    </td>
                    <td>{{$single_att->name}}</td>
                    <td>{{$ff->opening_date}}</td>
                    <td>{{$ff->duration}}</td>
                    <td>{{$single_att->country}}</td>
                    <!-- <td>16</td> -->
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="viewattr p-1">
                          <a href="viewattraction.php">
                            <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                    </td>
                  </tr>

                 @endforeach
                  
                 
                  
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
    $('#attractiontable').DataTable();
});
</script>