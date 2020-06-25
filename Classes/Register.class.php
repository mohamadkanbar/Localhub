<?php
class Register extends MysqliConnect{
    private $firstname, $lastname , $email, $password,$customRadio, $confirm;
    public function setInput($firstname,$lastname, $email, $password, $confirm, $customRadio){
        $this->firstname =$this->esc($this->html($firstname));
        $this->lastname =$this->esc($this->html($lastname));
        $this->email = $this->esc($this->html($email));
        $this->password = $this->esc($this->html($password));
        $this->customRadio = $this->esc($this->html($customRadio));
        $this->confirm = $this->esc($this->html($confirm));

        if($this->customRadio == "admin")
            $this->customRadio= "1";
        else
            $this->customRadio = "0";
    }
        public function checkInput(){
            if(empty($this->firstname)){
                Messages::setMsg('False', 'Pleas enter your first name ', 'danger');
                echo Messages::getMsg();
            }
            if(empty($this->lastname)){
                Messages::setMsg('False', 'Pleas enter your last name ', 'danger');
                echo Messages::getMsg();
            }
            else if(empty($this->email)){
                Messages::setMsg('False', 'Pleas enter you mail', 'danger');
                echo Messages::getMsg();
            }
            else if(!$this->checkEmail()){
                Messages::setMsg('False', 'Email is already registered', 'danger');
                echo Messages::getMsg();
            } 
            else if(empty($this->password)){
                Messages::setMsg('False', 'Pleas enter the password', 'danger');
                echo Messages::getMsg();
            }
            else if($this->password != $this->confirm){
                Messages::setMsg('False', 'You entered two different passwords', 'danger');
                echo Messages::getMsg();
            }  
            else{
                return true;
            }
            return FALSE;
        }
        public function DisplayError(){
            if($this->checkInput()){
                if($this->InsertNewMember()){
                    header("Location: index.php");
                }else{
                    Messages::setMsg('False', 'we have a problem in system', 'danger');
                    echo Messages::getMsg();
                }
            }
        }
        private function checkEmail(){
            $this->query('id', "users", "WHERE `email` = '$this->email'");
            $this->execute();
            if($this->rowCount() == 0){
                return TRUE;
            }
            return FALSE;
        } 
        private function InsertNewMember(){
            $password = md5(sha1($this->password));
            $this->insert('users', "firstname ,lastname , email , password, isAdmin", "'$this->firstname','$this->lastname','$this->email','$password','$this->customRadio'");
            if($this->execute()){
                $_SESSION['is_logged'] = true;
                $_SESSION['user'] = [
                                    'fname' => $this->firstname,
                                    'lname' => $this->lastname,
                                    'email' => $this->email,
                                    'isAdmin' => $this->customRadio,
                ];
                return TRUE;
            }
            return FALSE;
        }
    }
?>