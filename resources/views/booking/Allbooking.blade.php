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
                </div>
             </div>

            <div class="card-body table-responsive view-all-order-table">
              <table class="table table-borderless allorder-table" id="booking_table">
                  <thead>
                    <tr>
                      <th scope="col">Sr no.</th>
                      <th data-type="date" data-format="DD/MM/YYYY">Date Issued</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Attraction</th>
                      <th scope="col">Price</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i=1;
                    foreach($booking_data as $sinle_book){
                    ?>

                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{ $sinle_book->created_at->format('Y-m-d') ?? 'NA' }}</td>
                      <td>{{$sinle_book->user->name ?? 'NA'}}</td>
                      <td>{{$sinle_book->attrName ?? 'NA'}}</td>
                      <td>{{$sinle_book->local_amt ?? 'NA'}}</td>
                      <td>
                        <div class="d-flex justify-content-around align-items-center">
                          <div class="viewbooking p-1">
                            <a href="{{ route(session('prefix', 'agent') . '.view_booking' ,['id'=>$sinle_book->id]) }}">
                              <button type="button" class="btn btn-primary"><i class='ri-eye-line'></i></button>
                            </a>
                          </div>
                        </div>
                      </td>
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