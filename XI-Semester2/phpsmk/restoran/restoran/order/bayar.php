<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tblorder WHERE idorder=$id";

        $row = $db->getITEM($sql);

        echo $id;

    }

?>

<h3>PEMBAYARAN</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-25">
            <label for="">TOTAL</label>
            <input type="number" name="total" require value="<?php echo $row['total']?>" class="form-control">

        </div>

        <div class="form-group w-25">
            <label for="">BAYR</label>
            <input type="number" name="bayar" require class="form-control">

        </div>

        <div>
            <input type="submit" value="Bayar" name="simpan" class="btn btn-primary mt-2">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $bayar = $_POST['bayar'];

        $kembali = $bayar-$row['total'];

        $sql = "UPDATE tblorder SET bayar='$kbayar', kembali=$kemabli, status=1 WHERE idorder=$id";

        if ($kembali < 0 ) {
            echo '<h4>Kurang</h4>';
        }else {
            $db->runSQL($sql);

        header("location:?f=order&m=select");
        }
        
        
    }
?>

