@extends('layouts.layout')

@section('title', 'Edit Category')

@section('content')
<div class="container mt-4">
    <h2>Edit Category</h2>
    <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Specify that this is an update request -->

        <!-- Category Name -->
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <!-- Category Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $category->description) }}</textarea>
        </div>

        <!-- Category Status -->
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="active" {{ old('status', $category->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $category->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="archived" {{ old('status', $category->status) == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        <!-- Parent Category -->
        <div class="form-group">
            <label for="parent_id">Parent Category</label>
            <select class="form-control" id="parent_id" name="parent_id">
                <option value="">None</option>
                @foreach($parentCategories as $parent)
                    <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Category Image -->
        <div class="form-group">
            <label for="image">Category Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="100" class="mt-3">
            @else
                <span>No image uploaded</span>
            @endif
        </div>

        <!-- Meta Title -->
        <div class="form-group">
            <label for="meta_title">Meta Title</label>
            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $category->meta_title) }}">
        </div>

        <!-- Meta Description -->
        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <textarea class="form-control" id="meta_description" name="meta_description">{{ old('meta_description', $category->meta_description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Category</button>
    </form>
</div>
@endsection
