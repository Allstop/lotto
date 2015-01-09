<?php
require_once 'lotto.php';
//*開獎號碼
$lottoa = new lotto(1, 49);
$lotto_num = $lottoa->getarr();
$lotto_spl = array_pop($lotto_num);
//*電腦選號
$lottob = new lotto(1, 49, 5);
$lotto_cumnum = $lottob->getarr();

class lotpro
{
    //*宣告開獎號碼
    public $lotto_shownum;
    //*宣告開獎特別號
    public $lotto_showspl;
    //*宣告電腦選號
    public $lotto_showcumnum;

    //*產生開獎號碼
    public function pronum($lotto_num)
    {
        asort($lotto_num);
        $this->lotto_shownum = $lotto_num;
        echo "大樂透_開獎:<br><br>一般選號:";
        foreach ($this->lotto_shownum as $value) {
            echo  $value .",";
        }
        return $this->lotto_shownum;
    }

    //*產生開獎特別號
    public function prospl($lotto_spl)
    {
        $this->lotto_showspl = $lotto_spl;
        echo "<br>特別號:".$this->lotto_showspl."<br><br>";
        return $this->lotto_showspl;
    }

    //*產生電腦選號
    public function procumnum($lotto_cumnum)
    {
        asort($lotto_cumnum);
        $this->lotto_showcumnum = $lotto_cumnum;
        echo "電腦選號:";
        foreach ($this->lotto_showcumnum as $value) {
            echo  $value .",";
        }
        return $this->lotto_showcumnum;
    }
    //*比對開獎號碼&電腦選號
    public function comparisonA()
    {
        $comparison_num=array_intersect($this->lotto_shownum, $this->lotto_showcumnum);
        echo "<br><br>大樂透_中獎數:".count($comparison_num)."<br>";
        return $comparison_num;
    }

    //*比對開獎特別號&電腦選號
    public function comparisonB()
    {
        if (in_array($this->lotto_showSpl, $this->lotto_showcumnum)){
            $comparison_spl=1;
        }else{
            $comparison_spl=null;
        }
        echo "<br>特別號_中獎數:".count($comparison_spl)."<br>";
        return $comparison_spl;
    }
}
