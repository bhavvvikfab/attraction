@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
  @if(session('prefix') == 'agent' &&  !empty(session('backto_admin')))
  <div class="row mb-2">
    <h1>Welcome Admin, to {{Auth::user()->name;}}</h1>
  </div>
  @endif
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div>
    </div>
  </div><!-- End Page Title -->
  <section class="section dashboard" id="dash896">
    <div class="row">
      <!-- Customers Card -->
      <div class="col-xxl-4 col-lg-4 col-md-4">
        <div class="card info-card customers-card">
          <!-- <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>
              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div> -->
          <div class="card-body">
            <h5 class="card-title"> Attractions</h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                      <h6>{{ $attraction_count !== null ? $attraction_count : 0 }}</h6>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->
              </div>
            </div>
          </div>
        </div>
      </div>

       <!-- Order Card -->
      <div class="col-xxl-4 col-lg-4 col-md-4">
        <div class="card info-card sales-card">
          <!-- <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>
              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div> -->
          <div class="card-body">
            <h5 class="card-title"> Bookings </h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-cart"></i>
              </div>
              <div class="ps-3">
                <h6>{{ $booking_count !== null ? $booking_count : 0 }}</h6>
                
                <!-- <span class="text-success small pt-1 fw-bold">8%</span>
                <span class="text-muted small pt-2 ps-1">increase</span> -->
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- <div class="col-xxl-3 col-lg-3 col-md-6">
        <div class="card info-card customers-card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>
              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>
          <div class="card-body">
            <h5 class="card-title"> Attractions</h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                      <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <!-- End Customers Card -->

      <!-- <div class="col-xxl-3 col-lg-3 col-md-6">
        <div class="card info-card user-card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>
              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>
          <div class="card-body">
            <h5 class="card-title">Total User </h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                 <i class="bi bi-person"></i>
              </div>
              <div class="ps-3">
                <h6>30</h6>
                <span class="text-success small pt-1 fw-bold">12%</span>
                <span class="text-muted small pt-2 ps-1">increase</span>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <div class="col-xxl-4 col-lg-4 col-md-4">
        <div class="card info-card revenue-card">
          <!-- <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>
              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div> -->
          <?php if(session('prefix')=='admin'){ ?>
          <div class="card-body">
            <h5 class="card-title">Agents</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                <h6>{{ $agent_count !== null ? $agent_count : 0 }}</h6>
                <!-- <span class="text-success small pt-1 fw-bold">8%</span>
                <span class="text-muted small pt-2 ps-1">increase</span> -->
              </div>
            </div>
          </div>
          <?php }else{ ?>

            <div class="card-body">
            <h5 class="card-title">Balance</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-currency-dollar"></i>
              </div>
              <div class="ps-3">
                <h6>{{ Auth::user()->credit_balance  !== null ? Auth::user()->credit_balance : 0 }}</h6>
                <!-- <span class="text-success small pt-1 fw-bold">8%</span>
                <span class="text-muted small pt-2 ps-1">increase</span> -->
              </div>
            </div>
          </div>
          <?php } ?>

        </div>
      </div>



    </div>
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">
          <!-- Reports -->
          <div class="col-12">
            <div class="card">
              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->
              <div class="card-body">
                <h5 class="card-title">Reports <span class="small text-muted">(Weekly)</span></h5>
                <!-- Line Chart -->
                <div id="reportsChart"></div>
                <script>
                   const generatePastSixDays = () => {
                        const dates = [];
                        for (let i = 6; i >= 0; i--) {
                          const date = new Date();
                          date.setDate(date.getDate() - i);
                          dates.push(date.toISOString());
                        }
                        return dates;
                      };
                  document.addEventListener("DOMContentLoaded", () => {
                    const bookingchart= <?php echo $booking_chart; ?> ;
                    const agent_chart= <?php echo $agent_chart; ?>;
                    var prefix = '<?php echo session('prefix') ?? 'agent'; ?>';

                    var data = [{
                        name: 'Bookings',
                        data: bookingchart
                      }];

                    if(prefix != '' && prefix == 'admin'){
                      data = [{
                        name: 'Bookings',
                        data: bookingchart
                      }
                      ,{
                        name: 'Agents',
                        data: agent_chart
                      }]
                    }


                    new ApexCharts(document.querySelector("#reportsChart"), {
                    
                      series: data,
                      chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                          show: false
                        },
                      },
                      markers: {
                        size: 4
                      },
                      colors: ['#ff771d' , '#2eca6a', '#4154f1'],
                      fill: {
                        type: "gradient",
                        gradient: {
                          shadeIntensity: 1,
                          opacityFrom: 0.3,
                          opacityTo: 0.4,
                          stops: [0, 90, 100]
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        curve: 'smooth',
                        width: 2
                      },
                      xaxis: {
                        type: 'datetime',
                        categories: generatePastSixDays()
                      },
                      tooltip: {
                        x: {
                          format: 'dd/MM/yy HH:mm'
                        },
                      }
                    }).render();
                  });
                </script>
                <!-- End Line Chart -->
              </div>
            </div>
          </div><!-- End Reports -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">
          <!-- <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div> -->

          <div class="card-body">
            <h5 class="card-title">Recent Activity <span></span></h5>

            <div class="activity">
                <?php 
                if(isset($notifications) && count($notifications) > 0){
                foreach($notifications as $noti){
                  $formattedDate = date('d-m-y', strtotime($noti->created_at));

                  ?>
              <div class="activity-item d-flex">
                <div class="activite-label">{{$formattedDate}}</div>
                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                <div class="activity-content">
                  <!-- Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae -->
                  {!! $noti->notification !!}
                </div>
              </div>
              <?php }}else{?>
                <div>No Activity Found</div>
                <?php }?>
              <!-- End activity item-->

              <!-- <div class="activity-item d-flex">
                <div class="activite-label">56 min</div>
                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                <div class="activity-content">
                  Voluptatem blanditiis blanditiis eveniet
                </div>
              </div> -->
              <!-- End activity item-->

              <!-- <div class="activity-item d-flex">
                <div class="activite-label">2 hrs</div>
                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                <div class="activity-content">
                  Voluptates corrupti molestias voluptatem
                </div>
              </div> -->
              <!-- End activity item-->

              <!-- <div class="activity-item d-flex">
                <div class="activite-label">1 day</div>
                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                <div class="activity-content">
                  Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                </div>
              </div> -->
              <!-- End activity item-->

              <!-- <div class="activity-item d-flex">
                <div class="activite-label">2 days</div>
                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                <div class="activity-content">
                  Est sit eum reiciendis exercitationem
                </div>
              </div> -->
              <!-- End activity item-->

              <!-- <div class="activity-item d-flex">
                <div class="activite-label">4 weeks</div>
                <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                <div class="activity-content">
                  Dicta dolorem harum nulla eius.
                </div>
              </div> -->
              <!-- End activity item-->

            </div>

          </div>
        </div><!-- End Recent Activity -->



      </div><!-- End Right side columns -->

      <div class="row">
        <div class="col-lg-12">
        <div class="row">

          <!-- Latest Orders -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto dashbord-order-table ">
              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->
              <div class="card-body">
                <h5 class="card-title">Bookings <span></span></h5>
                <table class="table table-borderless datatable dash-order-table">
                  <thead>
                    <tr>
                      <th scope="col">Sr no.</th>
                      <!-- <th scope="col">Order Id</th> -->
                      <th scope="col">Customer Name</th>
                      <th scope="col">Attraction</th>
                      <th scope="col" data-type="date" data-format="DD/MM/YYYY">Date</th>
                      <th scope="col">Price</th>
                      <th scope="col">Booking Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i=1;
                  foreach($booking_data as $single_data){
                  ?>
                    <tr>
                      <td>{{$i++}}</td>
                      <!-- <th scope="row"><a href="#">#2457</a></th> -->
                      <td>{{$single_data->user->name ?? "" }}</td>
                      <td>{{$single_data->attraction->name ?? 'NA'}}</td>
                      <td>{{ $single_data->created_at->format('Y-m-d') ?? 'NA' }}</td>
                      <td>{{$single_data->amount ?? 'NA'}}</td>
                     <td>
                        <button type="button" class="btn btn-success">Approve</button>
                    </td>
                    </tr>
                   <?php } ?>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Latest Orders -->



        </div>
        </div><!-- End Left side columns -->
      </div>
    </div>
  </section>
</main><!-- End #main -->


@include('layouts.footer');
