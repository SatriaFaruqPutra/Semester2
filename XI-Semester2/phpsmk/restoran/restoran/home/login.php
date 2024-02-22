<div class="row">

<div class="col-4 mx-auto mt-4">

<div><h1>SIGN IN</h1></div>

    <div class="form-group">
        <form action="" method="post">
            <div class="form-group">
                <label for="">EMAIL</label>
                <input type="email" name="email" require placeholder="email" class="form-control">

            </div>

            <div class="form-group">
                <label for="">PASSWORD</label>
                <input type="password" name="password" require placeholder="password" class="form-control">

            </div>
            
            <div>
                <input type="submit" value="Masuk" name="simpan" class="btn btn-primary mt-2">
            </div>
        </form>
    </div>

</div>
</div>

<?php 

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1";

        $count = $db->rewCOUNT($sql);

        if ($count == 0) {
            echo "<center><h3>TIDAK VALID</h3></center>";
        } else {

            $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1";

            $row=$db->getITEM($sql);

            
            $_SESSION['pelanggan']=$row['email'];
            $_SESSION['idpelanggan']=$row['idpelanggan'];

            header("location:index.php");
        }
        
    }

?> 