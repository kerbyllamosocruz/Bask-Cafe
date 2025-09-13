<?php
$host = "localhost";
$db_name = "u613448336_db_main";
$db_username = "u613448336_main";
$db_password = "!AC.dev1";


$conn = new mysqli($host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);

$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid credentials, please try again.";
    }
} else {
    echo "Invalid username, please try again.";
}

$stmt->close();
$conn->close();
?>
