<?php
$stm = $pdo->query("SELECT * from Articles"); 

$articles = $stm->fetchAll();


?>
<form method="post">
    <table class="table">
        <tbody>
            <thead>
                <th>id de l'article</th>
                <th>Titre de l'article</th>
                <th>Modifier</th>
                <th>Archiver</th>
                <th>Supprimer</th>


            </thead>
            <?php foreach($articles as $article){ ?>
            <tr>
                <th scope="row"> <?php echo $article['ar_id']; ?></th>
                <td><?php echo $article['ar_title']; ?></td>
                <td> <input type="radio" id="customRadioInline1" name="modify" value="<?php echo $article['ar_id']; ?>">
                </td>
                <td> <input type="radio" id="customRadioInline1" name="archived" value="archived"></td>
                <td> <input type="radio" id="customRadioInline1" name="delete" value="delete"></td>

            </tr>
            <?php } ?>

        </tbody>
    </table>
    <input class="btn btn-dark inputValider" name="submit1" type="submit" value="Valider">
</form>
<?php 


if ($_SERVER['REQUEST_METHOD'] === "POST") {

$modify = $_POST['modify'];
$archived = $_POST['archived'];
$delete = $_POST['delete'];
$form1 = $_POST['submit1'];

if(isset($form1)){ 
/* CODE SHOWING THE ELEMENT SELECTED */
if(isset($modify)){
  
       // AFFICHE LES DONNEES DANS LE FORM DE LARTICLE SELECTIONNE 
    foreach($articles as $article){
        if($article['ar_id'] == $modify){
            break;
        }
    } }
    $successDelete="";
/* if (isset($delete)){
    foreach($articles as $article){
        if($article['ar_id'] == $delete){ 
            $stm = "DELETE FROM Articles WHERE ar_id = :delete";
            $stm->bindParam(':delete', $delete);
            $stm->execute();
                $successDelete ='<div class="alert alert-success position-absolute" role="alert">
                Article effacé! </div> '; */
/* } } } */ }
/* CODE SHOWING THE ELEMENT SELECTED */
  ?>
<!-- FORM MODIFY -->
<div class="sizeDiv p-4">

    <form method="post">

        <div class="form-group">
            <label for="">Titre de l'article : </label>
            <input required name="title" type="text" class="form-control" aria-describedby="emailHelp"
                value="<?php echo $article['ar_title'];  ?>">
        </div>
        <div class="form-group">
            <label for="">Hook de l'article : </label>
            <input required name="hook" type="text" class="form-control" aria-describedby="emailHelp"
                value="<?php echo $article['ar_hook'] ; ?>">
        </div>
        <div class="form-group">
            <label for="">Contenu de l'article : </label>
            <input required name="content" type="text" class="form-control" aria-describedby="emailHelp"
                value="<?php echo $article['ar_content'] ; ?>">
        </div>
        <div class="form-group">
            <label for="">Créé le : </label>
            <input required name="created_at" type="date" class="form-control" aria-describedby="emailHelp"
                value="<?php echo $article['ar_created_at'] ; ?>">
        </div>
        <div class="form-group">
            <label for="">url de l'image : </label>
            <input required name="picture" type="url" class="form-control" aria-describedby="emailHelp"
                value="<?php echo $article['ar_image'] ; ?>">
        </div>

        <input checked hidden type="radio" id="customRadioInline1" name="modify" value="<?php echo $modify ?>">

        <input class="btn btn-dark" name="submit2" type="submit" value="Valider la modification">
        <input class="btn btn-dark" type="reset" value="Reset">

    </form>
    <?=$successDiv?>
    <?=$successDelete?>
</div>

<?php

/*}  }
 */
/* CODE SENT TO MODIFY DATABASE */
$post2 = $_POST['submit2'];

//!empty($titleNewArticle) && !empty($hookNewArticle) && !empty($contentNewArticle) && !empty($createdAtNewArticle) && !empty($urlImageNewArticle) && !empty($authorNewArticle)
$successDiv = "";
 if (isset($post2)) {
        $titleNewArticle = $_POST['title'];
        $hookNewArticle = $_POST['hook'];
        $contentNewArticle = $_POST['content'];
        $createdAtNewArticle = $_POST['created_at'];
        $urlImageNewArticle = $_POST['picture'];
        $authorNewArticle = 1;
        $errorDiv = "";
        $successDiv = "";
     /*   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  */
        $stm = $pdo->prepare("UPDATE Articles SET ar_title =:title, ar_hook = :hook, ar_content = :content, ar_created_At = :createdAt, ar_image = :picture, ar_author = :author WHERE ar_id = :modify");
       
       $stm->bindParam(':title', $titleNewArticle);
       $stm->bindParam(':hook', $hookNewArticle);
       $stm->bindParam(':content', $contentNewArticle);
       $stm->bindParam(':createdAt', $createdAtNewArticle);
       $stm->bindParam(':picture', $urlImageNewArticle);
       $stm->bindParam(':author', $authorNewArticle);
       $stm->bindParam(':modify', $modify);
   
       $stm->execute(); 
   
        $successDiv ='<div class="alert alert-success position-absolute" role="alert">
       Article modifié! </div> '; 
       header("Refresh:0");
       //$errorDiv = '<div class="alert alert-danger position-absolute" role="alert">
       //Attention, il faut remplir tous les champs! </div> ';
   
 
  }  
/* CODE SENT TO MODIFY DATABASE */

}

?>