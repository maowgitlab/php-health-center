<?php
	session_start();
	include('koneksi.php');
	if(isset($_POST['Login'])){
		$username=$_POST['username'];
		$password=($_POST['password']);
		$query="select * from tb_user where username='$username' and password='$password'";
		$exe = mysqli_query($koneksi,$query);
			if(mysqli_num_rows ($exe)>=1){
				$data=mysqli_fetch_row($exe);
				$_SESSION['username']=$data[0];
				$_SESSION['status']=$data[2];
				echo"<script>alert('LOGIN BERHASIIIL!!');
				window.location = 'tampil_pasien.php';</script>";
			}else{
				echo"<script>alert('LOGIN GAGALLL!!!');
				window.location = 'tampil_login.php';</script>";
			}
	}else{
		echo"<script>window.location = 'tampil_login.php';</script>";
	}
	
	?>