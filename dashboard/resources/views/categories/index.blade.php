@extends('layouts.layout')

@section('title', 'Categories')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Category Table -->
        <div class="col-12">
            <div class="card card-round shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>
    @if($category->image)
        <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" class="img-fluid" style="max-width: 50px; max-height: 50px; object-fit: cover;">
    @else
        <span>No Image</span>
    @endif
</td>
                                            <td>{{ $category->created_at->format('Y-m-d H:i') }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                                                
                                                <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Stats Section -->
    <div class="row mt-4">
        <!-- Total Categories -->
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-list"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Categories</p>
                                <h4 class="card-title">{{ $categories->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Example: Category Image Distribution Chart -->
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fas fa-image"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Categories with Image</p>
                                <h4 class="card-title">{{ $categories->whereNotNull('image')->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart for Category Distribution -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Category Distribution</div>
                </div>
                <div class="card-body">
                    <canvas id="categoryChart" width="1360" height="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Pie chart showing distribution of categories with images
    var ctx = document.getElementById('categoryChart').getContext('2d');
    var categoryChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: @json($categories->pluck('name')), // Category names dynamically
            datasets: [{
                data: @json($categories->map(function($category) {
                    // Check if category has a valid image (not null or empty)
                    return $category->image && $category->image !== '' ? 1 : 0;
                })),
                backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#F1C40F'], // Category colors
                borderColor: ['#FF5733', '#33FF57', '#3357FF', '#F1C40F'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
</script>

@endsection
