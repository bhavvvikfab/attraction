@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Topup</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Topup</li>
          </ol>
        </nav>
      </div>
    </div>
  </div><!-- End Page Title -->

  <section class="section" id="topup001">
    <div class="row ">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">Topup</h5>
              </div>
              <!-- <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="addsupllider.php"> Add New Supplier </a></h5>
                  </div> -->
            </div>
          </div>



          <div class="card-body view-top-table table-responsive">

            <div class="">

              <div class="row p-2">
                <div class="col-lg-4">
                  <form>
                    <div class="form-group">
                      <h5><label for="num2">Top Up Amt</label></h5>
                      <input type="number" class="form-control" id="num2" placeholder="">
                    </div>
                  </form>
                  <!--<h5 class="font-weight-bold pt-2">Payment Service Fees</h5>-->
                  <!--<h5 class="pt-2"> Credit Card </h5>-->
                  <button class="btn-primary btn mt-2 mb-5"> Instant Top Up</button>

                </div>
              </div>

            </div>
            <!-- Table with stripped rows -->
            <!--  <div class="datatable-top">
                    <div class="datatable-dropdown">
                        <label>
                           <select class="datatable-selector">
                            <option value="5">5</option>
                            <option value="10" selected="">10</option>
                            <option value="15">15</option>
                            <option value="-1">All</option>
                          </select> entries per page
                        </label>
                    </div>
                    <div class="datatable-search">
                      <input class="datatable-input" placeholder="Search..." type="search" title="Search within table">
                    </div>
                </div> -->
            <div class="datatable-container">
              <table class="table table-borderless datatable top-table">
                <!-- <table class="table datatable table-bordered supplier-table"> -->
                <thead>
                  <tr>
                    <th> Sr. No. </th>
                    <th>
                      Request No.
                    </th>
                    <th data-type="date" data-format="DD/MM/YYYY">Request Date</th>

                    <th>Amount</th>
                    <th>Status</th>
                    <th></th>

                  </tr>
                </thead>

                <tbody>

                  <tr>
                    <td>1</td>
                    <td> 487977987 </td>
                    <td>23/03/2022</td>
                    <td>1159</td>
                    <td>
                      <button type="button" class="btn btn-warning">Pending</button>
                    </td>
                    <td><button type="button" class="btn btn-primary">Payment Link</button></td>
                  </tr>

                  <tr>
                    <td>2</td>
                    <td> 487977987 </td>
                    <td>23/03/2022</td>
                    <td>1159</td>
                    <td>
                      <button type="button" class="btn btn-success">Success</button>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td>3</td>
                    <td> 487977987 </td>
                    <td>23/03/2022</td>
                    <td>1159</td>
                    <td>
                      <button type="button" class="btn btn-success">Success</button>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td>4</td>
                    <td> 487977987 </td>
                    <td>23/03/2022</td>
                    <td>1159</td>
                    <td>
                      <button type="button" class="btn btn-warning">Pending</button>
                    </td>
                    <td><button type="button" class="btn btn-primary">Payment Link</button></td>
                  </tr>

                  <tr>
                    <td>5</td>
                    <td> 487977987 </td>
                    <td>23/03/2022</td>
                    <td>1159</td>
                    <td>
                      <button type="button" class="btn btn-success">Success</button>
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td>6</td>
                    <td> 487977987 </td>
                    <td>23/03/2022</td>
                    <td>1159</td>
                    <td>
                      <button type="button" class="btn btn-danger">Rejected</button>
                    </td>
                    <td></td>

                    <!-- <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="editsup p-1">
                          <a href="editsupplier.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsup p-1">
                          <a href="viewsupplier.php">
                            <button type="button" class="btn btn-primary"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deletsup p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning">Pending</button>
                    </td> -->
                  </tr>



                </tbody>
              </table>
            </div>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>


</main><!-- End #main -->

@include('layouts.footer');