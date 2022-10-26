<?php

namespace App\Http\Controllers;

use App\User;
use App\Classes;
use App\Courses;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function users(Request $request)
    {
        $this->validate($request, [
            'searchKey' => 'required',
        ]);
        $userType = $request->type ? $request->type : 'students';
        $type = $userType === 'admin'
            ? 0
            : ($userType === 'teachers'
                ? 1
                : ($userType === 'students' ? 2 : 2));
        $users = User::search($request->searchKey)->where('role', $type)->paginate(12);
        $totalCount = User::search($request->searchKey)->where('role', $type)->get()->count();
        return view('admin/users/index')->with('users', $users)->with('totalCount', $totalCount)->with('searchKey', $request->searchKey)->with('userType', $userType);
    }

    public function classes(Request $request)
    {
        $classes = Classes::search($request->searchKey)->paginate(10);
        return view('admin/classes/index')->with('classes', $classes);
    }

    public function courses(Request $request)
    {
        $courses = Courses::search($request->searchKey)->paginate(10);
        return view('admin/courses/index')->with('courses', $courses);
    }
}
