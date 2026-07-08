<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin Dashboard - overview stats + recently registered users
    public function dashboard()
    {
        $totalUsers    = User::count();
        $totalAdmins   = User::where('role', 'admin')->count();
        $totalStudents = Student::count();
        $totalCourses  = Course::count();

        $recentUsers = User::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers', 'totalAdmins', 'totalStudents', 'totalCourses', 'recentUsers'
        ));
    }

    // List every registered account with its role (Roles & Permissions)
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.users', compact('users'));
    }

    // Promote / demote a user between 'student' and 'admin'
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,student',
        ]);

        $user = User::findOrFail($id);

        // Safety check: an admin can't accidentally demote themselves
        // and leave the system with zero admins.
        if ($user->id === auth()->id() && $request->role !== 'admin') {
            return back()->with('error', "You can't remove your own admin role.");
        }

        $user->update(['role' => $request->role]);

        return back()->with('success', "{$user->name}'s role updated to {$request->role}.");
    }
}
