@include('layouts.header');
@include('layouts.sidebar');
<!-- jQuery (necessary for DataTables and Daterangepicker) -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Moment.js (necessary for Daterangepicker) -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<!-- Daterangepicker CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Daterangepicker JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>

<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>



<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Reports</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Reports</li>
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
                <h5 class="card-title text-start">Reports</h5>
              </div>
              <!--<div class="col-lg-4">-->
              <!--    <h5 class="card-title text-end addsup">-->
              <!--        <a href="addsupllider.php"> Add Supplier </a></h5>-->
              <!--</div>-->
            </div>
          </div>

          <div class="card-body admin-invoice-table table-responsive">
            <!-- Table with stripped rows -->
            

            <table class="table table-borderless invoice-table" id="report_table">
              <div class="row">
                <div class="col-lg-4 mb-2">
                  <label for="">DateRange</label>
                  <!-- <input type="date" class="form-control" id="search_date"> -->
                  <input type="text" class="form-control" placeholder="Select" id="search_date_range">
                </div>
                <?php  if(session('prefix')=='admin'){
                 
                  
                  ?>
               <div class="col-lg-4 mb-2">
                <label for="">Agent</label>
                <select class="form-select" id="agent_filter" aria-label="Default select example">
                <option value="">All Agents</option> <?php foreach ($report_agents as $key => $single_agent) { ?>
                    <option value="{{ $single_agent->customer_id }}">{{ $single_agent->user->name }}</option>
                  <?php } ?>
                </select>
    </div>
                <?php  } ?>
              </div>
              <!-- <div class="col-lg-4 mb-2">
              <label for="">date</label>

              </div> -->
              <!-- <table class="table datatable table-bordered supplier-table"> -->
              <thead>
                <tr>
                  <th> Sr. No. </th>
                  <th>
                    Booking Id
                  </th>
                  <th>Attraction Name</th>
                  <!-- <th>Agent Name</th> -->
                   
                  @if (session('prefix') == 'admin')
                  <th>Agent</th>
                  @endif
                  
                  <th>Option</th>
                  <th>Ticket</th>
                  <th>Price</th>
                  <th>Count</th>
                  <th>Date</th>
                  <!-- <th>Quantity</th>
                  <th>Price Per Unit</th>
                  <th data-type="date" data-format="YYYY/DD/MM">Order Date</th> -->
                  <!-- <th>Action</th> -->
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





$(document).ready(function() {
  // Initialize the date range picker
  $('#search_date_range').daterangepicker({
    autoUpdateInput: false,
    locale: {
      cancelLabel: 'Clear'
    }
  });

  $('#search_date_range').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    table.draw(); // Redraw table on date range change
  });

  $('#search_date_range').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
    table.draw(); // Redraw table on date range clear
  });

  var columns = [
    { data: null, name: 'sr_no', searchable: false, orderable: false },
    { data: 'booking_id', name: 'booking_id' },
    { data: 'attraction_name', name: 'attraction_name', orderable: false },
    { data: 'option_name', name: 'option_name', orderable: false},
    { data: 'ticket_name', name: 'ticket_name', orderable: false},
    { data: 'agent_price', name: 'agent_price', orderable: false},
    { data: 'count', name: 'count', orderable: false, searchable: false },
    { data: 'date2', name: 'date2', orderable: false },
    
  ];

  @if (session('prefix') == 'admin')
    columns.splice(3, 0, { data: 'agent_name', name: 'agent_name' });
  @endif

  var table = $('#report_table').DataTable({
    searchBuilder: true,
    processing: true,
    serverSide: true,
    ajax: {
      url: '{{ route('report.get_report_data') }}',
      data: function(d) {
        d.search_date_range = $('#search_date_range').val(); // Add search date range to request data
        d.agent_id = $('#agent_filter').val();
      }
    },
    rowCallback: function(row, data, index) {
      $('td:eq(0)', row).html(index + 1); // Set the first column to the row number (starting from 1)
    },
    columns: columns
  });

  $('#agent_filter').change(function() {
    table.draw(); // Redraw table on agent filter change
  });
});
</script>