<?php

// Check that email is a valid email address
if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

// Check that password contains at least one letter
if (! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

// Check that password contains at least one number
if (! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

// Check that password and password_confirmation fields match
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

// Hash password
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Connect to database
$mysqli = require __DIR__ . "/database.php";

// Initialize prepared statement
$stmt = $mysqli->stmt_init();

// Prepare SQL statement
$sql = "INSERT INTO users (first_name, last_name, email, telephone, password_hash)
        VALUES (?, ?, ?, ?, ?)";
if (! $stmt->prepare($sql)) {
    die("SQL Error: " . $mysqli->error);
}

// Bind form input to prepared statement
$stmt->bind_param("sssss", $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["telephone"], $password_hash);

// Execute prepared statement
if ($stmt->execute()) {
    echo "Sign up successful!";
}
else {
    if ($mysqli->errno === 1062) {
        die("Email already taken");
    }
    else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
