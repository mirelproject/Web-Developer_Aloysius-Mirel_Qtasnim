<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemType;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::with('type')
            ->when($request->has('search'), function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->search}%");
            })
            ->when($request->has('sort_by'), function ($query) use ($request) {
                $query->orderBy($request->sort_by, $request->get('sort_direction', 'asc'));
            })
            ->paginate(10);

        return view('items.index', compact('items'));
    }

    public function create()
    {
        $itemTypes = ItemType::all();
        return view('items.create', compact('itemTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'type_id' => 'required|exists:item_types,id'
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $itemTypes = ItemType::all();
        return view('items.edit', compact('item', 'itemTypes'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'type_id' => 'required|exists:item_types,id'
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
