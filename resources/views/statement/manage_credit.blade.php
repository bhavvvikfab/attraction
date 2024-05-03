@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>Manage Credit</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Manage Credit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <?php
    
    $topup_topup = 0;
    $total_usage = 0;
    $total_credit = 0;
    
    if ($total_topup_Amount != 0) {
        $total = $total_topup_Amount ?? '0';
        $topup_topup = ($total_topup_Amount / $total) * 100;
        $topup_topup = min($topup_topup, 100);
    
        $total_usage = ($total_usage_Amount / $total) * 100;
        $total_usage = min($total_usage, 100);
    
        $credit_balance = Auth::user()->credit_balance;
        $total_credit = ($credit_balance / $total) * 100;
        $total_credit = min($total_credit, 100);
    }
    
    ?>
    <section class="section">

        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="card shadow-lg" style="background-color: rgba(194, 194, 194, 0.397);">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h4 class="text-primary fw-bold">{{ $total_topup_Amount ?? '0' }}.00</h4>
                                        <small class="text-secondary fw-bold">Total Top-Up</small>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-bubbles warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        style="width: <?php echo $topup_topup; ?>%" aria-valuenow="<?php echo $topup_topup; ?>"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4">
                    {{-- <div class="col-xl-3 col-sm-6 col-sm-4"> --}}
                    <div class="card shadow-lg" style=" background-color: rgba(194, 194, 194, 0.397);">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h4 class="text-danger fw-bold">{{ $total_usage_Amount ?? '0' }}.00</h4>
                                        <small class="fw-bold text-secondary">Total Usage</small>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-bubbles warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-danger" role="progressbar"
                                        style="width: <?php echo $total_usage; ?>%" aria-valuenow="<?php echo $total_usage; ?>"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>


                <div class="col-sm-12 col-md-4 col-lg-4">
                    {{-- <div class="col-xl-3 col-sm-6 col-sm-4"> --}}
                    <div class="card shadow-lg" style=" background-color: rgba(194, 194, 194, 0.397);">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h4 class="text-success fw-bold"><?php echo Auth::user()->credit_balance ?? '00'; ?></h4>
                                        <small class="fw-bold text-secondary">Credits Balance</small>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-bubbles warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: <?php echo $total_credit; ?>%" aria-valuenow="<?php echo $total_credit; ?>"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>

            </div>

        </div>



        <div class="container mt-3 shadow-lg overflow-auto p-3" style="min-height: 40vh;">
            <table id="mytable" class="">
                <thead class="text-light" style="background-color: #185174;">
                    <tr>
                        <th>Updated Date & Time</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
                        <th>Transaction Ref No.</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data)
                        @foreach ($data as $agent)
                            <tr>
                                <td>{{ $agent->created_at->format('d-m-Y') ?? 'N/A' }}</td>
                                <td>{{ $agent->amount ?? 'N/A' }}</td>
                                <td>
                                    @if ($agent->type == 'credit')
                                        <span class="btn  border border-success text-success btn-sm fw-bold p-0 px-1 ">Credited</span>
                                        @elseif($agent->type == 'debit')
                                        <span class="btn  border border-danger text-danger btn-sm fw-bold p-0 px-1">Debited</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($agent->status == 'completed')
                                    <span class="btn btn-success btn-sm fw-bold p-0 px-1">Success</span>
                                    @elseif($agent->status == 'failed')
                                    <span class="btn btn-danger btn-sm fw-bold p-0 px-1">Failed</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($agent->transaction_id)
                                        {{ $agent->transaction_id }}
                                        <button type="button" class="btn btn-sm transaction" data-bs-toggle="modal"
                                            data-bs-target="#transaction_id" data-id="{{ $agent->id }}">
                                            <i class="bi bi-box-arrow-in-up-right"></i>
                                        </button>
                                    @else
                                        N/A
                                    @endif
                                </td>

                                <td>
                                    <button style="background-color: #185174" class="remark btn btn-sm text-light"
                                        data-bs-toggle="modal" data-bs-target="#remark" data-id="{{ $agent->id }}">
                                        <i class="bi bi-chat-square"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </section>

    {{-- modal transaction_click  --}}
    <div class="modal fade" id="transaction_id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title fw-bold " id="exampleModalLabel">Transaction
                        Details</span>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" id='transaction_details'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal transaction_click  end --}}

    {{-- remark modal start --}}
    <div class="modal fade" id="remark" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title fw-bold " id="exampleModalLabel"><i class="bi bi-chat-right-fill"></i>
                        Remarks</span>
                    <button type="button" class="btn-close btn-sm fw-bold" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" id='remark_body'>
                </div>
            </div>
        </div>
    </div>
    {{-- remark modal end --}}

</main>
<!-- End #main -->
<script>
    $(document).ready(function() {
        $('#mytable').DataTable();

        $(document).on('click', '.transaction', function(e) {
            e.preventDefault();
            id = $(this).data('id');
            get_transaction(id, (error, transaction) => {
                if (error) {
                    console.error('Error retrieving transaction:', error);
                } else {
                    $('#transaction_details').empty();
                    $('#transaction_details').append(`
                        <span class="fw-bold text-secondary">Transaction ID : </span><span>${transaction.transaction_id}</span><br>
                        <span class="fw-bold text-secondary">Type : </span><span>${transaction.type}</span><br>
                        `)
                }
            });

        });

        $(document).on('click', '.remark', function(e) {
            e.preventDefault();
            id = $(this).data('id');
            get_transaction(id, (error, transaction) => {
                if (error) {
                    console.error('Error retrieving transaction:', error);
                } else {
                    const dateTimeString = transaction.created_at;
                    const formattedDateTime = new Date(dateTimeString).toLocaleString('en-IN', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit',
                    });
                    $('#remark_body').empty();
                    $('#remark_body').append(`
                    <div class="alert alert-secondary">
                    <strong>${transaction.amount}</strong> Received on ${formattedDateTime} on this transaction ID. <strong>${transaction.transaction_id}</strong>
                    </div> 
                        `)
                }
            });
        });

        function get_transaction(id, callback) {

            $.ajax({
                url: 'get_transaction',
                method: 'post',
                data: {
                    id: id
                },
                success: (data) => {
                    if (data.status == 200) {
                        let transaction = data.results[0];
                        callback(null, transaction);
                    } else {
                        callback(data.error, null);
                    }
                },
                error: (error) => {
                    console.log(error);
                    callback(error, null);
                },

            });
        }
    });
</script>
<style>
  .hover-none:hover {
        color: inherit;
        background-color: inherit;
        border-color: inherit;
    }
</style>

@include('layouts.footer');
