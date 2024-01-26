<h1>belajar php</h1>
<form action="" method="get">
Nama:
<input type="text" name="nama" placeholder="masukkan nama">
<input type="submit" name="tombol" value="kirim">
</form>
<a href="?coba=rpl&siswa=joko">klik</a>
<?php
$isi=$_GET["coba"];
if (isset($_GET["nama"])) {
    echo '<h2>'.$isi.'</h2>';
}

var_dump($isi)."<br>";
echo persegi(100)."<br>";
echo lingkaran(7)."<br>";
echo segitiga(6,8)."<br>";
echo kubus(12)."<br>";

function persegi($s) {
    $sisi=$s*$s;
    return $sisi;
}


function lingkaran($r) {
    $luaslingkaran=22/7*$r*$r;
    return $luaslingkaran;
}


function segitiga ($alas,$tinggi) {
    $luassegitiga=0.5*$alas*$tinggi;
    return $luassegitiga;
}


function kubus($ss) {
    $volumekubus=$ss*$ss*$ss;
    return $volumekubus;
}
?>
<p>belajar php</p>
