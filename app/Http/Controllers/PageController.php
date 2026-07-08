<?php

namespace App\Http\Controllers;

use App\Models\Course;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function students()
    {
        return view('students');
    }

    public function courses()
    {
        $courses = Course::withCount('students')->get();

        return view('courses', compact('courses'));
    }

    public function contact()
    {
        return view('contact');
    }

    // Day 11 - Eloquent Relationships demo
    // Shows one course + all students enrolled in it (Course hasMany Students)
    public function courseDetail($id)
    {
        // with('students') = eager load the related students in ONE extra query
        // instead of firing a new query for every student (avoids N+1 problem)
        $course = Course::with('students')->findOrFail($id);

        return view('courseDetail', compact('course'));
    }
}