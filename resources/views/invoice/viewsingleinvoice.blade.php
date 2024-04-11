@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Invoice Detail</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Invoice Detail</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- End Page Title -->

  <!-- Card with an image on left -->
  <section class="section" id="viewsignleinvoicel21">
    <div class="row ">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">Invoice Detail</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end ">
                  <a href="Admininvoice.php"> Back </a>
                </h5>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="table-responsive">
              <form class="m-3">
                <div class="row">

                  <div class="col-lg-4 col-sm-12">

                    <i class="bi bi-image" aria-hidden="true"></i>
                    <label class="form-label" for="inputNanme4"> <b> Product Image: </b>
                    </label>
                    <div class="attraction-thumbnail">
                      <img src="assets/img/tourist-places-in-shillong.jpg" width="300px;">
                    </div>

                  </div>

                  <div class="col-lg-8 col-sm-12">

                    <div class="row">

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-person-badge" aria-hidden="true"></i><label class="form-label" for="inputNanme05"> <b> Transaction Id: </b></label> #2457
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-calendar-check-fill" aria-hidden="true"></i>
                        <label class="form-label" for="inputNanme4"> <b> Order Date: </b> 23/03/2022
                        </label>
                      </div>
                    </div>
                    <hr>
                    <div class="row">


                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-person-circle" aria-hidden="true"></i>
                        <label class="form-label" for="inputNanme05"> <b> Customer Name: </b></label>Unity Pugh
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-envelope-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b> Email:</b></label>mail123@gmail.com
                      </div>

                    </div>
                    <hr>
                    <div class="row">

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-card-heading" aria-hidden="true"></i> <label class="form-label" for="inputNanme05"> <b> Product: </b></label>Tiger Hills, Dargling
                      </div>


                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-cash" aria-hidden="true"></i>
                        <label class="form-label" for=""> <b> Payment Method: </b> Credit
                        </label>
                      </div>

                    </div>

                    <hr>
                    <div class="row">

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-cash" aria-hidden="true"></i>
                        <label class="form-label" for=""> <b> Payment Status: </b> Paid
                        </label>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-cart-check-fill" aria-hidden="true"></i>
                        <label class="form-label" for="inputNanme4"> <b> Quantity: </b> 2
                        </label>

                      </div>

                    </div>

                    <hr>
                    <div class="row">

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-cash" aria-hidden="true"></i>
                        <label class="form-label" for=""> <b> Price per Unit: </b> $159
                        </label>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-cash" aria-hidden="true"></i>
                        <label class="form-label" for="inputNanme4"> <b> Total Price : </b> $318
                        </label>

                      </div>

                    </div>

                    <hr>

                    <div class="row">

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-geo-alt-fill" aria-hidden="true"></i><label class="form-label" for=""> <b>Location: </b></label> Dargling, India
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-card-heading" aria-hidden="true"></i>
                        <label class="form-label" for="inputNanme05"> <b> Detail: </b></label> No Detail Avilable temparory
                      </div>


                    </div>

                  </div>


                </div>


              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    </div>
    </div>
  </section>
  <!-- End Card with an image on left -->

</main><!-- End #main -->

@include('layouts.footer');