<form action="" method="post">
    nama pelanggan:
    <input type="text" name="namapelanggan" placeholder="Nama pelanggan">
    <br>
    alamat:
    <input type="text" name="alamat" placeholder="Alamat pelanggan">
    <br>
    telpon:
    <input type="number" name="nomer" placeholder="Nomer telepon pelanggan">
    <br>
    <input type="submit" name="simpan" value="Simpan">
</form>

<?php 

$host="127.0.0.1";
 $user="root";
 $password="";
 $db="dbtoko";
 
$koneksi=new mysqli($host, $user, $password, $db);

if (isset($_POST['simpan'])) {
    $namapelanggan= $_POST['namapelanggan'];
    $alamat = $_POST['alamat'];
    $telpon=$_POST['nomer'];

    $sql="INSERT INTO pelanggan(namapelanggan,alamat,telpon) VALUES ('$namapelanggan','$alamat',$telpon)";
    $hasil=mysqli_query($koneksi,$sql);
}
// $namapelanggan= "budi";
// $alamat = "Bumi";
// $telpon=12321;

// $sql="INSERT INTO pelanggan(namapelanggan,alamat,telpon) VALUES ('$namapelanggan','$alamat',$telpon)";
// $hasil=mysqli_query($koneksi,$sql);

$sql="SELECT * FROM pelanggan";
$hasil=mysqli_query($koneksi,$sql);

echo "<table border=2px>
<thead>
<tr>
    <th>
        PELANGGAN
    </th>
    <th>
        ALAMAT
    </th>
    <th>
        TELEPON
    </th>
</tr>
</thead>
<tbody>";

while($row=mysqli_fetch_array($hasil)){
    echo "<tr>";
        echo "<td>". $row[1]. "</td>";
        echo "<td>". $row[2]. "</td>";
        echo "<td>". $row[3]. "</td>";
    echo "</tr>";
}

echo "</tbody></table> "
?>