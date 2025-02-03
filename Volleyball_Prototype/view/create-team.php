<?php require("../model/player.php");
        require("../partials/header.php");
        require_once("../classes/Group.php");


    session_start();
    
    //Gets players from database
    $players = getPlayers($_SESSION['userID']);
    //Initialized selectedPlayers array;
    $selectedPlayers = array();

    //Initialize variables
    $teamNumber = 1;
    $totalPlayers = 0;
    $solutions = 1;

    if(isset($_SESSION['group']) && isset($_SESSION['teamNumber'])){
        //Deserializes data and stores in teams variable
        $serializedData = $_SESSION['group'];
        $group = unserialize($serializedData);
        //Puts balanced teams into teams
        $teams = $group->getBalancedTeams();
        $teamNumber = $_SESSION['teamNumber'];
        $totalPlayers = $_SESSION['totalPlayers'];
        $solutions = $_SESSION['solutions'];
        unset($_SESSION['group']); // Clear session variables
        unset($_SESSION['teamNumber']);
        unset($_SESSION['totalPlayers']);

        //Saves selected players
        $selectedPlayers = $group->getPlayers();


    }
    
    //checks if errors exist in session
    if(isset($_SESSION['error'])){
        $errorMessage = $_SESSION['error'];
        unset($_SESSION['error']);
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/main.js" defer></script>
</head>
<body>
   
    <div class="content">
        <div id="form-container">
            <div id = 'team-header-container'>
                <h1 id="team-heading">Create Teams</h1>
                <p>Generate random teams with optimal skill distribution</p>
            </div>
           
            <form action="../controller/player-controller.php" method="GET" id="team-form">
                <div>
                <h3 id="search-top-header">Select players (<span id="selected-number"><?php echo($totalPlayers)?></span>)</h3>
                
                    <div id="search-header">
                        
                        <input type="search" placeholder="Search" class="search" id="teamSearch">
                        <!-- Select all button -->
                        <div id="check-all-container">
                            <label for="selectAll">Select all</label>
                            <input type="checkbox" name = "selectAll" id="checkAll" onchange = "calc()"></input>
                        </div>
                        
                    </div>
                    
                    <div id="player-list-container">
                        
                        <?php foreach($players as $p):?>
                            <div class="player-container">
                                <input type="checkbox" value="<?php echo($p['playerID'])?>" name="playerList[]" class = "checkPlayer"<?php if(in_array($p['name'], $selectedPlayers)) echo("checked");?>><?php echo($p['name'])?></input>
                            </div>     
                        <?php endforeach?>
                        
                    </div>
                    
                    <p class="error"><?php if(isset($errorMessage))echo($errorMessage)?></p>
                </div>
                

                <div id="right-form-container">
                    <div>
                        <h3>Number of teams</h3>
                        <!-- Number of teams -->
                        <select name="teams" class="team-list">
                            <?php for($i=1;$i<=4;$i++):?>
                            <option value="<?php echo($i)?>" <?php if($teamNumber == $i) echo("selected")?>><?php echo($i)?></option>
                            <?php endfor?>
                        </select>
                    </div>

                    <!-- Number of solutions -->
                    <div>
                        <h3>Max number of solutions</h3>
                        <!-- Number of teams -->
                        <select name="solutions" class="team-list">
                            <?php for ($i = 1; $i <= 10; $i++): ?>
                                <option value="<?php echo $i; ?>" <?php if($solutions == $i) echo("selected")?>><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    

                    <input type="submit" value="Generate Teams" class="buttons" id="generate-button">
                    <input type="hidden" name="action" value="generate">
                </div>
            </form>
        </div>
        <div id="outer-team-container">
            <!-- Generated teams are displayed if teams are set. -->
            <?php if(isset($teams)): ?>
                <h1 id="bottom-heading">Generated Teams</h1>
                <?php foreach ($teams as $solutionIndex => $solution): ?>
                    <div class="team-container">
                        <div class="team-header">
                            <h3 class="team-heading">Solution <?php echo($solutionIndex + 1); ?></h3>
                        </div>
                        
                        <?php foreach ($solution['teams'] as $teamIndex => $team): ?>
                            <div class="team">
                                <h4 id="sub-team-header">Team <?php echo($teamIndex + 1); ?> - Skill (<?php echo $solution['sums'][$teamIndex]; ?>)</h4>
                                <?php foreach ($team as $player): ?>
                                    <p class="player-name"><?php echo $player; ?></p>
                                <?php endforeach; ?>
                                <hr>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
    </div>
</body>
</html>
<?php include("../partials/footer.php")?>