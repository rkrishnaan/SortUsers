<?php


namespace App\Services;


use JetBrains\PhpStorm\Pure;

class SortUsersService
{
    protected  array $users;
    #[Pure] public function __construct(LoadUsersService $loadUsersService)
    {
        $this->execute('');
    }

    function execute($sortKey) {
        return $this->users;
    }
}
