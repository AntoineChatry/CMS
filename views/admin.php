<?php 
session_start();
//  if admin = 1 then show admin page
if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
    header('Location: /admin');
}
else{
    header('Location: /blog');
}
require_once ('connexion.php');
// ^display only user who get admin status == 1
$sql = "SELECT * FROM membres WHERE admin = 1";
$req = $bdd->query($sql);
$users = $req->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1>Admin</h1>
    <table>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>email</th>
            <th>password</th>
            <th>admin</th>
            <th>status</th>
            <th>date</th>
            <th>action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['password'] ?></td>
            <td><?= $row['admin'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['date'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile ?>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>

?>

<!-- PHP admin dashboard -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Admin Dashboard</h1>
            </div>
            <p class="lead">Welcome to the admin dashboard.</p>
        </div>
    </div>
</div>
<!-- Display Admin row -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Admin Details</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 text-center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>User Name:</td>
                                        <td><?php echo $user_data['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><?php echo $user_data['email']; ?></td>
                                    </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of PHP admin dashboard -->