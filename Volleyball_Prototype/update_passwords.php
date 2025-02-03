<?php
require('util/database.php');

try {
    

    // Fetch all users
    $query = $db->query("SELECT userID, password FROM user");
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        $userId = $user['userID'];
        $userPassword = $user['password'];

        // Check if the password is already hashed (starts with $2y$10$)
        if (strpos($userPassword, '$2y$10$') !== 0) {
            $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

            // Update the database with the hashed password
            $updateQuery = $db->prepare("UPDATE user SET password = :password WHERE userID = :userID");
            $updateQuery->bindParam(":password", $hashedPassword);
            $updateQuery->bindParam(":userID", $userId);
            $updateQuery->execute();

            echo "Updated password for user ID: $userId\n";
        }
    }

    echo "Password hashing completed.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>