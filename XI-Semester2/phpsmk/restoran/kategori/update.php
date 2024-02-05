<?php 

    require_once "../pelanggan/function.php";

    // echo $id;

    $sql = "SELECT * FROM tblkategori WHERE idkategori = $id";
    $result = mysqli_query($koneksi,$sql);

    $row=mysqli_fetch_assoc($result);

    // $kategori = 'nasi';
    // $id=21;
    // $sql = "UPDATE tblkategori SET kategori='$kategori' WHERE idkategori=$id";

    // $result = mysqli_query($koneksi,$sql);

    // echo $sql;



?>

<form action="" method="post">
    kategori :
    <input type="text" name="kategori" value="<?php echo $row['kategori'] ?>">
    <br>
    <input type="submit" value="simpan" name="simpan">
</form>

<?php 
    if (isset($_GET['simpan'])) {
        $kategori = $_post['kategori'];
        echo $kategori;

        $sql = "UPDATE tblkategori SET kategori='$kategori' WHERE idkategori=$id";

        $result = mysqli_query($koneksi,$sql);

        echo $sql;

        header("location:http://localhost/XI-Semester2/phpsmk/restoran/kategori/select.php");
    }

?>