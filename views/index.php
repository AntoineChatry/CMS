<?php
session_start();
// require('connexion.php');
// import index function from UserController

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '../controllers/UserController.php');
// Session name  == name from membres table



?>
<!-- Make login page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Welcome to the blog</h1>
        <form method="post">
            <div class="form-group">
                <label for="login">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" id="formsend" name="formsend" class="btn btn-primary">Login</button>
        </form>
        <p class="text-center">Not registered yet ? <a href="/register">Register here</a></p>
    </div>
</body>
</html>


<?php
UserController::login();
?>