<?php

namespace App\Http\Controllers;

use App\Services\UsersService;
use App\Services\SortUsersService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request, UsersService $loadAction) {
        $users = $loadAction->getUsers();

        $sortKey = $request->query('sort');

        if(isset($sortKey)) {
            return $loadAction->sortUsers($sortKey);
        } else {
            return view('sample', compact('users'));
        }
    }
}
