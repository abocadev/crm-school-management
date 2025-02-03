<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $school = School::find(1);
        Student::create([
            'name' => 'Albert',
            'surname' => 'Bocanegra Barreiro',
            'school_id' => $school->id,
            'birthday' => new \DateTime(),
            'hometown' => 'Tarragona'
        ]);
    }
}
