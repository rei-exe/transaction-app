<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
</head>

<body>
    <h1>Edit Transaction</h1>
    <pre>
            ,     ,
            )\___/(
           {(@)v(@)}
            {|~~~|} 
            {/^^^\}
             `m-m` 
    </pre>

    <form action="{{ route('updateTransactions', $transactions->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="transaction_title">Transaction Title:</label>
            <input type="text" id="transaction_title" name="transaction_title" value="{{ $transactions->transaction_title }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="{{ $transactions->description }}" required>
        </div>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="successful" {{ $transactions->status == 'successful' ? 'selected' : '' }}>Successful</option>
                <option value="declined" {{ $transactions->status == 'declined' ? 'selected' : '' }}>Declined</option>
            </select>
        </div>

        <div>
            <label for="total_amount">Total Amount:</label>
            <input type="number" id="total_amount" name="total_amount" value="{{ $transactions->total_amount }}" step="0.01" required>
        </div>

        <div>
            <label for="transaction_number">Transaction Number:</label>
            <input type="text" id="transaction_number" name="transaction_number" value="{{ $transactions->transaction_number }}" required>
        </div>
        
        <hr>
        <button type="submit">Update Transaction</button>
    </form>
    
    <form action="{{ route('showAllTransactions') }}" method="GET">
        @csrf
        <button type="submit">Back to Transaction List</button>
    </form>
    <hr>
</body>

</html>
