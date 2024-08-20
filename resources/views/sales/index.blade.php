@extends('layouts.app')

@section('content')
<h1>Add New Sale</h1>

<form action="{{ route('sales.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="item_id" class="form-label">Item</label>
        <select name="item_id" id="item_id" class="form-control" required>
            @foreach($items as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="sold_amount" class="form-label">Sold Amount</label>
        <input type="number" name="sold_amount" id="sold_amount" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="transaction_date" class="form-label">Transaction Date</label>
        <input type="date" name="transaction_date" id="transaction_date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Add Sale</button>
    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
