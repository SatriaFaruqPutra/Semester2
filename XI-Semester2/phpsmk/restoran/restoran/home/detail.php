<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $jumlahdata = $db->rewCOUNT("SELECT idorderdetail FROM vorderdetail WHERE idorder = '$id' ");
    $banyak = 6;

    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai = ($p * $banyak) - $banyak;

    } else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM vorderdetail WHERE idorder = '$id' ORDER BY idorderdetail ASC LIMIT $mulai,$banyak";
    $row = $db->getALL($sql);

    $no=1+$mulai;
?>


<h3>DETAIL</h3>
<table class="table table-bordered border-primary w-50">
    <thead>
            <tr>
                <th>NO</th>
                <th>Tanggal</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Harga</th>

            </tr>
        </thead>
        <tbody>
        <?php if(!empty($row)) { ?>
            <?php foreach ($row as $r): ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $r['tglorder']?></td>
                <td><?php echo $r['menu']?></td>
                <td><?php echo $r['harga']?></td>
                <td><?php echo $r['jumlah']?></td>
            </tr>
            <?php endforeach ?>
            <?php }?>
        </tbody>
</table>

<?php 

        for ($i=1; $i < $halaman; $i++) { 
            echo '<a href="?f=home&m=detail&id='.$r['idorder'].'&p='.$i.'">'.$i.'</a>';
            echo '&nbsp &nbsp &nbsp';
        }

?>