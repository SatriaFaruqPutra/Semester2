<h3>Sign In</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama</label>
            <input type="text" name="pelanggan" require placeholder="isi nama" class="form-control">

        </div>

        <div class="form-group w-50">
            <label for="">Alamat</label>
            <input type="text" name="alamat" require placeholder="isi alamat" class="form-control">

        </div>

        <div class="form-group w-50">
            <label for="">No Telpon</label>
            <input type="text" name="telpon" require placeholder="isi nomer" class="form-control">

        </div>
        
        <div class="form-group w-50">
            <label for="">Email</label>
            <input type="email" name="email" require placeholder="email" class="form-control">

        </div>

        <div class="form-group w-50">
            <label for="">Password</label>
            <input type="password" name="password" require placeholder="password" class="form-control">

        </div>

        <div class="form-group w-50">
            <label for="">Komfirmasi Password</label>
            <input type="password" name="konfirmasi" require placeholder="password" class="form-control">

        </div>

        <div>
            <input type="submit" value="simpan" name="simpan" class="btn btn-primary mt-2">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $pelanggan = $_POST['pelanggan'];
        $alamat = $_POST['alamat'];
        $telpon = $_POST['telpon'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        if ($password === $konfirmasi) {
            $sql = "INSERT INTO tblpelanggan VALUES ('','$pelanggan','$alamat','$telpon','$email','$password',1)";
            $db->runSQL($sql);
            header("location:?f=home&m=info");
            
        }else {
            echo '<h2>PASSWORD TIDAK SESUAI</h2>';
        }

        
        
        // 

        // 
    }
?> 