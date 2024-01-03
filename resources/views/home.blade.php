@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="">
                <div class="mt-5 mb-5">
                    <h1>{{ __('Recommendation book') }} : {{ $category_name }}</h1>
                </div>

                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <p class="m-2 bg-primary p-2 rounded text-white col-5 col-md-2 d-flex justify-content-center"><a href="{{ route('export.books')}}" class="m-0 text-white text-decoration-none">Download Excel</a></p>
                <p class="m-2 bg-primary p-2 rounded text-white col-5 col-md-2 d-flex justify-content-center"><a href="{{ route('export.pdf')}}" class="m-0 text-white text-decoration-none">Download PDF</a></p>
            </div>
              
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuCategories" data-bs-toggle="dropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Filter by Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuCategories">
                  <a class="dropdown-item" href="/home">All</a>
                  @foreach ($categories as $categoryId => $categoryName)
                      <a class="dropdown-item" href="?category={{ $categoryId }}">{{ $categoryName }}</a>
                  @endforeach
                </div>
            </div>

            @if ($books->count() > 0)
                <div class="pagination-summary mt-4">
                    Showing result {{ $books->firstItem() }} to {{ $books->lastItem() }} of {{ $books->total() }}
                </div>
                
                <div class="row d-flex justify-content-around mt-5">
                    @foreach ($books as $book)
                    <div class="card mb-5" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset($book->cover_image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="fw-bold"><a href="{{ route('book.show', ['book' => $book->id]) }}" class="m-0 text-dark text-decoration-none">{{ $book->title }}</a></h5>
                            <p class="card-text line-clamp-3">{{ $book->description }}</p>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Author</td>
                                        <td>: {{ $book->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Quantity</td>
                                        <td>: {{ $book->quantity }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <span class="badge bg-primary">{{ $book->category->name }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center mt-5">
                    <a href="{{ route('book.create') }}" class="btn btn-primary">Create New Book</a>
                </div>
            @endif

            <div class="pagination d-flex justify-content-center">
                <ul class="pagination-list  d-flex justify-content-between list-unstyled">
                    @if ($books->onFirstPage())
                        <li class="pagination-item disabled m-2">Previous</li>
                    @else
                        <li class="pagination-item m-2"><a href="{{ $books->previousPageUrl() }}">Previous</a></li>
                    @endif
            
                    @foreach ($books->getUrlRange(1, $books->lastPage()) as $page => $url)
                        <li class="pagination-item m-2 @if ($books->currentPage() === $page) active @endif">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
            
                    @if ($books->hasMorePages())
                        <li class="pagination-item m-2"><a href="{{ $books->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="pagination-item m-2 disabled">Next</li>
                    @endif
                </ul>
            </div>
            
            
        </div>
    </div>
</div>

@endsection
