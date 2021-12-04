<?php require_once("tpl/header.php"); ?>
<h1>Exemple MVC</h1>
<p>Mon contenu il est beau</p>

<h2>Liste des utilisateurs</h2>
<?php if(!empty($teachers)): ?>
<table>
    <tr>
        <th>Id</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Email</th>
    </tr>
    <?php foreach($teachers as $user): ?>
    <tr>
        <td><?= $user["id"] ?></td>
        <td><?= $user["firstname"] ?></td>
        <td><?= $user["lastname"] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<p>Y'a pas d'utilisateur</p>
<?php endif; ?>

<h2>Créer un utilisateur</h2>
<?php if($error): ?>
<p><?= $error ?></p>
<?php endif; ?>
<form method="POST">
    <label for="firstname">Prénom</label>
    <input type="text" name="firstname" id="firstname" />
    <label for="lastname">Nom</label>
    <input type="text" name="lastname" id="lastname" />

    <label for="room_name">Nom salle</label>
    <input type="text" name="room_name" id="room_name"/>
    <label for="mark1">Intérêt du cours</label>
    <!-- <select name="mark1" id="mark1">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
    <label for="mark2">Pédagogie du prof</label>
    <select name="mark2" id="mark2">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
    <label for="mark3">Qualité des exercices</label>
    <select name="mark3" id="mark3">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
    <label for="mark4">Qualité de la salle et du matériel</label>
    <select name="mark4" id="mark4">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
    <label for="com">Commentaire</label> -->
    <!-- <input type="text" name="com" id="com"/> -->
    <input type="submit" value="Créer utilisateur" />
</form>
<?php require_once("tpl/footer.php"); ?>