@extends('layouts.app')

@section('content')
<h1>Add New Item</h1>

<form action="{{ route('items.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Item Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" id="stock" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="type_id" class="form-label">Item Type</label>
        <select name="type_id" id="type_id" class="form-control" required>
            @foreach($itemTypes as $type)
            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Add Item</button>
    <a href="{{ route('items.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
