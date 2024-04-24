@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Setting</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Setting</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <section class="section profile">
    <div class="row">
      

      
                  

      <div class="col-xl-9">
                  @if(session('success'))
                  <div id="successAlert" class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  @if(session('error'))
                  <div id="errorAlert" class="alert alert-danger">{{ session('error') }}</div>
                  @endif

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#setting1">API</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#price_markup">Price Markup</button>
              </li>

              <!-- <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
              </li> -->

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Setting 3</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="setting1">
                <!-- <h5 class="card-title">About</h5>
                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                <h5 class="card-title">Credentials Details</h5>

                <form id="credential_form" method="post" enctype="multipart/form-data"> 
                  @csrf
               
                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="">
                      <input name="email" type="email" class="form-control w-50" id="email" value="{{ $credential_data->email ? $credential_data->email : '' }}">
                      <p class="email_err"></p>
                      @error('email')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Password</label>
                    <div class="">
                      <input name="password" type="text" class="form-control w-50" id="password" value="{{ $credential_data->password ? $credential_data->password : '' }}">
                      <p class="password_err"></p>
                      @error('fullName')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="button" class="btn btn-primary" id="update_credential">Save Changes</button>
                  </div>

                </form>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="price_markup">

                <!-- Profile Edit Form -->
                <form id="update_markup_form" method="post" enctype="multipart/form-data"> 
                  @csrf
               

                  <!-- <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fullName" type="text" class="form-control" id="fullName" value="">
                      @error('fullName')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div> -->

                  <!-- <div class="row mb-3">
                    <label for="selectOption" class="col-md-4 col-lg-3 col-form-label">Select Option</label>
                    <div class="col-md-8 col-lg-9">
                        <select name="selectOption" class="form-select" id="selectOption">
                            
                            <option value="percentage">Percentage</option>
                            <option value="amount">Amount</option>
             
                           
                        </select>
                        @error('selectOption')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div> -->

                  

                 

                  <!-- <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Value</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="value" type="number" class="form-control" id="value" value="">
                      @error('value')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div> -->
                  <div class="col-md-6 mb-3">
                      <label for="inputNumber" class="col-form-label"><strong>Markup</strong></label>
                      <div class="input-group deposit">
                          <?php $setting_field=json_decode($markup_data->settings,true);?>
                          <input type="number" class="form-control amount_mark_up" name="attraction_mark_up" id="attraction_mark_up" value="<?php echo $setting_field['price_markup']['value'] ?>" aria-describedby="inputGroupPrepend9">
                          <select class="form-select amount_mark_up_type" name="attraction_mark_up_type" id="attraction_mark_up_type"> 
                              <option value="1" <?php if($setting_field['price_markup']['type']== 1){echo'selected';} ?>>Amount</option>
                              <option value="2" <?php if($setting_field['price_markup']['type']== 2){echo'selected';} ?>>Percentage</option>
                          </select>
                          
                      </div>
                  </div>

                  

                  <div class="text-center">
                    <button type="button" class="btn btn-primary" id="update_markup_btn">Save Changes</button>
                  </div>

                </form>
                <!-- End Profile Edit Form -->

              </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form id="change_password_form" method="post">
                  @csrf
                 

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                      <p class="curr_pass_error"></p>
                      @error('currentPassword')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                      <p class="new_pass_error"></p>
                      @error('newpassword')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="confirmPassword" type="password" class="form-control" id="confirmPassword">
                      <p class="confirm_pass_error"></p>
                      @error('confirmPassword')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                  </div>
                  <div id="msg"></div>

                  <div class="text-center">
                    <button type="button" class="btn btn-primary" id="btn_chng_pass">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@include('layouts.footer');