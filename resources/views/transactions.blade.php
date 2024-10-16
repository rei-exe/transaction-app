<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction List</title>
</head>

<body>
    <h1>Transactions Page</h1>
    <pre>
            ,     ,
            )\___/(
           {(@)v(@)}
            {|~~~|}
            {/^^^\}
             `m-m` 
    </pre>

    <form action="{{ route('createTransactions') }}">
        @method('GET')
        @csrf
        <button type="submit">Create Transaction</button>
        <hr>
    </form>

    <div>
        @foreach ($transactions as $transaction)
            <div><b>ID:</b> {{ $transaction->id }}</div>
            <div><b>Transaction Title:</b> {{ $transaction->transaction_title }}</div>
            <div><b>Description:</b> {{ $transaction->description }}</div>
            <div><b>Status:</b> {{ $transaction->status }}</div>
            <div><b>Total Amount:</b> {{ $transaction->total_amount }}</div>
            <div><b>Transaction Number:</b> {{ $transaction->transaction_number }}</div>
            <div><b>Created At:</b> {{ $transaction->created_at }}</div>
            <div><b>Updated At:</b> {{ $transaction->updated_at }}</div>

            <form action="{{ route('readTransactions', ['id' => $transaction->id]) }}" method="GET">
                <button type="submit">View Transaction</button>
            </form>
            <hr>
        @endforeach
    </div>
</body>

</html>
