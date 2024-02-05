<div style="margin:auto; width:900px"> 

<h1><a href="http://localhost/XI-Semester2/phpsmk/restoran/kategori/insert.php">Tambahkan data</a></h1>

<?php 

    require_once "../pelanggan/function.php";

    if (isset($_GET['update'])) {
        $id=$_GET['update'];
        require_once "../kategori/update.php";
    }

    if (isset($_GET['hapus'])) {
        $id=$_GET['hapus'];
        require_once "../kategori/delete.php";
    }

    echo '<br>';
    
    $sql = "SELECT idkategori FROM tblkategori";
    $result = mysqli_query($koneksi, $sql);

    $jumlahdata = mysqli_num_rows($result);
    // echo $jumlahdata;

    
    $banyak = 4;

    $halaman = ceil($jumlahdata / $banyak);

    for ($i=0; $i < $halaman; $i++) { 
        echo '<a href="?p=$i">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

    echo '<br><br>';

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        // echo $p;
        $mulai = ($p * $banyak) - $banyak;

    } else {
        $mulai = 0;
    }

    // echo $halaman;
    
    $sql = "SELECT * FROM tblkategori LIMIT $mulai,$banyak";


    // echo ;

    $result = mysqli_query($koneksi, $sql);

    // var_dump($result);

    $jumlah = mysqli_num_rows($result);
    // echo '<>';
    // echo $jumlah;

    echo '
    <table border="2px">
    <tr>
        <th>no</th>
        <th>kategori</th>
        <th>Hapus</th>
        <th>Update</th>
    </tr>
    
    ';


    $no=$mulai;
    if ($jumlah > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>'.$no++.'</td>';
            echo '<td>'.$row['kategori'].'</td>';
            echo '<td><a href="?hapus=" $row["kategori"]>hapus</a></td>';
            echo '<td><a href="?update=" $row["kategori"]>update</a></td>';

            echo '</tr>'; 
        }
    }

    echo '</table>';

?>

<!-- <table border="2px">
    <tr>
        <th>no</th>
        <th>kategori</th>
    </tr>

    <tr>
        <td>1</td>
        <td>kategori</td>
    </tr>

    <tr>
        <td>2</td>
        <td>kategori</td>
    </tr>

    <tr>
        <td>3</td>
        <td>kategori</td>
    </tr>
    

</table> -->


</div>