<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;

use App\Classes;
use App\Courses;
use App\User;
use App\Attendance;
use Illuminate\Http\Request;

use Carbon\Carbon;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::paginate(10);
        return view('admin/classes/index')->with('classes', $classes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Courses::get();
        $teachers = User::where('role', 1)->get();
        return view('admin/classes/create')->with('courses', $courses)->with('teachers', $teachers);
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
            'teacher' => ['required'],
            'course' => ['required'],
            'classId' => ['required', 'unique:classes'],
        ]);

        Classes::Create([
            'teacherId' => $request->teacher,
            'courseId' => $request->course,
            'classId' => $request->classId,
        ]);

        return redirect('admin/classes')->with('success', 'New class has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Classes::find($id);
        $students = User::where('role', 2)->whereDoesntHave('classes', function ($query) use ($id) {
            $query->where('class_id', $id);
        })->get();
        return view('admin/classes/view')->with('class', $class)->with('students', $students);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        //
    }

    public function addStudent(Request $request)
    {
        $this->validate($request, [
            'students' => ['required'],
            'class' => ['required'],
        ]);

        $class = Classes::find($request->class);
        $class->students()->attach($request->students);
        return redirect('admin/classes/' . $request->class)->with(['success' => 'Students have been added to class']);
    }

    public function attendance(Request $request)
    {
        foreach ($request->student as $key => $student) {
            Attendance::Create([
                'date' => Carbon::now(),
                'class_id' => $request->classId,
                'student_id' => $student,
                'status' => $request->status[$key]
            ]);
        }

        return redirect('admin/classes/' . $request->classId)->with(['success' => 'Students have been added to class']);
    }

    public function viewAttendance($class, $date)
    {
        $class = Classes::find($class);
        $attendance = Attendance::where('class_id', 1)->whereDate('date', $date)->get();
        // dd($attendance);
        return view('admin/classes/viewAttendance')->with('attendance', $attendance)->with('class', $class)->with('date', $date);
    }
}
