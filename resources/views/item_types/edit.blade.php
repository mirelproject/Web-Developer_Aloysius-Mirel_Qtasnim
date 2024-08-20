@extends('layouts.app')

@section('content')
<h1>Edit Item Type</h1>

<form action="{{ route('item-types.update', $itemType->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="type_name" class="form-label">Item Type Name</label>
        <input type="text" name="type_name" id="type_name" class="form-control" value="{{ $itemType->type_name }}" required>
    </div>
    <button type="submit" class="btn btn-success">Update Item Type</button>
    <a href="{{ route('item-types.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
