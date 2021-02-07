<?php

namespace App\Http\Controllers;

use App\Services\LoadUsersService;
use App\Services\SortUsersService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request, LoadUsersService $loadAction) {
        $users = $loadAction->getUsers();

        $sortKey = $request->query('sort');

        if($sortKey) {
            return $loadAction->sortUsers();
        } else {
            return view('sample', compact('users'));
        }
    }

//    public function sort(String $sortKey, SortUsersService $action) {
//        return $action->execute($sortKey);
//    }
}
