<?php
session_start();
include('../db/DBHelper.php'); // Include DBHelper class

$db = new DBHelper();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $birthdate = trim($_POST['birthdate']);
    $address = trim($_POST['address']);
    $password = trim($_POST['password']);

    if (!empty($fullname) && !empty($email) && !empty($birthdate) && !empty($address) && !empty($password)) {
        // Hash password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $existingUser = $db->getRecord('users', ['email' => $email]);

        if ($existingUser) {
            echo "❌ Email already exists!";
        } else {
            // Insert user into the database
            $data = [
                'name' => $fullname,
                'email' => $email,
                'birthdate' => $birthdate,
                'address' => $address,
                'password' => $hashed_password
            ];

            if ($db->addRecord('users', $data)) {
                echo "✅ User registered successfully!";
                header("Location: login.php");
                exit();
            } else {
                echo "❌ Error: Failed to register user.";
            }
        }
    } else {
        echo "❌ All fields are required.";
    }
}
?>
