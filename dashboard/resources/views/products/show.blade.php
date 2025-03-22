@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>{{ $product->name }}</h3>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                            @else
                                <div class="text-center p-5 bg-light">No Image Available</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h4>Details</h4>
                            <hr>
                            <p><strong>ID:</strong> {{ $product->id }}</p>
                            <p><strong>Name:</strong> {{ $product->name }}</p>
                            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                            <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                            <p><strong>Description:</strong></p>
                            <p>{{ $product->description }}</p>
                            <p><strong>Created At:</strong> {{ $product->created_at->format('M d, Y H:i:s') }}</p>
                            <p><strong>Updated At:</strong> {{ $product->updated_at->format('M d, Y H:i:s') }}</p>
                            
                            <div class="mt-3">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
