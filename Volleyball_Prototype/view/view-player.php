<?php include("../partials/header.php");
        require("../model/player.php");
    session_start();
    $players = getPlayerInfo($_SESSION['userID']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="../css/view-player.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../js/main.js" defer></script>
    
</head>
<body>
    <div class="content">
        <div id="view-player-container">
            
            <div id="view-top-container">
                <h1 id="player-header">Players</h1>
                <h2 id="total-player">Total Players <?php echo(numberOfPlayer($_SESSION['userID']))?></h2>
            </div>
            <div id="function-container">
                <input type="search" placeholder="Search" class = "search" id = "viewSearch">
                <a href="create-player.php?action=Create" id="start-link"><button class="buttons" id="add-player-button">Add Player</button></a>
            </div>
            
            
            <?php foreach($players as $player) :?>
                <div class="player-container">
                    <div class = "container-top">
                        <h1 class = "playerName"><?php echo$player['name']?></h1>
                        <div class = "container-options">
                            <form action="../controller/player-controller.php" method="POST">
                                <button type="submit" value="Edit" id = "edit"><i class="fa-regular fa-pen-to-square icon"></i></button>
                                <input type="hidden" name="playerID" value="<?php echo($player['playerID'])?>">
                                <input type="hidden" name="name" value="<?php echo($player['name'])?>">
                                <input type="hidden" name="passing" value="<?php echo($player['passing'])?>">
                                <input type="hidden" name="setting" value="<?php echo($player['setting'])?>">
                                <input type="hidden" name="serving" value="<?php echo($player['serving'])?>">
                                <input type="hidden" name="attacking" value="<?php echo($player['attacking'])?>">
                                <input type="hidden" name="blocking" value="<?php echo($player['blocking'])?>">
                                <input type="hidden" name="action" value="editNav">
                            </form>
                            <form action="../controller/player-controller.php" method="POST" onsubmit = "return confirm('Are you sure you want to delete the player?');">
                                <button type="submit" value="Delete" id="delete"><i class="fa-solid fa-trash icon" ></i></button>
                                <input type="hidden" name="action" value="deletePlayer" id="deletePlayer">
                                <input type="hidden" name="playerID" value="<?php echo($player['playerID'])?>">
                            </form>
                        </div>
                    </div>
                    
                    <div class="inner-player-container">
                        <div class="skill-value">
                            <p class="title">Passing</p>
                            <h2><?php echo($player['passing'])?></h2>
                        </div>
                        <div class="skill-value">
                            <p class="title">Setting</p>
                            <h2><?php echo($player['setting'])?></h2>
                        </div>
                        <div class="skill-value">
                            <p class="title">Serving</p>
                            <h2><?php echo($player['serving'])?></h2>
                        </div>
                        <div class="skill-value">
                            <p class="title">Attacking</p>
                            <h2><?php echo($player['attacking'])?></h2>
                        </div>
                        <div class="skill-value">
                            <p class="title">Blocking</p>
                            <h2><?php echo($player['blocking'])?></h2>
                        </div>

                        <h1 id = "totalSkill"><?php echo($player['skill'])?></h1>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </div>
</body>
</html>
<?php include("../partials/footer.php");?>