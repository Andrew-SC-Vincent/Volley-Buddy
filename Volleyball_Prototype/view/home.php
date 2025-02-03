<?php require("../partials/header.php");

    session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <h1 id="page-header">Create Players and Generate Balanced Teams</h1>
    <h3 class="sub-page-header">How does it work?</h3>
    <div class="full-container">
        <h3 class="feature-header">Create Players</h3>
        <div class="feature-container">
            <div class="step-container">
                <div class="circle">1</div>
                <p>Choose a player name.</p>
            </div>
            
            <div class="step-container">
                <div class="circle">2</div>
                <p>Assign level of ability for fundamental volleyball skills.</p>
            </div>
            <div class="step-container">
                <div class="circle">3</div>
                <p>Create your player and use them in team generation.</p>
            </div>
        </div>
    </div>

    
    
    <div class="full-container">
        <h3 class="feature-header">Generate Teams</h3>
        <div class="feature-container">
            
            <div class="step-container">
                <div class="circle">1</div>
                <p>Select players from your personal player catalogue.</p>
            </div>
            <div class="step-container">
                <div class="circle">2</div>
                <p>Choose the number of teams to be formed.</p>
            </div>
            <div class="step-container">
                <div class="circle">3</div>
                <p>Generate randomized teams with evenly distributed skill.</p>
            </div>
        </div>
    </div>

   
    <h1 class="sub-page-header">What are you waiting for?</h1>
    <a href="create-player.php?action=Create" id="start-link"><button class="buttons" id="start-button">Get Started Now</button></a>

</body>
</html>
<?php require("../partials/footer.php"); ?>