@extends('layout.default')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
            <p>Selamat datang di Salary Web Apps yang akan memudahkan user untuk menghitung gaji karyawan</p>
        </div>
        <div class="row" style="height: 400px">
            <div class="col-md-6 h-100">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body card-dashboard-welcome" style="position: relative">
                        <h4 style="color: #000">Welcome, {{ auth()->user()->name }}!</h4>
                        <p>It's {{ now()->format('d M Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 h-100">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Company Employees</h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body" style="overflow-y: auto">
                        @foreach ($departments as $department)
                            <h4 class="small font-weight-bold">{{ $department->department_name }} <span class="float-right">
                                    <?php
                                    $allEmp = App\Models\Employee::count();
                                    $count = App\Models\Employee::where('department_id', $department->id)->count();
                                    
                                    $percentage = ($count * 100) / $allEmp;
                                    echo $count;
                                    ?>
                                </span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $percentage; ?>%"
                                    aria-valuenow="<?php echo $count; ?>" aria-valuemin="0"
                                    aria-valuemax="<?php echo $allEmp; ?>"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-3 h-100">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Employee Gender</h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Female
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Male
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/chart.js/Chart.min.js') }} "></script>
    <script>
        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Male", "Female"],
                datasets: [{
                    data: [<?php echo json_encode($gender->male); ?>, <?php echo json_encode($gender->female); ?>],
                    backgroundColor: ['#4e73df', '#1cc88a'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>
@endsection
