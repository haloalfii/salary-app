@extends('layout.default')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit {{ $department->code }}</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/department/{{ $department->id }}">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="code" class="form-label">Department Code</label>
                        <input type="text"
                            class="form-control @error('code')
                                is-invalid
                            @enderror"
                            id="code" name="code" autofocus value="{{ $department->code, old('code') }}">

                        @error('code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="department_name" class="form-label">Department Name</label>
                        <input type="text"
                            class="form-control @error('department_name')
                                is-invalid
                            @enderror"
                            id="department_name" name="department_name" autofocus
                            value="{{ $department->department_name, old('department_name') }}">

                        @error('department_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
