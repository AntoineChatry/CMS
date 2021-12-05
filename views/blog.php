<?php
session_start();
require('connexion.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '../controllers/UserController.php');
?>
<?php
echo'<header>
<a href="/blog">Create posts</a>
<a href="/logout">Logout</a>
</header>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center">Blog</h1>

<!-- Get name of the user who commented the posts -->

<?php
	$requete = $bdd->query("SELECT *  FROM blog ");




$i = 0;
while($ligne = $requete->fetch())
{
    if($i==0){
        echo'<tr>';
    }

        echo '<td>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">'.$ligne['title'].'</h5>
                <img src="'.$ligne['images'].'" alt="">
                <p class="card-text">'. $ligne['content'].'</p>
                <p class="card-text"> Ecrit le: '.$ligne['date'].'</p>
                <p class="card-text"> Par: '.$ligne['author'].'</p>
                
            </div>
        </div>';
        if($_SESSION['name'] == $ligne['author']){
            // Delete the post build in the database
            echo'<form method="post">
            <input type="hidden" name="id" value="'.$ligne['id'].'">
            <input type="submit" name="submit" id="submit" value="Delete">
            </form>';
            if(isset($_POST['submit'])){
                $id= $_POST['id'];
                $sql = "DELETE FROM blog WHERE id = $id";
                $result = $bdd->query($sql);

                
                header('Location: /blog');
            }
// Update form

echo'<form method="post">
<input type="hidden" name="id" value="'.$ligne['id'].'">
<input type="submit" name="formsend" id="formsend" value="Update">
</form>';
if(isset($_POST['formsend'])){
    $id= $_POST['id'];
    $sql = "SELECT * FROM blog WHERE id = $id";
    $result = $bdd->query($sql);
    $ligne = $result->fetch();
    echo'<form method="post">
    <input type="hidden" name="id" value="'.$ligne['id'].'">
    <input type="text" name="title" value="'.$ligne['title'].'">
    <input type="text" name="content" value="'.$ligne['content'].'">
    <input type="text" name="images" value="'.$ligne['images'].'">
    <input type="submit" name="en" id="en" value="Apply">
    </form>';
    


    if(isset($_POST['en'])){
        $i= $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $images = $_POST['images'];
        $quer = $bdd->prepare("UPDATE blog SET title = :title, content = :content, images = :images WHERE id = $i");
        $quer->bindParam(':title', $title);
        $quer->bindParam(':content', $content);
        $quer->bindParam(':images', $images);
        $quer->execute();
        header('Location: /blog');
    }
}
            



        }

           echo'</td>';
        $i++;
    }




    ?>
    
</body>
</html>

