<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Item;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('item')->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $items = Item::all();
        return view('sales.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'sold_amount' => 'required|integer',
            'transaction_date' => 'required|date'
        ]);

        Sale::create($request->all());

        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }

    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $items = Item::all();
        return view('sales.edit', compact('sale', 'items'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'sold_amount' => 'required|integer',
            'transaction_date' => 'required|date'
        ]);

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}
