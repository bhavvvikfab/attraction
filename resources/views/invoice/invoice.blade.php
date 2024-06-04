<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .card-body { padding: 20px; border: 1px solid #ddd; }
        .font-weight-bold { font-weight: bold; }
        .text-right { text-align: right; }
        .mb-2 { margin-bottom: 16px; }
        .p-4 { padding: 16px; }
        .selectticket-card { margin: 10px 0; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        .table th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="card-body" id="contentToDownload">
        <div class="row">
            <div class="col-md-6">
                <h5 class="font-weight-bold">Agent Details</h5>
                <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Mobile:</strong> {{ Auth::user()->phone }}</p>
                <p><strong>Address:</strong> {{ Auth::user()->address ?? 'NA' }}</p>
            </div>
            <div class="col-md-6 text-right">
                <h5 class="font-weight-bold">Customer Details</h5>
                <p><strong>Name:</strong> Customer Name</p>
                <p><strong>Email:</strong> customer@example.com</p>
                <p><strong>Mobile:</strong> +0987654321</p>
                <p><strong>Address:</strong> 456 Customer Road, City, Country</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                @if(!empty($items))
                    @foreach($items as $singlecart)
                        <div class="selectticket-card card text-dark m-2">
                            <div class="selectticket-infor col-md-12 px-2 py-1">
                                <div class="mb-2 fs-5 ticket-card-header">{{ $singlecart['attractionDetails']['name'] }}</div>
                            </div>
                            <div class="p-4">
                                @foreach($singlecart['options'] as $single_option)
                                    <div class="mb-4 myticket">
                                        <div class="selectticket-card card text-dark mb-2">
                                            <div class="selectticket-infor col-md-12 px-2 py-1">
                                                <div class="row align-items-center h-100 p-2">
                                                    <div class="col-lg col-md d-flex align-items-center justify-content-center">
                                                        <div class="row w-100">
                                                            <div class="col-sm col">
                                                                <h6 class="ticket-card-header">{{ $single_option['optionDetailsArray']['option_name'] }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(!empty($single_option['tickets']))
                                                <div class="selectticket-quantity table-responsive border-top bg-white">
                                                    <table class="select-ticket-table table font-weight-normal m-10">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col"></th>
                                                                <th scope="col">Ticket Type ID:</th>
                                                                <th scope="col">SKU:</th>
                                                                <th scope="col">Nett Price:</th>
                                                                <th class="text-center" scope="col">QTY:</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($single_option['tickets'] as $single_ticket)
                                                                <tr>
                                                                    <td width="15%">
                                                                        <div class="name-info-wrapper">
                                                                            <h6 class="variation-title font-style-primary">
                                                                                <span class="font-weight-bold">{{ $single_ticket['ticketdetails_array']['ticket_name'] ?? 'NA' }}</span>
                                                                            </h6>
                                                                        </div>
                                                                    </td>
                                                                    <td data-cell="Ticket Type ID:">
                                                                        <div class="variation-price d-inline">
                                                                            <span>{{ $single_ticket['ticket_id'] ?? 'NA' }}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td data-cell="SKU:">
                                                                        <div class="variation-price d-inline">
                                                                            <span>{{ $single_ticket['ticketdetails_array']['sku'] ?? 'NA' }}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td data-cell="Nett Price:">
                                                                        <div>
                                                                            <h6 class="variation-title font-style-primary p-0">
                                                                                <span class="font-weight-bold">{{ $single_ticket['agent_price'] ?? 'NA' }}</span>
                                                                            </h6>
                                                                        </div>
                                                                    </td>
                                                                    <td class="td-text-cart" data-cell="QTY:">
                                                                        <span class="font-weight-bold">{{ $single_ticket['count'] ?? 0 }}</span>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <div class="card cart-body">
                    <div class="card-body p-3">
                        <div class="card-title-cart d-flex justify-content-between align-items-center">
                            <h6>Sub Total</h6>
                            <div class="text-right">
                                <h6 class="card-text font-weight-500">
                                    <p class="sub_totle">{{ $subtotal }}</p>
                                </h6>
                            </div>
                        </div>
                        <div class="card-title-cart d-flex justify-content-between align-items-center">
                            <h6>Payable Amount</h6>
                            <h6 class="card-text font-weight-500">
                                <p class="payble_amount">{{ $subtotal }}</p>
                            </h6>
                        </div>
                        <hr>
                        <div class="card-title-cart d-flex justify-content-between align-items-center">
                            <h5 class="text-pinky font-weight-bold">Total (SGD)</h5>
                            <h5 class="card-text text-pinky font-weight-bold">
                                <p class="final_subtotal">{{ $subtotal }}</p>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
