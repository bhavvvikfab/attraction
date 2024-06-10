@include('layouts.header');
@include('layouts.sidebar');
  <style>
    .country-select.inside{
      width: 100%;
    }
    @media only screen and (min-width: 1025px) {
      .sidebar {
        display: none;
      }
}
.suggestion:hover{
  background-color:#c1c1c1;
}

  </style>

  <main id="main1" class="main">
    <div class="pagetitle">
      <div class="row">
        <div class="col-xxl-10 col-lg-10 col-md-10 col-sm-12">
          <h1>Attraction</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Attraction</li>
            </ol>
          </nav>
        </div>
        <div class="col-xxl-2 col-lg-2 col-md-2 col-sm-12 d-flex justify-content-md-end">
            <a href="{{ route(session('prefix', 'agent')) }}"> <h5 class="text-back">Back</h5></a>
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
                  <form id="searchBar" class="" action="{{ route('agent.view_attraction') }}" method="GET">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="input-group d-block">
                          <div class="input-group-prepend px-0 mb-2">
                            <!-- <form  class="form ng-untouched ng-pristine ng-valid" novalidate=""> -->
                              <div class="datatable-dropdown">
                                <input type="text" class="form-control w-100" value="" name="country" id="country" style="padding-block: 10px">

                                <!-- <label for="selector" class="mb-2 text-white">Select Location</label> -->
                                <!-- <select  class="form-select search-text-form datatable-selector w-100" aria-label="Default select example" >
                                  <option value="1"> Singapore </option>
                                  <option value="2">Indonesia  </option>
                                  <option value="3">Hong Kong </option>
                                  <option value="4"> Thailand </option>
                                </select> -->
                              </div>
                            <!-- </form> -->
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12" style="position:relative">
                        <div class="input-group-append flex-grow-1 mb-2">
                          <!-- <label for="Search-attraction" class="mb-2 text-white">Search Attraction</label> -->
                          <input _ aria-label="Text input with dropdown button" class="form-control search-text font-size-md search-text-form" name="keyword" placeholder="Search attraction" value="{{ $keyword ?? '' }}" type="search">
                          <div id="suggestion-dropdown" class="bg-body-secondary position-absolute z-1" style="max-height:25vh; overflow:scroll; width:93%"></div>
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
                      <!-- <div class="border border-1" data-filter="condition">
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
                      </div> -->
                      <!-- Section: Condition -->

                      <!-- Section: City -->
                          <div class="border border-1" data-filter="city">
                            <h5 class="font-weight-bold text-white">City</h5>
                            <div class="p-3" id="cities">
                              @if(!empty($citiesPage))
                                @foreach($citiesPage as $city)
                                      <div class="form-check mb-3">
                                          <input class="form-check-input mycksty city-checkbox" name="city_check[]" type="checkbox" value="{{ $city }}" id="city-checkbox{{ $loop->index }}">
                                          <label class="form-check-label text-muted" for="city-checkbox{{ $loop->index }}">
                                              {{ $city }}
                                          </label>
                                      </div>
                                @endforeach
                              @endif
                             
                            </div>
                        </div>
                        
                      <!-- Section: City -->

                      <!-- Section: Category -->
                          <!-- <div class="border border-1" data-filter="city">
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
                          </div> -->
                      <!-- Section: Category -->
            </div>
          </div>


            <div class="col-lg-9">

              <div class="row">
                @php
                  $cities = [];
                @endphp 
                @if(count($attractions)>0)
                  @foreach($attractions as $attraction)
                      @php
                          $fields = json_decode($attraction->fields);
                          if (isset($fields->city)) {
                              $cities[] = $fields->city;
                          }
                      @endphp
                    <div class="col-lg-4 col-12">
                      <div class="bg-white attr">
                        <a href="{{ route(session('prefix', 'agent') . '.view_single_attraction' ,['id'=>$attraction->id]) }}">
                          <div class="card">
                            @if($attraction->attraction_id)
                            <img class="card-img-top" src="{{ env('API_IMAGE_URL') }}{{ $attraction->image }}" alt="Card image cap">                          
                            @else
                            <img class="card-img-top" src="{{ asset('assets/img/') }}/{{ $attraction->image }}" alt="Card image cap">
                            @endif
                              <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-10">
                                      <h5 class="search-title-card">{{ $attraction->name }}</h5>
                                    </div>
                                    <div class="col-lg-2">
                                      <h5 class="search-fav-icon"><i class="bi bi-star-fill"></i></h5>
                                    </div>
                                      <p class="card-text text-dark">{{ $fields->address }} {{ $fields->city }}</p>
                                      <p class="card-text text-dark">
                                          <i class="bi bi-calendar3 aticon1"></i> 
                                          Open Date {{-- \Carbon\Carbon::createFromFormat('d/m/Y', $fields->opening_date)->format('Y-m-d') --}}  
                                          <i class="bi bi-lightning-fill aticon2"></i>
                                          Instant
                                      </p>
                                  </div>
                            </div>  
                          </a>
                      </div>
                    </div>
                  </div>
                  @endforeach

                  <!-- Pagination -->
                  <ul class="pagination d-flex justify-content-center">
                      @if ($attractions->onFirstPage())
                          <li class="page-item disabled"><span class="page-link">«</span></li>
                      @else
                          <li class="page-item"><a class="page-link" href="{{ $attractions->previousPageUrl() }}{{ '&' . http_build_query(request()->except('page')) }}" rel="prev">«</a></li>
                      @endif

                      @foreach ($attractions->getUrlRange(1, $attractions->lastPage()) as $page => $url)
                          <li class="page-item {{ $page == $attractions->currentPage() ? 'active' : '' }}">
                              <a class="page-link" href="{{ $url }}{{ '&' . http_build_query(request()->except('page')) }}">{{ $page }}</a>
                          </li>
                      @endforeach

                      @if ($attractions->hasMorePages())
                          <li class="page-item"><a class="page-link" href="{{ $attractions->nextPageUrl() }}{{ '&' . http_build_query(request()->except('page')) }}" rel="next">»</a></li>
                      @else
                          <li class="page-item disabled"><span class="page-link">»</span></li>
                      @endif
                  </ul>


                @else
                <div _ngcontent-xtk-c5="" class="mt-5 mb-5 padding-container text-center">
                  <img _ngcontent-xtk-c5="" alt="" src="{{ url('assets/images/no-result.png') }}">
                  <div _ngcontent-xtk-c5="" class="py-4 ">
                    <h4 _ngcontent-xtk-c5="" class="font-weight-bold text-center mb-2">Sorry! No results found :(</h4>
                    <span _ngcontent-xtk-c5="">Please try to search for something else.</span>
                  </div>
                  <!-- <div _ngcontent-xtk-c5="" class="load-more-button d-inline font-14">Back to Home</div> -->
                </div>
                @endif

                  
              <!-- </div>               -->
            </div>



        </div>

      </div>
    </section>


   </main><!-- End #main -->

<!-- use footerwithnosidebar if any issue  -->
@include('layouts.footerwithnosidebar');
