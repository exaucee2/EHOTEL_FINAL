<?php
include "cnx.php";

if(isset($_POST["submit"])){
    $client_id=$_POST["client_id"];
    $chambre_id=$_POST["chambre_id"];
    $reservation_id=$_POST["reservation_id"];
    $prix=$_POST["prix"];
    $date_debut=$_POST["date_debut"];
    $date_fin=$_POST["date_fin"];

    $stmt = $link->prepare("INSERT INTO location (client_id, chambre_id, reservation_id, prix, date_debut, date_fin) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiidss", $client_id, $chambre_id, $reservation_id, $prix, $date_debut, $date_fin);

    if($stmt->execute()){
        echo "Location record added successfully.";
    } else{
        echo "ERROR: Could not execute query: " . $stmt->error;
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ehotel</title>
        <link rel ="stylesheet" href="css/style.css">
    </head>
    <body>
        <ul class="menu">
            <li> <a href="index.php"> Accueil</a></li>
            <li> <a href="update.php">Modifier</a></li>

        </ul>
        <form style='background-color: white;' action="" method="post">
            <label for="client_id">Client ID:</label>
            <input type="text" name="client_id" id="client_id" required>

            <label for="chambre_id">Chambre ID:</label>
            <input type="text" name="chambre_id" id="chambre_id" required>

            <label for="reservation_id">Reservation ID:</label>
            <input type="text" name="reservation_id" id="reservation_id" required>

            <label for="prix">Prix:</label>
            <input type="number" name="prix" id="prix" required>

            <label for="date_debut">Date de début:</label>
            <input type="date" name="date_debut" id="date_debut" required>

            <label for="date_fin">Date de fin:</label>
            <input type="date" name="date_fin" id="date_fin" required>

            <input type="submit" name="submit" value="Add Location">
        </form>
    </body>
</html>