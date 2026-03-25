<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Employee;
use App\Models\News;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'companyCount' => CompanyProfile::count(),
            'employeeCount' => Employee::count(),
            'newsCount' => News::count(),
        ]);
    }
}