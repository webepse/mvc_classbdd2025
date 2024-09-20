<?php
    namespace App\Model;
    use App\Model\Manager;

    class CommentManager extends Manager{

        public function getComments(int $postId): array
        {
            $comments = $this->dbConnect()->prepare("SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y %Hh%i') as mydate FROM comments WHERE post_id=? ORDER BY comment_date DESC");
            $comments->execute([$postId]);
            $data = $comments->fetchAll(\PDO::FETCH_OBJ);
            $comments->closeCursor();

            return $data;
        }

        public function addComment(int $id, string $author, string $comment): bool
        {
            $insert = $this->dbConnect()->prepare("INSERT INTO comments(author,comment, comment_date, post_id) VALUES(:author,:comment,NOW(),:myid)");
            $affectline = $insert->execute([
                ":author" => $author,
                ":comment" => $comment,
                ":myid" => $id
            ]);
            $insert->closeCursor();

            if($affectline){
                return true;
            }else{
                return false;
            }

        }
    }
?>