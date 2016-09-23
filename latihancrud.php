<?php
	$koneksi = mysqli_connect("localhost","root","","latihankomandrophp");
	$sql = "select * from user";

	if(isset($_GET['id'])){
		$iduserdelete = $_GET['id'];
		$querydelete = "DELETE from user where id_user = '$iduserdelete'";
		$eksekusidelete = mysqli_query($koneksi, $querydelete);
		if($eksekusidelete) {
			header('location:latihancrud.php');
		}
	} else { ?>
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
					header('location:latihancrud.php');
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
	      <td>Aksi</td>
	    </tr>
	    <?php
			$no = 1;
			while($data=mysqli_fetch_array($eksekusi)){ ?>
	      <tr>
	        <td><?php echo $no; ?></td>
	        <td><?php echo $data[1]; ?></td>
	        <td><?php echo $data[2]; ?></td>
	        <td><?php echo $data[3]; ?></td>
					<td>
						<a href="latihancrud.php?id=<?php echo $data[0]; ?>">DELETE</a>
						<a href="update_form.php?id=<?php echo $data[0];?>">UPDATE</a>
					</td>
	      </tr>
	      <?php
				$no++;
	    }
	    ?>
	    </table>
	    <?php
	  }
	}
	    mysqli_close($koneksi);
	 ?>
