<?php 
$stm = $pdo->query("SELECT * from Articles"); 

$articles = $stm->fetchAll();
/* var_dump($articles);  */  
?>
<?php foreach($articles as $article) { ?>


<div class="container ">
    <div class="maDivSizeArticle">
        <!-- Project One -->
        <div class="row">
            <div class="col-md-7 ">
                <a href="http://localhost:9090/article?index=<?php echo($article['ar_id']);?>">
                    <img src=<?php {echo($article['ar_image']);} ?> class="card-img-top" alt="...">
                </a>
            </div>
            <div class="col-md-5">
                <h5 class="card-title"> <?php {echo($article['ar_title']);} ?> </h5>
                <p class="card-text"><?php {echo($article['ar_hook']);} ?></p>
                <a href="http://localhost:9090/article?index=<?php echo($article['ar_id']);?>"
                    class="btn btn-primary">Voir l'article complet</a>
            </div>
        </div>
    </div>
</div>
</div>
<?php }?>