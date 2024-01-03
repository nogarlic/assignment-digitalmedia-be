<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = Book::orderBy('updated_at', 'desc'); 

        $categories = Category::pluck('name', 'id');
        $category_name = null;
        
        if ($request->has('category') && $request->input('category') !== 'All') {
            $category = $request->input('category');
            $query->where('category_id', $category);
            $category_name = Category::find($category)->name;
        }
        
        $books = $query->paginate(6); 
        
        return view('home', [
            'books' => $books, 
            'categories' => $categories,
            'category_name' => $category_name,
        ]);
    }
    

}
