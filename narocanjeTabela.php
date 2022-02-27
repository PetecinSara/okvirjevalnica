<?php if (isset($_REQUEST['id'])){ ?>
<div class="container">
    <div class="row">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Količina</th>
                    <th scope="col">Dolžina</th>
                    <th scope="col">Širina</th>
                    <th scope="col">Okvir</th>
                    <th scope="col">Paspartu</th>
                    <th scope="col">Steklo</th>
                    <th scope="col">Opis slike</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Znesek</th>
                    <th scope="col">Izbriši</th>
                </tr>
            </thead>
            <tbody>
                <?php include "dbConn.php";  // Using database connection file here
                $id = $_REQUEST['id'];
                $sql = "SELECT * FROM postavka WHERE narocilo_id = $id";
                $result = mysqli_query($db, $sql) or die(mysqli_error($db));
                while ($data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<th>" . $data['kolicina'] . "</th>";
                    echo "<td>" . $data['dolzina'] . "</td>";
                    echo "<td>" . $data['sirina'] . "</td>";
                    echo "<td>" . $data['okvir_id'] . "</td>";
                    echo "<td>" . $data['paspartu_id'] . "</td>";
                    echo "<td>" . $data['steklo_id'] . "</td>";
                    echo "<td>" . $data['opis_slike'] . "</td>";
                    echo "<td>". $data['cena'] ."</td>";
                    echo "<td>". $data['znesek'] ."</td>";
                    echo "<td><button onclick='izbrisiPostavko(". $data['id'] .")'>Izbriši</button></td>";
                    echo "</tr>";
                } ?>
            </tbody>
        </table>
    </div>
</div>
<?php } ?>