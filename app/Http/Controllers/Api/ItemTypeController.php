<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItemType;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    public function index()
    {
        $itemTypes = ItemType::all();
        return response()->json($itemTypes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required|string|max:255',
        ]);

        $itemType = ItemType::create($request->all());
        return response()->json($itemType, 201);
    }

    public function show($id)
    {
        $itemType = ItemType::find($id);

        if ($itemType) {
            return response()->json($itemType);
        } else {
            return response()->json(['message' => 'Item Type not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $itemType = ItemType::find($id);

        if (!$itemType) {
            return response()->json(['message' => 'Item Type not found'], 404);
        }

        $request->validate([
            'type_name' => 'required|string|max:255',
        ]);

        $itemType->update($request->all());

        return response()->json($itemType);
    }

    public function destroy($id)
    {
        $itemType = ItemType::find($id);

        if (!$itemType) {
            return response()->json(['message' => 'Item Type not found'], 404);
        }

        $itemType->delete();

        return response()->json(['message' => 'Item Type deleted successfully']);
    }
}
