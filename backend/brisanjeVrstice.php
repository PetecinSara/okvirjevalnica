<?php 
include 'dbConn.php';

$id = $_REQUEST["id"];

try{
    $povezava = new PDO('mysql:host='.$host.';dbname='.$imePodatkovneBaze.';charset=utf8mb4', $uporabniskoIme, $geslo);
    $povezava->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $poizvedba = $povezava->prepare("DELETE FROM postavka WHERE id=:id;");
    $poizvedba->execute(['id' => $id]);
    $rezultat = $poizvedba->fetch(\PDO::FETCH_OBJ);
} catch(PDOException $e) {
    $povezava->rollback();
    echo "Error: " . $e->getMessage();
  }
?>