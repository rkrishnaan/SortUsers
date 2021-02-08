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
        $sortedArray = $this->mergeSort($this->users, $sortkey);
        return json_encode($sortedArray, JSON_PRETTY_PRINT);
    }

    function mergeSort($input_array, $sortKey): array{
        if(count($input_array) == 1 ) return $input_array;
        $mid = count($input_array) / 2;
        $left = array_slice($input_array, 0, $mid);
        $right = array_slice($input_array, $mid);
        $left = $this->mergeSort($left, $sortKey);
        $right = $this->mergeSort($right, $sortKey);
        return $this->merge($left, $right, $sortKey);
    }
    function merge($left, $right, $sortKey): array{
        $sortField = substr($sortKey, 0, strpos($sortKey, ':'));
        $sortDirection = substr($sortKey, strpos($sortKey, ':')+1);
        $res = array();
        while (count($left) > 0 && count($right) > 0){
            if($right[0]->$sortField > $left[0]->$sortField){
                $res[] = $right[0];
                $right = array_slice($right , 1);
            }else{
                $res[] = $left[0];
                $left = array_slice($left, 1);
            }
        }
        while (count($left) > 0){
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }
        while (count($right) > 0){
            $res[] = $right[0];
            $right = array_slice($right, 1);
        }
        return $res;
    }
}
