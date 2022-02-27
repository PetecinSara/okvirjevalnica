$(document).ready(function() {
    $("#submit").click(function() {
        let ime = $("#ime").val();
        let priimek = $("#priimek").val();
        let telefonska_stevilka = $("#telefonska_stevilka").val();
        let email = $("#email").val();
        let naziv_podjetja = $("#naziv_podjetja").val();
        let davcna_stevilka = $("#davcna_stevilka").val();

        let podatki = {};
        podatki.ime = ime;
        podatki.priimek = priimek;
        podatki.telefonska_stevilka = telefonska_stevilka;
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
            podatki.email = email;
        } else {
            email = "";
            alert("Email ni veljaven!")
        }
        podatki.naziv_podjetja = naziv_podjetja;
        podatki.davcna_stevilka = davcna_stevilka;
        let dataString = JSON.stringify(podatki);
        console.log(dataString);

        if (ime == '' || telefonska_stevilka == '' || email == '') {
            $('#info').text('Prosim izpolnite vsa polja.').css('color', 'red');
        } else {
            $.ajax({
                type: "POST",
                url: "./backend/dodajStranko.php",
                data: dataString,
                cache: false,
                success: function(result) {
                    $('#info').text(result).css('color', 'green');
                    window.location.href = "./narocanje.php?idstranka=" + result;
                }
            });
        }

        return false;
    });
});