<?php 
include 'dbConn.php';

$id = $_REQUEST["id"];
$dolzina =$_REQUEST["dolzina"];
$sirina =$_REQUEST["sirina"];

try{
    $povezava = new PDO('mysql:host='.$host.';dbname='.$imePodatkovneBaze.';charset=utf8mb4', $uporabniskoIme, $geslo);
    $povezava->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $poizvedba = $povezava->prepare("SELECT * FROM material WHERE id=:id");
    $poizvedba->execute(['id' => $id]);
    
    $poizvedba = $povezava->prepare("SELECT * FROM material WHERE id=:id");
    $poizvedba->execute(['id' => $id]);
    $rezultat = $poizvedba->fetch(\PDO::FETCH_OBJ);
    $cenaokvirja = ((((($rezultat-> sirina)*2)+$sirina+$dolzina)*2)/100)*($rezultat-> cena);
    echo $cenaokvirja;
} catch(PDOException $e) {
    $povezava->rollback();
    echo "Error: " . $e->getMessage();
  }
?>