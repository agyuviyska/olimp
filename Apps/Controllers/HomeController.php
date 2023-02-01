<?php
namespace Apps\Controllers;


class HomeController 
{
    const INDEX = 'index';

    public function index()
    {   
       
        require_once ROOT_DIR.VIEW_PAGES_DIR.'Home'.FILE_EXT;
        die;
    }

    public function view()
    {
        var_dump('view');
    }


}