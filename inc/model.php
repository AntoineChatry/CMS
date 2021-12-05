<?php
// Etape 2a : Structure BDD, appel BDD, ...
// Model
    function getPDO() {
        return new PDO("mysql:host=localhost;dbname=projet_web", "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
function get_users($name,$password) {
    $stmt = getPDO()->prepare('SELECT count(id) as nbr, id, name,password, admin FROM membres WHERE name = ? and password=?');
    $stmt->execute(array($name,$password));

    $ligne = $stmt->fetch();
    $nbr=$ligne['nbr'];
    $_SESSION['Admin'] = $nbr;
    $_SESSION['id'] = $ligne['id'];
    $_SESSION['name'] = $ligne['name'];
    if ($nbr==1) {
        header('Location: /blog');
    }else{
        echo $nbr;
        echo $ligne['name'];
    }
}
function insert_user($name, $email, $password) {
    $query='INSERT INTO membres(name,email,password) VALUES(?,?,?)';
    $stmt = getPDO()->prepare($query);
    $stmt->execute(array($name,$email,$password));
	header('location: /');  
}
function insert_posts($title, $content, $image,$date ,$author) {
    $query= 'INSERT INTO blog (title, content, images , date, author) VALUES (?, ?, ?, ?, ?)';
    $stmt = getPDO()->prepare($query);
    $stmt->execute(array($title,$content,$image, $date , $author));
}
function get_username($comment,$user_id){
    // Get name of the user who commented the posts
    $query = 'SELECT name FROM membres WHERE id = ?';
    $stmt = getPDO()->prepare($query);
    $stmt->execute(array($user_id));
    $ligne = $stmt->fetch();
    $name = $ligne['name'];
    // Insert the comment in the database
    $query = 'INSERT INTO blog (comment, id_us) VALUES (?, ?)';
    $stmt = getPDO()->prepare($query);
    $stmt->execute(array($comment,$user_id));

}