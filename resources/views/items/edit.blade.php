@extends('layouts.app')

@section('content')
<h1>Edit Item</h1>

<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Item Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" id="stock" class="form-control" value="{{ $item->stock }}" required>
    </div>
    <div class="mb-3">
        <label for="type_id" class="form-label">Item Type</label>
        <select name="type_id" id="type_id" class="form-control" required>
            @foreach($itemTypes as $type)
            <option value="{{ $type->id }}" {{ $type->id == $item->type_id ? 'selected' : '' }}>{{ $type->type_name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update Item</button>
    <a href="{{ route('items.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
