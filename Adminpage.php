<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
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
            color: black;
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
<ul class="menu">
    <li> <a href="index.php"> Accueil</a></li>
    <li> <a href="update.php">Modifier</a></li>
    <li> <a href="locationForm.php">Location</a></li>
</ul>
<form action="Admin.php" method="POST">
    <fieldset>
        <legend>Supprimer</legend>

    <label>Table</label><input type="text" name="nom"  placeholder="Entrez le nom de la table"/><br>
    <input type="submit" id='submit' value='Voir' />
    
    </fieldset>
</form>

<?php
// Check if $data variable is set in the session
if (isset($_SESSION['data']) && isset($_SESSION['table'])) {
    // Retrieve the $data array from the session variable
    $data = $_SESSION['data'];
    $idName = array_keys($data[0])[0];
    // Generate an HTML table based on the $data array
    ?>
    <table>
        <thead>
            <tr>
                <?php foreach(array_keys($data[0]) as $column_name): ?>
                    <th><?php echo $column_name; ?></th>
                <?php endforeach; ?>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
                <tr>
                    <form action='delete.php' method='POST'>
                        <input type="hidden" name="name_id" value='<?php echo $idName; ?>'>
                        <input type="hidden" name="id" value='<?php echo $row[0]; ?>'>
                        <?php foreach($row as $value): ?>
                            <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                        <td><input type='submit' value='Delete'></td>
                    </form>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <?php unset($_SESSION['data']); ?>
<?php
} else {
    // If $data variable is not set, display an error message
    echo "No data to display.";
}
?>




    
</body>
</html>