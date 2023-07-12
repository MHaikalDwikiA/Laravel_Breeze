<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StatusController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => ['required']
        ]);

    Auth::user()->statuses()->create([
        'body' => $request->body,
        'identifier' => Str::random(32)
    ]);

    return redirect()->back();
}
}
