<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UsersController extends Controller
{
    public function user(Request $request)
    {
        return $request->user();
    }
    public function getUser($id)
    {
        return User::find($id);
    }
    public function getUsers()
    {
        return User::all();
    }

    public function getUserChart()
    {

        $users = User::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->get();


        return $users;
    }
}
