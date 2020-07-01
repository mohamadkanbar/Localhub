<?php
class Login extends MysqliConnect{
    private $email , $password , $md5;
    public function setInput($email , $password){
        $this->email = $this->esc($this->html($email));
        $this->password = $this->esc($this->html($password));
        $this->md5  = md5(sha1($this->password));
    }
    private function checkInput(){
        if(empty($this->email)){
            Messages::setMsg('False', 'Pleas enter email', 'danger');
            echo Messages::getMsg();
        }else if(empty ($this->password)){
            Messages::setMsg('False', 'Pleas enter password', 'danger');
            echo Messages::getMsg();
        }else if(!$this->checkUser()){
            Messages::setMsg('False', 'Your data is false', 'danger');
            echo Messages::getMsg();
        }
        else{
            return TRUE;
        }
        return FALSE;
    }
    private function checkUser(){
        $this->query('id', 'users', "WHERE `email` = '$this->email' AND `password` = '$this->md5'");
        $this->execute();
        if($this->rowCount() > 0){
            return TRUE;
        }
        return FALSE;
    }
    private function makeUserLogged(){
        if($this->checkUser()){
            $this->query('*', 'users', "WHERE `email` = '$this->email' AND `password` = '$this->md5'");
            $this->execute();
            $user = $this->fetch();
            $admin = ($user['isAdmin'] == 1);
            $_SESSION['is_logged'] = true;
            $_SESSION['user'] = [
                                'id' => $user['id'],
                                'fname' => $user['firstname'],
                                'lname' => $user['lastname'],
                                'email' => $user['email'],
                                'isAdmin' => $admin
            ];
            return TRUE;
        }
        return FALSE;
    }

    public function DisplayError(){

        if($this->checkInput()){
            if($this->makeUserLogged()==true){
                if($_SESSION['user']["isAdmin"] )
                    header("Location: manager/index.php");
                else
                    header("Location: profile/index.php");
                }else{
                Messages::setMsg('False', 'false in system', 'danger');
                echo Messages::getMsg();
            }
        }
        }
    
}

