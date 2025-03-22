@extends('layouts.layout')

@section('title', 'Create Category')

@section('content')
<div class="container mt-4">
    <h2>Create Category</h2>
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        <div class="form-group">
            <label for="parent_id">Parent Category</label>
            <select class="form-control" id="parent_id" name="parent_id">
                <option value="">None</option>
                @foreach($parentCategories as $parent)
                    <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Category Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="meta_title">Meta Title</label>
            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
        </div>

        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <textarea class="form-control" id="meta_description" name="meta_description">{{ old('meta_description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Category</button>
    </form>
</div>
@endsection
