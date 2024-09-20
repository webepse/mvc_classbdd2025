<?php
    namespace App\Model;
    use App\Model\Manager;
    use PDO;
    use App\Model\Tools\Post;

    class PostManager extends Manager
    {

        public function getPosts(int $limit = 6): array
        {
            $req = $this->dbConnect()->prepare("SELECT * FROM posts ORDER BY id DESC Limit 0, :limit");
            $req->bindParam(':limit',$limit, PDO::PARAM_INT);
            $req->execute();
            // $data = $req->fetchAll(PDO::FETCH_ASSOC);
            $data = $req->fetchAll(PDO::FETCH_CLASS, Post::class);
            // POST::class => App\Model\Tools\Post
            $req->closeCursor();
            return $data;
        }

        public function getPost(int $id): object
        {
            $req = $this->dbConnect()->prepare("SELECT * FROM posts WHERE id=?");
            $req->execute([$id]);
            $req->setFetchMode(PDO::FETCH_OBJ);
            $data = $req->fetch();
            $req->closeCursor();

            return $data;
        }

    }