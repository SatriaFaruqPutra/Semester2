<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tblkategori WHERE idkategori=$id";

        $row = $db->getITEM($sql);

        echo $id;

    }

?>

<h3>INSERT KATEGORI</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-25">
            <label for="">Nama Kategori</label>
            <input type="text" name="kategori" require value="<?php echo $row['kategori']?>" class="form-control">

        </div>

        <div>
            <input type="submit" value="simpan" name="simpan" class="btn btn-primary mt-2">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $kategori = $_POST['kategori'];

        $sql = "UPDATE tblkategori SET kategori='$kategori' WHERE idkategori=$id";
        
        $db->runSQL($sql);

        header("location:?f=kategori&m=select");
    }
?>

