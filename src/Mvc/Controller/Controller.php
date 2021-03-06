<?php

namespace Mvc\Controller;

use Mvc\Model\Model;
use Mvc\View\View;
use Mvc\Core\Data;

class Controller
{
    private $Model = null;

    public static $data = null;

    public static $template = null;

    public function __construct()
    {
        $this->action = isset($_GET['act'])
            ? strtolower($_GET['act'])
            : 'index';
        $this->Model = Model::init();
        self::$data = new Data();
        self::$template = new View(implode('/', array(dirname(dirname(dirname(__DIR__))), 'templates')));

    }

    public final function index()
    {

        View::urlOutput();
        View::regexOutput();
	    View::resultOutput();
	return self::$template->render();

    }
    public function curlUrl()
    {
        $status = $this->Model->curlUrl(
            self::$data->getData()['urlValue'],
            self::$data->getData()['methodValue'],
            self::$data->getData()['headerList'],
            self::$data->getData()['parameterList']
        );
        return View::render(array('status' => $status));
    }

    public function regex()
    {
        $status = $this->Model->regex(self::$data->getData()['temp'], self::$data->getData()['regexValue']);
        return View::render(array('status' => $status));
    }

    public function regex2()
    {
        $status = $this->Model->regex2(self::$data->getData()['temp'], self::$data->getData()['regexValue']);
        return View::render(array('status' => $status));
    }

    public function split()
    {
        $status = $this->Model->split(self::$data->getData()['temp'], self::$data->getData()['num']);
        return View::render(array('status' => $status));
    }
    public function output()
    {
        $status = $this->Model->output(self::$data->getData()['a'], self::$data->getData()['b']);
        return View::render(array('status' => $status));
    }
}
