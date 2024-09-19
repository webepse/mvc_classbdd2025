<?php
namespace App\Controller;

use App\Model\PostManager;

    class HomeController{

        public static function home(): void
        {

            require("view/frontend/homeView.php");
        }

        public static function listPost(): void
        {
            $postManager = new PostManager();
            $posts = $postManager->getPosts();

            require ("view/frontend/listPostView.php");
        }




    }
