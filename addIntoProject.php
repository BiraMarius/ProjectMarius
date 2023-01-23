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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        


   
    <?php
    if(isset($_POST["butonProject"])){
        $_SESSION['idProject'] = $_POST["butonProject"];
    }

     $id_project=$_SESSION['idProject'];
     //echo $pid; id user curent
    
        if (isset($_POST['create'])) {
            $a = 0;
                
            if (empty($_POST['date']))
                $a = 1;
             if (empty($_POST['time']))
                $a = 1;
            $data= $_POST['date'];
            $timp = $_POST['time'];
            if ($a == 1) {
                echo '<script type="text/javascript">
                    window.onload = function () {
                    alert("Completati toate campurile!");
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
                $sql = "INSERT INTO prezente(ID_user,ID_proiect,DataP,Ora) 
                    Values ($pid,$id_project,'$data','$timp');";
                
                if(mysqli_query($conn,$sql))
                echo '<script type="text/javascript">
                    window.onload = function () {
                        alert("Prezenta adaugata!");
                    }</script>';
                else
                echo '<script type="text/javascript">
                    window.onload = function () {
                        alert("ERROR");
                    }</script>';    
            }

        }
    ?>
   <div class="container" style="margin-top:70px;" id="adaugareP">
            <h2>Adaugare prezenta:</h2><br>
            <form method="POST">
                <div class="form-group">
                    <label for="name">Data prezenta:</label>
                    <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date"/>
                </div>
                <div class="form-group">
                    <label for="name">Ora prezenta:</label>
                    <input class="form-control" id="date" name="time" placeholder="time" type="time"/>
                </div>    
            </br>

                <button type="submit" class="btn btn-primary" name="create">Ponteaza prezenta</button>
            </form>
    </div>


    <div class="container" style="margin-top:70px;" id="adaugareP">
    <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Utilizator</th>
                <th scope="col">Data prezenta</th>
                <th scope="col">Ora prezenta</th>
                </tr>
            </thead>
            <tbody>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "siteweb";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Eroare la conectare: " . mysqli_connect_error());
        }

        $sql = "Select P.ID , U.Username,P.DataP, P.Ora from prezente P
                inner join utilizatori U
                on P.ID_user=U.ID
                inner join Proiecte PR
                on PR.ID=P.ID_proiect
                WHERE PR.ID=$id_project";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo '<th scope="row">'.$row['ID'].'</th>';
            echo "<td>".$row["Username"]."</td>";
            echo "<td>".$row["DataP"]."</td>";
            echo "<td>".$row["Ora"]."</td>";
            
            }
        } 

    ?>
            </tbody>
        </table>
    </div>


    
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="./javascript/jquery-3.6.0.min.js"></script>
    <script src="./javascript/home.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>