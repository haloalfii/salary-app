@extends('layout.default')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit {{ $salary->salary_code }}</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/salary/{{ $salary->id }}">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="salary_code" class="form-label">Salary Code</label>
                        <input type="text"
                            class="form-control @error('salary_code')
                                is-invalid
                            @enderror"
                            id="salary_code" name="salary_code" autofocus
                            value="{{ $salary->salary_code, old('salary_code') }}">

                        @error('salary_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="base_salary" class="form-label">Base Salary</label>
                        <input type="number"
                            class="form-control @error('base_salary')
                                is-invalid
                            @enderror"
                            id="base_salary" name="base_salary" autofocus
                            value="{{ $salary->base_salary, old('base_salary') }}">

                        @error('base_salary')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="presence_salary" class="form-label">Presence Salary</label>
                        <input type="number"
                            class="form-control @error('presence_salary')
                                is-invalid
                            @enderror"
                            id="presence_salary" name="presence_salary" autofocus
                            value="{{ $salary->presence_salary, old('presence_salary') }}">

                        @error('presence_salary')
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
