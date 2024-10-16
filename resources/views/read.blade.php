<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Transaction</title>
</head>

<body>
    <h1>Transaction Details</h1>
    <pre>
            ,     ,
            )\___/(
           {(@)v(@)}
            {|~~~|}
            {/^^^\}
             `m-m` 
    </pre>

    <div>
        <strong>Transaction Title:</strong> {{ $transactions->transaction_title }}
    </div>

    <div>
        <strong>Description:</strong> {{ $transactions->description }}
    </div>

    <div>
        <strong>Status:</strong> {{ $transactions->status }}
    </div>

    <div>
        <strong>Total Amount:</strong> ${{ number_format($transactions->total_amount, 2) }}
    </div>

    <div>
        <strong>Transaction Number:</strong> {{ $transactions->transaction_number }}
    </div>

    <hr>

    <form action="{{ route('editTransactions', $transactions->id) }}" method="GET">
        @csrf
        <button type="submit">Edit Transaction</button>
    </form>

    <form action="{{ route('deleteTransactions', $transactions->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this transaction?');">Delete Transaction</button>
    </form>

    <form action="{{ route('showAllTransactions') }}" method="GET">
        @csrf
        <button type="submit">Back to Transaction List</button>
    </form>
    
    <hr>
</body>

</html>
