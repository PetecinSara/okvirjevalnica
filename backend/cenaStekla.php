<?php 
include 'dbConn.php';

$id = $_REQUEST["id"];
$velikost =$_REQUEST["velikost"];

try{
    $povezava = new PDO('mysql:host='.$host.';dbname='.$imePodatkovneBaze.';charset=utf8mb4', $uporabniskoIme, $geslo);
    $povezava->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $poizvedba = $povezava->prepare("SELECT * FROM material WHERE id=:id");
    $poizvedba->execute(['id' => $id]);
    $rezultat = $poizvedba->fetch(\PDO::FETCH_OBJ);
    $cenastekla = ((($velikost))/10000)*($rezultat-> cena);
    echo $cenastekla;
} catch(PDOException $e) {
    $povezava->rollback();
    echo "Error: " . $e->getMessage();
  }
?>