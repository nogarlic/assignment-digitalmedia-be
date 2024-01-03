@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="">
                <div class="mt-5 mb-5">
                    <h1>{{ __('Kategori Buku') }}</h1>
                </div>

                <p class="bg-success p-2 rounded text-white col-12 col-md-2 d-flex justify-content-center"><a href="{{ route('category.create') }}" class="m-0 text-white text-decoration-none">Create New Category</a></p>
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
                    @foreach ($categories as $category)
                    <li class="list-group-item d-flex align-items-center justify-content-between"> 
                        <a href="{{ route('category.show', ['category' => $category->id]) }}" class="m-0 col-6">{{ $category->name }}</a>
                        <div class="d-flex justify-content-center">
                            <p class="bg-warning p-2 m-0 mx-2 bg-warning p-2 rounded text-white rounded text-white col-6 d-flex justify-content-center"><a href="{{ route('category.edit', ['category' => $category->id]) }}" class="m-0 text-white text-decoration-none">Edit</a></p>
                            <form id="deleteForm" action="{{ route('category.destroy', ['category' => $category->id]) }}" method="POST" class="col-6">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-danger text-white rounded pt-2 pb-2 border-0" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
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