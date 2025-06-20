<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use App\Models\Strand;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        // Fetch tracks with their strands
        $tracks = Track::with('strands')->get();

        // Fetch enrollments or requirements for the student
        $enrollments = Enrollment::where('student_id', $student->id)->get();

        return view('student.dashboard', compact('tracks', 'enrollments'));
    }
}
