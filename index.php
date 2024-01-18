<?php
    session_start();
    
// Check if user is logged in
//if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Redirect user to login page
    //header("Location: connexion.html");
    //exit;
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ehotel</title>
    <link rel ="stylesheet" href="css/style.css">
    <style>
        table {
            width: fit-content;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            font-size: 16px;
            text-align: center; /* added to center the table */
        }

        th, td {
            padding: 12px 15px;
            text-align: center; /* modified to center the text in cells */
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"><span> E</span>hotel</a>
        </div>
        <ul class="menu">
            <li> <a href="index.php"> Accueil</a></li>
            <li> <a href="#Reserver"> Reservation</a></li>
            <?php if(isset($_SESSION['admin'])) {
                    echo '<li> <a href="Adminpage.php"> Admin</a></li>';
                }?>
            <li> <a href="inscription.php">S'inscrire</a></li>
            <li> <a href="apropos.php"> A propos</a></li>

        </ul>
        <style>
            button {
              display: inline-block;
              background-color: #29d9d5;
              border-radius: 10px;
              border: 2px double #cccccc;
              color: #eeeeee;
              text-align: center;
              font-size: 10px;
              padding: 10px;
              width: 100px;
              transition: all 0.5s;
              cursor: pointer;
              margin: 5px;
            } 
          </style>
        </head>
        <body>
        
    
        <?php
            
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                // Display log out button
                echo '<button onclick="logout()">Log Out</button>';
            } else {
                // Display log in button
                echo '<button onclick="window.location.href=\'http://localhost/EHOTELPROPRE/connexion.php\'">Log In</button>';
            }

            
        
        ?>
        <script>
            function logout() {
                // Unset all session variables
                <?php $_SESSION["loggedin"] = false; ?>
                // Destroy the session
                <?php 
                    unset($_SESSION["loggedin"]);
                    unset($_SESSION['admin']);
                ?>
                
                
                // Redirect to log in page
                window.location.href = "http://localhost/EHOTELPROPRE/connexion.php";
            }
        </script>
    </header>
    <!--acceuil section-->
    <section id="home">
        <h2> nous suivre</h2>
        <h4>reserver en toute confiance</h4>
        <p>pour un sejour agreable.</p>
        <p> vous satisfaire est notre devoir.</p>
        <a href="#" class="btn-reservation"> Réserver Maintenant</a>
        
    </section>
    <!--A propos section-->
    <section id="Reserver" class="reservation">
        <form action="avail.php" method="post">
            <div class="flex">
                <div class="box">
                    <p>check in <span>*</span></p>
                    <input type="date" name="check_in" class="input" required>
                </div>
                <div class="box">
                    <p>check out <span>*</span></p>
                    <input type="date" name="check_out" class="input" required>
                </div>
                <div class="box">
                    <p>Classement <span>*</span></p>
                    <select name="classement" class="input" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class='box'>
                    <label for='city'>Location</label>
                    <input type="text" name="city" class="input" required>
                </div>
            </div>
            <input type="submit" value="check_availability" name="check" class="btn">
        </form>
        <?php
            // check if the $_SESSION['chambres'] variable is set
            if(isset($_SESSION['chambres']) && isset($_SESSION['client_id'])) {
                $chambres = $_SESSION['chambres'];
                echo "<table>";
                echo "<thead><tr><th>Chambre Nom</th><th>Hotel Nom</th><th>Prix</th><th>Equipement</th><th>Reserver</th></tr></thead>";
                echo "<tbody>";
                foreach($chambres as $chambre) {
                    echo "<tr>";
                    echo "<td>" .$chambre['chambre_nom'] . "</td>";
                    echo "<td>" . $chambre['hotel_nom'] . "</td>";
                    echo "<td>" . $chambre['prix'] . "</td>";
                    echo "<td>" . $chambre['equipement'] . "</td>";
                    echo '<td>';
                    // Enclose the button inside a form
                    echo '<form action="reserverFinal.php" method="POST">';
                    echo '<input type="hidden" name="chambre_id" value="' . $chambre['chamb_id'] . '">';
                    echo '<input type="hidden" name="client_id" value="' . $_SESSION["client_id"] . '">';
                    echo '<input type="hidden" name="date_in" value="' . $_SESSION["checkin"] . '">';
                    echo '<input type="hidden" name="date_out" value="' . $_SESSION["checkout"] . '">';
                    
                    echo '<input type="submit" value="Reserver cette chambre">';
                    echo '</form>';
                    echo '</td>';
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                //unset($_SESSION['chambres']); // unset the session variable to clear it
            } else {
                echo "No chambres found.";
            }
        ?>
    </section>
    
    <!--section reservation-->
    <section id="popular-reservation">
        <h1 class="title"> reservations populaires</h1>
        <div class=" content">
             <!--box-->
            <div class="box">
                <img src="images/auberge.png" alt="">
                <div class="content">
                    <div>
                        <h4>Auberge</h4>
                        <p>se detendre fait toujours du bien</p>
                        <p>Des hôtels servis avec style</p>
                        <a href="#">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!--box-->
             <!--box-->
             <div class="box">
                <img src="images/casino.png" alt="">
                <div class="content">
                    <div>
                        <h4>Casino</h4>
                        <p>se detendre fait toujours du bien</p>
                        <p>Des hôtels servis avec style</p>
                        <a href="#">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!--box-->
             <!--box-->
             <div class="box">
                <img src="images/luxe.png" alt="">
                <div class="content">
                    <div>
                        <h4>Luxe</h4>
                        <p>se detendre fait toujours du bien</p>
                        <p>Des hôtels servis avec style</p>
                        <a href="#">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!--box-->
             <!--box-->
             <div class="box">
                <img src="images/ephemere.JPG" alt="">
                <div class="content">
                    <div>
                        <h4>Ephemere</h4>
                        <p>se detendre fait toujours du bien</p>
                        <p>Des hôtels servis avec style</p>
                        <a href="#">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!--box-->
            <!--box-->
            <div class="box">
                <img src="images/passage.png" alt="">
                <div class="content">
                    <div>
                        <h4>Passage</h4>
                        <p>se detendre fait toujours du bien</p>
                        <p>Des hôtels servis avec style</p>
                        <a href="#">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!--box-->
            <!--box-->
            <div class="box">
                <img src="images/economique.png" alt="">
                <div class="content">
                    <div>
                        <h4>Economie</h4>
                        <p>se detendre fait toujours du bien</p>
                        <p>Des hôtels servis avec style</p>
                        <a href="#">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!--box-->
            
        </div>
    </section>
    <!--contact section-->
    <section id="contact">
        <h1 class="title"> Contact</h1>
        <form action="">
            <div class="left-right">
                <div class="left">
                    <label>Nom Complet</label>
                    <input type="text">
                    <label>Objet</label>
                    <input type="text">
                    <label>Email</label>
                    <input type="text">
                    <label>Message</label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    
                </div>
                <div class="right">
                    <label>Numero</label>
                    <input type="text">
                    <label>Date</label>
                    <input type="text">
                    <label>Autres Details</label>
                    <input type="text">
                    <label>Adresse</label>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d22640.448747666098!2d-79.46775745!3d43.73956195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sfr!2sca!4v1679264037256!5m2!1sfr!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <button>Envoyer</button>
        </form>
    </section>
    
    
</body>
</html>