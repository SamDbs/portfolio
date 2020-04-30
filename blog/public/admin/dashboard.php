
<div class=""> 

<?php $stm = $pdo->query("SELECT * from Users");
 $users = $stm->fetchAll(); ?>

<div class="d-flex monDashboard" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right " id="sidebar-wrapper" style="height: 20%;">
      <div class="sidebar-heading text-center ">Welcome <?php foreach($users as $user){ echo($user['u_name']);} ?>  </div>
      <div class="list-group list-group-flush ">
        <a href="http://localhost:9090/admin/dashboard?page=homeDashboard" class="list-group-item list-group-item-action bg-light d-flex justify-content-center "><i class="fas fa-home"></i></a>
        <a class="list-group-item list-group-item-action bg-light" href="http://localhost:9090/">Portfolio</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Mes projets</a>
        <ul class="ulDashboard">
          <a class="ul" href="#"><li>ajouter un projet</li></a>
          <a href="#"><li>supprimer un projet</li></a>
        </ul>
        <a href="#" class="list-group-item list-group-item-action bg-light"> Mes compétences</a>
        <ul class="ulDashboard">
          <a class="ul" href="#"><li>ajouter une compétence</li></a>
          <a href="#"><li>supprimer une compétence</li></a>
        </ul>
        <div> 
        <a href="#" class="list-group-item list-group-item-action bg-light">Mes articles</a>
        <ul class="ulDashboard">
          <a class="ul" href="http://localhost:9090/admin/dashboard?page=addArticle"><li>ajouter un article</li></a>
          <a href="http://localhost:9090/admin/dashboard?page=modifyArticle"><li>modifier un article</li></a>
        </ul>

      </div>
        <a href="#" class="list-group-item list-group-item-action bg-light">Statistiques du site</a>
        <a class="dropdown-item " href="http://localhost:9090/admin/logout" > <i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content" class="monDashboard">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <div class="titleDashboard">DASHBOARD</div>
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              
            </li>
          </ul>
        </div>
      </nav>

      <?php 

      //require un fichier php qui va exposer des fonctions pour la base de données 

      if(isset($_GET['page']) ){
        switch($_GET['page']){
          case 'addProject':
            require('addProject.php');
          break;
          case 'deleteProject':
            require('deleteProject.php');
          break;
          case 'addSkill':
            require('addSkill.php');
          break;
          case 'deleteSkill':
            require('deleteSkill.php');
          break;
          case 'addArticle':
            require('addArticle.php');
          break;
          case 'modifyArticle':
            require('modifyArticle.php');
            break;
          case 'homeDashboard':
            require('homeDashboard.php');
            break;
          default:
          break;
        }

      }?>

      <!-- REQUIRE ICI LE TABLEAU BDD DES ARTICLES quand on clique sur supprimer un article <?php //require('../components/deleteArticle.php'); ?> -->
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  

</div>
<?php  ?>
