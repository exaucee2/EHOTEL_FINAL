<!DOCTYPE html>
<html lang="en">
<head>
    <title>inscription</title>
    <meta charset="UTF-8">
    <style>
        label{
            width: 20%;
            display: inline-block;
            text-align: left;
        }
         body{
            width: 50%;
            font-family: arial;
            margin: 5px auto;
            background: #f4f7f8;
            padding: 20px;
            color: #1abc9c;
         }
         fieldset{
            border-radius: 8px;
         }
         legend{
            font-size: 1.4em;
            margin-top: 10px;
         }
         input[type="text"],input[type="number"],input[type="email"]{
                 border-radius: 5px;
                 padding: 10px;
                 width: 70%;
                 background-color: #ffff;
                 margin: 10px;
         }
         input[type="submit"]{
            position: relative;
            padding: 20px;
            font-size: 18px;
            border: 1px solid #16a058;
            border-radius: 2px;
            margin-top: 8px;
            width: 100%;
            font-size: 18px;
            font-style: bold;
            color: #000;
         }
         ul{
            list-style-type: none;
            padding: 20px;
            overflow: hidden;
            margin: 10px;
            background-color: #333;
         }
         li{
            display: inline;
            padding: 10Px;
            margin: 10px;
         }
         li a{
            color: white;
            padding: 20px;
            margin: 10px;
         }
    </style>

    
</head>
<body>
<header>
    <nav>
        <ul>
            <li> <a href="index.php">Home</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li>

        </ul>
    </nav>
</header>
<form action="insert.php" method="POST">
    <fieldset>
        <legend>Inscription</legend>
    <label>Nom</label><input type="text"  name="nom" placeholder="votre nom ici"/><br>
    <label>Prenom</label><input type="text"  name="prenom" placeholder="votre nom ici"/><br>
    <label>Tel</label><input type="number" name="phone"  placeholder="votre numero de telephone ici"/><br>
    <label>Email</label><input type="email" name="mail"  placeholder="votre mail ici"/><br>
    <label for="nas">NAS:</label>
    <input type="password" name="nas"  placeholder="Entrez votre NAS"/><br>
    <label for="adresse">Adresse:</label>
    <input type="text" id="adresse" name="adresse" placeholder="veuillez entrer une adresse"><br>
      
    <label> DATE DE NAISSANCE</label><input type="date" name="date" /><br>
    <label>Sexe</label><input type="radio"  name="gender" value="Homme"/>Homme <input type="radio"  name="gender" value="Femme"/> Femme<br>
    <input type="submit" value="valider"/>
    </fieldset>
</form>

    
</body>
</html>