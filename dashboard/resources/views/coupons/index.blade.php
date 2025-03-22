@extends('layouts.layout')
@section('title', 'Coupons List')

@section('content')
<h1>Coupons List</h1>

<a href="{{ route('coupons.create') }}" class="btn btn-primary my-2">Add New Coupon</a>

<table class="table table-striped">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Code</th>
      <th>Percentage</th>
      <th>Usage Limit</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($coupons as $coupon)
    <tr>
      <td>{{ $coupon->id }}</td>
      <td>{{ $coupon->code }}</td>
      <td>{{ $coupon->discount_percentage }}%</td>
      <td>{{ $coupon->limit }}</td>
      <td>{{ $coupon->start_date }}</td>
      <td>{{ $coupon->end_date }}</td>
      <td>
        <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-edit"></i></a>
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#couponModal{{ $coupon->id }}">
          <i class="fas fa-trash"></i>
        </button>
        <a href="{{route('coupons.show', $coupon->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-info-circle"></i></a>
        <!-- Modal -->
        <div class="modal fade" id="couponModal{{ $coupon->id }}" tabindex="-1" role="dialog" aria-labelledby="couponModalLabel{{ $coupon->id }}" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="couponModalLabel{{ $coupon->id }}">Delete Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete this coupon?</p>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <a href="{{ route('coupons.destroy', $coupon->id) }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $coupon->id }}').submit();">Confirm</a>
                  <form id="delete-form-{{ $coupon->id }}" action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection