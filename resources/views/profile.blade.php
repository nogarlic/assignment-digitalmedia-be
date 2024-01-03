@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="">
                <div class="mt-5 mb-5">
                    <h1>{{ __('My Book') }}</h1>
                </div>

                <p class="bg-success p-2 rounded text-white col-12 col-md-2 d-flex justify-content-center"><a href="{{ route('book.create') }}" class="m-0 text-white text-decoration-none">Create New Book</a></p>
                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row d-flex justify-content-around mt-5">
                <ul class="list-group w-100"> 
                    @foreach ($books as $book)
                    <li class="list-group-item d-flex align-items-center justify-content-between"> 
                        <a href="{{ route('book.show', ['book' => $book->id]) }}" class="m-0">{{ $book->title }}</a>
                        <div class="d-flex justify-content-center">
                            <p class="bg-warning p-2 m-0 mx-2 bg-warning p-2 rounded text-white rounded text-white col-6 d-flex justify-content-center"><a href="{{ route('book.edit', ['book' => $book->id]) }}" class="m-0 text-white text-decoration-none">Edit Book</a></p>
                            <form id="deleteForm" action="{{ route('book.destroy', ['book' => $book->id]) }}" method="POST" class="col-6">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-danger text-white rounded pt-2 pb-2 border-0" onclick="return confirm('Are you sure you want to delete this book?')">Delete Book</button>
                            </form>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            
            

        </div>
    </div>
</div>


@endsection