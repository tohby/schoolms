<?php

namespace App\Http\Controllers;

use App\User;
use App\Room;
use App\Pharmacy;
use App\Appointment;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function users(Request $request)
    {
        $this->validate($request, [
            'searchKey' => 'required',
        ]);
        $users = User::search($request->searchKey)->where('role', 2)->paginate(12);
        $totalCount = User::search($request->searchKey)->where('role', 2)->get()->count();
        return view('admin/users/index')->with('users', $users)->with('totalCount', $totalCount)->with('searchKey', $request->searchKey);
    }
}
