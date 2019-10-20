<?php

class ViewUser extends User{
 
    public function showAllUsers(){

        $datas = $this->getAllUsers();

        foreach($datas as $data) {
            echo $data['id'];
            echo $data['username'];
        }
    }


    public function checkEmailExists($email){
        $exists = $this->emailExists($email);
        return $exists;
    }

    public function checkUsernameExists($email){
        $exists = $this->usernameExists($email);
        return $exists;
    }

    public function addUser($username, $email, $password) {
        $this->addUserInsert($username, $email, $password);
    }

    public function login($email, $password) {
        $this->processLogin($email, $password);
    }

    public function getUserID($email, $password) {
        $this->processUserID($email, $password);
    }

    



};
?>