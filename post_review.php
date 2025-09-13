<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once('config/db_connect.php');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        $rating = (int)($_POST['rating'] ?? 0);
        $review = trim($_POST['review'] ?? '');

        if (!$name || !$rating || !$review) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Please fill in all required fields.'
            ]);
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO bask_reviews (name, rating, review) VALUES (:name, :rating, :review)");
        $stmt->execute([
            ':name' => $name,
            ':rating' => $rating,
            ':review' => $review,
        ]);

        echo json_encode([
            'success' => true,
            'message' => 'Review submitted successfully!'
        ]);
    } else {
        http_response_code(405);
        echo json_encode([
            'success' => false,
            'message' => 'Method Not Allowed'
        ]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
}
