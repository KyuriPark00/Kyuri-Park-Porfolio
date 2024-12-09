<?php

require_once('includes/connect.php');

// Gather the form content
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$msg = $_POST['comments'];

$errors = [];

// Validate and clean these values
$fname = trim($fname);
$lname = trim($lname);
$email = trim($email);
$msg = trim($msg);

if (empty($lname)) {
    $errors['last_name'] = 'Last Name can’t be empty';
}
if (empty($fname)) {
    $errors['first_name'] = 'First Name can’t be empty';
}
if (empty($msg)) {
    $errors['comments'] = 'Message field can’t be empty';
}
if (empty($email)) {
    $errors['email'] = 'You must provide an email';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'You must provide a REAL email';
}

if (empty($errors)) {
    // Insert these values as a new row in the contacts table
    $query = "INSERT INTO contacts (last_name, first_name, email, comments) 
              VALUES ('$lname', '$fname', '$email', '$msg')";

    if (mysqli_query($conn, $query)) {
        // Send email notification to the admin
        $to = 'admin@example.com'; // 변경: 관리자 이메일 주소
        $subject = 'Message from your Portfolio site!';
        $message = "You have received a new contact form submission:\n\n";
        $message .= "Name: $fname $lname\n";
        $message .= "Email: $email\n\n";
        $message .= "Message:\n$msg";

        mail($to, $subject, $message);

        // Redirect to thank_you.php
        header('Location: thank_you.php');
        exit;
    } else {
        echo 'Database Error: Unable to save your message.';
    }
} else {
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
}

?>
