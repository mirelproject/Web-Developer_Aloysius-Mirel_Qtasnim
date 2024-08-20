@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Items List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Stock</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->stock }}</td>
                <td>{{ $item->type->type_name }}</td>
                <td>
                    <a href="{{ route('items.show', $item->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
