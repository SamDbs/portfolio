<?php 


    $titleNewArticle = $_POST['title'];
    $hookNewArticle = $_POST['hook'];
    $contentNewArticle = $_POST['content'];
    $createdAtNewArticle = $_POST['created_at'];
    $urlImageNewArticle = $_POST['picture'];
    $authorNewArticle = 1;
    
    $successDiv = "";
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
    

  /*   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  */
    $stm = $pdo->prepare("INSERT INTO Articles (ar_title, ar_hook, ar_content, ar_created_at, ar_image, ar_author) 
    VALUES (:title ,:hook,:content, :createdAt, :picture, :author) ");
    
    $stm->bindParam(':title', $titleNewArticle);
    $stm->bindParam(':hook', $hookNewArticle);
    $stm->bindParam(':content', $contentNewArticle);
    $stm->bindParam(':createdAt', $createdAtNewArticle);
    $stm->bindParam(':picture', $urlImageNewArticle);
    $stm->bindParam(':author', $authorNewArticle);

    $stm->execute();

    $successDiv ='<div class="alert alert-success position-absolute" role="alert">
    Article ajouté! </div> ';
} ;

?>


<div class="sizeDiv p-4">
    <form method="post">

        <div class="form-group">
            <label for="">Titre de l'article : </label>
            <input required name="title" type="text" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="">Hook de l'article : </label>
            <input required name="hook" type="text" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="">Contenu de l'article : </label>
            <input required name="content" type="text" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="">Créé le : </label>
            <input required name="created_at" type="date" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="">url de l'image : </label>
            <input required name="picture" type="url" class="form-control" aria-describedby="emailHelp">
        </div>


        <input class="btn btn-dark" type="submit" value="Valider">
        <input class="btn btn-dark" type="reset" value="Reset">

        <?=$errorDiv?>
        <?=$successDiv?>







    </form>
</div>