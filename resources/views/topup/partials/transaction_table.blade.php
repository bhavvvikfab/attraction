<!-- Partial view: partials/transaction_table.blade.php -->

<table class="table table-borderless datatable top-table">
    <thead>
        <tr>
            <th> Sr. No. </th>
            @if(Auth::user()->role == 1)
            <th> Agent </th>
            @endif
            <th> Request No. </th>
            <th data-type="date" data-format="DD/MM/YYYY">Request Date</th>
            <th>Amount</th>
            <th>Paylater</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $key => $transaction)
        <tr>
            <td>{{ $key + 1 }}</td>
            @if(Auth::user()->role == 1)
            <td> {{ $transaction->user->name }} </td>
            @endif
            <td>{{ $transaction->transaction_id }}</td>
            <td>{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>@if($transaction->paylater== 0){{'NO'}} @else{{'YES'}} @endif</td>
            <td>                
                @if($transaction->status == "pending")
                    @if(Auth::user()->role == 1)
                    <select class="btn btn-warning text-start" name="topup-request" id="topup-request" data-id="{{ $transaction->id }}">
                        <option value="pending">Requested</option>
                        <option value="completed">Approved</option>
                        <option value="failed">Reject</option>                              
                    </select>
                    @else
                        <button type="button" class="btn btn-warning">Pending</button>
                    @endif
                @elseif($transaction->status == "completed")
                <button type="button" class="btn btn-success">Approved</button>
                @else
                <button type="button" class="btn btn-danger">Rejected</button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
