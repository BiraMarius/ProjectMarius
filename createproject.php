<!DOCTYPE html>
<?php
session_start();

$pid = $_SESSION['id'];

?>
<html>

<head>
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
    <link rel="stylesheet" href="./css/home.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'connectBD.php'; ?>

        <nav class="navbar  navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link " href="home.php">Vizualizare Proiecte </a>
                <a class="nav-item nav-link" href="createproject.php">Adaugare Proiect</a>
                <a class="nav-item nav-link" href="index.html">Log out</a>

                </div>
            </div>
    </nav>
        



    <!--Creare proiect -->
    <?php
    if (isset($_POST['create'])) {
       

        $a = 0;
                
        if (empty($_POST['nume']))
            $a = 1;
        
        $name = $_POST["nume"];
        if($a==1){
            echo '<script type="text/javascript">
            window.onload = function () {
            alert("Completati numele pentru a putea crea un nou proiect!");
            }</script>';
        }else{
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "siteweb";
        
            $conn = mysqli_connect($servername, $username, $password, $dbname);
        
            if (!$conn) {
                die("Eroare la conectare: " . mysqli_connect_error());
            }
            $sql = "INSERT INTO proiecte(Nume,DataCreare) 
                VALUES ('$name',sysdate())";
                
            if(mysqli_query($conn,$sql))
            echo '
            <script type="text/javascript">
                window.onload = function () {
                    alert("Proiectul a fost creat!");
                }</script>';
            else
            echo '
            <script type="text/javascript">
                window.onload = function () {
                    alert("ERROR");
                }</script>';

        }
    }
    ?>


    <div class="container" style="margin-top:70px;" id="adaugareP">
            <form method="POST">
                <div class="form-group">
                    <label for="name">Nume Proiect:</label>
                    <input  class="form-control" id="name" name="nume">
                </div>
                <p class="text-danger">Data de creare a proiectului va fi data sistemului!</p>
                </br>
                <button type="submit" class="btn btn-primary" name="create">Creare</button>
            </form>
    </div>
    <!--FINAL CREARE PROIECT -->


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="./javascript/jquery-3.6.0.min.js"></script>
    <script src="./javascript/home.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>