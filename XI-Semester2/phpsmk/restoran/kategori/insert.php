<form action="" method="post">
    kategori :
    <input type="text" name="kategori" id="">
    <br>
    <input type="submit" value="simpan" name="simpan">


</form>

<?php 


    require_once "../pelanggan/function.php";

    if (isset($_POST['simpan'])) {
        $kategori = $_POST['kategori'];
        // echo $kategori;

        // $kategori = 'buah';

        $sql = "INSERT INTO tblkategori VALUES ('','$kategori')";

        $result = mysqli_query($koneksi, $sql);

        echo "data sudah disimpan";

        header("location : http://localhost/XI-Semester2/phpsmk/restoran/kategori/select.php");

    }

   
    

    

?>