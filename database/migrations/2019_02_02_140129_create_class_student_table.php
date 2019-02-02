<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_student', function (Blueprint $table) {
            $table->integer('class_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classrooms')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['class_id', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_student');
    }
}
