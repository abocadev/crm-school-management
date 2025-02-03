<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $schools = School::paginate(5);

        return view('school.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['school'] = null;
        $data['students'] = Student::all()->where('school_id', '=', null);
        return view('school.forms_schools', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'school_direction' => 'required|string|max:255',
            'school_email' => 'string|max:255',
            'school_phone' => 'string|max:255',
            'school_website' => 'string|max:255',
            'school_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=200,min_height=200'
        ]);

        $path = null;
        if ($request->hasFile('school_logo')) {
            $file = $request->file('school_logo');
            $schoolName = strtolower(str_replace(" ","_", $request->get('school_name')));
            $filename = time() . "_" . uniqid() . "_" . preg_replace('/[^a-z0-9 _-]/', '', $schoolName) . "." . $file->getClientOriginalExtension();

            $path = $file->storeAs('schools_logos', $filename, "public");
        }

        $school = new School();
        $school->setName($request->get('school_name'))
            ->setDirection($request->get('school_direction'))
            ->setEmail($request->get('school_email'))
            ->setPhone($request->get('school_phone'))
            ->setWebsite($request->get('school_website'))
            ->setLogo($path)
            ->save();

        $school->refresh();

        $studentsToPutSchool = Student::all()->whereIn('school_id', $request->get('students'));
        foreach ($studentsToPutSchool as $student) {
            $student->setSchool($school);
        }

        return redirect()->route('schools.index')->with('message', [
            'type' => 'success',
            'content' =>  'La escuela se ha creado correctamente.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        $data['school'] = $school;

        $data['students'] = Student::all()->whereIn('school_id', [null, $school->getId()]);

        return view('school.forms_schools', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'school_direction' => 'required|string|max:255',
            'school_email' => 'string|max:255',
            'school_phone' => 'string|max:255',
            'school_website' => 'string|max:255',
            'school_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=200,min_height=200'
        ]);

        $path = $school->getLogo();
        if ($request->hasFile('school_logo')) {
            if (
                $school->getLogo() != null &&
                Storage::disk('public')->exists($school->getLogo())
            ) {
                Storage::disk('public')->delete($school->getLogo());
            }

            $file = $request->file('school_logo');
            $schoolName = strtolower(str_replace(" ","_", $request->get('school_name')));
            $filename = time() . "_" . uniqid() . "_" . preg_replace('/[^a-z0-9 _-]/', '', $schoolName) . "." . $file->getClientOriginalExtension();

            $path = $file->storeAs('schools_logos', $filename, "public");
        }

        $school->setName($request->get('school_name'))
            ->setDirection($request->get('school_direction'))
            ->setEmail($request->get('school_email'))
            ->setPhone($request->get('school_phone'))
            ->setLogo($path)
            ->save();

        $studentsBeforeUpdate = Student::all()->where('school_id', '=', $school->getId());
        foreach ($studentsBeforeUpdate as $student) {
            $student->setSchool(null);
            $student->save();
        }

        $studentsToPutSchool = Student::all()->whereIn('id', $request->get('students'));
        foreach ($studentsToPutSchool as $student) {
            $student->setSchool($school);
            $student->save();
        }

        return redirect()->route('schools.index')->with('message', [
            'type' => 'success',
            'content' => 'La escuela se ha actualizado correctamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        /**
         * @var Student $student
         */
        foreach ($school->getStudents() as $student) {
            $student->setSchool(null);
            $student->save();
        }

        try {
            $school->delete();
            return redirect()->route('schools.index')->with('message', [
                'type' => 'success',
                'content' => 'La escuela se ha eliminado correctamente.'
            ]);
        } catch (\Throwable $exception) {
            return redirect()->route('schools.index')->with('message', [
                'type' => 'danger',
                'content' => 'La escuela no se pudo eliminar.'
            ]);
        }
    }
}
