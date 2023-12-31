<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, $following)
    {
        // $followers = $following = 'following' ? $user->follows : $user->followers;
        if ($following !== "follower" && $following !== "following") {
            return redirect(route('profile', $user->username));
            // return dd($followers);
        }

        return view('users.following', [
            'user' => $user,
            'follows' => $following == 'following' ? $user->follows : $user->followers,
        ]);
    }
    public function store(Request $request, User $user)
    {
        if(Auth::user()->hasFollow($user)){

            Auth::user()->unFollow($user);
        }else {
            Auth::user()->follow($user);
        }

        return back()->with('success', 'You are follow the user');
    }
}
