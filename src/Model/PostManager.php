<?php
    namespace App\Model;
    use App\Model\Manager;
    use PDO;

    class PostManager extends Manager
    {

        public function getPosts(int $limit = 6): array
        {
            $req = $this->dbConnect()->prepare("SELECT * FROM posts ORDER BY id DESC Limit 0, :limit");
            $req->bindParam(':limit',$limit, PDO::PARAM_INT);
            $req->execute();
            $data = $req->fetchAll();
            $req->closeCursor();
            return $data;
        }

    }