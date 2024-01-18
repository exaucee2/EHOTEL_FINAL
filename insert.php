<?php
include "cnx.php";
if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["phone"])  && isset($_POST["mail"])  && isset($_POST["gender"]) && isset($_POST["nas"]) && isset($_POST["adresse"]) && isset($_POST["date"])){
    echo "reached";
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $phone=$_POST["phone"];
    $mail=$_POST["mail"];
    $nas=$_POST["nas"];
    $sexe=$_POST["gender"];
    $adresse=$_POST["adresse"];
    $date=$_POST["date"];


    $req= mysqli_query($link,"insert into client(nom,prenom, sexe,email,adresse ,nas, date_enregistrement, phone,date_de_naissance) values ('$nom','$prenom','$sexe','$mail','$adresse','$nas',curdate(),'$phone', '$date')");
    if($req){
        echo" insertion effectuée ";
    }
    else{
        echo" erreur d'insertion ";
    }
    header('Location: inscription.php');
}
?>