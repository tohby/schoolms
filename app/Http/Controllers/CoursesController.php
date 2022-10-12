<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::paginate(10);
        return view('admin/courses/index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/courses/create');
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
            'name' => ['required', 'string', 'max:255', 'unique:courses'],
            'code' => ['required', 'string', 'max:255', 'unique:courses'],
            'description' => ['nullable', 'string'],
        ]);

        Courses::Create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
        ]);

        return redirect('admin/courses')->with('success', 'New course has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course =  Courses::find($id);
        return view('admin/courses/edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $courses)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', Rule::unique('courses')->ignore($courses->id)],
            'code' => ['required', 'string', 'max:255', Rule::unique('courses')->ignore($courses->id)],
            'description' => ['nullable', 'string'],
        ]);

        $courses->name = $request->name;
        $courses->code = $request->code;
        $courses->description = $request->description;
        $courses->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $courses)
    {

        $courses->delete();
        return redirect('/admin/courses')->with('success', 'Course has been removed');
    }
}
