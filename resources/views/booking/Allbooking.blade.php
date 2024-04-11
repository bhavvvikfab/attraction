@include('layouts.header');
@include('layouts.sidebar');

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Booking</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
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

                <div class="datatable-top">
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
                          <!-- <span>
                        <i class="bi bi-search mx-2" style="color:white;"></i> -->
                      </span>
                    </button>
                  </div>
                </div>

              <table class="table table-borderless allorder-table">
                  <thead>
                    <tr>
                      <th scope="col">Sr no.</th>
                      <th scope="col">Transaction Id</th>
                      <th data-type="date" data-format="DD/MM/YYYY">Date Issued</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Product</th>
                      <th scope="col">Code</th>
                      <th scope="col">Action</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td scope="row"><a href="#">#2457</a></td>
                      <td>13/05/2023</td>
                      <td>Brandon Jacob</td>
                      <td><a href="#" class="prlink">At praesentium minu</a></td>
                      <td>12364</td>
                      <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="viewbooking p-1">
                          <a href="viewbookingdetail.php">
                            <button type="button" class="btn btn-primary"><i class='ri-eye-line'></i></button>
                          </a>
                        </div>
                        
                        <div class="deletbooking p-1">
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
                      <td scope="row"><a href="#">#2147</a></td>
                      <td>13/05/2023</td>
                      <td>Bridie Kessler</td>
                      <td><a href="#" class="prlink">Blanditiis dolor omnis similique</a></td>
                      <td>555247</td>
                      <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="viewbooking p-1">
                          <a href="viewbookingdetail.php">
                            <button type="button" class="btn btn-primary"><i class='ri-eye-line'></i></button>
                          </a>
                        </div>
                        
                        <div class="deletbooking p-1">
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
                      <td scope="row"><a href="#">#2049</a></td>
                      <td>13/05/2023</td>
                      <td>Ashleigh Langosh</td>
                      <td><a href="#" class="prlink">At recusandae consectetur</a></td>
                      <td>112147</td>
                      <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="viewbooking p-1">
                          <a href="viewbookingdetail.php">
                            <button type="button" class="btn btn-primary"><i class='ri-eye-line'></i></button>
                          </a>
                        </div>
                        
                        <div class="deletbooking p-1">
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
                      <td>4</td>
                      <td scope="row"><a href="#">#2644</a></td>
                      <td>13/05/2023</td>
                      <td>Angus Grady</td>
                      <td><a href="#" class="prlink">Ut voluptatem id earum et</a></td>
                      <td>56567</td>
                      <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="viewbooking p-1">
                          <a href="viewbookingdetail.php">
                            <button type="button" class="btn btn-primary"><i class='ri-eye-line'></i></button>
                          </a>
                        </div>
                        
                        <div class="deletbooking p-1">
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
                      <td>5</td>
                      <td scope="row"><a href="#">#2644</a></td>
                      <td>13/05/2023</td>
                      <td>Raheem Lehner</td>
                      <td><a href="#" class="prlink">Sunt similique distinctio</a></td>
                      <td>42165</td>
                      <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="viewbooking p-1">
                          <a href="viewbookingdetail.php">
                            <button type="button" class="btn btn-primary"><i class='ri-eye-line'></i></button>
                          </a>
                        </div>
                        
                        <div class="deletbooking p-1">
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
                      <td>6</td>
                      <td scope="row"><a href="#">#2644</a></td>
                      <td>13/05/2023</td>
                      <td>Raheem Lehner</td>
                      <td><a href="#" class="prlink">Sunt similique distinctio2</a></td>
                      <td>144165</td>
                      <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="viewbooking p-1">
                          <a href="viewbookingdetail.php">
                            <button type="button" class="btn btn-primary"><i class='ri-eye-line'></i></button>
                          </a>
                        </div>
                        
                        <div class="deletbooking p-1">
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