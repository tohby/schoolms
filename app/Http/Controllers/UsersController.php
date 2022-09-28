<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userType = request()->type ? request()->type : 'students';
        $type = $userType === 'admin'
            ? 0
            : ($userType === 'teachers'
                ? 1
                : ($userType === 'students' ? 2 : 2));
        $users = User::where('role', $type)->paginate(10);
        $totalCount = User::where('role', $type)->count();
        $searchKey = '';
        return view('admin/users/index')
            ->with('users', $users)
            ->with('totalCount', $totalCount)
            ->with('searchKey', $searchKey)
            ->with('userType', $userType);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userType = request()->type ? request()->type : 'students';
        return view('admin/users/create')
            ->with('userType', $userType);
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
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['nullable', 'numeric'],
            'DOB' => ['nullable', 'date'],
            'gender' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'Id' => ['nullable', 'string']
        ]);

        $userType = $request->type ? $request->type : 'students';
        $type = $userType === 'admin'
            ? 0
            : ($userType === 'teachers'
                ? 1
                : ($userType === 'students' ? 2 : 2));

        User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'DOB' => $request->DOB,
            'gender' => $request->gender,
            'address' => $request->address,
            'Id' => $request->Id,
            'password' => Hash::make($request->password),
            'role' => $type,
        ]);

        return redirect('admin/users?type=' . $userType)->with('success', 'New user has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin/users/view')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/users/edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'numeric'],
            'DOB' => ['nullable', 'date'],
            'gender' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'Id' => ['nullable', 'string']
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->DOB = $request->DOB;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->Id = $request->Id;
        $user->save();

        return redirect()->back()->with('success', 'Account details have been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User has been removed');
    }
}
