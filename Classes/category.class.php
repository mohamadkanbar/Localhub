<?php
class Category extends MysqliConnect{
    private $name;
    public function setInput($name){
        $this->name =$name;

    }
        public function getcategory(){
            $this->query('name', "category");
            $this->execute();

            if($this->rowCount() == 0){
                return TRUE;
            }
            return FALSE;
        } 

    }
?>