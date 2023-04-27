<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.add-new-category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:225',
        ]);
      
        $input = $request->all();
    
        Category::create($input);

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
        $category = Category::findOrFail($id);

        return view('categories.edit-category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:225',
        ]);
      
        $input = $request->all();
        
        $category = Category::findOrFail($id);
        $category->update($input);

        return back()
            ->with('status','Category updated!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return back()->with('status', 'Category delete!');
    }
}
