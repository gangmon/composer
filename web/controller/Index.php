<?php
namespace web\controller;
use function core\dd;
use core\View;

use Gregwar\Captcha\CaptchaBuilder;

class Index {
    public $view;
    public function __construct(){//定义一个构造函数
        $this->view = new View();//new一个我们的视图模型
    }

    public function show(){
       return $this->view->make('index')->with('version','版本1.0');
    }
    public function login(){
        dd($_SESSION);
        return $this->view->make('login');
    }
    public function code(){
        header('Content-type: image/jpeg');
        $builder = new CaptchaBuilder;
        $builder->build(100,30);
        $_SESSION['phrase'] = $builder->getPhrase();
        $builder->output();
    }
}