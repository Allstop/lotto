<?php
class lotto
{
    public $arr;
    public function __construct($min, $max,$rows=6)
    {
        $array=array();
        while(count($array)<=$rows){
            $num=rand($min, $max);
            if (!in_array($num, $array)){
                $array[]= $num;
                $this->arr = $array;
            }
        }
    }
    //回傳arr值
    public function getarr()
    {
        return $this->arr;
    }

}

