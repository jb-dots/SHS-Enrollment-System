<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalTracks = Course::count();
        $totalStrands = 11; // Hardcoded as per screenshot
        $totalSubjects = 1; // Hardcoded as per screenshot
        $pendingRequirements = Enrollment::where('status', 'pending')->count();

        $studentsPerStrand = [
            ['strand' => 'ABM', 'track' => 'Academic', 'students' => '0/50'],
            ['strand' => 'STEM', 'track' => 'Academic', 'students' => '0/50'],
            ['strand' => 'HUMSS', 'track' => 'Academic', 'students' => '0/50'],
            ['strand' => 'ICT', 'track' => 'TVL', 'students' => '0/50'],
            ['strand' => 'Home Economics', 'track' => 'TVL', 'students' => '0/50'],
            ['strand' => 'Visual Arts', 'track' => 'Arts & Design', 'students' => '0/50'],
        ];

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalTracks',
            'totalStrands',
            'totalSubjects',
            'pendingRequirements',
            'studentsPerStrand'
        ));
    }
}
