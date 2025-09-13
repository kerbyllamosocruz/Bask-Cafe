<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$db_username = "u613448336_main";
$db_password = "!AC.dev1";
$db_name = "u613448336_db_main";

$conn = new mysqli($host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

$stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

$isSuccess = false;
$message = "";

if ($stmt->num_rows > 0) {
    $message = "Username already taken. Please choose another.";
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password, first_name, last_name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $hashed_password, $first_name, $last_name);

    if ($stmt->execute()) {
        $isSuccess = true;
        $message = "Registration successful! You can now log in.";
    } else {
        $message = "Error: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 30px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        p {
            font-size: 16px;
            margin-bottom: 25px;
        }

        .button {
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }

        .button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
<div class="container">
    <h2><?php echo $isSuccess ? "Success!" : "Registration Failed"; ?></h2>
    <p><?php echo htmlspecialchars($message); ?></p>

    <?php if ($isSuccess): ?>
        <a class="button" href="index.html">Go to Login</a>
    <?php else: ?>
        <a class="button" href="register.html">Return to Register</a>
    <?php endif; ?>
</div>
</body>
</html>
