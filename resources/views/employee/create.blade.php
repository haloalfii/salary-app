@extends('layout.default')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Employee Data</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/employee">
                    @csrf
                    <div class="mb-3">
                        <label for="department_id" class="form-label">Department</label>
                        <select class="form-select form-control" name="department_id">
                            @foreach ($department as $item)
                                @if (old('department') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->department_name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->department_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text"
                            class="form-control @error('nik')
                                is-invalid
                            @enderror"
                            id="nik" name="nik" autofocus value="{{ old('nik') }}">

                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text"
                            class="form-control @error('full_name')
                                is-invalid
                            @enderror"
                            id="full_name" name="full_name" autofocus value="{{ old('full_name') }}">

                        @error('full_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nick_name" class="form-label">Nick Name</label>
                        <input type="text"
                            class="form-control @error('nick_name')
                                is-invalid
                            @enderror"
                            id="nick_name" name="nick_name" autofocus value="{{ old('nick_name') }}">

                        @error('nick_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">gender</label>
                        <select class="form-select form-control" name="gender">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text"
                            class="form-control @error('address')
                                is-invalid
                            @enderror"
                            id="address" name="address" autofocus value="{{ old('address') }}">

                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text"
                            class="form-control @error('phone')
                                is-invalid
                            @enderror"
                            id="phone" name="phone" autofocus value="{{ old('phone') }}">

                        @error('phone')
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
