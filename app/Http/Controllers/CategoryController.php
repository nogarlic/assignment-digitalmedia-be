<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::orderBy('updated_at', 'desc'); 
        
        $categories = $query->paginate(6); 
        
        return view('category.list', [
            'categories' => $categories,
        ]);
    }

    public function show($id)
    {
        $categoryId = $id;

        $books = Book::where('category_id', $categoryId)
            ->orderBy('updated_at', 'desc')
            ->paginate(6);
        
        $categories = Category::pluck('name', 'id');
        $category_name = Category::find($categoryId)->name;
        
        return view('home', [
            'books' => $books,
            'categories' => $categories,
            'category_name' => $category_name,
        ]);
        
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $validatedData = $request->only('name');
    
        $category = Category::create($validatedData);
    
        return redirect()->route('category.index')
                        ->with('success', 'Category created successfully');
    }
    
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        $validatedData = $request->only('name');

        $category->update($validatedData);
        
        return redirect()->route('category.index')
                        ->with('success', 'Book updated successfully');
    }

    
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
    
        $category->delete();
    
        return redirect()->route('category.index')
                         ->with('success', 'Book deleted successfully');
    }
}
