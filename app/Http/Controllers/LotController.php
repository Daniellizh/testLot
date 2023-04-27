<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lot;
use App\Models\Category;

class LotController extends Controller
{
    public function index()
    {
        $lots = Lot::with('categories')->get();
        return view('lots.index', compact('lots'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('lots.add-new-lot', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'required|string|max:225',
            'category_id'=>'required',
        ]);
      
        $input = $request->all();
    
        Lot::create($input);

        return back()
            ->with('status','Done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::all();
        $lot = Lot::findOrFail($id);

        return view('lots.edit-lot', compact('categories', 'lot'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'required|string|max:225',
        ]);
      
        $input = $request->all();
        
        $lot = Lot::findOrFail($id);
        $lot->update($input);

        return back()
            ->with('status','Lot updated!');
    }

    public function destroy($id)
    {
        $lot = Lot::findOrFail($id);

        $lot->delete();

        return back()->with('status', 'Lot delete!');
    }
}
