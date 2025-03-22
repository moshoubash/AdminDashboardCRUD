<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/img/admin.png')}}" type="image/x-icon" />
    <!-- Fonts and icons -->
    @include('layouts.fonts')
    <!-- Charts Js -->
    <script src="{{asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')
    
        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    @include('layouts.logoheader')
                </div>
                
                <!-- Navbar Header -->
                @include('layouts.navbar')
            </div>
        
            <!-- Main Content -->
            <div class="container">
                <div class="page-inner">
                    @yield('content')
                </div>
            </div>
        
            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div>
    
    <!--   Core JS Files   -->
    @include('layouts.scripts')
    <script>
        var ctx = document.getElementById('doughnutChart').getContext('2d');
        var doughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(["product1Name", "product2Name", "product3Name"]) !!},
                datasets: [{
                    label: 'Top 3 Sold Products',
                    data: {!! json_encode([3, 4, 5]) !!},
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    
        var ctxBar = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                datasets: [{
                    label: 'Total Orders',
                    data: {!! json_encode([
                        0, 0, 3, 4, 
                        5, 0, 0, 0, 
                        0, 0, 0, 0
                    ]) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.8)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>