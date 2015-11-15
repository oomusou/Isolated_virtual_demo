<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->getAll();

        return view('users.index', compact('users'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected function getAll()
    {
        $users = User::all();
        return $users;
    }
}
