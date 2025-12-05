<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        $totalStudents = Student::count();

        return view('admin.dashboard', compact('totalStudents'));
    }


}
