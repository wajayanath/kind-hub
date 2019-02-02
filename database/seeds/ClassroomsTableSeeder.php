<?php

use Illuminate\Database\Seeder;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the classrooms table
        DB::table('classrooms')->truncate();
        //generate 3 classrooms
        DB::table('classrooms')->insert([
            [
                'teacher_id' => 1,
                'class' => "A",
            ],
            [
                'teacher_id' => 1,
                'class' => "B",
            ],
            [
                'teacher_id' => 2,
                'class' => "C",
            ],
        ]);
    }
}
