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


            //Validating form input
            if (empty($playerList)) {
                $error =  "Select at least 1 player.";
                $_SESSION['error'] = $error;
                header("location: ../view/create-team.php?error=true");
                break;
            }

            //Total players
            $totalPlayers = sizeof($playerList);

            //Shuffles player list
            shuffle($playerList);


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
            $group->createTeams($teamNumber);
            
            $serializedData = serialize($group);

            // Step 2: Store the serialized string in the session
            $_SESSION['group'] = $serializedData;

            //Store teamNumber in session
            $_SESSION['teamNumber'] =  $teamNumber;

            
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
                header("location: ../view/create-player.php");
                break;
            }

            //Creates skill level of player.
            $player = new Player($name, $passing, $setting, $serving, $attacking, $blocking);

            $skill = $player->getSkill();


            createPlayer($userID, $name, $passing, $setting, $serving, $attacking, $blocking, $skill);

            header("Location: ../view/create-team.php");
            
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


?>