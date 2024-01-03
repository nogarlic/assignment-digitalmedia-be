@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="mt-5 mb-5">
                <h1>{{ __('Create New Book') }}</h1>
            </div>

            <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
                @csrf
            
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3 column">
                    <label for="cover_image" class="form-label col-sm-2">Cover Image</label>
                    <div class="col-sm-5">
                        <img src="" alt="" class="img-preview img-fluid mb-3 d-none">
                        <input class="form-control custom-file-input" type="file" id="cover_image" name="cover_image" onchange="previewImage()">
                        @error('cover_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="file_path" class="form-label">PDF File</label>
                    <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf" required>
                    @error('file_path')
                        <div class="text-danger">{{ $message }}</div>
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