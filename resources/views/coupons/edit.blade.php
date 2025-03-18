@extends('layouts.layout')
@section('title', 'Edit Coupon')

@section('content')
<h1>Edit Coupon</h1>
<form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="code">Coupon Code</label>
        <input type="text" class="form-control" id="code" name="code" value="{{ $coupon->code }}" required>
    </div>
    <div class="form-group">
        <label for="discount_percentage">Discount Percentage</label>
        <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" value="{{ $coupon->discount_percentage }}" required>
    </div>
    <div class="form-group">
        <label for="limit">Usage Limit</label>
        <input type="number" class="form-control" id="limit" name="limit" value="{{ $coupon->limit }}" required>
    </div>
    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $coupon->start_date }}" required>
    </div>
    <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $coupon->end_date }}" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Coupon</button>
    </div>
</form>
@endsection