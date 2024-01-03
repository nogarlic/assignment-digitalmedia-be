<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Book;

class CanEditBook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $bookId = $request->route('book');
        
        $book = Book::find($bookId);
        
        if (!$book) {
            abort(404, 'Book not found.');
        }
    
        if ($request->user()->id === $book->user_id || $request->user()->isAdmin) {
            return $next($request);
        }
    
        abort(403, 'You are not authorized to this book.');
    }
    
    
}
