<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbluser WHERE iduser=$id";
        $row = $dv->getITEM($sql);

        

    }

?>


<h3>Update user</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama user</label>
            <input type="text" name="user" require value="<?php echo $row['user']?>" class="form-control">
        </div>
        
        <div class="form-group w-50">
            <label for="">Email</label>
            <input type="email" name="email" require value="<?php echo $row['email']?>" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Password</label>
            <input type="password" name="password" require value="<?php echo $row['password']?>" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Komfirmasi Password</label>
            <input type="password" name="konfirmasi" require placeholder="password" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Level</label>
            <select name="level" id="">

                <option value="admin" <?php if ($row['level']==="admin") echo "selected"?> >admin</option>
                <option value="koki"  <?php if ($row['level']==="koki") echo "selected"?> >koki</option>
                <option value="kasir" <?php if ($row['level']==="kasir") echo "selected"?> >kasir</option>
                

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
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];
        $level = $_POST['level'];

        if ($password === $konfirmasi) {
            $sql = "UPDATE tbluser user='$user',email='$email',password='$password',level='$level' WHERE iduser=$id";

            

            header("location:?f=user&m=select");
            $db->runSQL($sql);
        }else {
            echo '<h2>PASSWORD TIDAK SESUAI</h2>';
        }
         
    }
?> 