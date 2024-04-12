@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Topup</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Topup</li>
          </ol>
        </nav>
        @if(Auth::user()->role != 1)
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#requestTopupModal">
          Instant Topup
        </button>
        @endif
      </div>
    </div>
  </div><!-- End Page Title -->

  <section class="section" id="topup001">
    <div class="row ">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header pb-0 px-4">

            <ul class="border-0 mt-3 nav nav-tabs" id="transactionTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link p-2 active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                  <span class="fw-medium tab-btn">All</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link p-2" id="requested-tab" data-bs-toggle="tab" data-bs-target="#requested" type="button" role="tab" aria-controls="requested" aria-selected="false">
                  <span class="fw-medium tab-btn">Requested</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link p-2" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab" aria-controls="approved" aria-selected="false">
                  <span class="fw-medium tab-btn">Approved</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link p-2" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">
                  <span class="fw-medium tab-btn">Rejected</span>
                </button>
              </li>
            </ul>
            
          </div>

          <div class="card-body view-top-table table-responsive">           

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <!-- Transactions table with all transactions -->
                @include('topup.partials.transaction_table', ['transactions' => $userTransactions])
              </div>
              <div class="tab-pane fade" id="requested" role="tabpanel" aria-labelledby="requested-tab">
                <!-- Transactions table with requested transactions -->
                @include('topup.partials.transaction_table', ['transactions' => $pendingTransactions])
              </div>
              <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                <!-- Transactions table with approved transactions -->
                @include('topup.partials.transaction_table', ['transactions' => $approvedTransactions])
              </div>
              <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                <!-- Transactions table with failed transactions -->
                @include('topup.partials.transaction_table', ['transactions' => $failedTransactions])
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>


</main><!-- End #main -->

<!-- Bootstrap Modal for Success and Error Messages -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="messageContent"></p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="requestTopupModal" tabindex="-1" aria-labelledby="requestTopupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="requestTopupModalLabel">Request Topup</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form to request topup -->
        <form id="requestTopupForm">
          <!-- Add form fields here -->
          <!-- For example: -->
          <div class="mb-3">
            <label for="topupAmount" class="form-label">Topup Amount</label>
            <input type="number" class="form-control" id="topupAmount" name="topupAmount">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitRequestTopup">Submit Request</button>
      </div>
    </div>
  </div>
</div>


@include('layouts.footer');