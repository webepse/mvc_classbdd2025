<?php
    namespace App\Model\Tools;

    class Post{
        public $id;
        public $title;
        public $content;
        public $creation_date;

        public function getURL(): string{
            return "index.php?action=post&id=".$this->id;
        }

        public function getExtrait():  string{
            $texte = strip_tags($this->content);
            if(preg_match("#(\w+\W+){20}#",$texte,$out))
            {
                $html = "<div>".$out[0]."... <a href='".$this->getURL()."'>Voir la suite</a></div>";
            }else{
                $html = "<div>".$texte."</div>";
            }

            return $html;
        }


    }