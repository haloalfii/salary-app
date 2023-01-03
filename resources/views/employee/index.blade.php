@extends('layout.default')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Employee Data</h6>
            </div>
            <div class="card-body">
                <a href="/employee/create" class="btn btn-primary">Add Employee</a>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Full Name</th>
                                <th>Nick Name</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($employees as $item)
                                <tr>
                                    <td>{{ $item->nik }} </td>
                                    <td>{{ $item->full_name }}</td>
                                    <td>{{ $item->nick_name }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->department->department_name }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="/employee/{{ $item->id }}/edit"><i
                                                class="fas fa-pen"></i></a>
                                        <form action="/employee/{{ $item->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button onclick="return confirm('Are you sure?')"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
