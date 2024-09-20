<?php
namespace App\Controller;

use App\Model\CommentManager;
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

        public static function post(int $id): void
        {
            $postManager = new PostManager();
            $commentManager = new CommentManager();
            $comments = $commentManager->getComments($id);
            $post = $postManager->getPost($id);

            require ("view/frontend/postView.php");
        }

        public static function error(string $message ,int $type): void
        {
            $errorMessage = $message;

            if($type == 404)
            {
                require ("view/frontend/errorView.php");
            }elseif($type == 403)
            {
                require ("view/frontend/errorAccessView.php");
            }
        }



    }
