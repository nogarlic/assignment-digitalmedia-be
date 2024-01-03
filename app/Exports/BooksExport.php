<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BooksExport implements FromCollection
{
    public function collection()
    {
        return Book::select(
                'books.title',
                'categories.name as category_name',
                'books.description',
                'books.quantity',
                'books.file_path',
                'books.cover_image',
                'users.name as user_name'
            )
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->join('users', 'books.user_id', '=', 'users.id')
            ->get();
    }
}

