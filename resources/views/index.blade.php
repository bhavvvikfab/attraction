@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
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
      </div>

       <!-- Order Card -->
      <div class="col-xxl-4 col-lg-4 col-md-4">
        <div class="card info-card sales-card">
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
            <h5 class="card-title"> Bookings </h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-cart"></i>
              </div>
              <div class="ps-3">
                <h6>100</h6>
                <span class="text-success small pt-1 fw-bold">8%</span>
                <span class="text-muted small pt-2 ps-1">increase</span>
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
            <h5 class="card-title">Balance</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-currency-dollar"></i>
              </div>
              <div class="ps-3">
                <h6>SGD 55</h6>
                <!-- <span class="text-success small pt-1 fw-bold">8%</span>
                <span class="text-muted small pt-2 ps-1">increase</span> -->
              </div>
            </div>
          </div>
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
                <h5 class="card-title">Reports <span>/Today</span></h5>
                <!-- Line Chart -->
                <div id="reportsChart"></div>
                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                      series: [{
                        name: 'Total Customers',
                        data: [15, 11, 32, 18, 9, 24, 11]
                      },{
                        name: 'Revenue',
                        data: [11, 32, 45, 32, 34, 52, 41]
                      },{
                        name: 'Order',
                        data: [31, 40, 28, 51, 42, 56],
                      }  ],
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
                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                      },
                      tooltip: {
                        x: {
                          format: 'dd/MM/yy HH:mm'
                        },
                      }
                    }).render();
                  });
                </script><!-- End Line Chart -->
              </div>
            </div>
          </div><!-- End Reports -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">
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
            <h5 class="card-title">Recent Activity <span>| Today</span></h5>

            <div class="activity">

              <div class="activity-item d-flex">
                <div class="activite-label">32 min</div>
                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                <div class="activity-content">
                  Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">56 min</div>
                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                <div class="activity-content">
                  Voluptatem blanditiis blanditiis eveniet
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">2 hrs</div>
                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                <div class="activity-content">
                  Voluptates corrupti molestias voluptatem
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">1 day</div>
                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                <div class="activity-content">
                  Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">2 days</div>
                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                <div class="activity-content">
                  Est sit eum reiciendis exercitationem
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">4 weeks</div>
                <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                <div class="activity-content">
                  Dicta dolorem harum nulla eius.
                </div>
              </div><!-- End activity item-->

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
                <h5 class="card-title">Bookings <span>| Today</span></h5>
                <table class="table table-borderless datatable dash-order-table">
                  <thead>
                    <tr>
                      <th scope="col">Sr no.</th>
                      <th scope="col">Order Id</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Product</th>
                      <th scope="col" data-type="date" data-format="DD/MM/YYYY">Date</th>
                      <th scope="col">Price</th>
                      <th scope="col">Booking Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <th scope="row"><a href="#">#2457</a></th>
                      <td>Brandon Jacob</td>
                      <td><a href="#" class="prlink">At praesentium minu</a></td>
                      <td>13/05/2023</td>
                      <td>$64</td>
                     <td>
                        <button type="button" class="btn btn-success">Approve</button>
                    </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <th scope="row"><a href="#">#2147</a></th>
                      <td>Bridie Kessler</td>
                      <td><a href="#" class="prlink">Blanditiis dolor omnis similique</a></td>
                      <td>13/05/2023</td>
                      <td>$47</td>
                      <td><button type="button" class="btn btn-warning">Pending</button></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <th scope="row"><a href="#">#2049</a></th>
                      <td>Ashleigh Langosh</td>
                      <td><a href="#" class="prlink">At recusandae consectetur</a></td>
                      <td>13/05/2023</td>
                      <td>$147</td>
                      <td><button type="button" class="btn btn-success">Approve</button></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <th scope="row"><a href="#">#2644</a></th>
                      <td>Angus Grady</td>
                      <td><a href="#" class="prlink">Ut voluptatem id earum et</a></td>
                      <td>13/05/2023</td>
                      <td>$67</td>
                      <td><button type="button" class="btn btn-danger">Rejected</button></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <th scope="row"><a href="#">#2644</a></th>
                      <td>Raheem Lehner</td>
                      <td><a href="#" class="prlink">Sunt similique distinctio</a></td>
                      <td>13/05/2023</td>
                      <td>$165</td>
                      <td><button type="button" class="btn btn-success">Approve</button></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <th scope="row"><a href="#">#2644</a></th>
                      <td>Raheem Lehner</td>
                      <td><a href="#" class="prlink">Sunt similique distinctio2</a></td>
                      <td>13/05/2023</td>
                      <td>$165</td>
                      <td><button type="button" class="btn btn-success">Approve</button></td>
                    </tr>
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
