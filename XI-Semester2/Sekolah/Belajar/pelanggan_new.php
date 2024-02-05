<?php
    $host="127.0.0.1";
    $user="root";
    $password="";
    $db="dbtoko";
    $koneksi= new mysqli($host, $user, $password,$db);


    $id=0;
    $namapelanggan="";
    $alamat="";
    $telpon=0;

    if(isset($_GET["ubah"])){
        $id=$_GET["ubah"];
        $sql="SELECT * FROM pelanggan WHERE id=".$id ;
        $hasil=mysqli_query($koneksi, $sql);

        if(mysqli_num_rows($hasil)>0){
            $row=mysqli_fetch_array($hasil);
            $id=$row[0];
            $namapelanggan=$row[1];
            $alamat=$row[2];
            $telpon=$row[3];
        }
       
    }
?>
    <div>
        <h1>Daftar Pelanggan</h1>    
    <form action="" method="post">
        Nama Pelanggan :
        <input type="text" name="pelanggan" placeholder="Nama Pelanggan" value="<?php echo $namapelanggan?>"><br>
        Alamat Pelanggan :
        <input type="text" name="alamat" placeholder="alamat pelanggan" value="<?php echo $alamat?>"><br>
        Nomer Telpon :
        <input type="number" name="telpon" placeholder="telpon pelanggan" value="<?php echo $telpon?>"><br>
        <input type="submit" name="simpan" value="simpan">
        <input type="hidden" name="id" value="<?php echo $id ?>">
    </form>
    </div>
    <br><br>

    <?php 
        $namapelanggan=$_POST["pelanggan"] ?? null;
        $alamat=$_POST["alamat"] ?? null ;
        $telpon=$_POST["telpon"] ?? null  ;

        
        if(isset($_POST["id"])){
            $id=$_POST["id"];
            if($id==0){
                $sql="INSERT INTO pelanggan(namapelanggan, alamat, telpon) VALUES('$namapelanggan', '$alamat',$telpon)";
                $hasil=mysqli_query($koneksi,$sql);
            } 
            else{
                $sql="UPDATE pelanggan SET namapelanggan='$namapelanggan',alamat='$alamat',telpon=$telpon WHERE id=".$id;
                $hasil=mysqli_query($koneksi, $sql);
                header("http://localhost/XI-Semester2/Sekolah/Belajar/pelanggan_new.php");
            }
        }
    
    

    if(isset($_GET["hapus"])){
        $id=$_GET["hapus"];
        $sql="DELETE FROM pelanggan WHERE id=".$id;
        $hasil=mysqli_query($koneksi, $sql);
    }

    $sql="SELECT * FROM pelanggan";
    $hasil=mysqli_query($koneksi, $sql);

  
    echo "  <table id='tabel' border=2px margin=auto_margin>
    <thead>
        <tr>
            <th>
                Nama Pelanggan
            </th>
            <th>
                Alamat
            </th>
            <th>
                Nomor Telepon
            </th>
            <th>
                Hapus
            </th> 
            <th>
                Ubah
            </th>
        </tr>
    </thead>
    <tbody>
        ";

        while($row= mysqli_fetch_array($hasil)){
            echo "<tr>";
            echo "<td>" . $row[1] . "</td>" ;
            echo "<td>". $row[2]. "</td>" ;
            echo "<td>". $row[3]. "</td>";
            echo "<td>". "<a href='?hapus=".$row[0]."'>hapus</a>"."</td>";
            echo "<td>". "<a href='?ubah=". $row[0]."'>ubah</a>"."</td>";
            echo "</tr>";
        }

        echo"
        </tr>
    </tbody>
</table>";
    
    ?>
</html>