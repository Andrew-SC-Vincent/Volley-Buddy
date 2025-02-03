<?php 

    session_start();

    $error = false;
    //Displays pop up if errors exist
    if(isset($_SESSION['errors'])){
        $errors = $_SESSION['errors'];
        $values = $_SESSION['values'];
        $error = true;
        // Clear session errors after displaying them
        unset($_SESSION['errors']); 
        unset($_SESSION['values']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volleybuddy</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
        <!-- Pop up -->
    <div class="hidden" id="popup">

        <div id="hCtr">
            <div id="hdr">
                <h1 id="sih1">Create Account</h1>
                <p style = 'color:grey'>Perfect volleyball start here.</p>
            </div>
            <button id="cancel" onclick="togglePopup()">X</button>
        </div>  
                
        <form action="../controller/user-controller.php" id="cForm" method="POST">
            <input type="text" name="username" placeholder="Username" class="cInput" value="<?php if(isset($values))echo $values['username']?>">
            <?php if(isset($errors['username'])): ?>
                <div class="error"><?php echo $errors['username']; ?></div>
            <?php endif; ?>
            
            <input type="email" name="email" placeholder="Email" class="cInput" value="<?php if(isset($values))echo $values['email']?>">
            <?php if(isset($errors['email'])): ?>
                <div class="error"><?php echo $errors['email']; ?></div>
            <?php endif; ?>
            
            <div class="cpl">
                <div class="input-error">
                    <input type="password" name="password" placeholder="Password" class="cInput">
                    <?php if(isset($errors['password'])): ?>
                        <div class="error"><?php echo $errors['password']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="input-error">
                    <input type="password" name="cPassword" placeholder="Confirm Password" class="cInput">
                    <?php if(isset($errors['cPassword'])): ?>
                        <div class="error"><?php echo $errors['cPassword']; ?></div>
                    <?php endif; ?>
                </div>
            </div>
            
            <input type="submit" value="Sign Up" name="signup" class="cInput" id="cSubmit">
            <input type="hidden" name="action" value="createAccount">
        </form>
    </div>
</body>
</html>