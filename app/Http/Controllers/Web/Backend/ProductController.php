<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function productList()
    {
        return view('backend.layouts.product.index'); // Blade view path
    }
    
    public function getProducts(Request $request)
    {
        $products = Product::query();

        return DataTables::of($products)
            ->addColumn('status', function($row){
                return $row->refundable ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function($row){
                return '<a href="#" class="btn btn-sm btn-primary">Edit</a> 
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>';
            })
            ->rawColumns(['status','action'])
            ->make(true);
    }

    public function addProductshow()
    {
        return view('backend.layouts.product.form'); // Blade view path
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'product_type' => 'required|in:Simple,Classified',
            'category' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'tags' => 'nullable|string|max:255',
            'exchangeable' => 'sometimes|boolean',
            'refundable' => 'sometimes|boolean',
        ]);

        // Data insert
        $product = new Product();
        $product->name = $validated['name'];
        $product->type = $validated['product_type'];
        $product->category = $validated['category'];
        $product->brand = $validated['brand'];
        $product->unit = $validated['unit'];
        $product->tags = $validated['tags'] ?? null;
        $product->exchangeable = $request->has('exchangeable') ? $validated['exchangeable'] : false;
        $product->refundable = $request->has('refundable') ? $validated['refundable'] : true;
        $product->save();

        return redirect()->back()->with('success', 'Product added successfully!');
    }
}
