<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/connexion.css" >
    </head>
    <body>
        <div id="container">
        
            <h1>Connexion</h1>
            <form action="login.php" method="POST">
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                
                <input type="submit" id='submit' value='Se connecter' /></button><a href="inscription.php">Inscrivez-Vous</button></a>

            </form>
        </div>
    </body>
</html>