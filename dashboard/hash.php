<?php
// DB connection
$pdo = new PDO("mysql:host=localhost;dbname=u613448336_db_main", "u613448336_main", "!AC.dev1");

// Define username and raw password manually
$username = 'newuser';
$rawPassword = 'userpassword123';

// Hash the password
$hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);

// Insert directly into DB
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
$stmt->execute([
    ':username' => $username,
    ':password' => $hashedPassword
]);

echo "User inserted with hashed password.";
?>