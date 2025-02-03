<?php
    include 'create-account.php';
    require '../util/functions.php';

    //Redirects to home if log in was already made.
    if(isset($_SESSION['username'])){
        header("Location: ../home/main-page/home.php");
    }

    //Unsuccessful log in flag
    $status = getURLValue('status');
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koob</title>
    <link rel="stylesheet" href="../css/login.css">
    <script src="..\js\main.js"></script>
</head>

<body>

    <!-- LOG IN PAGE -->
    <div class = "container" id = "blur">
        <!-- Toggles pop up if error in creating using -->
        <?php if($error) echo("<script>togglePopup();</script>")?>
        
        <form action="../controller/user-controller.php" id ='lForm' method="POST">
        <img src="../img/volleybuddy-favicon-black.png" alt="volleyball logo">
            <input type="text" name="username" placeholder="Username"  class="credentials">
            <input type="password" name="password" placeholder="Password"  class="credentials">
            <?php
            if(isset($status))
                echo("<p style='color:red'>Invalid username or password</p>")
            ?>
            <input type="submit" value="Log In" id="login" class="credentials">
            <input type="hidden" name="action" value="login">
            
            <button type = "button" class="credentials" id='create' onclick="togglePopup()">Create new account</button>
        </form>    
    </div>
</body>
</html>
