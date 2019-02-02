<?php

use App\ClassStudent;
use App\Classroom;
use App\Student;
use Faker\Generator as Faker;

$factory->define(ClassStudent::class, function (Faker $faker) {
    return [
        'class_id' => factory(Classroom::class)->create()->id,
        'student_id' => factory(Student::class)->create()->id,
    ];
});
