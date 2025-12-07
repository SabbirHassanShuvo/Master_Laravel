<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function addProductshow()
    {
        return view('backend.layouts.product.form'); // Blade view path
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'category' => 'required|string',
            'subcategory' => 'nullable|string',
            'brand' => 'nullable|string',
            'unit' => 'nullable|string',
            'tags' => 'nullable|string',
            'exchangeable' => 'nullable|boolean',
            'refundable' => 'nullable|boolean',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'compare_price' => 'nullable|numeric',
            'cost_per_item' => 'nullable|numeric',
            'sku' => 'nullable|string',
            'stock_status' => 'nullable|string',
        ]);

        Product::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'subcategory' => $validated['subcategory'] ?? null,
            'brand' => $validated['brand'] ?? null,
            'unit' => $validated['unit'] ?? null,
            'tags' => $validated['tags'] ?? null,
            'exchangeable' => $request->has('exchangeable') ? true : false,
            'refundable' => $request->has('refundable') ? true : false,
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'compare_price' => $validated['compare_price'] ?? null,
            'cost_per_item' => $validated['cost_per_item'] ?? null,
            'sku' => $validated['sku'] ?? null,
            'stock_status' => $validated['stock_status'] ?? 'In Stock',
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }
}
