<!DOCTYPE html>
<html>
<head>
	<title>Developers</title>
    <link rel ="stylesheet" href="css/style.css">
    <style>
        /* Set body and h1 font and color */
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: white;
        }

        h1 {
            font-size: 2em;
            text-align: center;
            margin: 1em 0;
        }

        /* Style menu */
        .menu {
            list-style: none;
            margin: 0;
            padding: 0;
            background-color: black;
            overflow: hidden;
        }

        .menu li {
            float: left;
        }

        .menu li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .menu li a:hover {
            background-color: #333;
        }

        /* Style developer sections */
        div {
            width: 80%;
            margin: 0 auto;
            padding: 1em;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 1em;
        }

        img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            border-radius: 50%;
            margin-bottom: 1em;
        }

        h2 {
            font-size: 3em;
            margin-bottom: 0.5em;
        }

        p {
            font-size: 2em;
            margin-bottom: 0.5em;
        }

    </style>
</head>
<body style='background-color: white;'>
    <ul style='background-color: black;' class="menu">
        <li> <a href="index.php"> Accueil</a></li>
        <li> <a href="#Reserver"> Reservation</a></li>
        <li> <a href="inscription.php">S'inscrire</a></li>
        <li> <a href="apropos.php"> A propos</a></li>

    </ul>
	<h1>Decouvrez nos developpeurs</h1>
    <div>
		<img src="images/exaucee.jpg" alt="Developer 2">
		<h2>Exaucee mbuyi</h2>
		<p>je suis etudiante en informatique a l' l'universite d'ottawa,je suis passionnee par les maths .</p>
        <p>elle prefere travailler sur  front end.</p>
    </div>
	<div>
		<img src="images/me.jpg" alt="Developer 1">
		<h2>Joseph Sebujangwe</h2>
		<p>Joseph est un etudiant en informatique et mathematiques a l'universite d'Ottawa. Il aime jouer aux basketball et aux echecs, ainsi que decouvrir Ottawa a bord de son velo.</p><br>
        <p>Il prefere travailler sur le back-end que le front end.</p>
	</div>
	
	<div>
		<img src="images/sanata.jpeg" alt="Developer 3">
		<h2>Sanata Dembele</h2>
		<p>je suis une etudiante en genie logiciel passionee par la tecnologie et en dehors des etudes la patisserie</p>
        <p>elle prefere travailler sur le back-end</p>
	</div>
</body>
</html>