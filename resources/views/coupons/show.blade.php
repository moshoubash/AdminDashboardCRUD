@extends('layouts.layout')
@section('title', 'Coupon Details')

@section('content')
<h1>Coupon Details</h1>

<table class="table table-striped">
  <tr>
    <th>ID</th>
    <td>{{ $coupon->id }}</td>
  </tr>
  <tr>
    <th>Coupon Code</th>
    <td>{{ $coupon->code }}</td>
  </tr>
  <tr>
    <th>Discount Percentage</th>
    <td>{{ $coupon->discount_percentage }}%</td>
  </tr>
  <tr>
    <th>Usage Limit</th>
    <td>{{ $coupon->limit }}</td>
  </tr>
  <tr>
    <th>Start Date</th>
    <td>{{ $coupon->start_date }}</td>
  </tr>
  <tr>
    <th>End Date</th>
    <td>{{ $coupon->end_date }}</td>
  </tr>
</table>

<a href="{{ route('coupons.index') }}" class="btn btn-primary">Back to Coupons List</a>
@endsection