@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="mt-5 mb-5">
                <h1>{{ __('Edit Book') }}</h1>
            </div>
            <form action="{{ route('book.update', ['book' => $book->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $book->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $book->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Cover Image</label>
                    <div class="col-sm-5">
                        <img src="{{ asset($book->cover_image) }}" alt="Current Cover Image" class="img-preview img-fluid mb-3 d-block">
                        <input class="form-control custom-file-input @error('cover_image') is-invalid @enderror" type="file" id="cover_image" name="cover_image" onchange="previewImage()">
                        @error('cover_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $book->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity', $book->quantity) }}" required>
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="file_path" class="form-label">PDF File</label>
                    <input type="file" class="form-control @error('file_path') is-invalid @enderror" id="file_path" name="file_path" accept=".pdf">
                    @error('file_path')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>     
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#cover_image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.classList.remove('d-none');

        const reader = new FileReader();
        reader.readAsDataURL(image.files[0]);

        reader.onload = function(event) {
            imgPreview.src = event.target.result;
        }
    }
</script>

@endsection