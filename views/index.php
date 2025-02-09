<?php include('../includes/header.php'); ?>

    <div class="container">
        <div class="form-box">
            <h2 class="form-title">Login</h2>
            <form action="../functions/login.php" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="•••••••••••••" required>  
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <div class="create-navlink">
                <p>Don't have an account? <a href="register_view.php">Sign up</a></p>
            </div>
        </div>
    </div>

    <script>
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
    </script>



<?php include('../includes/footer.php'); ?>