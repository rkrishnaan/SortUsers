<?php


namespace App\Services;

use App\Models\User;
use DateTime;


class UsersService
{
    protected array $users = [];

    public function __construct() {
        $this->buildUsersArray(User::getAllUsers());
    }

    function buildUsersArray(array $rawUsers): void {
        foreach($rawUsers as $rawUser) {
            try {
                array_push($this->users,
                    new User(
                        $rawUser[0],
                        $rawUser[1],
                        new DateTime($rawUser[2]),
                        new DateTime($rawUser[3])
                    )
                );
            } catch (\Exception $e) {
                echo $e->getMessage();
                exit(1);
            }
        }
    }

    function getUsers(): array {
        return $this->users;
    }

    function sortUsers(String $sortkey): String {
        return json_encode($this->users, JSON_PRETTY_PRINT);
    }
}
