<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

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
        // Validate using Validator facade
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'product_type' => 'required|in:Simple,Classified',
            'category' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'tags' => 'nullable|string|max:255',
            'exchangeable' => 'nullable|boolean',
            'refundable' => 'nullable|boolean',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new product
        $product = new Product();
        $product->name = $request->name;
        $product->type = $request->product_type;
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->unit = $request->unit;
        $product->tags = $request->tags ?? null;
        $product->exchangeable = $request->has('exchangeable') ? true : false;
        $product->refundable = $request->has('refundable') ? true : false;
        $product->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product added successfully!');
    }

}
