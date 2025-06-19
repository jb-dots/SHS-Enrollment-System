<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\Student;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        $tracks = [
            [
                'name' => 'Academic Track',
                'strands' => [
                    'Accountancy, Business and Management (ABM)',
                    'Humanities and Social Sciences (HUMSS)',
                    'Science, Technology, Engineering, and Mathematics (STEM)',
                    'General Academic Strand (GAS)',
                ],
            ],
            [
                'name' => 'Technical-Vocational-Livelihood (TVL)',
                'strands' => [
                    'Agri-Fishery Arts (AFA)',
                    'Home Economics (HE)',
                    'Industrial Arts (IA)',
                    'Information and Communications Technology (ICT)',
                ],
            ],
            [
                'name' => 'Arts and Design Track',
                'strands' => [
                    'Visual and Media Arts',
                    'Performative Arts',
                ],
            ],
        ];

        $totalTracks = count($tracks);

        $strands = [
            ['name' => 'Accountancy, Business and Management (ABM)', 'track' => 'Academic Track'],
            ['name' => 'Humanities and Social Sciences (HUMSS)', 'track' => 'Academic Track'],
            ['name' => 'Science, Technology, Engineering, and Mathematics (STEM)', 'track' => 'Academic Track'],
            ['name' => 'General Academic Strand (GAS)', 'track' => 'Academic Track'],
            ['name' => 'Visual and Media Arts', 'track' => 'Arts and Design Track'],
            ['name' => 'Performative Arts', 'track' => 'Arts and Design Track'],
            ['name' => 'Agri-Fishery Arts (AFA)', 'track' => 'Technical-Vocational-Livelihood (TVL)'],
            ['name' => 'Home Economics (HE)', 'track' => 'Technical-Vocational-Livelihood (TVL)'],
            ['name' => 'Industrial Arts (IA)', 'track' => 'Technical-Vocational-Livelihood (TVL)'],
            ['name' => 'Information and Communications Technology (ICT)', 'track' => 'Technical-Vocational-Livelihood (TVL)'],
        ];

        $totalStrands = count($strands);
        $totalSubjects = 1; // Hardcoded as per screenshot
        $pendingRequirements = Enrollment::where('status', 'pending')->count();

        $studentsPerStrand = [
            ['strand' => 'ABM', 'track' => 'Academic Track', 'students' => '0/50'],
            ['strand' => 'STEM', 'track' => 'Academic Track', 'students' => '0/50'],
            ['strand' => 'HUMSS', 'track' => 'Academic Track', 'students' => '0/50'],
            ['strand' => 'ICT', 'track' => 'Technical-Vocational-Livelihood (TVL)', 'students' => '0/50'],
            ['strand' => 'Home Economics', 'track' => 'Technical-Vocational-Livelihood (TVL)', 'students' => '0/50'],
            ['strand' => 'Visual Arts', 'track' => 'Arts and Design Track', 'students' => '0/50'],
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

    public function manageUsers()
    {
        $students = Student::all();
        $studentEmails = $students->pluck('email')->toArray();

        $teachers = User::where('is_admin', false)
            ->whereNotIn('email', $studentEmails)
            ->get();

        return view('admin.manage-users', compact('students', 'teachers'));
    }
}
