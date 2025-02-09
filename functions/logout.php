<?php
    session_start();
    session_unset();
    session_destroy();

    echo "<script>
        sessionStorage.removeItem('loggedIn');
        window.location.href = '../views/index.php';
    </script>";
    exit();
?>
