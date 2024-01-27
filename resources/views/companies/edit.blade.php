@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Company') }}
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
<div class="ml-5">
     {{-- Display validation errors, if any --}}
     @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif

    <form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $company->name }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}">
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="url" class="form-control" id="website" name="website" value="{{ $company->website }}">
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <div class="mb-3">
                <img alt=" logo" class=" img-fluid mr_42" title=" logo" src="{{$company->logo_path}}"  width="160" height="160" />
            </div>
            <input type="file" class="form-control" id="logo" name="logo" value="{{ $company->logo }}">
        </div>

        <button type="submit" class="btn btn-success" style="background: #198754">Update</button>
    </form>
</div>

    </div>
@endsection
