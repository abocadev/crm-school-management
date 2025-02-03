<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private const MAX_ELEMENTS_TABLE = 3;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $schools = School::all()->take(self::MAX_ELEMENTS_TABLE);
        $students = Student::all()->take(self::MAX_ELEMENTS_TABLE);

        $data = [
            'schools' => $schools,
            'students' => $students
        ];

        return view('home', compact('data'));
    }
}
