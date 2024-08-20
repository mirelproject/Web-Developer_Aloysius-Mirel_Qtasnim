<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    public function index()
    {
        $itemTypes = ItemType::all();
        return view('item_types.index', compact('itemTypes'));
    }

    public function create()
    {
        return view('item_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required',
        ]);

        ItemType::create($request->all());

        return redirect()->route('item-types.index')->with('success', 'Item Type created successfully.');
    }

    public function show(ItemType $itemType)
    {
        return view('item_types.show', compact('itemType'));
    }

    public function edit(ItemType $itemType)
    {
        return view('item_types.edit', compact('itemType'));
    }

    public function update(Request $request, ItemType $itemType)
    {
        $request->validate([
            'type_name' => 'required',
        ]);

        $itemType->update($request->all());

        return redirect()->route('item-types.index')->with('success', 'Item Type updated successfully.');
    }

    public function destroy(ItemType $itemType)
    {
        $itemType->delete();

        return redirect()->route('item-types.index')->with('success', 'Item Type deleted successfully.');
    }
}
