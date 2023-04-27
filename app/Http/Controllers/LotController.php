<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lot;
use App\Models\Category;

class LotController extends Controller
{
    public function index(Request $request)
    {
        $query = Lot::query();

        if ($request->has('category')) {
            $categoryId = $request->category;
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('id', $categoryId);
            });
        }

        $lots = $query->get();

        $categories = Category::all();

        return view('lots.index', compact('lots', 'categories'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('lots.add-new-lot', compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'required|string|max:225',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id'
        ]);
      
        $lot = Lot::create($input);

        $lot->categories()->attach($input['categories']);

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
        $lot = Lot::findOrFail($id);
        $categories = $lot->categories()->get();
        return view('lots.show-lot', compact('lot', 'categories'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $lot = Lot::findOrFail($id);

        return view('lots.edit-lot', compact('categories', 'lot'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'required|string|max:225',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id'
        ]);
        
        $lot = Lot::findOrFail($id);
        $lot->update($input);
        $lot->categories()->sync($input['categories']);

        return back()
            ->with('status','Lot updated!');
    }

    public function destroy($id)
    {
        $lot = Lot::findOrFail($id);
        $lot->categories()->detach();
        $lot->delete();

        return back()->with('status', 'Lot delete!');
    }
}
