@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Agents</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">All Agents</li>
          </ol>
        </nav>
      </div>
    </div>
  </div><!-- End Page Title -->

  <section class="section" id="userapp01">
    <div class="row ">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">All Agents</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="{{ route(session('prefix', 'agent') . '.add_agent') }}"> Add Agent </a>
                </h5>
              </div>
            </div>
          </div>

          <div class="card-body allappuser-table table-responsive">
            <!-- Table with stripped rows -->

            <!-- <div class="datatable-top">
              <div class="datatable-dropdown">
                <label>
                  <select class="datatable-selector">
                    <option value="">Agent Name</option>
                    <option value="" selected="">Credit Limit</option>
                    <option value="">Balance</option>
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

            <table class="table table-borderless appuser-table" id="agenttable">
              <!-- <table class="table datatable table-bordered supplier-table"> -->
              <thead>
                <tr>
                  <th> Sr. No. </th>
                  <th>
                      Agent Image
                    </th>
                  <th> Agents Name</th>
                  <th>Email Address</th>
                  <!-- <th>Credit Limit</th> -->
                  <th>Credit Balance</th>
                  <th>Status</th>
                  <th>Action</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
                @foreach($agent_data as $singledata)
                <tr>
                  <td>{{$i++}}</td>

                  <td>
                      <div class="user-thumbnail">
                        <!-- <img src="{{ $singledata->profile ? asset('assets/img/' . ($singledata->profile) ): asset('assets/img/default.jpg')  }}"> -->
                        <img src="{{ asset('assets/img/' . (!empty($singledata->profile) ? $singledata->profile : 'default.jpg')) }}" height="100" width="100">

                      </div>
                    </td>
                  <td>{{$singledata->name}}</td>
                  <td>{{$singledata->email}}</td>
                  <!-- <td>SDG 543210</td> -->
                  <td>{{$singledata->credit_balance}}</td>
                  <td>
                  <select class="agent_status custom-select btn <?php if($singledata->status==1){echo "btn-success";}elseif($singledata->status==2){echo"btn-danger";}elseif($singledata->status==0){echo"btn-warning";}?>" data-id="<?php echo $singledata->id;?>">
                            <!--<option selected>Choose...</option>-->
                            <?php 
                            if($singledata->status==0){ ?>
                            <option value="0" <?php if($singledata->status==0){ echo "selected";} ?>>Pending</option>
                            <option value="1" <?php if($singledata->status==1){ echo "selected";} ?>>Active</option>
                            <option value="2" <?php if($singledata->status==2){ echo "selected";} ?>>Inactive</option>
                            <?php }else{ ?>
                              <option value="1" <?php if($singledata->status==1){ echo "selected";} ?>>Active</option>
                            <option value="2" <?php if($singledata->status==2){ echo "selected";} ?>>Inactive</option>
                           <?php  } ?>
                         
                        </select>
                  </td>
                  <td>
                    <div class="d-flex justify-content-around align-items-center"> 
                      <div class="edituser p-1">
                        <a href="{{ route('admin.editagent', ['id' => $singledata->id]) }}">
                          <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                        </a>
                      </div>
                      <div class="viewsuser p-1">
                        <a href="{{ route('admin.viewagent', ['id' => $singledata->id]) }}">
                          <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                        </a>
                      </div>
                      <div class="deletuser p-1">
                   
                     
                        <button type="button" class="btn btn-danger agent_delete" data-id="{{$singledata->id}}"><i class="ri-delete-bin-line"></i></button>
                        
                      </div>
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
    $('#agenttable').DataTable();
});
</script>