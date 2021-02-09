<?php


namespace App\Services;


use App\Contracts\SortServiceInterface;

class BubbleSortService implements SortServiceInterface
{
    private String $sortKey;

    function sort(array $inputArray, String $sortKey): array {
        $this->sortKey = $sortKey;
        return $this->bubbleSort($inputArray);
    }

    function bubbleSort(array &$inputArray): array
    {
        $swapped = false;
        $this->helper(0, $swapped, $inputArray);
        if($swapped) {
            $this->bubbleSort($inputArray);
        }
        return $inputArray;
    }

    function helper(int $index, &$swapped, array &$inputArray): array
    {
        if($index+1 >= count($inputArray)) {
            return $inputArray;
        }

        $sortField = substr($this->sortKey, 0, strpos($this->sortKey, ':'));
        $sortDirection = substr($this->sortKey, strpos($this->sortKey, ':')+1);
        $lhs = $rhs = '';

        if($sortDirection == 'asc') {
            $lhs = $inputArray[$index]->$sortField;
            $rhs = $inputArray[$index+1]->$sortField;
        } else {
            $lhs = $inputArray[$index+1]->$sortField;
            $rhs = $inputArray[$index]->$sortField;
        }

        if ($lhs > $rhs) {
            [$inputArray[$index], $inputArray[$index + 1]] =
                [$inputArray[$index + 1], $inputArray[$index]];
            $swapped = true;
        }

        return $this->helper($index + 1, $swapped, $inputArray);
    }
}
