<?php


namespace App\Services;


use App\Services\Contracts\SortServiceInterface;

class QuickSortService implements SortServiceInterface
{
    function sort($inputArray, $sortKey): array
    {
        $sortField = substr($sortKey, 0, strpos($sortKey, ':'));
        $sortDirection = substr($sortKey, strpos($sortKey, ':')+1);

        $loe = $gt = array();
        if(count($inputArray) < 2)
        {
            return $inputArray;
        }
        $pivot_key = key($inputArray);
        $pivot = array_shift($inputArray);
        foreach($inputArray as $val)
        {
            $lhs = $rhs = '';
            if($sortDirection=='desc') {
             $lhs = $pivot->$sortField;
             $rhs = $val->$sortField;
            } else {
               $lhs = $val->$sortField;
               $rhs = $pivot->$sortField;
            }
            if($lhs <= $rhs)
            {
                $loe[] = $val;
            }elseif ($lhs > $rhs)
            {
                $gt[] = $val;
            }
        }
        return array_merge($this->sort($loe, $sortKey),array($pivot_key=>$pivot),$this->sort($gt, $sortKey));
    }
}
