<?php
    $host="127.0.0.1";
    $user="root";
    $password="";
    $db="dbtoko";
    $koneksi= new mysqli($host, $user, $password,$db);


    $id=0;
    $namabarang="";
    $harga=0;
    $stok=0;

    if(isset($_GET["ubah"])){
        $id=$_GET["ubah"];
        $sql="SELECT * FROM barang1 WHERE id=".$id ;
        $hasil=mysqli_query($koneksi, $sql);

        if(mysqli_num_rows($hasil)>0){
            $row=mysqli_fetch_array($hasil);
            $id=$row[0];
            $namabarang=$row[1];
            $harga=$row[2];
            $stok=$row[3];
        }
       
    }
?>
    <div>
        <h1>Daftar Barang dan Harga</h1>    
    <form action="" method="post">
        Nama Barang :
        <input type="text" name="barang" placeholder="Nama Barang" value="<?php echo $namabarang?>"><br>
        Harga Barang :
        <input type="number" name="harga" placeholder="Harga Barang" value="<?php echo $harga?>"><br>
        Stok Barang :
        <input type="number" name="stok" placeholder="Stok Barang" value="<?php echo $stok?>"><br>
        <input type="submit" name="simpan" value="simpan">
        <input type="hidden" name="id" value="<?php echo $id ?>">
    </form>
    </div>
    <br><br>

    <?php 
        $namabarang=$_POST["barang"] ?? null;
        $harga=$_POST["harga"] ?? null ;
        $stok=$_POST["stok"] ?? null  ;

        
        if(isset($_POST["id"])){
            $id=$_POST["id"];
            if($id==0){
                $sql="INSERT INTO barang1(namabarang, harga, stok) VALUES('$namabarang', $harga ,$stok)";
                $hasil=mysqli_query($koneksi,$sql);
            } 
            else{
                $sql="UPDATE barang1 SET namabarang='$namabarang',harga=$harga,stok=$stok WHERE id=".$id;
                $hasil=mysqli_query($koneksi, $sql);
                header("http://localhost/XI-Semester2/Sekolah/Belajar/barang_new.php");
            }
        }
    
    

    if(isset($_GET["hapus"])){
        $id=$_GET["hapus"];
        $sql="DELETE FROM barang1 WHERE id=".$id;
        $hasil=mysqli_query($koneksi, $sql);
    }

    $sql="SELECT * FROM barang1";
    $hasil=mysqli_query($koneksi, $sql);

  
    echo "  <table id='tabel' border=2px margin=auto_margin>
    <thead>
        <tr>
            <th>
                Nama Barng
            </th>
            <th>
                Harga Barang
            </th>
            <th>
                Stok Barang
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