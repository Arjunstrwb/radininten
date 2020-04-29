<?php
include "../include/connect.php";
include "../include/session.php"; 

$nip 	    = $_POST["nip"];
$nama	    = $_POST["nama"];
$jabatan 	= $_POST["jabatan"];
$unit 	    = $_POST["unit"];
$password 	= $_POST["password"];
$role	    =$_POST["role"];

if ($add = mysqli_query($connect, "INSERT INTO pegawai VALUES ('$nip', '$nama', '$jabatan', '$unit', '$password', '$role')")){
		header("Location: dokter.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($connect));

?>