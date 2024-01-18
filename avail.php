<?php
include "cnx.php";
session_start();
if(isset($_POST["check_in"]) && isset($_POST["check_out"]) && isset($_POST["classement"])  && isset($_POST["city"])){
    $checkin=$_POST["check_in"];
    $check_out=$_POST["check_out"];
    $classement=$_POST["classement"];
    $city=$_POST["city"];

    $checkin = mysqli_real_escape_string($link, $checkin);
    $check_out = mysqli_real_escape_string($link, $check_out);
    $classement= mysqli_real_escape_string($link, $classement);
    $city =mysqli_real_escape_string($link, $city);

    $stmt = $link->prepare("SELECT c.chambre_id AS chamb_id, c.nom AS chambre_nom, h.nom AS hotel_nom, c.prix, c.equipement
                            FROM chambre AS c
                            LEFT JOIN hotel as h on c.hotel_id = h.hotel_id
                            LEFT JOIN reservation AS r ON c.chambre_id = r.chambre_id
                            WHERE h.adresse LIKE ? AND r.reservation_id is null
                            or ? < r.date_debut AND ? < r.date_debut
                            AND ? > r.date_fin AND ?> r.date_fin
                            AND h.classement >= ?;");
    $stmt->bind_param("ssssss", $city_param, $checkin, $check_out, $checkin, $check_out, $classement);
    $city_param = '%' . $city . '%'; // add the wildcards to the city parameter
    $stmt->execute();
    $result = $stmt->get_result();

    $chambres = array();

    
    while($row = mysqli_fetch_assoc($result)) {
        $chambres[] = array(
            'chamb_id' => $row['chamb_id'],
            'chambre_nom' => $row['chambre_nom'],
            'hotel_nom' => $row['hotel_nom'],
            'prix' => $row['prix'],
            'equipement' => $row['equipement']
        );
    }
    /*while ($row = mysqli_fetch_assoc($result)) {
        echo 'Chambre: ' . $row['chambre_nom'] . '<br>';
        echo 'Hotel: ' . $row['hotel_nom'] . '<br>';
        echo 'Prix: ' . $row['prix'] . '<br>';
        echo 'Equipement: ' . $row['equipement'] . '<br>';
        echo '<br>';
    }*/

    foreach ($chambres as $chambre) {
        echo 'Chambre: ' . $chambre['chambre_nom'] . '<br>';
        echo 'Hotel: ' . $chambre['hotel_nom'] . '<br>';
        echo 'Prix: ' . $chambre['prix'] . '<br>';
        echo 'Equipement: ' . $chambre['equipement'] . '<br>';
        echo '<button onclick="reserve()">Reserver</button>';
        echo '<br>';
    }
    $_SESSION['chambres'] = $chambres;
    $_SESSION['checkin'] = $checkin;
    $_SESSION['checkout'] = $check_out;
    
    header('Location: index.php');
    exit;
}
?>