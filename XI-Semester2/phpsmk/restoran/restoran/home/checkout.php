<?php 

    if (isset($_GET['total'])) {
        $total = $_GET['total'];

        $idorder=idorder($sql);
        $idpelanggan = $_SESSION['idpelaggan'];
        $tglorder = date('Y-m-d');

        $sql = "SELECT * FROM tblorder WHERE idorder = $idorder";
        $count = $db->rowCOUNT($sql);

        if ($count==0) {
            insertOrder($idorder, $idpelanggan, $tglorder, $total);
            insertOrderDetail($idorder);

        }else {
            insertOrderDetail($idorder);

        }

        kosongkanSession();
        header("location?f=home&m=checkout");
        
    } else {
        info();
    }


    function idorder($sql) {
        global $db;

        $sql = "SELECT idorder FROM tblorder ORDER BY idorder DESC";

        $jumlah=$db->rewCOUNT($sql);

        if ($jumlah==0) {
            $idorder = 1;

        }else {
            $item=$db->getITEM($sql);
            $id = $item['idorder']+1;

        }

        return $id;
    }



    function insertOrder($idorder, $idpelanggan, $tglorder, $total) {
        global $db;

        $sql = "INSERT INTO tblorder VALUES ($idorder, $idpelanggan, '$tglorder', $total,0,0,0)";

        echo $sql;

        $db->runSQL($sql);

    }


    function insertOrderDetail($idorder) {

        global $db;

        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan' && $key<>'idpelanggan' && $key<>'user' && $key<>'level' && $key<>'iduser') {

                $id = substr($key,1);

                $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";

                $row=$db->getALL($sql);

                foreach ($row as $r) {

                    $idmenu = $r['idmenu'];
                    $harga = $r['harga'];

                    $sql = "INSERT INTO tblorderdetail VALUES ('',$idorder,$idmenu,$value,$harga)";

                    $db->runSQL($sql);
                }

            }
        }
        
    }


    function kosongkanSession() {
        
        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan' && $key<>'idpelanggan' && $key<>'user' && $key<>'level' && $key<>'iduser') {

                $id = substr($key,1);

                unset($_SESSION['_'.$id]);


            }
        }

    }

    function info() {
        echo '<h3>TERIMAKASIH SUDAH BERBELANJA</h3>';
    }

?>