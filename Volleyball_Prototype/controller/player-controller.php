<?php 
    require("../model/player.php");
    require_once("../classes/Player.php");
    require_once("../classes/Team.php");
    require_once("../classes/Group.php");

    session_start();

   if(isset($_POST['action'])){
        $action = filter_input(INPUT_POST, "action");
    } else{
        $action = filter_input(INPUT_GET, "action");
    }

    switch($action){
        
        //Creates even teams
        case 'generate':

            $totalSkill = 0;

            //List of player objects
            $players = array();

            //Get list of players ID selected
            $playerList = $_GET['playerList'];

            //Total number of teams
            $teamNumber = filter_input(INPUT_GET, "teams");

             //Number of MAX solutions
            $solutions = filter_input(INPUT_GET, "solutions");


            //Validating form input
            if (empty($playerList)) {
                $error =  "Select at least 1 player.";
                $_SESSION['error'] = $error;
                header("location: ../view/create-team.php?error=true");
                break;
            }

            //Validating form input
            if (sizeof($playerList)<$teamNumber) {
                $error =  "Not enough players for this many teams.";
                $_SESSION['error'] = $error;
                header("location: ../view/create-team.php?error=true");
                break;
            }

            //Total players
            $totalPlayers = sizeof($playerList);

            //Shuffles player list
            shuffle($playerList);

            //Creates players.
            for($i=0;$i<$totalPlayers;$i++){ 
                $playerInfo = getPlayerByID($playerList[$i]);
                //Creates player
                $player = new Player(
                    $playerInfo['name'],
                    $playerInfo['passing'],
                    $playerInfo['setting'],
                    $playerInfo['serving'],
                    $playerInfo['blocking'],
                    $playerInfo['attacking'],
                    $playerInfo['skill'],
                    $playerInfo['playerID']
                );
                $players[] = $player;
            }

            //Creates group of players
            $group = new Group($players);
            
            //creates group of balanced teams.
            $group->createTeams($teamNumber, $solutions);
            
            $serializedData = serialize($group);

            // Step 2: Store the serialized string in the session
            $_SESSION['group'] = $serializedData;

            //Store teamNumber in session
            $_SESSION['teamNumber'] =  $teamNumber;

            //Store selected player number in session
            $_SESSION['totalPlayers'] = $totalPlayers;

            //Store solutions in session
            $_SESSION['solutions'] = $solutions;

            
            header("Location: ../view/create-team.php");
            break;
        case 'createPlayer':
            $name = filter_input(INPUT_POST, "name");
            $passing = filter_input(INPUT_POST, "passing");
            $setting = filter_input(INPUT_POST, "setting");
            $serving = filter_input(INPUT_POST, "serving");
            $attacking = filter_input(INPUT_POST, "attacking");
            $blocking = filter_input(INPUT_POST, "blocking");
            $userID = $_SESSION['userID'];

            //Validating form input
            if (!trim($name ?? '')) {
                $error =  "Player name cannot be empty.";
                $_SESSION['error'] = $error;
                header("location: ../view/create-player.php?action=Create");
                break;
            }

            //Creates skill level of player.
            $player = new Player($name, $passing, $setting, $serving, $attacking, $blocking);

            $skill = $player->getSkill();


            createPlayer($userID, $name, $passing, $setting, $serving, $attacking, $blocking, $skill);

            header("Location: ../view/view-player.php");
            
            break;
        case 'deletePlayer':
            $playerID = filter_input(INPUT_POST, 'playerID');

            deletePlayer($playerID);

            header("Location: ../view/view-player.php");
            break;

        case 'editNav':
            $playerID = filter_input(INPUT_POST, 'playerID');
            $name = filter_input(INPUT_POST, "name");
            $passing = filter_input(INPUT_POST, "passing");
            $setting = filter_input(INPUT_POST, "setting");
            $serving = filter_input(INPUT_POST, "serving");
            $attacking = filter_input(INPUT_POST, "attacking");
            $blocking = filter_input(INPUT_POST, "blocking");

            $_SESSION['editPlayer'] = array("playerID" => $playerID, "name"=>$name, "passing"=>$passing, "setting"=>$setting, "serving"=>$serving, "attacking"=>$attacking, "blocking"=>$blocking);

            header("Location: ../view/create-player.php?action=Edit");
            break;
        case 'editPlayer':
            $name = filter_input(INPUT_POST, "name");
            $passing = filter_input(INPUT_POST, "passing");
            $setting = filter_input(INPUT_POST, "setting");
            $serving = filter_input(INPUT_POST, "serving");
            $attacking = filter_input(INPUT_POST, "attacking");
            $blocking = filter_input(INPUT_POST, "blocking");
            $playerID = filter_input(INPUT_POST, 'playerID');

            //Validating form input
            if (!trim($name ?? '')) {
                $error =  "Player name cannot be empty.";
                $_SESSION['error'] = $error;
                header("location: ../view/create-player.php?action=Edit");
                break;
            }

            updatePlayer($playerID, $name, $passing, $setting, $serving, $attacking, $blocking);

            unset($_SESSION['editPlayer']);

            header("Location: ../view/view-player.php");
            break;
    }
?>