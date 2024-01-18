<?php
include "cnx.php";
session_start();

// Hardcoded credentials for demo purposes
$valid_username = "joseph";
$valid_password = "123456";

// Check if form was submitted
if(isset($_POST["username"]) && isset($_POST["password"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    
    $username = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $password);

    if($username === $valid_username && $password === $valid_password){
        $_SESSION["loggedin"] = true;
        $_SESSION["client_id"] = 0;
        $_SESSION['admin'] = true;
        header("Location: index.php");
        exit;
    }
    $stmt = $link->prepare("SELECT client_id, prenom FROM client WHERE email=? and nas=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        // Get the client_id and prenom from the result
        $row = $result->fetch_assoc();
        $client_id = $row["client_id"];
        $prenom = $row["prenom"];

        // Set session variables to indicate user is logged in and store client_id and prenom
        $_SESSION["loggedin"] = true;
        $_SESSION["client_id"] = $client_id;
        $_SESSION["prenom"] = $prenom;

        // Redirect user to dashboard page
        header("Location: index.php");
        exit;
    } else {
        // Display error message
        echo "Invalid username or password.";
    }
    
    // Check if username and password are valid
    //if ($username === $valid_username && $password === $valid_password) {
        // Set session variable to indicate user is logged in
        //$_SESSION["loggedin"] = true;

        // Redirect user to dashboard page
        //header("Location: index.php");
        //exit;
    //} else {
        // Display error message
        //echo "Invalid username or password.";
    //}
}
?>