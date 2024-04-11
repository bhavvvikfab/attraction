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
                          <a href="{{url('add_agent')}}"> Add Agent </a></h5>
                  </div>
                </div>
             </div>

            <div class="card-body allappuser-table table-responsive">
                          <!-- Table with stripped rows -->
                          
                <div class="datatable-top">
                  <div class="datatable-dropdown">
                      <label>
                        <select class="datatable-selector">
                            <option value="">Agent Name</option>
                            <option value="" selected="">Credit Limit</option>
                            <option value="">Balance</option>
                            <option value="-1">All</option></select> Search
                      </label>
                      </div>
                  <div class="datatable-search">
                          <input class="datatable-input" placeholder="Enter Keyword" type="search" title="Search within table">

                         <button class="btn search-button text-white" placement="top" type="submit"> Search
                          <!-- <span>
                        <i class="bi bi-search mx-2" style="color:white;"></i> -->
                      </span>
                    </button>
                  </div>
                </div>
                          
              <table class="table table-borderless appuser-table">
              <!-- <table class="table datatable table-bordered supplier-table"> -->
                <thead>
                  <tr>
                    <th> Sr. No. </th>
                    <!-- <th>
                      Agent Image
                    </th> -->
                    <th> Agents Name</th>
                    <th>Email Address</th>
                    <th>Credit Limit</th>
                    <th>Credit Balance</th>
                    <th>Action</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    
                    <!-- <td>
                      <div class="user-thumbnail">
                        <img src="assets/img/josh-d-avatar.jpg">
                      </div>
                    </td> -->
                    <td>Krishna</td>
                    <td>kr123@gmail.com</td>
                    <td>SDG 543210</td>
                    <td>SDG 250</td>
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="edituser p-1">
                          <a href="editagent.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsuser p-1">
                          <a href="viewagentdetail.php">
                            <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deletuser p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success">Approve</button>
                        <!--<span class="badge text-success">Approved</span>-->
                    </td>
                  </tr>

                  <tr>
                    <td>2</td>
                    <td>Theodore</td>
                    <td>th123@gmail.com</td>
                    <td>SDG 543210</td>
                    <td>SDG 250</td>
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="edituser p-1">
                          <a href="editagent.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsuser p-1">
                          <a href="viewagentdetail.php">
                            <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deletuser p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning">Pending</button>
                        <!--<span class="badge text-success">Approved</span>-->
                    </td>
                  </tr>

                  <tr>
                    <td>3</td>
                    <td>Kristan</td>
                    <td>krt123@gmail.com</td>
                    <td>SDG 543210</td>
                    <td>SDG 250</td>
                   <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="edituser p-1">
                          <a href="editagent.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsuser p-1">
                          <a href="viewagentdetail.php">
                            <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deletuser p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success">Approve</button>
                        <!--<span class="badge text-success">Approved</span>-->
                    </td>
                  </tr>

                  <tr>
                    <td>4</td>
                    <td>Yug</td>
                    <td>yug123@gmail.com</td>
                    <td>SDG 543210</td>
                    <td>SDG 250</td>
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="edituser p-1">
                          <a href="editagent.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsuser p-1">
                          <a href="viewagentdetail.php">
                            <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deletuser p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger">Rejected</button>
                        <!--<span class="badge text-success">Approved</span>-->
                    </td>
                  </tr>

                  <tr>
                    <td>5</td>
                    <td>Riddhi</td>
                    <td>rm123@gmail.com</td>
                    <td>SDG 543210</td>
                    <td>SDG 250</td>
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="edituser p-1">
                          <a href="editagent.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsuser p-1">
                          <a href="viewagentdetail.php">
                            <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deletuser p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success">Approve</button>
                        <!--<span class="badge text-success">Approved</span>-->
                    </td>
                  </tr>

                  <tr>
                    <td>6</td>
                    <td>Teju</td>
                    <td>teju123@gmail.com</td>
                    <td>SDG 543210</td>
                    <td>SDG 250</td>
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="edituser p-1">
                          <a href="editagent.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsuser p-1">
                          <a href="viewagentdetail.php">
                            <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deletuser p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success">Approve</button>
                        <!--<span class="badge text-success">Approved</span>-->
                    </td>
                  </tr>

                  
                  
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