<h3>INSERT user</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama user</label>
            <input type="text" name="user" require placeholder="isi user" class="form-control">

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

        <div class="form-group w-50">
            <label for="">Level</label>
            <select name="level" id="">

                <option value="admin">admin</option>
                <option value="koki">koki</option>
                <option value="kasir">kasir</option>

            </select>

        </div>

        <div>
            <input type="submit" value="simpan" name="simpan" class="btn btn-primary mt-2">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = hash('sha256', $_POST['password']);
        $konfirmasi =hash('sha256', $_POST['konfirmasi']);
        $level = $_POST['level'];

        if ($password === $konfirmasi) {
            
            $sql = "INSERT INTO tbluser VALUES ('','$user','$email','$password','$level',1)";

            $db->runSQL($sql);
            header("location:?f=user&m=select");
            
        }else {
            echo '<h2>PASSWORD TIDAK SESUAI</h2>';
        }

        
        
        // 

        // 
    }
?> 