<?php
// Etape 2 : Récupération/Validation des données + Appel opérations
// Controller
class UserController {
    public static function index()
    {
        session_start();
        $error = NULL;
        if (!empty($_POST['password'])&& !empty($_POST['name'])&& !empty($_POST['email']) 
 		&& !empty($_POST['cpassword'])) {
            $name = filter_input(INPUT_POST, "name");
            $password = filter_input(INPUT_POST, "password");
            $email = filter_input(INPUT_POST, "email");
            
            if ($name && $password) {
                $name = htmlspecialchars($name);
                $password = htmlspecialchars($password);
                $email = htmlspecialchars($email);
                $password=sha1($password);
                insert_user($name,$email, $password);
                echo "Utilisateur créé";
            } else {
                $error = "Il manque des informations";
            }
        // Etape 2b : Appel de la Vue
        // View
        $title = "Page d'accueil";
        require_once('views/register.php');
    }
}
public static function login()
{
    session_start();
    $error = NULL;
    if (!empty($_POST['password'])&& !empty($_POST['name'])) {
        
        $name = filter_input(INPUT_POST, "name");
        $password = filter_input(INPUT_POST, "password");
        $password=sha1($password);
        if ($name && $password) {
            $name = htmlspecialchars($name);
            $password = htmlspecialchars($password);
            get_users($name,$password);
            echo "Utilisateur connecté";
        } else {
            $error = "Il manque des informations";
        }
    // Etape 2b : Appel de la Vue
    // View
    $title = "Page d'accueil";
    require_once('views/index.php');
}
}

public static function create_posts(){
    session_start();
    $error = NULL;
    if (!empty($_POST['title'])&& !empty($_POST['content'])) {
        $title = filter_input(INPUT_POST, "title");
        $content = filter_input(INPUT_POST, "content");
        $image = filter_input(INPUT_POST, "image");
        $date = date("Y-m-d H:i:s");
        $author = $_SESSION['name'];

        if ($title && $content && $image) {
            $title = htmlspecialchars($title);
            $content = htmlspecialchars($content);
            $image = htmlspecialchars($image);
            $date = htmlspecialchars($date);
            $author = htmlspecialchars($author);
            insert_posts($title,$content, $image , $date, $author);
            echo "Post créé";
        } else {
            $error = "Il manque des informations";
        }
    // Etape 2b : Appel de la Vue
    // View
    $title = "Page d'accueil";
    require_once('views/accueil.php');
}
}
// function getUsername by session_id
public static function getUsername(){
    session_start();
    $error = NULL;
    if (!empty($_POST['comment'])) {
        $comment = filter_input(INPUT_POST, "comment");
        $user_id = $_SESSION['user_id'];

        if ($comment && $user_id) {
            $comment = htmlspecialchars($comment);
            $user_id = htmlspecialchars($user_id);
            get_username($comment, $user_id);
            echo "Commentaire créé";
        } else {
            $error = "Il manque des informations";
        }
    // Etape 2b : Appel de la Vue
    // View
    $title = "Page d'accueil";
    require_once('views/blog.php');

}
}
}