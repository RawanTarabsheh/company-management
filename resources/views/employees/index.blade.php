@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Employees') }}
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
                <a href="{{ route('employees.create') }}" class="btn btn-success create">Create New Employee</a>
            </div>
        <table class="table mt-5 ml-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company Name</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $employee->first_name .' '. $employee->last_name  }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->company->name }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background: red" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $employees->links() }}
        </div>
    </div>

    </div>
@endsection
