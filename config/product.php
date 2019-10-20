<?php

class Product extends Database{
 
    protected function getAllProcts(){

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
        
        echo $sql;
        $result = $this->connect()->query($sql);

        // prepare and bind
       // $stmt = $this->connect()->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
       // $stmt->bind_param("sss", $username, $email, $password);
      //  $stmt->execute();

      //  $stmt->close();
        
    }
}
?>