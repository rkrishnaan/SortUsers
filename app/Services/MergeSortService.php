<?php


namespace App\Services;


use App\Services\Contracts\SortServiceInterface;

class MergeSortService implements SortServiceInterface
{
    function sort($inputArray, $sortKey): array{
        if(count($inputArray) == 1 ) return $inputArray;
        $mid = count($inputArray) / 2;
        $left = array_slice($inputArray, 0, $mid);
        $right = array_slice($inputArray, $mid);
        $left = $this->sort($left, $sortKey);
        $right = $this->sort($right, $sortKey);
        return $this->merge($left, $right, $sortKey);
    }
    function merge($left, $right, $sortKey): array{
        $sortField = substr($sortKey, 0, strpos($sortKey, ':'));
        $sortDirection = substr($sortKey, strpos($sortKey, ':')+1);
        $res = array();
        while (count($left) > 0 && count($right) > 0){
            $lhs = $rhs = '';
            if($sortDirection === 'desc') {
                $lhs = $right[0]->$sortField;
                $rhs = $left[0]->$sortField;
            } else {
                $lhs = $left[0]->$sortField;
                $rhs = $right[0]->$sortField;
            }
            if($lhs > $rhs){
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
