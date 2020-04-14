<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App;

class UsersController extends Controller
{
    public function user(Request $request)
    {
        $user = $request->user();
        $role = $user['role'];

        switch ($role) {
            case 'admin':
                $profile = App\Teacher::where(
                    'userID',$user->id
                    )->first();
                $profile['teacherID'] = $profile->id;
                break;
            case 'director':
                $profile = App\Teacher::where(
                    'userID',$user->id
                    )->first();
                $profile['teacherID'] = $profile->id;
                break;    
            case 'teacher':
                $profile = App\Teacher::where(
                    'userID',$user->id
                    )->first();
                    $profile['teacherID'] = $profile->id;
                break;
            case 'parent':
                $profile = App\Teacher::where(
                    'userID',$user->id
                    )->first();
                    $profile['teacherID'] = $profile->id;
                break;    
            case 'student':
                $profile = App\Teacher::where(
                    'userID',$user->id
                    )->first();
                    $profile['teacherID'] = $profile->id;
                break;          
            default:
                dd("Failed");
                break;
        }

        if($profile == null){
            dd("Failed to locate user profile");
        }

        return array_merge($profile->toArray(), $user->toArray());
        // dd($profile);
        //return $request->user();
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
