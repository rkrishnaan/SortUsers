<?php


namespace App\Services;

use App\Models\User;
use DateTime;


class UsersService
{
    protected array $users = [];
    //private MergeSortService $sortService;
    private QuickSortService $sortService;

    public function __construct(QuickSortService $sortService) {
        $this->buildUsersArray(User::getAllUsers());
        $this->sortService = $sortService;
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

    function sortUsers(String $sortKey): String {
        $sortedArray = $this->sortService->sort($this->users, $sortKey);
        return json_encode($sortedArray, JSON_PRETTY_PRINT);
    }
}
