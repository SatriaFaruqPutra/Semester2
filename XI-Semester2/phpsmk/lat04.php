<?php  

    // OPERATPR ARITMATIKA

    $a=9;
    $b=6;

    $c = $a+$b;
    echo $c.'<br>';

    $c = $a-$b;
    echo $c.'<br>';
    
    $c = $a*$b;
    echo $c.'<br>';
    
    $c = $a/$b;
    echo $c.'<br>'; // pembulatan ketas 'round' pembulatan ke bawah 'floor'

    $c = $a%$b;
    echo $c.'<br>';

    // OPERATOR LOGIKA

    $c = $a<$b;
    echo $c;

    $c = $a>$b;
    echo $c;

    $c = $a==$b;
    echo $c;

    $c = $a!=$b;
    echo $c.'<br>';

    // INCREMENT

    $a++;
    echo $a;

    // DICREMENT

    $b--;
    echo $b;

    //OPERATOR STRING

    $kata = 'kota';
    $kota = 'bogor';

    $hasil = $kata.$kota;

    $hasil.='kota hujan';
    echo $hasil;
    
?>