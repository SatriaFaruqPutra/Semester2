<?php 

    $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");

?>

<h3>INSERT MENU</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group w-25">
            <label for="">kategori</label>
            <select name="idkategori" id="">
                <?php foreach($row as $r):?>
                    <option value="<?php echo $r['kategori']?>">
                        <?php echo $r['kategori']?>
                    </option>
                <?php endforeach ?>
            </select>
           

        </div>
        <div class="form-group w-25">
            <label for="">Nama menu</label>
            <input type="text" name="menu" require placeholder="isi menu" class="form-control">

        </div>

        <div class="form-group w-25">
            <label for="">Harga menu</label>
            <input type="number" name="Harga" require placeholder="isi harga" class="form-control">

        </div>

        <div class="form-group w-25">
            <label for="">Gambar Menu</label><br>
            <input type="file" name="gambar" >

        </div>

        <div>
            <input type="submit" value="simpan" name="simpan" class="btn btn-primary mt-2">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $idkategori = $_POST['idkategori'];
        $menu = $_POST['menu'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];

        if (empty($gambar)) {
            echo "<h3>GAMBAR KOSONG</h3>";
        } else {
            $sql = "INSERT INTO tblmenu VALUES ('',$idkategori,'$menu','$gambar',$harga)";
            move_uploaded_file($temp,'../upload/'.$gambar);

            $db->runSQL($sql);
            header("location:?f=menu&m=select");
        }
        
        
        // $db->runSQL($sql);

        // header("location:?f=menu&m=select");
    }
?>