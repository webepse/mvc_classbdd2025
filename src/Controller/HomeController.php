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

        public static function addComment(int $id)
        {
            $err = 0;
            if(empty($_POST['author']))
            {
                $err= 1;
            }else{
                $author = htmlspecialchars($_POST['author']);
            }
            if(empty($_POST['comment']))
            {
                $err=2;
            }else{
                $comment= htmlspecialchars($_POST['comment']);
            }

            if($err == 0)
            {
                // appel au model
                $commentManager = new CommentManager();
                $addComment = $commentManager->addComment($id,$author,$comment);
                if($addComment)
                {
                    header("LOCATION:index.php?action=post&id=".$id);
                }else{
                    header("LOCATION:index.php?action=post&id=".$id."&error=3");
                }

            }else{
                header("LOCATION:index.php?action=post&id=".$id."&error=".$err);
            }
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
