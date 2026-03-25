<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Employee;
use App\Models\News;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $companyProfile = CompanyProfile::first();
        $employees = Employee::latest()->take(6)->get(); // Tampilkan 6 di scroll horizontal
        $news = News::latest()->take(6)->get();

        return view('frontend.home', compact('companyProfile', 'employees', 'news'));
    }

    public function newsDetail(News $news)
    {
        return view('frontend.news-detail', compact('news'));
    }

    public function employeeDetail(Employee $employee)
    {
        return view('frontend.employee-detail', compact('employee'));
    }

    public function allEmployees()
    {
        $employees = Employee::latest()->get();
        return view('frontend.employees-all', compact('employees'));
    }

    public function portofolio()
    {
    return view('frontend.portofolio');
}
public function allNews()
{
    $news = News::latest()->get();
    return view('frontend.news-all', compact('news'));
}
}




