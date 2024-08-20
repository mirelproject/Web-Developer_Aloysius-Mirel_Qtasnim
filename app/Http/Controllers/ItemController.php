<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::with('type');

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        if ($request->has('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        if ($request->has('sort_by')) {
            $query->orderBy($request->sort_by, $request->get('sort_direction', 'asc'));
        }

        $items = $query->paginate(10);

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

    public function compare(Request $request)
    {
        $order = $request->get('order', 'highest') == 'lowest' ? 'asc' : 'desc';

        $items = Item::select('items.name', 'item_types.type_name', DB::raw('SUM(sales.sold_amount) as total_sold'))
            ->join('item_types', 'items.type_id', '=', 'item_types.id')
            ->join('sales', 'items.id', '=', 'sales.item_id')
            ->groupBy('items.id', 'items.name', 'item_types.type_name')
            ->orderBy('total_sold', $order)
            ->get();

        return view('items.compare', compact('items', 'order'));
    }
}
