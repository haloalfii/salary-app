@extends('layout.default')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Deduction Data</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/deduction">
                    @csrf
                    <div class="mb-3">
                        <label for="deductions_code" class="form-label">Deduction Code</label>
                        <input type="text"
                            class="form-control @error('deductions_code')
                                is-invalid
                            @enderror"
                            id="deductions_code" name="deductions_code" autofocus value="{{ old('deductions_code') }}">

                        @error('deductions_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="presence_deductions" class="form-label">Presence Deduction</label>
                        <input type="number"
                            class="form-control @error('presence_deductions')
                                is-invalid
                            @enderror"
                            id="presence_deductions" name="presence_deductions" autofocus
                            value="{{ old('presence_deductions') }}">

                        @error('presence_deductions')
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
