@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Invoice</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Invoice</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <section class="section" id="invoice347">
    <div class="row ">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">Invoice</h5>
              </div>
              <!--<div class="col-lg-4">-->
              <!--    <h5 class="card-title text-end addsup">-->
              <!--        <a href="addsupllider.php"> Add Supplier </a></h5>-->
              <!--</div>-->
            </div>
          </div>

          <div class="card-body admin-invoice-table table-responsive">
            <!-- Table with stripped rows -->
            

            <table class="table table-borderless invoice-table" id="invoice_table">
              <div class="row">
                <div class="col-lg-4 mb-2">
                  <label for="">Date</label>
                  <input type="date" class="form-control" id="search_date">
                </div>
                <?php  if(session('prefix')=='admin'){
                 
                  
                  ?>
               <div class="col-lg-4 mb-2">
                <label for="">Agent</label>
                <select class="form-select" id="agent_filter" aria-label="Default select example">
                  <option value="">All Agents</option> <?php foreach ($invo as $key => $single_invo) { ?>
                    <option value="{{ $single_invo->agent_id }}">{{ $single_invo->agent_details->name }}</option>
                  <?php } ?>
                </select>
    </div>
                <?php  } ?>
              </div>
              <!-- <table class="table datatable table-bordered supplier-table"> -->
              <thead>
                <tr>
                  <th> Sr. No. </th>
                  <th>
                    Invoice No
                  </th>
                  <th>BookingID</th>
                  <th>Date</th>
                  <!-- <th>Email</th> -->
                  <!-- <th>Quantity</th>
                  <th>Price Per Unit</th>
                  <th data-type="date" data-format="YYYY/DD/MM">Order Date</th> -->
                  <th>Action</th>
                </tr>
             
              </thead>
              
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
// $(document).ready(function() {
//     $('#invoice_table').DataTable();
// });
</script>
<script>
// $(document).ready(function() {
//     // $('#attractiontable').DataTable();
//     $('#invoice_table').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: '{{ route('invoice.get_invoice_data') }}',
//         columns: [
//             { data: 'id', name: 'id' },
//             { data: 'invoice_no', name: 'invoice_no'},
//             { data: 'booking_id', name: 'booking_id',searchable: false },
//             // { data: 'invoice_status', name: 'invoice_status' },
//             { data: 'action', name: 'action', orderable: false, searchable: false },
            
//         ]
//     });
    
// });


// $(document).ready(function() {
//     // Setup - add a text input to each header cell
//     $('#invoice_table thead tr:eq(1) th').each(function(i) {
//         if (i !== 0 && i !== 3 && i !== 4) { // Skip Sr. No, Status, and Action columns
//             var title = $('#invoice_table thead tr:eq(0) th').eq(i).text();
//             $(this).html('<input type="text" placeholder="Search ' + title + '" />');
//         }
//     });

//     // DataTable
//     var table = $('#invoice_table').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: '{{ route('invoice.get_invoice_data') }}',
//         columns: [
//             { data: 'id', name: 'id' },
//             { data: 'invoice_no', name: 'invoice_no' },
//             { data: 'booking_id', name: 'booking_id' },
//             // { data: 'invoice_status', name: 'invoice_status' },
//             { data: 'action', name: 'action', orderable: false, searchable: false }
//         ],
//         initComplete: function() {
//             // Apply the search
//             this.api().columns().every(function(i) {
//                 if (i !== 0 && i !== 3 && i !== 4) { // Skip Sr. No, Status, and Action columns
//                     var that = this;
//                     $('input', this.header()).on('keyup change', function() {
//                         if (that.search() !== this.value) {
//                             that.search(this.value).draw();
//                         }
//                     });
//                 }
//             });
//         }
//     });
// });



$(document).ready(function() {
  var table = $('#invoice_table').DataTable({
    searchBuilder: true,
    processing: true,
    serverSide: true,
    ajax: {
      url: '{{ route('invoice.get_invoice_data') }}',
      data: function(d) {
        d.search_date = $('#search_date').val(); // Add search date to request data
        d.agent_id = $('#agent_filter').val();
      }
    },
    columns: [
      { data: 'id', name: 'id' },
      { data: 'invoice_no', name: 'invoice_no' },
      { data: 'booking_id', name: 'booking_id', searchable: false },
      { data: 'date2', name: 'date2',orderable: false, searchable: false  }, // Add back if needed
      { data: 'action', name: 'action', orderable: false, searchable: false },
    ]
  });

  $('#search_date,#agent_filter').change(function() {
    // alert($(this).val());
    table.draw(); // Redraw table on date change
  });
});
</script>