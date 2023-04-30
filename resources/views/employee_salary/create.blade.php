@extends('layout.default')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Paying Employee</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/employee_salary">
                    @csrf
                    <div class="mb-3">
                        <label for="emp_id" class="form-label">Employee</label>
                        <select class="form-select form-control" name="emp_id">
                            @foreach ($employees as $item)
                                @if (old('emp_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->nik }} -
                                        {{ $item->full_name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->nik }} - {{ $item->full_name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="salary_id" class="form-label">Salary Class</label>
                        <select class="form-select form-control" name="salary_id">
                            @foreach ($salaries as $item)
                                @if (old('salary_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->salary_code }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->salary_code }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="deduction_id" class="form-label">Deduction Class</label>
                        <select class="form-select form-control" name="deduction_id">
                            @foreach ($deductions as $item)
                                @if (old('deduction_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->deductions_code }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->deductions_code }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="period" class="form-label">Period</label>
                        <input type="month"
                            class="form-control @error('period')
                                is-invalid
                            @enderror"
                            id="period" name="period" value="{{ old('period') }}">

                        @error('period')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="period_effective" class="form-label">Effective Days</label>
                        <input type="number"
                            class="form-control @error('period_effective')
                                is-invalid
                            @enderror"
                            id="period_effective" name="period_effective" autofocus value="{{ old('period_effective') }}">

                        @error('period_effective')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="emp_presence" class="form-label">Present</label>
                        <input type="number"
                            class="form-control @error('emp_presence')
                                is-invalid
                            @enderror"
                            id="emp_presence" name="emp_presence" autofocus value="{{ old('emp_presence') }}">

                        @error('emp_presence')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="emp_non_presence" class="form-label">Not Present</label>
                        <input type="number"
                            class="form-control @error('emp_non_presence')
                                is-invalid
                            @enderror"
                            id="emp_non_presence" name="emp_non_presence" autofocus value="{{ old('emp_non_presence') }}">

                        @error('emp_non_presence')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="emp_leave" class="form-label">Employee Leave</label>
                        <input type="number"
                            class="form-control @error('emp_leave')
                                is-invalid
                            @enderror"
                            id="emp_leave" name="emp_leave" autofocus value="{{ old('emp_leave') }}">

                        @error('emp_leave')
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
