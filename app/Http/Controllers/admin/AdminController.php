<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $companyCount = Company::count();
        $userCount = User::count();
        $employeeCount = Employee::count();

        return view('admin.dashboard',compact('companyCount','userCount','employeeCount'));

    }
}
