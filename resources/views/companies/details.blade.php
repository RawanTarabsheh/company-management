


@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('View  Company') }}
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
                    <h6 class="card-title">Company info</h6>
                    <div class="mb-3">
                        <label class="form-label">Company  Name:</label>
                        <p>{{ $company->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Company  Email:</label>
                        <p>{{ $company->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Company website:</label>
                        <p>{{ $company->website }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Logo :</label>
                        <img alt="company logo" class=" img-fluid mr_42" title="company logo" src="{{ $company->logo_path}}"  width="160" height="160" />
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
