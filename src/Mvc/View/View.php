<?php

namespace Mvc\View;

class View
{
    public $result = null;

    public static function showInputForm($file)
    {
        echo '<html>';
        echo '<head><meta charset="utf-8"/>';
        echo '<script type="text/javascript" >';
        echo 'function checkShow1() {';
        echo '    var div2 = document.getElementById(\'div2\');';
        echo '    if (div2.style.display !== \'none\') {';
        echo '        div2.style.display=\'none\';';
        echo '    } else {';
        echo '        div2.style.display=\'\';';
        echo '    }';
        echo '};';
        echo '</script>';
        echo '</head>';
        echo '<body>';
        echo '<form action="'.$file.'" method="post">';
        echo '<h2>Lotto</h2><br>';
        echo '電腦選號:<input type="radio" value="mpc" name="cpc"';
        echo 'onclick="document.getElementById(\'div1\').style.display=\'none\'"><br>';
        echo '自選號:<input type="radio" value="cpc" name="cpc"';
        echo 'onclick="document.getElementById(\'div1\').style.display=\'\'"><br><br>';
        echo '<div id="div1" style="display:none">';
        //使用迴圈產生checkbox
        for ($i = 0; $i < 49; $i++) {
            $_value = $i+1;//i從0~48、value從1~49(=i+1)
            $_num = sprintf('%02s', $_value);//補足2位數，前面補0
            echo '<input type="checkbox" value="'.$_value.'" name="num['.$i.']" >'.$_num;
            //如果數字是7的倍數就換行
            if (0 == ($_value % 7)) {
                echo "<br>";
            }
        }
        echo '</div>';
        echo '<input type="reset" value="重選"> ';
        echo '<input type="submit" name="submit" value="送出"/><br>';
        echo '</form>';
    }
    //*已選號
    public static function showA($proCumum)
    {
        asort($proCumum);
        echo '已選號:'.implode(",", $proCumum).'<br><br>';
    }
    //*開獎結果
    public static function showB($proNum, $proSplt, $comparison_num, $comparison_spl)
    {
        asort($proNum);
        echo '<input type="button" value="開獎結果" onclick="checkShow1();"><br>';
        echo '<div id="div2" style="display:none">';
        echo '一般選號:'.implode(",", $proNum);
        echo '<br>特別號:'.$proSplt.'<br><br>';
        echo '<br><br>大樂透_中獎數:'.$comparison_num.'<br>';
        echo '<br>特別號_中獎數:'.$comparison_spl.'<br></div>';
    }
}