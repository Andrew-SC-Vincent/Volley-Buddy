<?php 
    require("../model/user.php");
    require("../util/functions.php");

    //Creates session that lasts 10 years.
    $lifetime = strtotime('+10 years');

    session_set_cookie_params($lifetime);

    session_start();

    if(isset($_POST['action'])){
        $action = filter_input(INPUT_POST, "action");
    } else{
        $action = filter_input(INPUT_GET, "action");
    }

    switch($action){

        //If log in attempt is made
        case 'login':
            //Gets username and password from login form.
            $username = filter_input(INPUT_POST, "username");
            $password = filter_input(INPUT_POST, "password");

            if(checkUserInfo($username, $password)){
                $_SESSION['userID'] = getUserID($username);

                //Redirect to home page.
                header("Location: ../view/home.php");
            } else{
                //Failure and rejects attempt
                header("Location: ../view/login.php?status=false");
            }
            break;
        case 'createAccount':
            $username = caseFormat(filter_input(INPUT_POST, "username"));
            $email = caseFormat(filter_input(INPUT_POST, "email"));
            $password = filter_input(INPUT_POST, "password");
            $cPassword = filter_input(INPUT_POST, "cPassword");

            // Stores validation errors
            $errors = array();

            // Store input values to save state of input values
            $values = array();

            //Populates input value array
            $values['username'] = $username;
            $values['email'] = $email;

            // Validate username
            if (empty($username)) {
                $errors['username'] = "Username is required";
            } else if (!preg_match("/^[a-zA-Z0-9_]{4,20}$/", $username)) {
                $errors['username'] = "No special characters and must between 4 to 20 characters";
            } else if(checkUsername($username)){
                $errors['username'] = "Username is already taken";
            }

            // Validate email
            if (empty($email)) {
                $errors['email'] = "Email is required";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email format";
            } elseif(checkEmail($email)){
                $errors['email'] = "Email already in use";
            }

            // Validate password
            if (empty($password)) {
                $errors['password'] = "Password is required";
            } elseif (strlen($password) < 6) {
                $errors['password'] = "Password must be at least 6 characters long";
            } elseif($password != $cPassword){
                $errors['password'] = "Passwords do not match";
            }

            // Check for errors
            // Sends values and error messages back
            if (count($errors) > 0) {

                $_SESSION['errors'] = $errors;

                $_SESSION['values'] = $values;

                header("location: ../view/login.php");
            }else{

                createUser($username, $password, $email);

                $_SESSION['userID'] = getUserID($username);

                header("Location: ../view/home.php");
            }
            break;
        case 'logout':
            //Delete session and cookie for the client and server
            $_SESSION = array();
            $params = session_get_cookie_params();
            setCookie(session_name(), '', strtotime('-100 year'), $params['path'], $params['domain'], $params['secure'], $params['httponly']);
            session_destroy();
        
            //Redirect to log in page
            header("Location: ../view/login.php");
            break;
    }