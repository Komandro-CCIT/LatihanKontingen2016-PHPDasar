<?php
	$koneksi = mysqli_connect("localhost","root","","latihankomandrophp");
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $queryselectupdate = "select * from user where id_user = '$id'";
    $query = mysqli_query($koneksi, $queryselectupdate);

    while($value=mysqli_fetch_array($query)) {
?>
<form action="" method="post">
  <input type="hidden" value="<?php echo $value[0]; ?>" name="idubah"><br>
  <input type="text" value="<?php echo $value[1]; ?>" name="namaubah"><br>
  <input type="text" value="<?php echo $value[2]; ?>" name="emailubah"><br>
  <textarea name="alamatubah"><?php echo $value[3]; ?></textarea><br>
  <input type="submit" name="simpanubah" value="UBAH">
</form>
<?php }
}
if(isset($_POST['simpanubah'])){
    $iduser = $_POST['idubah'];
    $nama = $_POST['namaubah'];
    $email = $_POST['emailubah'];
    $alamat = $_POST['alamatubah'];

    $queryupdateuser = "update user set nama = '$nama',
     email = '$email',alamat = '$alamat' where id_user = '$iduser'";
    $queryupdate = mysqli_query($koneksi, $queryupdateuser);
    if($queryupdate){
      header('location:latihancrud.php');
    }
}
  mysqli_close($koneksi);
 ?>
