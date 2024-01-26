<?php 

    // ARRAY DIMENSI
    // $nama = array("joni","tejo","budi","siti",100,2.5);
    // var_dump($nama);
    // echo "<br>";
    // echo $nama[2];
    // echo "<br>";
    
    //cara pertama
    // for ($i=0; $i < 6; $i++) { 
    //     // echo $i;
    //     echo $nama[$i]."<br>";
    // }

    //cara kedua
    // foreach ($nama as $key) {
    //     echo $key.'<br>';
    // }

    //ARRAY ASOSIATIF
    // $nama = array(
    //     "joni" => "surabaya",
    //     "budi" => "malang raya",
    //     "tejo" => "semarang",
    //     "siti" => "jakarta",
    // );

    $nama["joni"]="surabaya";
    $nama["tejo"]="malang";
    $nama["budi"]="semarang";
    $nama["siti"]="jakarta";
    $nama["edi"]="sidoarjo";

    var_dump($nama);
    echo "<br>";
    // echo $nama['budi'];

    foreach ($nama as $key => $value) {
        echo $key.' => '. $value;
        echo "<br>";
    }


?>