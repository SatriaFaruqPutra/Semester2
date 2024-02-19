<?php 

    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        
        $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";

        $item = $db->getITEM($sql);

        $idkategori = $item['idkategori'];
        

        echo $idkategori.'-'.$gambar;



    }

    $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");

?>



<h3>UPDATE MENU</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group w-25">
            <label for="">kategori</label>
            <select name="idkategori" id="">
                <?php foreach($row as $r):?>
                    <option <?php if ($idkategori == $r['kategori'])  echo "selected" ?> value="<?php echo $r['kategori']?>" >
                        <?php echo $r['kategori']?>
                    </option>
                <?php endforeach ?>
            </select>
           

        </div>
        <div class="form-group w-25">
            <label for="">Nama menu</label>
            <input type="text" name="menu" require value="<?php echo $item['menu'] ?>" class="form-control">

        </div>

        <div class="form-group w-25">
            <label for="">Harga menu</label>
            <input type="number" name="Harga" require value="<?php echo $item['menu'] ?>" class="form-control">

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
        $gambar = $item['gambar'];
        // $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];

        if (!empty($temp)) {
            $gambar = $temp = $_FILES['gambar']['tmp_name'];
            move_uploaded_file($temp,'../upload/'.$gambar);
        }

        $sql = "UPDATE tblmenu SET idketegori=$idkategori, menu='$menu, gambar='$gambar', harga=$harga WHERE idmenu = $id" ;

        $db->runSQL($sql);
        header("location:?f=menu&m=select");

        


    }
?>