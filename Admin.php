<?php
include "cnx.php";

if(isset($_POST["nom"]) ){
    $nom=$_POST["nom"];
    

    $stmt = $link->prepare("SELECT * FROM $nom");
 
    //$nom = "{$nom}";

    //$stmt->bind_param("s", $nom);
    $stmt->execute();
    $result = $stmt->get_result();
    //$row = $result->fetch_assoc();
    //$req= mysqli_query($link,"select * from hotel where nom like '%$hotel%' or adresse like '%$adresse%'");

    $donnees = array();
    while($row = mysqli_fetch_assoc($result)) {
        $donnees[] = $row;
    }
    session_start();
    $_SESSION['data'] = $donnees;
    $_SESSION['table'] = $nom;

    /*foreach ($hotels as $hot) {
        print_r($hot);
    }*/


    /*while($row = mysqli_fetch_assoc($req)) {
        $name = $row['nom'];
        $phone = $row['phone'];
    
        echo "<div>";
        echo "<h2>$name</h2>";
        echo "<p>$phone</p>";
        echo "</div>";
    }*/
    
}
header('Location: Adminpage.php');
exit;
?>
