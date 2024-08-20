<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('item')->get();
        return response()->json($sales);
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'sold_amount' => 'required|integer',
            'transaction_date' => 'required|date'
        ]);

        $sale = Sale::create($request->all());
        return response()->json($sale, 201); 
    }

    public function show($id)
    {
        $sale = Sale::with('item')->find($id);

        if ($sale) {
            return response()->json($sale);
        } else {
            return response()->json(['message' => 'Sale not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::find($id);

        if (!$sale) {
            return response()->json(['message' => 'Sale not found'], 404);
        }

        $request->validate([
            'item_id' => 'required|exists:items,id',
            'sold_amount' => 'required|integer',
            'transaction_date' => 'required|date'
        ]);

        $sale->update($request->all());

        return response()->json($sale);
    }

    public function destroy($id)
    {
        $sale = Sale::find($id);

        if (!$sale) {
            return response()->json(['message' => 'Sale not found'], 404);
        }

        $sale->delete();

        return response()->json(['message' => 'Sale deleted successfully']);
    }
}
