<?php

require("../util/database.php");
require_once("../classes/Player.php");
require_once("../classes/Team.php");

// Gets players from the database
function getPlayers($userID) {
    global $db;

    try {
        $query = $db->prepare("SELECT playerID, name, skill FROM player WHERE userID = :userID ORDER BY name ASC");
        $query->bindParam(":userID", $userID);
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        error_log("Error fetching players: " . $e->getMessage());
        return [];
    }
}

// Returns number of players by user
function numberOfPlayer($userID) {
    global $db;

    try {
        $query = $db->prepare("SELECT COUNT(*) FROM player WHERE userID = :userID");
        $query->bindParam(":userID", $userID);
        $query->execute();
        return $query->fetchColumn();
    } catch (PDOException $e) {
        error_log("Error counting players: " . $e->getMessage());
        return 0;
    }
}

// Gets player skill
function getSkill($id) {
    global $db;

    try {
        $query = $db->prepare("SELECT skill FROM player WHERE playerID = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        return $query->fetchColumn();
    } catch (PDOException $e) {
        error_log("Error fetching skill: " . $e->getMessage());
        return null;
    }
}

// Gets player by ID
function getPlayerByID($id) {
    global $db;

    try {
        $query = $db->prepare("SELECT * FROM player WHERE playerID = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        return $query->fetch();
    } catch (PDOException $e) {
        error_log("Error fetching player by ID: " . $e->getMessage());
        return null;
    }
}

// Creates player
function createPlayer($userID, $name, $passing, $setting, $serving, $attacking, $blocking, $skill) {
    global $db;

    try {
        $query = $db->prepare("INSERT INTO player (userID, name, passing, setting, serving, attacking, blocking, skill) 
                               VALUES (:userID, :name, :passing, :setting, :serving, :attacking, :blocking, :skill)");
        
        $query->bindParam(":userID", $userID);
        $query->bindParam(":name", $name);
        $query->bindParam(":passing", $passing);
        $query->bindParam(":setting", $setting);
        $query->bindParam(":serving", $serving);
        $query->bindParam(":attacking", $attacking);
        $query->bindParam(":blocking", $blocking);
        $query->bindParam(":skill", $skill);
        
        $query->execute();
    } catch (PDOException $e) {
        error_log("Error creating player: " . $e->getMessage());
    }
}

// Gets all player info for a user
function getPlayerInfo($userID) {
    global $db;

    try {
        $query = $db->prepare("SELECT * FROM player WHERE userID = :userID ORDER BY name ASC");
        $query->bindParam(":userID", $userID);
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        error_log("Error fetching player info: " . $e->getMessage());
        return [];
    }
}

// Deletes a player
function deletePlayer($playerID) {
    global $db;

    try {
        $query = $db->prepare("DELETE FROM player WHERE playerID = :playerID");
        $query->bindParam(":playerID", $playerID);
        $query->execute();
    } catch (PDOException $e) {
        error_log("Error deleting player: " . $e->getMessage());
    }
}

// Calculates player skill
function calculatePlayerSkill($passing, $setting, $serving, $attacking, $blocking) {
    return number_format(
        $passing * 0.45 + $setting * 0.175 + $serving * 0.175 + $attacking * 0.10 + $blocking * 0.10, 
        1
    );
}

// Updates player details
function updatePlayer($playerID, $name, $passing, $setting, $serving, $attacking, $blocking) {
    global $db;

    try {
        $skill = calculatePlayerSkill($passing, $setting, $serving, $attacking, $blocking);
        
        $query = $db->prepare("UPDATE player SET name = :name, passing = :passing, setting = :setting, 
                                serving = :serving, attacking = :attacking, blocking = :blocking, skill = :skill 
                                WHERE playerID = :playerID");

        $query->bindParam(":playerID", $playerID);
        $query->bindParam(":name", $name);
        $query->bindParam(":passing", $passing);
        $query->bindParam(":setting", $setting);
        $query->bindParam(":serving", $serving);
        $query->bindParam(":attacking", $attacking);
        $query->bindParam(":blocking", $blocking);
        $query->bindValue(":skill", $skill);

        $query->execute();
    } catch (PDOException $e) {
        error_log("Error updating player: " . $e->getMessage());
    }
}

?>
