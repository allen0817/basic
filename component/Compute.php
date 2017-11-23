<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/22
 * Time: 23:10
 */

namespace  app\component;


class Compute
{

    //二分法查找数组中的某个元素(升序数组)
    function branchSearch($array,$k,$low = 0, $high = 0){
        if(count($array) != 0 && $high == 0){
            $high = count($array);
        }
        if($low <= $high){
            $mid = intval(($low + $high)/2);
            if($array[$mid] == $k){
                return $mid;
            }else if($array[$mid] < $k){
                return self::branchSearch($array,$k,$low = 0, $mid +1);
            }else{
                return self::branchSearch($array,$k,$low = 0, $mid +1);
            }
        }
        return '你找的元素不存在';
    }








}