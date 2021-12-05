<?php 
session_start();
//if session name = antoine, display admin page
if(isset($_SESSION['name']) == 'Antoine'){
    echo '<h1>Admin Page</h1>';
    echo'<header>
    <a href="/blog/post">Blog</a>
    <a href="/blog">Create posts</a>
    <a href="/logout">Logout</a>
    </header>';
}
else{
    header('Location: /blog');
}
require_once ('connexion.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>
    <table>
        <?php 
        $sql = "SELECT * FROM membres WHERE admin = 1";
        $req = $bdd->query($sql);
        $users = $req->fetchAll();
        echo'<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Admin</th>
          </tr>
        </thead>
        <tbody>';
        foreach($users as $user){
          echo'<tr>
            <th scope="row">1</th>
            <td><img src="https://www.gravatar.com/avatar/" alt="User img" style="height: 40px; width: 40px;"></td>
            <td>'.$user['name'].'</td>
            <td>'.$user['email'].'</td>
            <td>'.$user['admin'].'</td>
          </tr>
        </tbody>
      </table>';
            
            echo '</tr>';
        }
        ?>
            </td>
       
    </table>
</body>
</html>
