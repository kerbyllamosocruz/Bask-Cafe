<?php
$host = 'localhost';
$db = 'u613448336_db_main';
$user = 'u613448336_main';
$pass = '!AC.dev1';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM reviews ORDER BY id DESC";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='review'>
                <strong>" . htmlspecialchars($row['username']) . "</strong> (" . htmlspecialchars($row['rating']) . ")
                <p>" . htmlspecialchars($row['review_text']) . "</p>
              </div>";
    }
}
$conn->close();
?>
