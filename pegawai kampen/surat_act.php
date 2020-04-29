<?php 
//include 'koneksi.php';

include "../include/connect.php";
include "../include/session.php"; 

$nomor_dokumen	 	    	= $_POST["nomor_dokumen"];
$nama_dokumen		   		= $_POST["nama_dokumen"];
$tanggal_dokumen    	 	= $_POST["tanggal_dokumen"];
 
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif', 'pdf');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:home.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'file/'.$rand.'_'.$filename);
		mysqli_query($connect, "INSERT INTO dokumen VALUES($nomor_dokumen,'$nama_dokumen','$tanggal_dokumen','$xx')");
		header("location:home.php?alert=berhasil");
	}else{
		header("location:home.php?alert=gagak_ukuran");
	}
}