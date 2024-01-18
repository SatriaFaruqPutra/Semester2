
<H1>ZODIAK</H1>
<form action="" method="get">
<p>Tanggal lahir : </p>
    <input type="number" name="tanggal" id="tanggal">
<p>Bulan : </p>
    <input type="number" name="bulan" id="tanggal">
<input type="submit" value="Cek" id="submit">
</form>

<?php

$hasilzodiak='';
$tanggal=$_GET["tanggal"];
$bulan=$_GET["bulan"];

if (isset($bulan,$tanggal)) {
    
    if (($bulan >= 1 && $bulan <= 12) && ($tanggal >= 1 && $tanggal <= 31)) {
        $hasilzodiak = menghitungzodiak($tanggal, $bulan);
        echo "<h2>Zodiak anda adalah : ".$hasilzodiak."<h2>";
    } else {
        echo"<h2>Tanggal Tidak Valid<h2>";
    }
    
}

function menghitungzodiak($tanggal, $bulan) {
    $zodiak='';

    if (($bulan == 1 && $tanggal >= 20) || ($bulan == 2 && $tanggal <= 18)) {
        $zodiak= 'Aquarius';
    } elseif (($bulan == 2 && $tanggal >= 19) || ($bulan == 3 && $tanggal <= 20)) {
        $zodiak= 'Pisces';
    } elseif (($bulan == 3 && $tanggal >= 21) || ($bulan == 4 && $tanggal <= 19)) {
        $zodiak= 'Aries';
    } elseif (($bulan == 4 && $tanggal >= 20) || ($bulan == 5 && $tanggal <= 20)) {
        $zodiak= 'Taurus';
    } elseif (($bulan == 5 && $tanggal >= 21) || ($bulan == 6 && $tanggal <= 20)) {
        $zodiak= 'Gemini';
    } elseif (($bulan == 6 && $tanggal >= 21) || ($bulan == 7 && $tanggal <= 22)) {
        $zodiak= 'Cancer';
    } elseif (($bulan == 7 && $tanggal >= 23) || ($bulan == 8 && $tanggal <= 22)) {
        $zodiak= 'Leo';
    } elseif (($bulan == 8 && $tanggal >= 23) || ($bulan == 9 && $tanggal <= 22)) {
        $zodiak= 'Virgo';
    } elseif (($bulan == 9 && $tanggal >= 23) || ($bulan == 10 && $tanggal <= 22)) {
        $zodiak= 'Libra';
    } elseif (($bulan == 10 && $tanggal >= 23) || ($bulan == 11 && $tanggal <= 21)) {
        $zodiak= 'Scorpion';
    } elseif (($bulan == 11 && $tanggal >= 22) || ($bulan == 12 && $tanggal <= 21)) {
        $zodiak= 'Sagitarius';
    } elseif (($bulan == 12 && $tanggal >= 22) || ($bulan == 1 && $tanggal <= 19)) {
        $zodiak= 'Capricorn';
    } 
    return $zodiak;
}
?>