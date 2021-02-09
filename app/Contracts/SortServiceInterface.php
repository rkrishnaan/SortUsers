<?php


namespace App\Contracts;


Interface SortServiceInterface
{
    public function sort(array $inputArray, String $sortKey);
}
