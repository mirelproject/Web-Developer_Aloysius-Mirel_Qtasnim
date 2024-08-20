@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Item Types</h1>
    <a href="{{ route('item-types.create') }}" class="btn btn-primary">Add New Item Type</a>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($itemTypes as $itemType)
        <tr>
            <td>{{ $itemType->type_name }}</td>
            <td>
                <a href="{{ route('item-types.edit', $itemType->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('item-types.destroy', $itemType->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
