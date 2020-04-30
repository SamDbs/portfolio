
<?php
$request = $_SERVER['REQUEST_URI']; 
$uri = parse_url($request, PHP_URL_PATH);

?>


<nav class="navbar navbar-dark bg-dark fixed-top maNavBar">

    <div class="bg-dark col-12 ">
        <div class="d-flex align-items-center justify-content-around  ">


            <ul class="ulNavBar">
                <li class="text-white "><a href="http://localhost:9090/" class="liste">Accueil</a></li>
                <li class="text-white "><a href="http://localhost:9090/projects" class="liste">Mes projets</a></li>
                <li class="text-white "> <a href="http://localhost:9090/skills" class="liste">Mes compétences</a></li>
                <li class="text-white "> <a href="http://localhost:9090/articles" class="liste">Mes articles</a></li>
                <li class="text-white "> <a href="http://localhost:9090/contact" class="liste">Me contacter</a></li>

            </ul>
            <a class="lienStyle" href="http://localhost:9090/login"><i class=" fas fa-sign-in-alt fa-2x"></i></a>
        </div>
    </div>




</nav>

