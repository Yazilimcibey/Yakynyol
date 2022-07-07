<?php
session_start();
$baglan=mysqli_connect('localhost','root','','dil')or die('Baglanamadim');

$ad=$_POST['ulanyjy_ady'];
$sifre=$_POST['parol'];
$parola=md5($sifre);

$kontrol=mysqli_query($baglan,"select * from ulanyjylar where ulanyjy_ady='$ad' and parol='$parola' and aktif=1");
$bilgi=mysqli_fetch_array($kontrol);
if (mysqli_num_rows($kontrol)>0) {
	if($bilgi['wezipe']==2){
	$_SESSION['username']='admin';
	$_SESSION['mail']=$bilgi['email'];
	$_SESSION['id']=$bilgi['id'];
	}else{
	$_SESSION['username']=$ad;
	$_SESSION['mail']=$bilgi['email'];
	$_SESSION['id']=$bilgi['id'];}
	if ($bilgi['teswir']==1) {
		$_SESSION['teswir']='hawa';
	}else{
		$_SESSION['teswir']='yok';
	}
	// echo $bilgi;
	header('Location:profil.php');
}else{
	echo "basarisiz";
}
?>

