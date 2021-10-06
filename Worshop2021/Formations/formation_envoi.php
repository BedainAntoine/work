<?php
 
if(isset($_POST["submit"])){
$hostname='localhost';
$username='bitnani';
$password='mdpdebian';
$dbname='workshop';
  
try {
$dbh = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username,$password);
  
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
$stmt = $dbh->prepare("INSERT INTO formation (nom, ville, etablissement, cout, discipline, niveau, capacite) VALUES (:nom, :ville, :etablissement, :cout, :discipline, :niveau, :capacite)"); //créer table formation 
 
$stmt -> bindParam(':name', $_POST["nom"]);
$stmt -> bindParam(':ville', $_POST["ville"]);
$stmt -> bindParam(':etablissement', $_POST["etablissement"]);
$stmt -> bindParam(':cout', $_POST["cout"]);
$stmt -> bindParam(':discipline', $_POST["discipline"]);
$stmt -> bindParam(':niveau', $_POST["niveau"]);
$stmt -> bindParam(':capacite', $_POST["capacite"]);
 
$stmt->execute();
 
if ($dbh->query($stmt)) {
echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}
 
$dbh = null;
}
 
?>