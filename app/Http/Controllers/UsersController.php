<?php

namespace App\Http\Controllers;

use App\Services\UsersService;
use App\Services\SortUsersService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request, UsersService $usersService) {
        $users = $usersService->getUsers();

        $sortKey = $request->query('sort');

        if(isset($sortKey)) {
            return $usersService->sortUsers($sortKey);
        } else {
            return view('users', compact('users'));
        }
    }
}
