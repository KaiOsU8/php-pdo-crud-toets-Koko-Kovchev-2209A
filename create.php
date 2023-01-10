<?php
include('config.php');


$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    echo " er is een verbinding met de database";
} catch (PDOException $e) {
    echo "Er is geen verbinding met de database.<br>
        Neem contact op met de administrator<br>";
    echo "systeemmelding: " . $e->getMessage();
}

$sql = "INSERT INTO DureAuto (Id 
                            ,Merk
                            ,Model
                            ,Topsnelheid
                            ,Prijs)
        VALUES              (NULL
                            ,:Voornaam
                            ,:Tussenvoegsel
                            ,:Achternaam);";
//   maak de query gereed met de prepare-method van het $pdo-object
$statement = $pdo->prepare($sql);
$statement->bindValue(':Merk', $_POST['Merk'], PDO::PARAM_STR);
$statement->bindValue(':Model', $_POST['Model'], PDO::PARAM_STR);
$statement->bindValue(':Topsnelheid', $_POST['Topsnelheid'], PDO::PARAM_STR);
$statement->bindValue(':Prijs', $_POST['Prijs'], PDO::PARAM_STR);
$statement->execute();

header('Location: read.php');
