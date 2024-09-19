<?php
 namespace App;

use App\Controller\HomeController;

 require "src/Autoloader.php";
 Autoloader::register();

 try{
    if(isset($_GET['action']))
    {
        if($_GET['action']=="listPost")
        {
    
        }elseif($_GET['action']=="post")
        {
    
        }elseif($_GET['action']=="home")
        {
            HomeController::home();
        }else{
            // 404
        }
    }else{
        // home
        HomeController::home();
    }
 }catch(\Exception $e)
 {

 }