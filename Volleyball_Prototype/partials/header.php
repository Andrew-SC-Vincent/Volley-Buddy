<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/header.css">
    <script src = "../js/main.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <!-- Navigation -->
        <div id="header-container">
            <a href="../view/home.php"><img src="../img\volleybuddy-favicon-black.png" alt="" class="logo"></a>
            <ul id = "header-nav">
                <li><a href="../view/home.php" class="nav-link">Home</a></li>
                <li><a href="create-team.php" class="nav-link">Create Team</a></li>
                <li id="dropdown">
                    <ul class="nav-link">Players <i class="fa-solid fa-caret-down" style="color: #ffffff;"></i></ul>
                    <ul class="dropdown-menu">
                        <li><a href="../view/view-player.php" class="dropdown-item">View Players</a></li>
                        <li><a href="create-player.php?action=Create" class="dropdown-item">Create Players</a></li>
                    </ul>
                </li>
                <li><a href="../view/features.php" class="nav-link">Features</a></li>
                <li>
                    <form action="../controller/user-controller.php">
                        <input type="submit" value = "Log out" class="nav-link">
                        <input type="hidden" value="logout" name="action">
                    </form>
                </li>
            </ul>

            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
        <!-- End navigation -->
    </header>
</body>
</html>
