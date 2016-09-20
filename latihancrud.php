<?php
  $koneksi = mysqli_connect("localhost","root","","latihankomandrophp");
  ?>
<form action="" method="post">
  <input type="text" name="nama"><br>
  <input type="text" name="email"><br>
  <textarea name="alamat"></textarea><br>
  <input type="submit" name="simpan" value="SIMPAN">
</form>
<?php
  if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $queryinsert = "insert into user values('','$nama','$email','$alamat')";
    $hasil = mysqli_query($koneksi,$queryinsert);
    if($hasil){
      echo "SUKSES MENAMBAH DATA";
    } else {
      echo "GAGAL MENAMBAH DATA";
    }
  }
?>


  <?php
  $sql = "select * from user";
  $eksekusi = mysqli_query($koneksi,$sql);

  //MENGEKSEKUSI QUERY
  if($eksekusi){ ?>
    <table border="1">
      <tr>
      <td>No</td>
      <td>Nama</td>
      <td>Email</td>
      <td>Alamat</td>
    </tr>
    <?php while($data=mysqli_fetch_array($eksekusi)){ ?>
      <tr>
        <td><?php echo $data[0]; ?></td>
        <td><?php echo $data[1]; ?></td>
        <td><?php echo $data[2]; ?></td>
        <td><?php echo $data[3]; ?></td>
      </tr>
      <?php
    }
    ?>
    </table>
    <?php
  }
    mysqli_close($koneksi);
 ?>
