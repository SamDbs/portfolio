<?php 
ob_start();
session_start();
$request = $_SERVER['REQUEST_URI']; 
$uri = parse_url($request, PHP_URL_PATH);

//BDD
$dsn = "mysql:host=mysql;dbname=blog";
$user = "root";
$passwd = "root"; 

//Je me connecte à ma BDD avec PDO
 $pdo = new PDO($dsn, $user, $passwd);
// Affiche les messages d'erreurs
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 
//Je demande a ma base de récupérer tous les articles et de les retourner sous forme d'un statement
  $stm = $pdo->query("SELECT * from Articles");  

//je retourner tous mes articles sous forme d'un tableau via la méthode fetchAll()
 $articles = $stm->fetchAll();
/* var_dump($articles);   */
// si url est diff de login alors on affiche header

require('./components/header.php'); 



switch($uri){

    case "/":
        require __DIR__ . '/pages/home.php';
    break;
    
    case "/skills":
        require __DIR__ . '/pages/skills.php';
    break;

    case "/articles":
        require __DIR__ . '/pages/articles.php';
    break; 
    
    case "/article":
        require __DIR__ . '/pages/article.php';
    break; 
    case "/projects":
        require __DIR__ . '/pages/projects.php';
    break; 

    case "/contact":
        require __DIR__ . '/pages/contact.php';
    break; 
    case "/mail":
        require __DIR__ . '/pages/contact.php';
    break;
    case "/aboutme":
        require __DIR__ . '/pages/aboutMe.php';
    break;
    case "/login":
        require __DIR__ . '/pages/login.php';
    break;

    case "/admin/dashboard":
        if (isset($_SESSION['user'])){
            require __DIR__ . '/admin/dashboard.php';
        } else {
            require __DIR__ . '/pages/login.php';
        }
    break;
    case "/admin/logout":
        if (isset($_SESSION['user'])){
            require __DIR__ . '/admin/logout.php';
            session_destroy();
        } else {
                require __DIR__ . '/pages/home.php';
        }
        break;
    
    case "/admin/addArticle":
        if (isset($_SESSION['user'])){
            require __DIR__ . '/admin/addArticle.php';
        } else {
                require __DIR__ . '/pages/home.php';
        }
        break;

    case "/admin/deleteArticle":
        if (isset($_SESSION['user'])){
            require __DIR__ . '/admin/deleteArticle.php';
        } else {
                require __DIR__ . '/pages/home.php';
        }
        break;
    default :
        require __DIR__ . '/pages/home.php';
break;

}



require('./components/footer.php');
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
</div>
</body>

</html>
<?php
ob_end_flush()
?>