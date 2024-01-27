@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Companies') }}
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

        <div>
            <div class="mb-5">
                <a href="{{ route('companies.create') }}" class="btn btn-success create">Create New Company</a>
            </div>
        <table class="table mt-5 ml-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background: red" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $companies->links() }}

        </div>
    </div>

    </div>
@endsection
