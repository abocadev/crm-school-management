<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = Student::paginate(5);

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['student'] = null;
        $data['schools'] = School::all();
        return view('student.form_student', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_surname' => 'required|string|max:255',
            'student_hometown' => 'nullable|string|max:255',
            'student_birthday' => 'required|date',
            'student_school' => 'nullable|integer'
        ]);

        Student::create([
            'name' => $request->get('student_name'),
            'surname' => $request->get('student_surname'),
            'hometown' => $request->get('student_hometown') ?? null,
            'birthday' => new \DateTime($request->get('student_birthday')),
            'school_id' => empty($request->get('student_school')) ? null : intval($request->get('student_school'))
        ]);

        return redirect()->route('students.index')->with('message', [
            'type' => 'success',
            'content' => 'El estudiante se ha creado correctamente.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $data['student'] = $student;
        $data['schools'] = School::all();
        return view('student.form_student', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return redirect()->route('students.index')->with('message', [
                'type' => 'success',
                'content' => 'El estudiante se ha eliminado correctamente.'
            ]);
        } catch (\Throwable $exception) {
            return redirect()->route('students.index')->with('message', [
                'type' => 'danger',
                'content' =>  'El estudiante no se ha podido eliminar.'
            ]);
        }
    }
}
