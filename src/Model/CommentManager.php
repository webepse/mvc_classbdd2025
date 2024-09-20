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
    }
?>