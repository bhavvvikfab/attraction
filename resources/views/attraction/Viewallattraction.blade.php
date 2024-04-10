@include('layouts.header');


  <main id="main1" class="main">
    <div class="pagetitle">
      <div class="row">
        <div class="col-xxl-10 col-lg-10 col-md-10 col-sm-12">
          <h1>Attraction</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Attraction</li>
            </ol>
          </nav>
        </div>
        <div class="col-xxl-2 col-lg-2 col-md-2 col-sm-12 d-flex justify-content-md-end">
            <a href="index.php"> <h5 class="text-back">Back</h5></a>
        </div>
      </div>
    </div>
    <section class="section filters-section" id="order509">
      <div class="row ">
        <div class="col-lg-12">
          <div class="bannerimg">
            <div class="bg-serch">
            <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-12"></div>
                <div class="col-lg-8 col-md-8 col-sm-12 bg-box-search">
                  <form id="searchBar" class="">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="input-group d-block">
                        <div class="input-group-prepend px-0 mb-2">
                          <form  class="form ng-untouched ng-pristine ng-valid" novalidate="">
                            <div class="datatable-dropdown">
                              <!-- <label for="selector" class="mb-2 text-white">Select Location</label> -->
                              <select  class="form-select search-text-form datatable-selector w-100" aria-label="Default select example" >
                                <option value="1"> Singapore </option>
                                <option value="2">Indonesia  </option>
                                <option value="3">Hong Kong </option>
                                <option value="4"> Thailand </option>
                              </select>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="input-group-append flex-grow-1 mb-2">
                        <!-- <label for="Search-attraction" class="mb-2 text-white">Search Attraction</label> -->
                        <input _ aria-label="Text input with dropdown button" class="form-control search-text font-size-md search-text-form" name="keyword" placeholder="Search attraction" type="search">
                      </div>
                    </div>
                  </div>
                  <div class="input-group-append">
                    <button class=" text-white btn search-button search-text-form" id="button-addon2" ngbtooltip="Search" placement="top" type="submit">
                      <span>
                        <!-- <i class="bi bi-search mx-2" style="color:white;"></i> -->
                        Search
                      </span>
                    </button>
                  </div>
                </div>
              </form>
              <div class="col-lg-2 col-md-2 col-sm-12"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="row pt-5">

        <div class="col-lg-12">

          <div class="row">
            <div class="col-lg-3">

                <div id="filters" data-auto-filter="true" class="bg-white">

                  <div class="p-3 border border-1"> <h3>Filters</h3></div>
                      <!-- Section: Condition -->
                      <div class="border border-1" data-filter="condition">
                        <h5 class="font-weight-bold text-white">Frequent Filter</h5>
                        <div class="p-3">
                          <div class="form-check mb-3">
                            <input class="form-check-input mycksty" type="checkbox" value="new" id="condition-checkbox">
                            <label class="form-check-label text-muted" for="condition-checkbox">
                              Cancellable
                            </label>
                          </div>
                          <div class="form-check mb-3">
                            <input class="form-check-input mycksty" type="checkbox" value="used" id="condition-checkbox2">
                            <label class="form-check-label text-muted" for="condition-checkbox2">
                              Open Dated
                            </label>
                          </div>
                          <div class="form-check mb-3">
                            <input class="form-check-input mycksty" type="checkbox" value="collectible" id="condition-checkbox3">
                            <label class="form-check-label text-muted" for="condition-checkbox3">
                              Favorites
                            </label>
                          </div>
                          <div class="form-check mb-3">
                            <input class="form-check-input mycksty" type="checkbox" value="renewed" id="condition-checkbox4">
                            <label class="form-check-label text-muted" for="condition-checkbox4">
                              With Instant Confirmation
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- Section: Condition -->

                      <!-- Section: City -->
                          <div class="border border-1" data-filter="city">
                            <h5 class="font-weight-bold text-white">City</h5>
                            <div class="p-3">
                              <div class="form-check mb-3">
                                <input class="form-check-input mycksty" type="checkbox" value="34" id="price-checkbox">
                                <label class="form-check-label text-muted" for="price-checkbox">
                                  Singapore
                                </label>
                              </div>
                              <div class="form-check mb-3">
                                <input class="form-check-input mycksty" type="checkbox" value="36" id="price-checkbox2">
                                <label class="form-check-label text-muted" for="price-checkbox2">
                                  Thailand
                                </label>
                              </div>
                              <div class="form-check mb-3">
                                <input class="form-check-input mycksty" type="checkbox" value="38" id="price-checkbox3">
                                <label class="form-check-label text-muted" for="price-checkbox3">
                                  Hong Kong
                                </label>
                              </div>
                            </div>
                        </div>
                      <!-- Section: City -->

                      <!-- Section: Category -->
                          <div class="border border-1" data-filter="city">
                            <h5 class="font-weight-bold text-white">Category</h5>
                            <div class="p-3">
                              <div class="form-check mb-3">
                                <input class="form-check-input mycksty" type="checkbox" value="34" id="price-checkbox">
                                <label class="form-check-label text-muted" for="price-checkbox">
                                  All
                                </label>
                              </div>
                              <div class="form-check mb-3">
                                <input class="form-check-input mycksty" type="checkbox" value="36" id="price-checkbox2">
                                <label class="form-check-label text-muted" for="price-checkbox2">
                                  WiFi
                                </label>
                              </div>
                              <div class="form-check mb-3">
                                <input class="form-check-input mycksty" type="checkbox" value="38" id="price-checkbox3">
                                <label class="form-check-label text-muted" for="price-checkbox3">
                                  Attraction
                                </label>
                              </div>
                              <div class="form-check mb-3">
                                <input class="form-check-input mycksty" type="checkbox" value="50" id="price-checkbox4">
                                <label class="form-check-label text-muted" for="price-checkbox4">
                                  Lifestyle
                                </label>
                              </div>
                            </div>
                          </div>
                      <!-- Section: Category -->
            </div>
          </div>


            <div class="col-lg-9">

              <div class="row">

                <div class="col-lg-4 col-12">

                    <div class="bg-white attr">
                      <a href="singleatt.php">
                      <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/att6.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-10">
                                  <h5 class="search-title-card">Attraction</h5>
                                </div>
                                <div class="col-lg-2">
                                  <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                </div>
                              </div>
                                <p class="card-text text-dark">Dargling, North East, India</p>
                                <p class="card-text text-dark"><i class="bi bi-calendar3 aticon1" ></i> Open Date  <i class="bi bi-lightning-fill aticon2"></i> Instant</p>

                             </div>
                      </div>
                    </a>
                    </div>
                  </div>

                <div class="col-lg-4 col-12">

                    <div class="bg-white attr">
                      <a href="singleatt.php">
                      <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/att1.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-10">
                                  <h5 class="search-title-card">Attraction</h5>
                                </div>
                                <div class="col-lg-2">
                                  <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                </div>
                              </div>
                                <p class="card-text text-dark">Dargling, North East, India</p>
                                <p class="card-text text-dark"><i class="bi bi-calendar3 aticon1" ></i> Open Date  <i class="bi bi-lightning-fill aticon2"></i> Instant</p>

                             </div>
                      </div>
                    </a>
                    </div>
                  </div>

                  <div class="col-lg-4 col-12">

                    <div class="bg-white attr">
                      <a href="singleatt.php">
                      <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/att5.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-10">
                                  <h5 class="search-title-card">Attraction</h5>
                                </div>
                                <div class="col-lg-2">
                                  <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                </div>
                              </div>
                                <p class="card-text text-dark">Dargling, North East, India</p>
                                <p class="card-text text-dark"><i class="bi bi-calendar3 aticon1" ></i> Open Date  <i class="bi bi-lightning-fill aticon2"></i> Instant</p>
                             </div>
                      </div>
                      </a>
                    </div>
                  </div>

              </div>

              <div class="row">

                <div class="col-lg-4 col-12">

                    <div class="bg-white attr">
                        <a href="singleatt.php">
                      <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/tourist-places-in-shillong.jpg') }}" alt="Card image cap">


                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-10">
                                  <h5 class="search-title-card">Attraction</h5>
                                </div>
                                <div class="col-lg-2">
                                  <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                </div>
                              </div>
                                <p class="card-text text-dark">Dargling, North East, India</p>
                                <p class="card-text text-dark"><i class="bi bi-calendar3 aticon1" ></i> Open Date  <i class="bi bi-lightning-fill aticon2"></i> Instant</p>

                             </div>
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4 col-12">

                    <div class="bg-white attr">
                      <a href="singleatt.php">
                      <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/att6.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-10">
                                  <h5 class="search-title-card">Attraction</h5>
                                </div>
                                <div class="col-lg-2">
                                  <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                </div>
                              </div>
                                <p class="card-text text-dark">Dargling, North East, India</p>
                                <p class="card-text text-dark"><i class="bi bi-calendar3 aticon1" ></i> Open Date  <i class="bi bi-lightning-fill aticon2"></i> Instant</p>

                             </div>
                      </div>
                    </a>
                    </div>
                  </div>

                  <div class="col-lg-4 col-12">

                    <div class="bg-white attr">
                        <a href="singleatt.php">
                      <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/att2.jpg') }}" alt="Card image cap">

                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-10">
                                  <h5 class="search-title-card">Attraction</h5>
                                </div>
                                <div class="col-lg-2">
                                  <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                </div>
                              </div>
                                <p class="card-text text-dark">Dargling, North East, India</p>
                                <p class="card-text text-dark"><i class="bi bi-calendar3 aticon1" ></i> Open Date  <i class="bi bi-lightning-fill aticon2"></i> Instant</p>
                             </div>
                             </a>
                      </div>
                    </div>
                  </div>

              </div>
              <div class="row">

                <div class="col-lg-4 col-12">
                    <a href="singleatt.php">
                    <div id="attr02" class="bg-white attr ">

                      <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/att3.jpg') }}" alt="Card image cap">

                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-10">
                                  <h5 class="search-title-card">Attraction</h5>
                                </div>
                                <div class="col-lg-2">
                                  <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                </div>
                              </div>
                                <p class="card-text text-dark">Dargling, North East, India</p>
                                <p class="card-text text-dark"><i class="bi bi-calendar3 aticon1" ></i> Open Date  <i class="bi bi-lightning-fill aticon2"></i> Instant</p>
                             </div>
                             </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4 col-12">

                    <div class="bg-white attr">
                      <a href="singleatt.php">
                      <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/att5.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-10">
                                  <h5 class="search-title-card">Attraction</h5>
                                </div>
                                <div class="col-lg-2">
                                  <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                </div>
                              </div>
                                <p class="card-text text-dark">Dargling, North East, India</p>
                                <p class="card-text text-dark"><i class="bi bi-calendar3 aticon1" ></i> Open Date  <i class="bi bi-lightning-fill aticon2"></i> Instant</p>
                             </div>
                      </div>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-4 col-12">

                    <div id="attr02" class="bg-white attr">
                        <a href="singleatt.php">
                      <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/att4.jpg') }}" alt="Card image cap">

                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-10">
                                  <h5 class="search-title-card">Attraction</h5>
                                </div>
                                <div class="col-lg-2">
                                  <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                </div>
                              </div>
                                <p class="card-text text-dark">Dargling, North East, India</p>
                                <p class="card-text text-dark"><i class="bi bi-calendar3 aticon1" ></i> Open Date  <i class="bi bi-lightning-fill aticon2"></i> Instant</p>
                             </div>
                             </a>
                      </div>
                    </div>
                  </div>

                    <ul class="pagination d-flex justify-content-center">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                          </a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">»</span>
                          </a></li>
                      </ul>

              </div>
            </div>



        </div>

      </div>
    </section>


   </main><!-- End #main -->

<!-- use footerwithnosidebar if any issue  -->
@include('layouts.footerwithnosidebar');