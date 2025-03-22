@extends('layouts.layout')
@section('title', 'Create new Coupon')

@section('content')
<h1>Create new Coupon</h1>
<form action="{{ route('coupons.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="code">Coupon Code</label>
        <input type="text" class="form-control" id="code" name="code" required>
    </div>
    <div class="form-group">
        <label for="discount_percentage">Discount Percentage</label>
        <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" required>
    </div>
    <div class="form-group">
        <label for="limit">Usage Limit</label>
        <input type="number" class="form-control" id="limit" name="limit" required>
    </div>
    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" class="form-control" id="start_date" name="start_date" required>
    </div>
    <div class="form-group">
        <label for="start_date">End Date</label>
        <input type="date" class="form-control" id="end_date" name="end_date" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create Coupon</button>
    </div>
</form>
@endsection