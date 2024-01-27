


@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('View  Employee') }}
    </h2>
@endsection

@section('content')
    <div class="container">
           <!-- Sidebar -->
           <div class="sidebar">
            <!-- Add navigation links or other sidebar content here -->
            <p>Sidebar</p>
            <a href="{{ route('dashboard') }}">Home</a>
            <a href="{{ route('companies.index') }}">Companies</a>
            <a href="{{ route('employees.index') }}">Employees</a>

        </div>
        <div class="col-md-12 grid-margin stretch-card ml-5">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Employee info</h6>
                    <div class="mb-3">
                        <label class="form-label">Employee  Name:</label>
                        <p>{{ $employee->first_name. ' '.$employee->last_name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee  Email:</label>
                        <p>{{ $employee->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee Company:</label>
                        <p>{{ $employee->company->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee  Phone:</label>
                        <p>{{ $employee->phone }}</p>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
