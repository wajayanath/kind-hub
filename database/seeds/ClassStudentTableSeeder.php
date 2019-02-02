<?php

use App\Classroom;
use App\Student;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ClassStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the class_student table
        DB::table('class_student')->truncate();
        // generate 20 dummy class_student data
        $class_students = [];
        for ($i = 1; $i <= 20; $i++)
        {
             $class_students[] = [
            'class_id' => Classroom::select('id')->orderByRaw("RAND()")->first()->id,
            'student_id' => Student::select('id')->orderByRaw("RAND()")->first()->id];
        }
        DB::table('class_student')->insert($class_students);
    }
}
