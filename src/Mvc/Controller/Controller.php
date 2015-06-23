<?php

namespace Mvc\Controller;

use Mvc\Model\Model;
use Mvc\View\View;

// 動作類別
class Controller
{
    // 使用者選擇的動作
    private $action = 'index';
    // 建構函式
    // 初始化要執行的動作以及留言板物件
    public function __construct()
    {
        $this->action = isset($_GET['act'])
            ? strtolower($_GET['act'])
            : 'index';
        $this->Model = new Model();
    }
    // 執行選擇的動作
    public final function run()
    {
        $this->{$this->action}();
    }
    // 等同於原來的 index.php
    private function index()
    {
        View::showInputForm('index.php');
        $proCumnum = $this->Model->proCumnum();
        $proNum = $this->Model->proNum();
        $proSpl = $this->Model->proSpl();
        $comparisonA = $this->Model->comparisonA();
        $comparisonB = $this->Model->comparisonB();
        View::showA($proCumnum);
        View::showB($proNum,$proSpl,$comparisonA,$comparisonB);

    }
    // 解構函式
    public function __destruct()
    {
    }
}