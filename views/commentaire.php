<?php
session_start();
// require('connexion.php');
// $query= 'SELECT count(id) as nbr, id, name FROM membres WHERE name = ?';
// $requete = $bdd->prepare($query);
// $requete->execute(array( $name, $password));
// $ligne = $requete->fetch();
// $nbr=$ligne['nbr'];
?>

<!-- Make a commentary blog section -->
<h2>Commentaires</h2>
<section id="commentaire">
    <form action="" method="post">
        <p><?= $ligne['name'] ?> </p>
        <label for="commentaire">Commentaire</label>
        <textarea id="commentaire" name="commentaire" placeholder="Votre commentaire" required></textarea>
        <input type="submit" value="Envoyer">
    </form>
    <?php
    if(isset($_POST['pseudo']) && isset($_POST['commentaire'])) {
        $commentaire = $_POST['commentaire'];
        $pseudo = $_POST['pseudo'];
        $date = date("d/m/Y");
        $heure = date("H:i:s");

        $sql = "INSERT INTO blog(pseudo, commentaire, date, heure) VALUES('$pseudo', '$commentaire', '$date', '$heure')";
        $query = $db->prepare($sql);
        $query->execute();
    }
    ?>
</section>

<!-- Display the commentary -->
<?php
$sql = "SELECT * FROM commentaire ORDER BY id DESC";
$query = $db->prepare($sql);
$query->execute();
while($data = $query->fetch()) {
    echo '<div class="commentaire">';
        echo '<p>' . $data['pseudo'] . ' a écrit le ' . $data['date'] . ' à ' . $data['heure'] . ' :</p>';
        echo '<p>' . $data['commentaire'] . '</p>';
    echo '</div>';
}
?>
