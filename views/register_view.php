<?php include('../includes/header.php'); ?>

    <div class="container">
        <div class="form-box">
            <h2 class="form-title">Create an account</h2>
            <form action="functions/register.php" method="post">
                <div class="form-group">
                    <input type="text" name="fullname" class="form-control" placeholder="John Doe" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
                </div>
                <div class="form-group">
                    <input type="date" name="birthdate" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="amd 7 st. Ryzen city, PH" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="••••••••••" required>  
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <div class="create-navlink">
                <p>Already have an account? <a href="index.php">Sign in</a></p>
            </div>
        </div>
    </div>

<?php include('../includes/footer.php'); ?>