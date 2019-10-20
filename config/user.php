<?php

class User extends Database{
 
    protected function getAllUsers(){

        $sql = "SELECT * FROM users";
        $result = $this->connect()->query($sql);
        $num_rows = $result->num_rows;

        if($num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            return $data;
        }
    }

    protected function usernameExists ($username) {

        $sql = "SELECT * FROM users WHERE username = '" . $username . "'";
        $result = $this->connect()->query($sql);

        try {
            $num_rows = $result->num_rows;

            if($num_rows > 0) {
                return true;
            }
        } catch (Throwable $th) {
            echo "failed to check username";
        }
        return false;
    }

    protected function emailExists ($email) {
        $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
        $result = $this->connect()->query($sql);
        
        try {
            $num_rows = $result->num_rows;

            if($num_rows > 0) {
                return true;
            }
        } catch (Throwable $th) {
            echo "failed to check email";
        }
        return false;
    }

    protected function addUserInsert($username, $email, $password) {


        $sql =  "INSERT INTO `users` (`id`, `username`, `email`, `password`, `access_level`, `access_code`, `status`, `created`, `modified`) VALUES (NULL, '$username', '$email', '$password', 'user', '0', '0', now(), current_timestamp());";
        
    
        $result = $this->connect()->query($sql);



        // prepare and bind
       // $stmt = $this->connect()->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
       // $stmt->bind_param("sss", $username, $email, $password);
      //  $stmt->execute();

      //  $stmt->close();
        
    }

    public function processLogin($username, $password) {
       // $passwordHash = md5($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $this->connect()->query($sql);

        if(!empty($result)) {
            return true;
        }

        return false;
    }

    public function processUserID($username, $password) {
         $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
         $result = $this->connect()->query($sql);
 
        $userid =  $result->fetch_assoc();


         if(!empty($result)) {
             return $userid['id'];
         }
 
         return 0;
     }
}
?>