<?php namespace core;
class View{
    //模版文件
    protected $file;
    //模版变量
    protected $vars = [ ];
    public function make($file ){//make方法是用来读取文件的
        $this->file = '../view/'.$file.'.html';//把文件放到/view目录下

        return $this;
    }
    public function with($name,$value){//分配变量
        $this->vars[$name] = $value; //赋值给全局属性
        return $this;
    }
    public function __toString(){//魔术方法__toString()必须返回一个字符串
        extract($this->vars);
        echo 333;
        include $this->file;//用来加载模版
        echo 444;
        return '';
    }

}