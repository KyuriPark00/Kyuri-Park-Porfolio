<?php
require_once "includes/connect.php"; // PDO 연결

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = trim($_POST["first_name"] ?? "");
    $last_name = trim($_POST["last_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $comments = trim($_POST["comments"] ?? "");

    if (!$first_name || !$last_name || !$email || !$comments) {
        echo json_encode(["success" => false, "error" => "All fields are required."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "error" => "Invalid email address."]);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO contacts (first_name, last_name, email, comments) VALUES (?, ?, ?, ?)");
        $stmt->execute([$first_name, $last_name, $email, $comments]);

        echo json_encode(["success" => true]);
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "error" => "Database error."]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request method."]);
}
