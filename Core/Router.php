<?php

namespace Core;

use Exception;

class Router
{   

    protected $controller;
    protected $action;

    public function __construct()
    {
        $url = $_SERVER["REQUEST_URI"];
        $expUrl = explode('/', $url);
        $tpmName = $expUrl[2] ? $expUrl[2] : 'Home';
        // $tpmName = $expUrl[2] ?? 'Home';
        $nameCtr = ucfirst($tpmName).'Controller';
       
        // if (isset($expUrl[3])) {
        //     $nameAct = $expUrl[3];
        // } else {
        //     $nameAct = 'index';
        // }

        // isset($expUrl[3]) ? $nameAct = $expUrl[3] : $nameAct = 'index';
        $nameAct = $expUrl[3] ?? 'index';
        
         
        //is file exists
        if (file_exists( __DIR__ . '\..\Apps\Controllers\\'.$nameCtr.'.php')) {
           
            include __DIR__ . '\..\Apps\Controllers\\'.$nameCtr.'.php';
           //is class exists
            if (class_exists('Apps\Controllers\\'.$nameCtr)) {
                $nameCtr = '\Apps\Controllers\\'.$nameCtr;
                $this->controller = new $nameCtr;
                // $this->controller = new HomeController;

               
                if (method_exists($this->controller, $nameAct)) {
                    $this->action = $nameAct;
                } else {
                    throw new Exception('Acton ' .$nameAct. ' does not exsists!');
                }
                
            } else {
                throw new Exception('Class ' .$nameCtr. ' does not exsists!');
            }

        } else {
            throw new Exception('File ' .$nameCtr. ' does not exsists!');
        }


        // if (class_exists('Apps\Controllers\\'.ucfirst($expUrl[2]).'Controller')) {

        // }
    }

    public function getController(): object
    {
       return $this->controller;
    }

    public function getAction(): string
    {
       return $this->action;
    }

}