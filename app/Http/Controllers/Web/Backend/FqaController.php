<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Fqa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class FqaController extends Controller
{

    public function fqaList()
    {
        return view('backend.layouts.fqa.index'); 
    }
    public function getFqa(Request $request)
    {
        $fqas = Fqa::query();

        return DataTables::of($fqas)
            ->addColumn('status', function($row){
                return $row->status === 'active' 
                    ? '<span class="badge bg-success">Active</span>' 
                    : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function($row){
                $editUrl = route('fqa.edit', $row->id);
                $deleteUrl = route('fqa.destroy', $row->id);
                return '<a href="'.$editUrl.'" class="btn btn-sm btn-primary">Edit</a> 
                        <button type="button" data-url="'.$deleteUrl.'" class="btn btn-sm btn-danger btn-delete">Delete</button>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
    public function show(){
        return view('backend.layouts.fqa.form');
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

    public function edit($id)
    {
        $fqa = Fqa::findOrFail($id);
        return view('backend.layouts.fqa.edit', compact('fqa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $fqa = Fqa::findOrFail($id);
        $fqa->update($request->all());

        return redirect()->route('fqa.edit', $id)->with('success', 'FAQ updated successfully!');
    }

    public function destroy($id)
    {
        $fqa = Fqa::findOrFail($id);
        $fqa->delete();

        return response()->json(['success' => 'FAQ deleted successfully!']);
    }
}