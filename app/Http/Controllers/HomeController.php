<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $categories = Category::get();
        // $lots = Lot::get();
        // return view('home', compact('lots', 'categories'));

        $query = Lot::query();

        if ($request->has('categories')) {
            $categories = $request->input('categories');
            $query->whereHas('categories', function ($q) use ($categories) {
                $q->whereIn('name', $categories);
            });
        }

        $lots = $query->orderBy('created_at', 'desc')->paginate(10);

        $categories = Category::all();

        return view('home', compact('lots', 'categories'));
    }
}
