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
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $fqa = new Fqa();
        $fqa->question = $validated['question'];
        $fqa->answer = $validated['answer'];
        $fqa->status = $validated['status'];
        $fqa->save();

        return redirect()->route('fqaList')->with('success', 'FAQ added successfully!');
    }

}
