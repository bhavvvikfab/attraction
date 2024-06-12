@include('layouts.header');
@include('layouts.sidebar');

<!-- jQuery (necessary for DataTables and Daterangepicker) -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>





<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>

<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Chat Messages</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Chat Messages</li>
          </ol>
        </nav>
      </div>
    </div>
  </div><!-- End Page Title -->

  <section class="section" id="chatpage421">
    <div class="row ">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">Chat Messages</h5>
              </div>
              <!--<div class="col-lg-4">-->
              <!--    <h5 class="card-title text-end addsup">-->
              <!--        <a href="addappuser.php"> Add User </a></h5>-->
              <!--</div>-->
            </div>
          </div>

          <div class="card-body view-chat-admin table-responsive ">
            <!-- Table with stripped rows -->
            <!-- <div class="datatable-top">
              <div class="datatable-dropdown">
                <label>
                  <select class="datatable-selector">
                    <option value="">Customer Name</option>
                    <option value="" selected="">Staff Name</option>
                    
                    <option value="-1">All</option>
                  </select> Search
                </label>
              </div>
              <div class="datatable-search">
                <input class="datatable-input" placeholder="Enter Keyword" type="search" title="Search within table">

                <button class="btn search-button text-white" placement="top" type="submit"> Search
                

                </button>
              </div>
            </div> -->
            <table class="table table-borderless chat-table-admin" id="chat-admin-table2">
              
              <thead>
                <tr>
                  <th> Sr. No. </th>
                  <th>
                     Name
                  </th>
                  <!-- <th>Agent Name</th> -->
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php $i=1;@endphp
              @foreach ($chatusers as $user)
                <tr>
                  <td>{{$i++}}</td>

                  <td>
                    {{$user->name}}
                  </td>
                  <!-- <td>Krishna</td> -->
                  <td>{{$user->email}}</td>
                  <td>{{$user->phone}}</td>
                  <td>
                    <div class="viewchat">
                      <a href="{{ route(session('prefix', 'agent') . '.chat.view' ,['id'=>$user->id]) }}">
                        <!-- <button type="button" class="btn btn-primary"><i class="bi bi-chat-dots-fill"></i> Chat </button> -->
                       <button class="chat-button btn btn-primary" data-user-id="{{ $user->id }}">Chat</button>
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
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
<script>
        $(document).ready(function() {
          console.log('hhh');
            $('#chat-admin-table2').DataTable();

        });
    </script>