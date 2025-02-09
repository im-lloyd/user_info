<?php
session_start();

// Redirect if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/index.php");
    exit();
}
// Prevent caching of restricted pages
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>

<?php include('../includes/header.php'); ?>

    <div class="container-dashboard">
        <!-- <div class="display-box"> -->
            <nav class="navbar">
                <ul>
                    <li><a class="brand" href="dashboard.php">Dashboard</a></li>
                    <li>
                        <a class="profile" class="toggle-profile">
                            <img src="../assets/profile.png" alt="User Profile">
                        </a>
                        <a href="../functions/logout.php" class="logout-text">Logout</a>
                    </li>
                </ul>
            </nav>
            <div class="display-container">
                <div class="display-card">
                    <div class="line-white"></div>
                    <div class="line-dark top"></div>
                    <div class="content-container">
                        <div class="content-left">
                            <div class="img-box">
                                <img src="../assets/profile.png" alt="User Profile">
                            </div>
                            <div class="img-bottom-box"></div>
                        </div>
                        <div class="content-right">
                            <div class="info-header">
                                <span>Synergy Inc. Employee</span>
                            </div>
                            <div class="info-body">
                                <span>User Information:</span>
                                <span class="userName">John Doe</span>
                                <div class="other-info">
                                    <ul>
                                        <li>
                                            <span>Age</span>
                                            <span>: 24</span>
                                        </li>
                                        <li>
                                            <span>BirthDate</span>
                                            <span>: 01/23/3000</span>
                                        </li>
                                        <li>
                                            <span>Address</span>
                                            <span>: amd 7 st. Ryzen city, PH</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line-dark bot"></div>
                    <div class="line-white"></div>
                </div>
            </div>
        <!-- </div> -->
    </div>

<?php include('../includes/footer.php'); ?>