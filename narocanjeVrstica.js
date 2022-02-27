$(document).ready(function() {
    $("#submitLine").click(function() {
        var kolicina = $("#kolicina").val();
        var dolzina = $("#dolzina").val();
        var sirina = $("#sirina").val();
        var okvir = $("#okvir").val();
        var paspartu = $("#paspartu").val();
        var steklo = $("#steklo").val();
        var opis = $("#opis").val();
        var id_narocila = $("#id_narocila").val();
        var cena = $("#cena").html();


        var podatki = {};
        podatki.kolicina = kolicina;
        podatki.dolzina = dolzina;
        podatki.sirina = sirina;
        podatki.okvir = okvir;
        podatki.paspartu = paspartu;
        podatki.steklo = steklo;
        podatki.opis = opis;
        podatki.id_narocila = id_narocila;
        podatki.cena = cena;
        var dataString = JSON.stringify(podatki);
        console.log(dataString);

        if (stranka == '') {
            $('#info').text('Prosim izpolnite vsa polja.').css('color', 'red');
        } else {
            $.ajax({
                type: "POST",
                url: "backend/narocanjeVrstica.php",
                data: dataString,
                cache: false,
                success: function(result) {
                    $('#info').text(result).css('color', 'green');
                }
            });
            window.location.reload()
        }

        return false;
    });
});