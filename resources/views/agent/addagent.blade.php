@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Add New Agents</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New Agents</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <section class="section" id="adduserform123">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">Add New Agents</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="{{ route(session('prefix', 'agent') . '.all_agent') }}"> Back </a>
                </h5>
              </div>
            </div>
          </div>
          <div class="card-body">


            <!-- General Form Elements -->
            <form>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputNanme4" class="form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> First Name</label>
                  <input type="text" class="form-control" id="inputNanme4" value="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputNanme05" class="form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Last Name</label>
                  <input type="text" class="form-control" id="inputNanme05" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputEmail" class="form-label"><i class="bi bi-envelope-fill" style="font-size: 18px;"></i> Email</label>
                  <input type="email" class="form-control" value="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputPassword" class="form-label"><i class="bi bi-eye-slash-fill" style="font-size: 18px;"></i> Password</label>
                  <input type="password" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputNumber" class="form-label"> <i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone Number</label>
                  <input type="number" class="form-control">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputNumber2" class="form-label"><i class="bi bi-flag-fill" style="font-size: 18px;"></i>
                    Country Code</label>
                  <input type="number" class="form-control" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputNumber1" class="form-label"><i class="bi bi-coin" style="font-size: 18px;"></i>
                    Credit Limit</label>
                  <input type="number" class="form-control" value="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputNumber" class="form-label"> <i class="bi bi-coin" style="font-size: 18px;"></i>
                    Credit Balance</label>
                  <input type="number" class="form-control" value="">
                </div>

              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputNumber" class="form-label"><i class="bi bi-cart-check-fill" style="font-size: 18px;"></i> Bookings</label>
                  <input type="text" class="form-control" id="inputNumber" value="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="formFile" class="form-label"><i class="bi bi-image-fill" aria-hidden="true" style="font-size: 18px;"></i> Agent Image </label>
                  <input class="form-control" type="file" id="formFile">
                </div>
              </div>

              <!-- <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputPassword" class="form-label"> <i class="bi bi-geo-alt-fill"style="font-size: 18px;"></i>Address</label>
                      <textarea class="form-control" style="height: 100px">159,pyq , San Joe, Country </textarea>
                    </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputPassword" class="form-label"> <i class="bi bi-list-ul" style="font-size: 18px;"></i> Description </label>
                      <textarea class="form-control" style="height: 100px">hello</textarea>
                    </div>
                </div> -->
              <div class="row mb-3">
                <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                <div class="col-sm-12">
                  <!-- <a href="allsupplier.php">
                    <button type="submit" class="btn editsup-btn">Save Changes</button>
                    </a> -->
                  <a class="btn editsup-btn" href="appuser.php" role="submit">Add Agent</a>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

      <!--  --><!-- End General Form Elements -->

    </div>
    </div>

    </div>
    </div>
  </section>
</main>

@include('layouts.footer');