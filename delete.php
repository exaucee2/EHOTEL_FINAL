<?php
session_start();
include "cnx.php";
if(isset($_SESSION["table"]) && isset($_POST["id"]) && isset($_POST["name_id"]) ){
    $id= $_POST["id"];
    $table = $_SESSION['table'];
    $name = $_POST["name_id"];

    $stmt = $link->prepare("DELETE FROM $table WHERE $name = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
}
header('Location: Adminpage.php');
exit;
?>