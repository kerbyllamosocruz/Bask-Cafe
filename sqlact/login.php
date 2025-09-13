<?php
session_start();

$host = "localhost";
$db_username = "u613448336_main";
$db_password = "!AC.dev1";
$db_name = "u613448336_db_main";

$conn = new mysqli($host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function displayError($message) {
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login Error</title>
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
                color: #d9534f;
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
        <h2>Login Failed</h2>
        <p>' . htmlspecialchars($message) . '</p>
        <a class="button" href="register.html">Create an Account</a>
    </div>
    </body>
    </html>
    ';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        displayError("Both fields are required!");
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit();
        } else {
            displayError("Invalid password, please try again.");
        }
    } else {
        displayError("Invalid username, please try again.");
    }

    $stmt->close();
    $conn->close();
}
?>
