<?php


namespace App\Services;


use App\Contracts\SortServiceInterface;

class QuickSortService implements SortServiceInterface
{
    private String $sortKey;

    function sort(array $inputArray, String $sortKey): array
    {
        $this->sortKey = $sortKey;
        return $this->quickSort($inputArray);
    }

    function quickSort($inputArray): array {
        $loe = $gt = array();
        if(count($inputArray) < 2)
        {
            return $inputArray;
        }
        $pivot_key = key($inputArray);
        $pivot = array_shift($inputArray);

        $this->partition($inputArray, $pivot, $loe, $gt);

        return array_merge($this->quickSort($loe),array($pivot_key=>$pivot),$this->quickSort($gt));
    }

    private function partition($inputArray, $pivot, &$loe, &$gt) {
        if(empty($inputArray)) {
            return;
        }

        $val = $inputArray[0];
        $lhs = $rhs = '';

        $sortField = substr($this->sortKey, 0, strpos($this->sortKey, ':'));
        $sortDirection = substr($this->sortKey, strpos($this->sortKey, ':')+1);

        if($sortDirection == 'asc') {
            $lhs = $val->$sortField;
            $rhs = $pivot->$sortField;
        } else {
            $lhs = $pivot->$sortField;
            $rhs = $val->$sortField;
        }
        if($lhs <= $rhs) {
            $loe[] = $val;
        }elseif ($lhs > $rhs) {
            $gt[] = $val;
        }

        $this->partition(array_slice($inputArray, 1), $pivot, $loe, $gt);
    }
}
