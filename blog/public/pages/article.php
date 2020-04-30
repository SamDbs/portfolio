<?php 
require('./components/navbar.php'); 

$stm = $pdo->query("SELECT * 
FROM Articles a 
INNER JOIN Users u ON a.ar_author = u.u_id"); 

$articles = $stm->fetchAll();
$indexLien = $_GET['index'];
foreach($articles as $article){ 
if ($indexLien === $article['ar_id']){
    ?>
<div class="card m-4 " style="width: 90vw;">
    <div class="container">
       
            
                <img src=<?php {echo($article['ar_image']);} ?> class="card-img-top" alt="...">
                <div class="">
                    <h5 class=""> <?php echo($article['ar_title']); ?> </h5>
                    <p class=""><?php echo($article['ar_hook']); ?></p>
                    <p class=""> <?php echo($article['ar_content']); ?>  </p>
                    <p> écrit par : <?php echo($article['u_name']); ?>   </p>
                </div>
            
        
    </div>
</div>
<?php
}

}
?>