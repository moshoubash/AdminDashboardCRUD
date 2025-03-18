@extends('layouts.layout')
@section('title', 'Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-primary bubble-shadow-small">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Users</p>
                <h4 class="card-title">{{1}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-success bubble-shadow-small">
                <i class="fas fa-luggage-cart"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Sales</p>
                <h4 class="card-title">${{2}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-info bubble-shadow-small">
                <i class="fas fa-box"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Products</p>
                <h4 class="card-title">{{3}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-secondary bubble-shadow-small">
                <i class="far fa-check-circle"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Order</p>
                <h4 class="card-title">{{4}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
    <!-- Doughnut Chart -->
    <div class="col-md-6">
      <div class="card">
      <div class="card-header">
      <div class="card-title">Top Sold Products</div>
      </div>
      <div class="card-body">
      <div class="chart-container"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <canvas id="doughnutChart" style="width: 680px; height: 300px; display: block;" width="1360" height="600" class="chartjs-render-monitor"></canvas>
      </div>
      </div>
      </div>
    </div>

    <!-- Bar Chart -->
    <div class="col-md-6">
      <div class="card">
      <div class="card-header">
        <div class="card-title">Total Orders Per Month</div>
      </div>
      <div class="card-body">
        <div class="chart-container"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
        <canvas id="barChart" width="1360" height="600" style="display: block; height: 300px; width: 680px;" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
      </div>
    </div>
    </div>
  <div class="row">
    <div class="col">
      <div class="card card-round">
        <div class="card-header">
          <div class="card-head-row card-tools-still-right">
            <div class="card-title">Orders History</div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center mb-0">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Order Id</th>
                  <th scope="col" class="text-end">Date & Time</th>
                  <th scope="col" class="text-end">Total Price</th>
                  <th scope="col" class="text-end">Status</th>
                </tr>
              </thead>
                <tbody>
                  {{-- @foreach ($orders as $order): ?>
                  <tr>
                    <th scope="row">
                      #{{$order['id']}}
                    </th>
                    <td class="text-end">{{date('Y-m-d h:i:s A', strtotime($order['created_at']));}}</td>
                    <td class="text-end">${{$order['total_price']}}</td>
                    <td class="text-end">
                        <span class="badge badge-{{$order['status'] == 'delivered' ? 'success' : ($order['status'] == 'cancelled' ? 'danger' : ($order['status'] == 'pending' ? 'warning' : 'info'));}}">{{$order['status'];}}</span>
                    </td>
                  </tr>
                  @endforeach --}}
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection