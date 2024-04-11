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
  </div>


  <section class="chatbtwstandcu">
    <div class="container">

      <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-8 col-xl-8">

          <div class="card" id="chat1" style="border-radius: 15px;">
            <div class="card-header mb-3">
              <div class="row">
                <div class="col-lg-8">
                  <h5 class="card-title text-start">Chat </h5>
                </div>
                <div class="col-lg-4">
                  <h5 class="card-title text-end chatback">
                    <a href="chatadmin.php"> Back </a>
                  </h5>
                </div>
              </div>
            </div>
            <div class="card-body">

              <div class="d-flex flex-row justify-content-start mb-4">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                <div class="ms-3 staff-chat">
                  <p class="mb-0">Hello below.</p>
                </div>
              </div>

              <div class="d-flex flex-row justify-content-end mb-4">
                <div class="me-3 cust-chat">
                  <p class="mb-0">Hi</p>
                </div>
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
              </div>

              <div class="d-flex flex-row justify-content-start mb-4">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">

                <div class="ms-3 staff-chat">
                  <p class="mb-0">How are You ?</p>
                </div>

              </div>

              <div class="d-flex flex-row justify-content-start mb-4">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                <div class="ms-3 staff-chat ">
                  <p class="mb-0"> Is there anything i can help</p>
                </div>
              </div>

              <div class="d-flex flex-row justify-content-end mb-4">
                <div class="me-3 cust-chat">
                  <p class="mb-0">Hi</p>
                </div>
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
              </div>

              <div class="d-flex flex-row justify-content-end mb-4">
                <div class="me-3 cust-chat">
                  <p class="mb-0">Hi</p>
                </div>
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
              </div>

              <div class="d-flex flex-row justify-content-start mb-4">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                <div class="ms-3 staff-chat ">
                  <p class="mb-0"> Is there anything i can help</p>
                </div>
              </div>

              <div class="d-flex flex-row justify-content-end mb-4">
                <div class="me-3 cust-chat">
                  <p class="mb-0">Hi</p>
                </div>
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
              </div>

              <div class="d-flex flex-row justify-content-end mb-4">
                <div class="me-3 cust-chat">
                  <p class="mb-0">Hi</p>
                </div>
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
              </div>


            </div>


            <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
              <div class="input-group mb-0">
                <input type="text" id="msgtext" class="form-control" placeholder="Type message">


                <button class="btn btn-primary send-btn" type="button" receiver-id="" id="button-addon2">
                  Send
                </button>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

</main><!-- End #main -->

@include('layouts.footer');