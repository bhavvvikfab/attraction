@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Chat Messages</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Chat Messages</li>
          </ol>
        </nav>
      </div>
    </div>
  </div><!-- End Page Title -->

  <section class="section" id="chatpage421">
    <div class="row ">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">Chat Messages</h5>
              </div>
              <!--<div class="col-lg-4">-->
              <!--    <h5 class="card-title text-end addsup">-->
              <!--        <a href="addappuser.php"> Add User </a></h5>-->
              <!--</div>-->
            </div>
          </div>

          <div class="card-body view-chat-admin table-responsive ">
            <!-- Table with stripped rows -->
            <div class="datatable-top">
              <div class="datatable-dropdown">
                <label>
                  <select class="datatable-selector">
                    <option value="">Customer Name</option>
                    <option value="" selected="">Staff Name</option>
                    <!--<option value="">Order Date</option>-->
                    <option value="-1">All</option>
                  </select> Search
                </label>
              </div>
              <div class="datatable-search">
                <input class="datatable-input" placeholder="Enter Keyword" type="search" title="Search within table">

                <button class="btn search-button text-white" placement="top" type="submit"> Search
                  <!-- <span>
                        <i class="bi bi-search mx-2" style="color:white;"></i> -->

                </button>
              </div>
            </div>
            <table class="table table-borderless chat-table-admin chat-admin-table">
              <!-- <table class="table datatable table-bordered supplier-table"> -->
              <thead>
                <tr>
                  <th> Sr. No. </th>
                  <th>
                    Customer Name
                  </th>
                  <th>Agent Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>

                  <td>
                    Ram
                  </td>
                  <td>Krishna</td>
                  <td>kr123@gmail.com</td>
                  <td>1596324870</td>
                  <td>
                    <div class="viewchat">
                      <a href="viewchat.php">
                        <button type="button" class="btn btn-primary"><i class="bi bi-chat-dots-fill"></i> Chat </button>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>

                  <td>
                    Denis
                  </td>
                  <td>Theodore</td>
                  <td>th123@gmail.com</td>
                  <td>1596389870</td>
                  <td>
                    <div class="viewchat">
                      <a href="viewchat.php">
                        <button type="button" class="btn btn-primary"><i class="bi bi-chat-dots-fill"></i> Chat </button>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>3</td>

                  <td>
                    Krupa
                  </td>
                  <td>Kristan</td>
                  <td>krt123@gmail.com</td>
                  <td>9876543210</td>
                  <td>
                    <div class="viewchat">
                      <a href="viewchat.php">
                        <button type="button" class="btn btn-primary"><i class="bi bi-chat-dots-fill"></i> Chat </button>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>4</td>

                  <td>
                    Trisha
                  </td>
                  <td>Yug</td>
                  <td>yug123@gmail.com</td>
                  <td>163247890</td>
                  <td>
                    <div class="viewchat">
                      <a href="viewchat.php">
                        <button type="button" class="btn btn-primary"><i class="bi bi-chat-dots-fill"></i> Chat </button>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>
                    Ram
                  </td>
                  <td>Riddhi</td>
                  <td>rm123@gmail.com</td>
                  <td>1234567890</td>
                  <td>
                    <div class="viewchat">
                      <a href="viewchat.php">
                        <button type="button" class="btn btn-primary"><i class="bi bi-chat-dots-fill"></i> Chat </button>
                      </a>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>


</main><!-- End #main -->

@include('layouts.footer');