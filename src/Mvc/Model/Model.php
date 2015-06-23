<?php

namespace Mvc\Model;

class Model
{
    //*開獎號碼
    public $lotto_num;
    //*開獎特別號
    public $lotto_spl;
    //*電腦選號
    public $lotto_cumnum;
    //*客選號
    public $rtn_value;

    protected $db = null;

    public function __construct()
    {
        //*開獎號碼
        $this->lotto_num = $this->getArr(1, 49);
        $this->lotto_spl = array_pop($this->lotto_num);
        //*電腦選號
        $this->lotto_cumnum = $this->getArr(1, 49, 6);
    }
    //*亂數取號
    public function getArr($min, $max, $rows = 7)
    {
        $array = array();
        while (count($array) < $rows) {
            $num = rand($min, $max);
            if (! in_array($num, $array)) {
                $array[] = $num;
            }
        }
        return $array;
    }
    //*產生開獎號碼
    public function proNum()
    {
        return $this->lotto_num;
    }

    //*產生開獎特別號
    public function proSpl()
    {
        return $this->lotto_spl;
    }
    public function proCumNum()
    {
        $this->rtn_value = array();
        if (isset($_POST['cpc'])) {
            switch ($_POST['cpc']) {
                case 'mpc':
                    $this->rtn_value = $this->lotto_cumnum;
                    break;
                case 'cpc':
                    if (isset($_POST['num'])) {
                        $this->rtn_value =$_POST['num'];
                    } else {
                        echo '尚未選號！';
                    }
                    break;
                default:
                    echo "兩者都不是";
                    break;
            }
        } else {
        }
        return $this->rtn_value;
    }
    //*比對開獎號碼&客選號
    public function comparisonA()
    {
        $comparison_num=array_intersect($this->lotto_num, $this->rtn_value);
        return count($comparison_num);
    }
    //*比對開獎特別號&客腦選號
    public function comparisonB()
    {
        if (in_array($this->lotto_spl, $this->rtn_value)) {
            $comparison_spl=1;
        } else {
            $comparison_spl=null;
        }
        return count($comparison_spl);
    }
}
