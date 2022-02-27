<?php 
include 'dbConn.php';

$id = $_REQUEST["id"];

try{
    $povezava = new PDO('mysql:host='.$host.';dbname='.$imePodatkovneBaze.';charset=utf8mb4', $uporabniskoIme, $geslo);
    $povezava->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $poizvedba = $povezava->prepare("SELECT SUM(znesek) as znesek FROM postavka WHERE narocilo_id=:id GROUP BY narocilo_id");
    $poizvedba->execute(['id' => $id]);
    $rezultat = $poizvedba->fetch(\PDO::FETCH_OBJ);
    echo $rezultat->znesek;
} catch(PDOException $e) {
    $povezava->rollback();
    echo "Error: " . $e->getMessage();
  }
?>