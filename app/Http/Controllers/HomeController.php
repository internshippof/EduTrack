<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $studentCount = Student::count();
        $courseCount = Course::count();
        $enrollToday = Student::whereDate('created_at', Carbon::today())->count();

        return view('home', compact('studentCount', 'courseCount', 'enrollToday'));
    }
}