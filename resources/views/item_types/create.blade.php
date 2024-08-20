@extends('layouts.app')

@section('content')
<h1>Add New Item Type</h1>

<form action="{{ route('item-types.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="type_name" class="form-label">Item Type Name</label>
        <input type="text" name="type_name" id="type_name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Add Item Type</button>
    <a href="{{ route('item-types.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
