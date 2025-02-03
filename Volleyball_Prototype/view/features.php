<?php require("../partials/header.php"); 
    session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/feature.css">
</head>
<body>
    <div class="content">
        <h1 id="team-heading">Features</h1>

        <div class="feature-bubble">
            <h1>Unique Experience</h1>
            <p>By creating an account, you are able to create your own
                personal player catalogue. This allows you to create
                players and teams that are unique to your account. Without
                proper authorization, your player's skill levels are anonymous
                and are not accessible by anyone else.
            </p>
        </div>
    

        <div class="feature-bubble">
            <h1>Create Players</h1>
            <p>
            The Create Players function allows you to add 
            individual players to the volleyball team building 
            application. With this feature, you can input the names 
            and skill levels of each player participating in the 
            volleyball program. Whether you're familiar with the 
            players' abilities or need to assess their skills, 
            this function enables you to customize the player 
            roster to reflect the diverse talent within your 
            volleyball community. By assigning skill levels 
            across essential volleyball techniques such as passing, 
            setting, serving, attacking, and blocking, you ensure a 
            comprehensive representation of each player's strengths 
            and areas for improvement. With the Create Players 
            function, you lay the foundation for generating 
            balanced and competitive teams tailored to your program's needs.
            </p>
        </div>

        <div class="feature-bubble">
            <h1>Create Team</h1>
            <p>
            The Create Team feature streamlines the process of dividing players 
            into balanced teams for volleyball games and events. It allows you to use 
            the players you generated to create balanced teams. Our algorithm takes all 
            different volleyball skills into consideration and generates a custom number 
            of teams. By automating the team-building process, this function saves time 
            and ensures that teams are well-matched, enhancing the overall experience for 
            players and promoting a level playing field in every game.
            </p>
        </div>
        
        <div class="feature-bubble">
            <h1>Manage Players</h1>
            <p>The view player page allows users to manage their players. 
                Whether it is updating a player's skills to reflect their progress,
                or deleting a player when the person is no longer involved with
                your volleyball games, you have control in how you maintain your
                player catalogue, and your game.</p>
        </div>
    </div>
    
</body>
</html>
<?php require("../partials/footer.php")?>