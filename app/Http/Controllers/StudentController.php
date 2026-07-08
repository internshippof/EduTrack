<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    // Display Students (Day 15: server-side search + pagination)
    public function index(Request $request)
    {
        $search = $request->query('search');

        $students = Student::with('course')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('id', 'asc')
            ->paginate(8)          // 8 students per page
            ->withQueryString();   // keeps ?search=... when clicking page 2, 3...

        return view('students', compact('students', 'search'));
    }

    // Show Add Student Form
    public function create()
    {
        $courses = Course::all();

        return view('createStudent', compact('courses'));
    }

    // Store Student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required',
            'course_id' => 'required',
            'photo' => 'nullable|image|max:2048', // max 2MB, must be an image
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            // Stores the file in storage/app/public/students and returns
            // something like "students/ab12cd34.jpg"
            $photoPath = $request->file('photo')->store('students', 'public');
        }

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'course_id' => $request->course_id,
            'profile_photo' => $photoPath,
        ]);

        return redirect('/students')
            ->with('success', 'Student Added Successfully!');
    }

    // Show Edit Form
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $courses = Course::all();

        return view('editStudent', compact('student', 'courses'));
    }

    // Update Student
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'course_id' => 'required',
            'photo' => 'nullable|image|max:2048',
        ]);

        $student = Student::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'course_id' => $request->course_id,
        ];

        if ($request->hasFile('photo')) {
            // Delete the old photo from storage so we don't leave orphan files behind
            if ($student->profile_photo) {
                Storage::disk('public')->delete($student->profile_photo);
            }

            $data['profile_photo'] = $request->file('photo')->store('students', 'public');
        }

        $student->update($data);

        return redirect('/students')
            ->with('success', 'Student Updated Successfully!');
    }

    // Delete Student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if ($student->profile_photo) {
            Storage::disk('public')->delete($student->profile_photo);
        }

        $student->delete();

        return redirect('/students')
            ->with('success', 'Student Deleted Successfully!');
    }
}