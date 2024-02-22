
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-40 float-left">
            <label for="">Tanggal Awal</label>
            <input type="date" name="awal" require class="form-control">

        </div>

        <div class="form-group w-40">
            <label for="">Tanggal Akhir</label>
            <input type="date" name="akhir" require class="form-control">

        </div>

        <div>
            <input type="submit" value="simpan" name="simpan" class="btn btn-primary mt-2">
        </div>
    </form>
</div>


<?php 

    


    $jumlahdata = $db->rewCOUNT("SELECT idorderdetail FROM vorderdetail");
    $banyak = 2;

    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai = ($p * $banyak) - $banyak;

    } else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM vorderdetail ORDER BY idorderdetail  DESC LIMIT $mulai,$banyak";

    if (isset($_POST['simpan'])) {
        $awal = $_POST['awal'];
        $akhir = $_POST['akhir'];

        $sql = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$awal' AND '$akhir'";

    }

    $row = $db->getALL($sql);

    $no=1+$mulai;


    $total=0;
?>


<h3>ORDER</h3>
<table class="table table-bordered border-primary w-50">
    <thead>
            <tr>
                <th>NO</th>
                <th>Tanggal</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Pelanggan</th>
                <th>Alamat</th>

            </tr>
        </thead>
        <tbody>
        <?php if(!empty($row)) { ?>
            <?php foreach ($row as $r): ?>
                <?php 
                    if ($r['status']==0) {
                        $status = '<td><a href="?f=order&m=bayar&id='.$r['idorder'].'">Bayar</a></td>';
                        
                    }else {
                        $status = '<td>Lunas</td>';
                    }
                    
                    ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $r['pelanggan']?></td>
                <td><?php echo $r['tglorder']?></td>
                <td><?php echo $r['menu']?></td>
                <td><?php echo $r['harga']?></td>
                <td><?php echo $r['jumlah']?></td>
                <td><?php echo $r['jumlah']*$r['harga']?></td>
                <td><?php echo $r['alamat']?></td>
                <?php echo $status?>


                <?php 
                
                    $total = $total + ($r['jumlah'] * $r['harga']);
                
                ?>
                
            </tr>
            <?php endforeach ?>
            <?php }?>

                    <td>
                        <h3 colspan="6">TOTAL PEMBAYARAN</h3>
                    </td>

                    <td><h4><?php echo $total?> </h4></td>

        </tbody>
</table>

<?php 

        for ($i=1; $i < $halaman; $i++) { 
            echo '<a href="?f=orderdetail&m=select&p='.$i.'">'.$i.'</a>';
            echo '&nbsp &nbsp &nbsp';
        }

?>