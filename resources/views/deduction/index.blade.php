@extends('layout.default')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Deduction Data Data</h6>
            </div>
            <div class="card-body">
                <a href="/deduction/create" class="btn btn-primary">Add Deduction</a>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Deduction Code</th>
                                <th>Presence Deduction</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($deduction as $item)
                                <tr>
                                    <td>{{ $item->deductions_code }}</td>
                                    <td>Rp. {{ number_format($item->presence_deductions, 2, ',', '.') }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="/deduction/{{ $item->id }}/edit"><i
                                                class="fas fa-pen"></i></a>
                                        <form action="/deduction/{{ $item->id }}" method="POST" class="d-inline">
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
