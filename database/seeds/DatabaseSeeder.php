<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TeachersTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(ClassroomsTableSeeder::class);
        $this->call(ClassStudentTableSeeder::class);
    }
}
