<?php
include 'dbConn.php';

if (isset($_REQUEST["idstranka"])) {
    $idstranka = $_REQUEST["idstranka"];
    $paramStranka = "&idstranka=".$idstranka;
} else {
    $paramStranka = "";
}
?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope='col'>ID <a href='./seznamNarocil.php?sort=ASC<?php echo $paramStranka ?>'>&darr;</a><a href='./seznamNarocil.php?sort=DESC<?php echo $paramStranka ?>'>&uarr;</a></th>
            <th scope='col'>Stranka</th>
            <th scope='col'>Rok izdelave</th>
            <th scope='col'>Popust</th>
            <th scope='col'>Znesek</th>
            <th scope='col'>Izbriši narocilo</th>
        </tr>
    </thead>

    <?php
    try {
        $povezava = new PDO('mysql:host=' . $host . ';dbname=' . $imePodatkovneBaze . ';charset=utf8mb4', $uporabniskoIme, $geslo);
        $povezava->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT n.id, s.ime, s.priimek, n.rok_izdelave, n.popust, s.id FROM narocilo n INNER JOIN stranka s ON stranka_id = s.id";
        if (isset($_REQUEST["idstranka"])) {
            $idstranka = $_REQUEST["idstranka"];
            $sql = $sql . " WHERE s.id=".$idstranka;
        }
        if (isset($_REQUEST["sort"])) {
            $sort = $_REQUEST["sort"];
            $sql = $sql . " ORDER BY n.id ".$sort;
        }
        $stmt = $povezava->query($sql);
        

        echo "<tbody>";
        while ($data = $stmt->fetch()) {
            echo "<tr>";
            echo "<th scope='row'><a href='./narocanje.php?id=$data[0]'>$data[0]</a></th>";
            echo "<td><a href='./seznamNarocil.php?idstranka=$data[5]'>$data[1] $data[2]</a></td>";
            echo "<td>$data[3]</td>";
            echo "<td>$data[4]</td>";
            echo "<td><script type='text/javascript'>znesekSeznamNarocil($data[0], $data[4]);</script><span id='koncniZnesek$data[0]'></span></td>";
            echo "<td><button onclick='izbrisiNarocilo(". $data['0'] .")'>X</button></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } catch (PDOException $e) {
        $povezava->rollback();
        echo "Error: " . $e->getMessage();
    }

    $povezava = null

    ?>

    <script>
        function izbrisiNarocilo(idNarocila){
                const xhttp = new XMLHttpRequest();
                xhttp.open("DELETE", "./backend/brisanjeNarocila.php?id=" + idNarocila);
                xhttp.send();
                xhttp.onreadystatechange = (e) => {
                    window.location.reload();
            }
        }
    </script>