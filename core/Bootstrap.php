<?php
namespace core;
//use core\functions;
class Bootstrap {


    public static function run(){
//    echo 'Bootstrap is running';
        session_start();
        self::parseUrl();
    }
    //分析URL生成控制器方法常量
    public static function parseUrl(){
        //print_r($_SERVER);
        //dd($_SERVER);//die;
        //dd($_GET);
        if (isset($_GET["s"])){
            //分析s变量生成控制器方法
            $info = explode("/",$_GET["s"]);
           // dd($info);
            $class = '\web\controller\\'.ucfirst($info[0]);
            $action = $info[1];
        }else{
            dd('哈啊哈');
            $class = "\web\controller\Index";
            $action = "show";
        }
        echo (new $class)->$action();
    }
}
