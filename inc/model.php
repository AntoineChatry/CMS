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
function insert_posts($title, $content, $image,$user_id) {
    $query= 'INSERT INTO blog (title, content, images) VALUES (?, ?, ?)';
    $stmt = getPDO()->prepare($query);
    $stmt->execute(array($title,$content,$image));
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
// function get_rooms(){
//     $stmt = getPDO()->prepare("SELECT * FROM rooms");
//     $stmt->execute();
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }

// function insert_rooms($name){
//     $stmt = getPDO()->prepare("
//     INSERT INTO rooms (id, name)
//     VALUES(NULL, :name)");
//     $stmt->execute([
//         "name" => $name
//     ]);
// }

// function get_subjects(){
//     $stmt= getPDO()->prepare('SELECT t1.id as rooms_id,t3.id as subject_id, t4.id as teachers_id FROM rooms t1, subject_marks t3, teachers t4 WHERE t1.id = t3.id ');
//     $stmt->execute();
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }



// function get_satisfaction(){
//     $stat = getPDO()->prepare("SELECT * FROM subject_marks");
//     $stat->execute();
//     return $stat->fetchAll(PDO::FETCH_ASSOC);
// }

// function insert_satis($subject_id, $mark1, $mark2, $mark3, $mark4) {
//     $stmt = getPDO()->prepare("
//     INSERT INTO subject_marks (id, subject_id, mark1, mark2, mark3, mark4) 
//     VALUES (NULL, :subject_id, :fn, :ln, :mk, :mk1)
//     ");
//     $stmt->execute([
//         "subject_id" => $subject_id,
//         "fn" => $mark1,
//         "ln" => $mark2,
//         "mk" => $mark3,
//         "mk1" => $mark4,
//     ]);
// }