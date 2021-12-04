<?php
session_start();
require('connexion.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '../controllers/UserController.php');
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
	$requete = $bdd->query("SELECT * FROM blog");
    $name = $bdd->query('SELECT name FROM membres');

echo '<table border= "1.5">';

$i = 0;
while($ligne = $requete->fetch() AND $ligne2 = $name->fetch() )
{
    if($i==0){
        echo'<tr>';
    }

        echo '<td>
        <img class="mini" src="'.$ligne['images'].'" />
        <h3>'.$ligne['title'].'</h3>
        <p>'.$ligne['content'].'</p>
        <h4> Commentaires : </h4>
        <p>'.$ligne['comment'].'</p>
        <p> Commentaire écrit par: '.$ligne2['name'].'</p>
              </td>';
        $i++;
    }
echo'</table>';


// Create posts and display the name of the author

    ?>
    
    <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">Commentaires</h5>
                         <?php
                         $req = $bdd->query('SELECT * FROM blog');
                         $name = $bdd->query('SELECT name FROM membres');
                         while ($data = $req->fetch() AND $data2 = $name->fetch()) {
                             ?>
                             <p class="card-text"><?= $data['comment'] ?></p>
                                <p class="card-text"><?= $data2['name'] ?></p>
                                             <?php
    }
                       ?>
                   </div>
</body>
</html>