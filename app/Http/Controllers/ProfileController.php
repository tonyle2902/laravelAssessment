<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ProfileController extends Controller
{

    public function getUser($id)
    {
        $user = App\User::find($id);
        $rentBooks = App\User::find($id)->books;
        return view('profile', ['user' => $user, 'rentBooks' => $rentBooks]);
    }
}
