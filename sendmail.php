<?php

require_once('includes/connect.php');

$query = "INSERT INTO contacts (last_name, first_name, email, comments) 
          VALUES (?, ?, ?, ?)";
$stmt = $connection->prepare($query); // connect.php에서 선언한 변수 사용하는거임임

$stmt->bindParam(1, $_POST['last_name'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['first_name'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['email'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['comments'], PDO::PARAM_STR);

if ($stmt->execute()) {
    // Send email notification to the admin
    $to = 'admin@example.com';
    $subject = 'Message from your Portfolio site!';
    $message = "You have received a new contact form submission:\n\n";
    $message .= "Name: " . $_POST['first_name'] . " " . $_POST['last_name'] . "\n";
    $message .= "Email: " . $_POST['email'] . "\n\n";
    $message .= "Message:\n" . $_POST['comments'];
    
    mail($to, $subject, $message);
    
    // Redirect to thank_you.php
    header('Location: thank_you.php');
    exit;
} else {
    echo 'Database Error: Unable to save your message.';
}

?>
