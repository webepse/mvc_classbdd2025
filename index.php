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
            HomeController::listPost();
            
        }elseif($_GET['action']=="post")
        {
            if(isset($_GET['id']))
            {
                if(is_numeric($_GET['id']))
                {
                    $id = htmlspecialchars($_GET['id']);
                    HomeController::post($id);
                }else{
                    throw new \Exception("La page que vous cherchez n'existe pas");
                }
            }else{
                throw new \Exception("La page que vous cherchez n'existe pas");
            }
        }elseif($_GET['action']=="home")
        {
            HomeController::home();
        }else{
            // 404
            throw new \Exception("La page que vous cherchez n'existe pas");
        }
    }else{
        // home
        HomeController::home();
    }
 }catch(\Exception $e)
 {
    $errorMessage = $e->getMessage();
    HomeController::error($errorMessage,404);
 }