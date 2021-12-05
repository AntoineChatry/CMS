
<?php 

require('connexion.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '../controllers/UserController.php');
 // Make blog section and make a space where people can create their own posts
//  Make header secction with all links
echo'<header>
<a href="/blog/post">Blog</a>
<a href="/logout">Logout</a>
</header>';

 
 echo'   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <section id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-posts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="post-blog">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="post-heading">
                                            <h3>Create your own post</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="post">
                                            <div class="form-group">
                                                <label for="title">Titre</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                            <label for="image">Image(url)</label>
                                            <input type="text" class="form-control" id="image" name="image" required>
                                        </div>
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';

UserController::create_posts();


?>