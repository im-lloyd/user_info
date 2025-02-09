<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>User Information</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (!sessionStorage.getItem("loggedIn")) {
                history.pushState(null, null, location.href);
                window.onpopstate = function () {
                    history.go(1);
                };
            }
        });
    </script>

</head>
<body>