<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agent-Statement</title>
</head>
<style>
    h2 {
        text-align: center;
        border-bottom: 1px solid black;
        margin: 0;
        padding: 10px 0;
    }

    .w-full {
        width: 100%;
    }

    .w-half {
        width: 50%;
    }

    .margin-top {
        margin-top: 1.25rem;
    }

    .footer {
        font-size: 0.875rem;
        padding: 1rem;
        background-color: rgb(241 245 249);
    }

    table {
        width: 100%;
        border-spacing: 0;
    }

    table.products {
        font-size: 0.875rem;
        text-align: center;
    }

    table.products th {
        background-color: rgb(96 165 250);
        color: #ffffff;
        padding: 0.5rem;
    }

    table.products td {
        padding: 0.5rem;
    }

    .items td {
        background-color: rgb(241 245 249);
    }
</style>

<body>
    <?php
    if (session()->has('agent_statement_data')) {
        $data = session()->get('agent_statement_data');
        $transactions = $data['transactions'];
        $agent = $data['agent'];
    }
    ?>
    <table class="w-full">
        <tr>
            <td>
                <h2>Agent Statement</h2>
            </td>
        </tr>
    </table>
    <div>
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div>Name : {{ $agent->name ?? 'N/A' }} </div>
                    <div>Email: {{ $agent->email ?? 'N/A' }} </div>
                </td>
                <td class="w-half">
                    <div>Address : {{ $agent->address ?? 'N/A' }} </div>
                    <div>Credit Balance : {{ $agent->credit_balance ?? 'N/A' }} </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="margin-top">
        <table class="products">
            <tr>
                <th>S.no</th>
                <th>Date</th>
                <th>Transaction_id</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Balance</th>
            </tr>
            @if ($transactions->isEmpty())
                <tr>
                    <td colspan="6" >No transactions found!</td>
                </tr>
            @else
                <tr class="items">
                    @foreach ($transactions as $transaction)
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ date('Y-m-d', strtotime($transaction['created_at'])) }}</td>
                        <td>{{ $transaction['transaction_id'] }}</td>
                        <td>{{ $transaction['type'] }}</td>
                        <td>{{ $transaction['amount'] }}</td>
                        <td>{{ $transaction['balance'] }}</td>
                    @endforeach
                </tr>
            @endif
        </table>
    </div>
</body>

</html>
