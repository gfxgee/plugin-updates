<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserlistController extends Controller
{
    public function index2(){
        return Inertia::render('Users/Index', [
            'users' => User::paginate(4)->map(function($user){
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ];
            })
        ]);
    }

    public function index(){
        $users = User::paginate(4)->through(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ];
        });
        return Inertia::render('Users/Index', ['users' => $users]);

    }
}
