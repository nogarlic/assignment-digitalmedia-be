@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-end">
        @auth
            @if((auth()->user()->id === $book->user->id) || (auth()->user()->isAdmin))
                <p class="m-2 bg-warning p-2 rounded text-white col-3 col-md-1 d-flex justify-content-center"><a href="{{ route('book.edit', ['book' => $book->id]) }}" class="m-0 text-white text-decoration-none">Edit Book</a></p>
                <form id="deleteForm" action="{{ route('book.destroy', ['book' => $book->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-danger text-white rounded p-2 m-2 border-0" onclick="return confirm('Are you sure you want to delete this book?')">Delete Book</button>
                </form>
            @endif
        @endauth
    </div>
    <div class="row align-items-center">
        <div class="m-md-5 d-block d-md-flex justify-content-center col-12 justify-content-md-between" style="width: 100%;">
            <div class="col-md-3 col-12 p-3 p-md-0">
                <img class="m-md-5" src="{{ asset($book->cover_image) }}" alt="Card image cap" style="width: 100%; height: auto;">
            </div>
            <div class="m-md-5 col-md-7 col-12 mt-5 p-3 p-md-0">
                <h5 class="card-title fw-bolder mb-3">{{ $book->title }}</h5>
                <p class="">{{ $book->description }}</p>
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

        <a href="{{ asset($book->file_path) }}" download="{{ $book->title }}" class="mt-5 mb-5">Download PDF</a>
        <iframe src="{{ asset($book->file_path) }}" width="100%" height="600px" class="mb-5"></iframe>
    </div>
    
</div>


@endsection