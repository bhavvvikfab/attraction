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
            <div class="datatable-top">
              <div class="datatable-dropdown">
                <label>
                  <select class="datatable-selector">
                    <option value="">Attraction Name</option>
                    <option value="" selected="">Quality</option>
                    <option value="">Order Date</option>
                    <option value="-1">All</option>
                  </select> Search
                </label>
              </div>
              <div class="datatable-search">
                <input class="datatable-input" placeholder="Enter Keyword" type="search" title="Search within table">

                <button class="btn search-button text-white" placement="top" type="submit"> Search
                  <!-- <span>
                        <i class="bi bi-search mx-2" style="color:white;"></i> -->

                </button>
              </div>
            </div>

            <table class="table table-borderless invoice-table">
              <!-- <table class="table datatable table-bordered supplier-table"> -->
              <thead>
                <tr>
                  <th> Sr. No. </th>
                  <th>
                    Transaction Id
                  </th>
                  <th>Product Name</th>
                  <th>Customer Name</th>
                  <!-- <th>Email</th> -->
                  <th>Quantity</th>
                  <th>Price Per Unit</th>
                  <th data-type="date" data-format="YYYY/DD/MM">Order Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>#2457 </td>
                  <td>Tiger Hills, Dargling</td>
                  <td>Brandon Jacob</td>
                  <td>2</td>
                  <td>$159</td>
                  <td>23/03/2022</td>
                  <td>
                    <div class="d-flex justify-content-around align-items-center">
                      <div class="viewinc">
                        <a href="viewsingleinvoice.php">
                          <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                        </a>
                      </div>
                      <!-- <div class="deletinc">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div> -->
                    </div>
          </div>
          </td>
          </tr>

          <tr>
            <td>2</td>
            <td>#2457 </td>
            <td>Tiger Hills, Dargling</td>
            <td>Brandon Jacob</td>
            <td>1</td>
            <td>$159</td>
            <td>23/03/2022</td>
            <td>
              <div class="d-flex justify-content-around align-items-center">
                <div class="viewsinc">
                  <a href="viewsingleinvoice.php">
                    <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                  </a>
                </div>

              </div>
            </td>
          </tr>

          <tr>
            <td>3</td>
            <td>#2457 </td>
            <td>Tiger Hills, Dargling</td>
            <td>Brandon Jacob</td>
            <td>2</td>
            <td>$159</td>
            <td>23/03/2022</td>
            <td>
              <div class="d-flex justify-content-around align-items-center">
                <div class="viewsinc">
                  <a href="viewsingleinvoice.php">
                    <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                  </a>
                </div>

              </div>
            </td>
          </tr>

          <tr>
            <td>4</td>
            <td>#2457 </td>
            <td>Tiger Hills, Dargling</td>
            <td>Brandon Jacob</td>
            <td>2</td>
            <td>$159</td>
            <td>23/03/2022</td>
            <td>
              <div class="d-flex justify-content-around align-items-center">
                <div class="viewsinc">
                  <a href="viewsingleinvoice.php">
                    <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                  </a>
                </div>

            </td>
          </tr>

          <tr>
            <td>5</td>
            <td>#2457 </td>
            <td>Tiger Hills, Dargling</td>
            <td>Brandon Jacob</td>
            <td>2</td>
            <td>$159</td>
            <td>23/03/2022</td>
            <td>
              <div class="d-flex justify-content-around align-items-center">
                <div class="viewsinc">
                  <a href="viewsingleinvoice.php">
                    <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                  </a>
                </div>
              </div>

            </td>
          </tr>

          <tr>
            <td>6</td>
            <td>#2457 </td>
            <td>Tiger Hills, Dargling</td>
            <td>Brandon Jacob</td>
            <td>2</td>
            <td>$159</td>
            <td>23/03/2022</td>
            <td>
              <div class="d-flex justify-content-around align-items-center">
                <div class="viewsinc">
                  <a href="viewsingleinvoice.php">
                    <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                  </a>
                </div>


              </div>
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