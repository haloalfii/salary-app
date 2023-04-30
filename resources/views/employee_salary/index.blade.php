@extends('layout.default')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Employee Salary Data</h6>
            </div>
            <div class="card-body">
                <a href="/employee_salary/create" class="btn btn-primary">Paying Employees</a>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Karyawan</th>
                                <th>Salary Class</th>
                                <th>Deduction Class</th>
                                <th>Period</th>
                                <th>Effective Day</th>
                                <th>Present</th>
                                <th>Not Present</th>
                                <th>Leave</th>
                                <th>Total</th>
                                <th>Salary Cuts</th>
                                <th>Total After Deduction</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($salaries as $item)
                                <tr>
                                    <td>{{ $item->salary_emp->full_name }}</td>
                                    <td>{{ $item->salary->salary_code }}</td>
                                    <td>{{ $item->deduction_emp->deductions_code }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->period)->format('M Y') }}</td>
                                    <td>{{ $item->period_effective }}</td>
                                    <td>{{ $item->emp_presence }}</td>
                                    <td>{{ $item->emp_non_presence }}</td>
                                    <td>{{ $item->emp_leave }}</td>
                                    <td>Rp. {{ number_format($item->total, 2, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($item->total - $item->total_after_deduction, 2, ',', '.') }}
                                    </td>
                                    <td>Rp. {{ number_format($item->total_after_deduction, 2, ',', '.') }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                            href="/employee_salary/{{ $item->id }}/edit"><i class="fas fa-pen"></i></a>
                                        <form action="/employee_salary/{{ $item->id }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')"><i
                                                    class="fas fa-trash"></i></button>
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
@endsection
