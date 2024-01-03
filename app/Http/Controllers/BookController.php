<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Response;


class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $user_id = auth()->id();
        $books = Book::where('user_id', $user_id)->get();
        
        return view('profile', [
            'books' => $books
        ]);
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return abort(404); // Tampilkan halaman 404 jika buku tidak ditemukan
        }

        return view('book.detail', ['book' => $book]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('book.create', ['categories' => $categories]);
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'image|file|max:1024',
            'category_id' => [
                'required',
                Rule::in(Category::pluck('id')->toArray()), // Hanya menerima id yang ada di database
            ],
            'quantity' => 'required|numeric',
            'file_path' => 'required|mimes:pdf|max:10240', // Mengizinkan file PDF maksimum 10MB
        ]);
    
        $validatedData = $request->except('cover_image');      
        
        if ($request->hasFile('cover_image')) {
            $imageName = $request->file('cover_image')->getClientOriginalName(); 
            $imageExtension = $request->file('cover_image')->extension(); 
            $customImageName = 'cover_' . Str::random(10) . '.' . $imageExtension; 
            $imagePath = $request->file('cover_image')->storeAs('public/book-cover-images', $customImageName); 
            $validatedData['cover_image'] = 'storage/book-cover-images/' . $customImageName; 
        }
        
        if ($request->hasFile('file_path')) {
            $pdfName = $request->file('file_path')->getClientOriginalName(); 
            $pdfExtension = $request->file('file_path')->extension(); 
            $customPdfName = 'pdf_' . Str::random(10) . '.' . $pdfExtension; 
            $pdfPath = $request->file('file_path')->storeAs('public/pdf-files', $customPdfName); 
            $validatedData['file_path'] = 'storage/pdf-files/' . $customPdfName; 
        }
    
        $validatedData['user_id'] = auth()->user()->id;
    
        $book = Book::create($validatedData);
    
        return redirect()->route('profile', ['id' => $book->id])
                        ->with('success', 'Book created successfully');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
    
        return view('book.edit', compact('book', 'categories'));
    }
    

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'image|file|max:1024',
            'category_id' => [
                'required',
                Rule::in(Category::pluck('id')->toArray()), 
            ],
            'quantity' => 'required|numeric',
            'file_path' => 'mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::delete(str_replace('storage/', 'public/', $book->cover_image));
            }

            $imageName = $request->file('cover_image')->getClientOriginalName(); 
            $imageExtension = $request->file('cover_image')->extension(); 
            $customImageName = 'cover_' . Str::random(10) . '.' . $imageExtension; 
            $imagePath = $request->file('cover_image')->storeAs('public/book-cover-images', $customImageName); 
            $validatedData['cover_image'] = 'storage/book-cover-images/' . $customImageName; 
        }

        if ($request->hasFile('file_path')) {
            if ($book->file_path) {
                Storage::delete(str_replace('storage/', 'public/', $book->file_path));
            }

            $pdfName = $request->file('file_path')->getClientOriginalName(); 
            $pdfExtension = $request->file('file_path')->extension(); 
            $customPdfName = 'pdf_' . Str::random(10) . '.' . $pdfExtension; 
            $pdfPath = $request->file('file_path')->storeAs('public/pdf-files', $customPdfName); 
            $validatedData['file_path'] = 'storage/pdf-files/' . $customPdfName; 
        }

        $book->update($validatedData);
        

        return redirect()->route('book.show', ['book' => $book->id])
                        ->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
    
        if ($book->cover_image) {
            Storage::delete(str_replace('storage/', 'public/', $book->cover_image));
        }
    
        if ($book->file_path) {
            Storage::delete(str_replace('storage/', 'public/', $book->file_path));
        }
    
        $book->delete();
    
        return redirect()->route('profile')
                         ->with('success', 'Book deleted successfully');
    }

    public function export()
    {
        return Excel::download(new BooksExport, 'books.xlsx');
    }

    public function pdf_export()
    {
        $excelData = (new BooksExport)->collection(); 

        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true); 
        $dompdf->setOptions($options);
        
        $html = view('exports.books', compact('excelData'))->render();
        
        $dompdf->loadHtml($html);
        
        $dompdf->render();
        
        $filename = 'books.pdf';
        
        return $dompdf->stream($filename);
    }

}
