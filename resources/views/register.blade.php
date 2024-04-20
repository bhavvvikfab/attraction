<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register - Attraction</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/register.css') }}" rel="stylesheet">

  <!-- Country Selector CSS File -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/country-select-js@2.1.0/build/css/countrySelect.min.css">


</head>

<body>

<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
          <div class="d-flex justify-content-center py-4">
            <a href="#" class="logo d-flex align-items-center w-auto">
              <img src="{{asset('assets/img/logo.png')}}" alt="">
              <span class="d-none d-lg-block">Attraction</span>
            </a>
          </div><!-- End Logo -->
          <div class="card mb-3 col-lg-12">
              <div class="loader-overlay" id="loaderOverlay" style="display: none;">
                <div class="loader-wrapper">
                  <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
              </div>
            <div id="msg" class="fs-3 text-center"></div>
            <div class="card-body">
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                <p class="mb-0 text-center small">Enter your personal details to create account</p>
              </div>

              <div class="container-xs">
                <div class="progress-bar">
                  <div class="step">
                    <div class="bullet">
                      <span>1</span>
                    </div>
                    <p>Basic Info</p>
                    <div class="check fas fa-check"></div>
                  </div>
                  <div class="step">
                    <div class="bullet">
                      <span>2</span>
                    </div>
                    <p>Other Information</p>
                    <div class="check fas fa-check"></div>
                  </div>
                  <!-- <div class="step">
                    <div class="bullet">
                      <span>3</span>
                    </div>
                    <p>Submit</p>
                    <div class="check fas fa-check"></div>
                  </div> -->
                </div>
                <div class="form-outer">
                  <form id="registrationForm">
                    <input type="hidden" name="url" id="url" value="{{ route(session('prefix', 'agent') . '.register') }}">
                    <input type="hidden" name="redirecturl" id="redirecturl" value="{{ route(session('prefix', 'agent') . '.login') }}">
                    <div class="page slide-page">
                      <!-- <div class="title">Basic Info:</div> -->
                      <div class="field mb-0">
                        <div class="label">Name</div>
                        <input type="text" name="name">
                      </div>
                      <div class="field mb-0">
                        <div class="label">Email</div>
                        <input type="email" name="email">
                      </div>
                      <div class="field mb-0">
                        <div class="label">Password</div>
                        <input type="password" name="password">
                      </div>
                      <div class="field mb-0">
                        <div class="label">Confirm Password</div>
                        <input type="password" name="confirm_password">
                      </div>
                      <div class="field mb-0">
                        <button class="firstNext next">Next</button>
                      </div>
                    </div>

                    <div class="page">
                      <!-- <div class="title">Contact Info:</div> -->
                      <div class="field mb-0">
                        <div class="label">Address</div>
                        <input type="text" name="address">
                      </div>                      
                      <div class="field mb-0">                        
                        <div class="label">Country</div>
                        <input type="text" name="country" id="country">
                        <!-- <input type="text" name="country"> -->
                      </div>
                      <div class="field mb-0">
                        <div class="label">Phone</div>
                        <input type="number" name="phone_number">
                      </div>
                      <div class="field mb-0">
                        <div class="label">Image</div>
                        <input type="file" name="image" style="padding: 6px;">
                      </div>
                      <div class="field mb-0 btns">
                        <button class="prev-1 prev">Previous</button>
                        <!-- <button class="next-2 next">Next</button> -->
                        <button class="submit" type="submit" >Create Account</button>
                      </div>
                      <!-- <div class="field btns">
                        <button class="prev-1 prev">Previous</button>
                        <button class="next-1 next">Next</button>
                      </div> -->
                    </div>

                    <!-- <div class="page"> -->
                      <!-- <div class="title">Contact Profile:</div> -->
                      <!-- <div class="field">
                        <div class="label">Country Code</div>
                        <input type="text" name="country_code">
                      </div> -->
                      
                      <!-- <div class="field btns">
                        <button class="prev-2 prev">Previous</button> -->
                        <!-- <button class="next-2 next">Next</button> -->
                        <!-- <button type="submit" class="submit">Create Account</button> -->
                      <!-- </div> -->
                    <!-- </div> -->

                    <!-- <div class="page">
                      <div class="title">Login Details:</div>
                      <div class="field">
                        <div class="label">Username</div>
                        <input type="text" name="username">
                      </div>
                      <div class="field">
                        <div class="label">Password</div>
                        <input type="password" name="password">
                      </div>
                      <div class="field btns">
                        <button class="prev-3 prev">Previous</button>
                        <button type="submit" class="submit">Create Account</button>
                      </div>
                    </div> -->
                  </form>
                </div>
              </div>           

              <div class="row">
                <div class="col-12">
                  <p class="ms-4 ps-1">Already have an account? <a href="/">Log in</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
</main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/country-select-js@2.1.0/build/js/countrySelect.min.js"></script>

  <!-- Template Main JS File -->

 <script src="{{ asset('assets/js/main.js') }}"></script>
 <script src="{{ asset('assets/js/script.js') }}"></script>
 <script src="{{ asset('assets/js/custom.js') }}"></script>
 <script>
  $('#country').countrySelect({
      defaultCountry: "in"
  }); 
 </script>

</body>

</html>