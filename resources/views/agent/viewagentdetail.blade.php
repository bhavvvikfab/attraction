@include('layouts.header');
@include('layouts.sidebar');

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>View Agent</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">View Agent</li>
          </ol>
        </nav>
      </div>
    </div>
    </div>
    <!-- End Page Title -->

    <!-- Card with an image on left -->
     <section class="section" id="viewsup1021">
      <div class="row ">
        <div class="col-lg-12">

          <div class="card">

             <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">View Agent</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="{{url('all_agent')}}"> Back </a></h5>
                  </div>
                </div>
             </div>

             <div class="card-body">

              <div class="table-responsive">
            <form class="m-3">
              <div class="row">

                <div class="col-lg-4 pb-2 pb-lg-0">

                  <i class="bi bi-image-fill" aria-hidden="true"></i>
                  <label class="form-label" for="inputNanme4"> <b> Agent Image: </b>
                  </label>
                  <!--<img src="assets/img/josh-d-avatar.jpg">-->
                     <div class="user-view-thumbnail">
                          <img src="assets/img/josh-d-avatar.jpg">
                    </div>

                </div>

                <div class="col-lg-8 d-lg-flex flex-lg-column justify-content-lg-center">

                  <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                      <i class="bi bi-person-circle" aria-hidden="true"></i>
                      <label class="form-label" for="inputNanme05"> <b> First Name: </b></label> Unity Pugh
                     </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-person-circle" aria-hidden="true"></i>
                      <label class="form-label" for="inputNanme4"> <b> Last Name: </b> XYZ
                    </label>
                     </div>
                  </div>
              <hr>
              <div class="row">


                  <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-envelope-fill" aria-hidden="true"></i><label class="form-label" for="">&nbsp;<b>Email:</b></label> mail123@gmail.com
                   </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-coin" aria-hidden="true"></i>
                        <label class="form-label" for=""> <b> Credit Limit: </b> SDG 1596324870
                        </label>
                     </div>

              </div>
              <hr>
              <div class="row">

                   <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-coin" aria-hidden="true"></i><label class="form-label" for="">&nbsp;<b>Credit Balance: </b></label> SDG 123
                   </div>

                   <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-cart-check-fill" aria-hidden="true"></i>
                  <label class="form-label" for="inputNanme4"> <b> Bookings: </b> 12
                  </label>
                </div>

              </div>

              <hr>
              <div class="row">

                   <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-telephone-fill" aria-hidden="true"></i><label class="form-label" for="">&nbsp;<b> Phone Number: </b> 9825654896</label>
                   </div>

                   <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-flag-fill" aria-hidden="true"></i>
                  <label class="form-label" for="inputNanme4"> <b> Country Code: </b> 395007
                  </label>
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