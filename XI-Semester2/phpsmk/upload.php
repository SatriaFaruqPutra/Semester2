<form action="" method="post" enctype="multipart/form-data">

    pilih file gambar :
    <input type="file" name="upload" id="">
    <input type="submit" name="kirim" value="simpan">

</form>

<?php 

    if (isset($_POST['upload'])) {

        $file = $_FILES['upload'];
        
        // var_dump($_FILES['']);

        foreach ($variable as $key => $value) {
            echo $key. '='.$value;
            echo '<br>';
        }

        $name = $_FILES['upload']['name'];
        $temp = $_FILES['upload']['tap_name'];

        echo $name. '='. $temp;

        move_uploaded_file($temp, 'gambar/'. $name);
        
    }


?>