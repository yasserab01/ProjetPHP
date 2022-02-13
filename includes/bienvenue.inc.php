<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><body>
    <title>Liste Des Etudiants</title>
   
    <link rel="stylesheet" href="../css/liste.css">

</head>
<body>
<nav class="crumbs">
    <ol>
        <li class="crumb"><a href="../insert.html">Ajouter Un Etudiant</a></li>
        <li class="crumb"><a href="../deco.php">Déconnexion</a></li>
    </ol>
</nav>
<?php
require 'dbh.inc.php';

echo "<h1 class=\"title1\">LISTE DES ETUDIANT ENSAT : GINF1</h1>";
echo "<table>";
echo "<tr> <td> <span>CNE</span> </td>";
echo "<td> <span>NOM</span> </td>";
echo "<td> <span>PRENOM</span> </td>";
echo "<td> <span>E-mail</span> </td>";
echo "<td> <span>PHOTO</span> </td> </tr>";
$mysql11="SELECT * FROM studens11 ";
$array=mysqli_query($conn,$mysql11);
while ($row = mysqli_fetch_assoc($array)) {
    echo "<tr><td>".$row['CNE']."</td><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['email']."</td><td><image src=\"".$row['photo']."\"</td></tr>";
    echo "<br>";
}
?>
</body>

