<?php

namespace App\Http\Controllers\Api;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = StudentResource::collection(Student::latest()->paginate(5));
        $students = Student::latest()->paginate(5);
        return response()->json(['students'=>$students],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:10',
            'last_name' => 'required|string|max:20',
            'gender' => 'required',
            'joined_year' => 'required',
        ]);

        $student = Student::create($request->all());
        return response()->json($student,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return response()->json(['student'=>$student],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:10',
            'last_name' => 'required|string|max:20',
            'gender' => 'required',
            'joined_year' => 'required',
        ]);

        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message'=>"Student not found"],404);
        }
        $student->update($request->all());
        return response()->json(['message'=>"Student updated successfuly"],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message'=>"Student not found"],404);
        }
        $student->delete();
            return response()->json(['message'=>"Student deleted successfuly"],200);
    }
}
