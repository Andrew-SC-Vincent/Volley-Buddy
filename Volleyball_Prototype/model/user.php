<?php 
    require("../util/database.php");

    //Checks username and password.
    function checkUserInfo($username, $password) {
        global $db;
            
        // Fetch the hashed password for the given username
        $query = $db->prepare("SELECT password FROM user WHERE username = :username");
        $query->bindParam(":username", $username);
        $query->execute();

        //Gets hashed password.
        $hashedPassword = $query->fetchColumn();

        // Verify the entered password against the hashed password
        return $hashedPassword && password_verify($password, $hashedPassword);
    }
    
    //Adds user to database.
    function createUser($username, $password, $email) {
        global $db;
        
        // Hash the password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $query = $db->prepare("INSERT INTO user (username, password, email) VALUES (:username, :password, :email)");
        
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $hashed_password); // Store the hashed password
        $query->bindParam(':email', $email);
        
        $query->execute();
    }
    //Gets user info from database given username
    function getUserID($username){
        global $db;

        $query = $db->prepare("Select userID FROM user WHERE :username = username");

        $query->bindParam(":username", $username);

        $query->execute();

        $result = $query->fetchColumn();
        
        return $result;
    }

    //Checks in database if username exists
    function checkUsername($username){
        global $db;

        $query = $db->prepare("SELECT username FROM user WHERE username = :username");

        $query->bindParam(":username", $username);

        $query->execute();

        $count = $query->fetchColumn();

        if($count > 0){
            return true;   
        } else{
            return false;
        }
    }

    //Check if email exists
    function checkEmail($email){
        global $db;

        $query = $db->prepare("SELECT email FROM user WHERE email = :email");

        $query->bindParam(":email", $email);

        $query->execute();

        $count = $query->fetchColumn();

        if($count > 0){
            return true;   
        } else{
            return false;
        }
    }
?>