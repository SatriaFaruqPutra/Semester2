<?php 

    // $nama = array('tejo','budi','siti',100);

    // var_dump($nama);
    // echo '<br>';

    // foreach ($nama as $key => $value) {
    //     echo $key.'<br>';
    // }

    $nama = array(
        "joni" => "surabaya",
        "budi" => "malang raya",
        "tejo" => "semarang",
        "siti" => "jakarta",
    );

    var_dump($nama);
    echo "<br>";

    foreach ($nama as $key => $value) {
        echo $key.' => '. $value;
        echo "<br>";
    }
?>