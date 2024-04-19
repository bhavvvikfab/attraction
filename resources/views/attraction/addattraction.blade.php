@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Add New Attraction</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New Attraction</li>
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
                <h5 class="card-title text-start">Add New Attraction</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="{{ route(session('prefix', 'agent') . '.all_attraction') }}"> Back </a>
                </h5>
              </div>
            </div>
          </div>
          <div class="card-body">


            <!-- General Form Elements -->
            <form  method="post" id="add_attraction_form" enctype="multipart/form-data">
            <input type="hidden" name="url" id="url" value="{{ route(session('prefix', 'agent') . '.storeAgent') }}">
            <input type="hidden" name="redirecturl" id="redirecturl" value="{{ route(session('prefix', 'agent') . '.all_agent') }}">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputNanme4" class="form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i>Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="">
                  <p class="name_err"></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputEmail" class="form-label"><i class="bi bi-envelope-fill" style="font-size: 18px;"></i> Country</label>
                  <input type="text" class="form-control" name="country_selector" id="country_selector" value="">
                  <p class="country_err"></p>
                </div>
              </div>
              <div class="row">
                
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputPassword" class="form-label"><i class="bi bi-eye-slash-fill" style="font-size: 18px;"></i>Address</label>
                  <textarea  class="form-control" name="address" id="address"></textarea>
                  <p class="address_err"></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputNumber" class="form-label"> <i class="bi bi-telephone-fill" style="font-size: 18px;"></i>Description</label>
                  <textarea  class="form-control" name="description" id="description"></textarea>
                  <p class="description_err"></p>
                </div>
              </div>
              <div class="row">
                
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputNumber2" class="form-label"><i class="bi bi-flag-fill" style="font-size: 18px;"></i>
                    Country Code</label>
                  <input type="number" class="form-control" value="" name="country" id="country">
                  <p class="country_err"></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="inputNumber" class="form-label"> <i class="bi bi-coin" style="font-size: 18px;"></i>
                    Credit Balance</label>
                  <input type="number" class="form-control" value="" name="credit_balance" id="credit_balance">
                  <p class="credit_balance_err"></p>
                </div>
              </div>
              <div class="row">
              
                
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="formFile" class="form-label"><i class="bi bi-image-fill" aria-hidden="true" style="font-size: 18px;"></i> Agent Image </label>
                  <input class="form-control" type="file" id="image" name="image">
                  <p class="image_err"></p>
                </div>

              </div>
              
              <div class="row mb-3">
                <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                <div class="col-sm-12">
                  <!-- <a href="allsupplier.php">
                    <button type="submit" class="btn editsup-btn">Save Changes</button>
                    </a> -->
                  <a class="btn btn-primary editsup-btn" id="addagent_btn" type="button">Add Attraction</a>
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
<script>

    $(document).ready(function () {

        $("#country_selector").countrySelect();

    });
    $("#country_selector").countrySelect({
        
        responsiveDropdown:true
        
    });
    const myData = $("#country_selector").countrySelect("getSelectedCountryData");

    // const myData = $.fn.countrySelect.getCountryData();

    $("#country_selector").countrySelect("selectCountry","gb");

    $("#country_selector").countrySelect("setCountry","United States");
    
</script>