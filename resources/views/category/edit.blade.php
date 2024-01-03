@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="mt-5 mb-5">
                <h1>{{ __('Edit Category') }}</h1>
            </div>

            <form method="POST" action="{{ route('category.update', ['category' => $category->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection