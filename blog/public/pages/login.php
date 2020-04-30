<?php
// fonction header() toujours avant code html



if ($_SERVER['REQUEST_METHOD'] === "POST") { 
  

$errorLog = "";
$emailUser = $_POST["email"];
$pwUser = $_POST["password"];
$stm = $pdo->query("SELECT * from Users WHERE u_email = '$emailUser'"); 
$result = $stm->fetch();
    
    
  if( password_verify($pwUser, $result['u_password'] )){
    $_SESSION['user'] = ['email' => $emailUser, 'password' => $pwUser];
    header('Location: http://localhost:9090/admin/dashboard'); 
    exit();
    
  } 
  else {
    $errorLog ='<div class="alert alert-danger position-absolute" role="alert">
    email or password is wrong!
    </div> ';
}  } 

require('./components/navbar.php'); 
?>


  <div class="sizeDiv">
      
  <form method="post" class="formLogin">
      <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">

      </div>
      <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input name="password" type="password" class="form-control" id="password">
      </div>

      <input type="submit" class="btn btn-dark" value="Se connecter"></input>
      <?=$errorLog?>
  </form>
</div>
<?php



 ?>
