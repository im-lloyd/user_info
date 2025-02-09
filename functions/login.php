<?php
session_start();
include('../db/DBHelper.php'); // Include DBHelper class

$db = new DBHelper();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $conditions = ['email' => $email];
        $user = $db->getRecord('users', $conditions);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];

                echo "<script>
                    sessionStorage.setItem('loggedIn', 'true');
                    window.location.href = '../views/dashboard_view.php';
                </script>";

                header("Location: ../views/dashboard_view.php");
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "All fields are required.";
    }
}
?>


