<?php   require("../partials/header.php");
        require("../util/functions.php");
        session_start();
        
        //If errors exist, fills array and unsets from session
        if(isset($_SESSION['error'])){
            $errorMessage = $_SESSION['error'];
            unset($_SESSION['error']);
        }

        if(isset($_SESSION['editPlayer'])){
            $player = $_SESSION['editPlayer'];
        }

        //Determines whether the page will create a player or update the player
        $action = getURLValue('action');
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/create-player.css">
</head>
<body>
    <div class="content">
    <h1 id="team-heading"><?php echo($action)?> Player</h1>
        <div id="form-container">
            <form action="../controller/player-controller.php" method="POST">
                <div id="full-container">   
                    <div id="left-player-form">
                        <div>
                            <input type="text" name="name" id="playerName" placeholder="Player Name" value="<?php if($action=='Edit')echo($player['name'])?>">
                            <p class="error"><?php if(isset($errorMessage))echo($errorMessage)?></p>
                        </div>
                        
                        
                        <input type="hidden" value="<?php echo(strtolower($action))?>Player" name="action">
                        <!-- includes playerID if being edited -->
                        <?php if($action=='Edit'):?>
                        <input type="hidden" value = "<?php echo($player['playerID'])?>" name="playerID">
                        <?php endif?>
                    </div>
                    
                    <div id="dropdown-container">
                        <div class="select-container">
                            <label for="passing">Passing</label>
                            <select name="passing" id="passing">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i; ?>" <?php if($action=='Edit' && $i == $player['passing']) echo("selected")?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="select-container">
                            <label for="setting">Setting</label>
                            <select name="setting" id="setting">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i; ?>" <?php if($action=='Edit' && $i == $player['setting']) echo("selected")?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="select-container">
                            <label for="serving">Serving</label>
                            <select name="serving" id="serving">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i; ?>" <?php if($action=='Edit' && $i == $player['serving']) echo("selected")?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="select-container">
                            <label for="attacking">Attacking</label>
                            <select name="attacking" id="attacking">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i; ?>" <?php if($action=='Edit' && $i == $player['attacking']) echo("selected")?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>        
                        
                        <div class="select-container">
                            <label for="blocking">Blocking</label>
                            <select name="blocking" id="blocking">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i; ?>" <?php if($action=='Edit' && $i == $player['blocking']) echo("selected")?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        
                    </div>
                </div>
                <input type="submit" value="Submit Player" class="buttons" id="submit-player">
            </form>
        </div>
        <h1 class="heading-underline">Determining Skill Level</h1>

        <h3 class="subheading">Follow the suggested recommendation for best results</h3>
        
        <div class="advice-container">
            <h2>Passing</h2>
            <p>1-2: Misses majority of balls.<br>
            3-4: Gets some serves up.<br>
            5-6: Returns most serves and some spikes.<br>
            7-8: Consistently receives serves and sets.<br>
            9-10: Exceptional passing skills, rarely misses.</p>
        </div>
        
       
        <div class="advice-container">
            <h2>Setting</h2>
            <p>
            1-2: Rarely sets the ball.<br>
            3-4: Struggles to set accurately.<br>
            5-6: Can set the ball somewhat consistently.<br>
            7-8: Can set forwards and backwards consistently.<br>
            9-10: Masterful setting, creates scoring opportunities.
            </p>
        </div>

        <div class="advice-container">
            <h2>Serving</h2>
            <p>
            1-2: Often serves out of bounds.<br>
            3-4: Gets some serves in play.<br>
            5-6: Serves consistently with one style.<br>
            7-8: Strong serving with accuracy and pace.<br>
            9-10: Multiple strong serving variations, difficult to return.
            </p>
        </div>

        <div class="advice-container">
            <h2>Attacking</h2>
            <p>
            1-2: Rarely attempts spikes.<br>
            3-4: Occasionally hits the ball over the net.<br>
            5-6: Makes most spikes over the net.<br>
            7-8: Powerful and precise spiking technique.<br>
            9-10: Unstoppable attacker, dominates at the net.
            </p>
        </div>
        <div class="advice-container">
            <h2>Blocking</h2>
            <p>
            1-2: Unable to block effectively.<br>
            3-4: Occasionally blocks incoming attacks.<br>
            5-6: Solid blocker, disrupts opponent's attacks.<br>
            7-8: Skilled at timing blocks, nullifies attacks.<br>
            9-10: Defensive wall, shuts down opponent's offense.
            </p>
        </div>

    </div>
</body>
</html>
<?php include("../partials/footer.php")?>