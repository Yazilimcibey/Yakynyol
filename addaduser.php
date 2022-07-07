<?php
$baglan=mysqli_connect('localhost','root','','dil')or die('Baglanamadim');

session_start();

$kaynak=$_FILES['surat']['tmp_name'];
$dosyaadi=$_FILES['surat']['name'];
$yol='images';

$link=$_POST['link'];
$haty=$_POST['text'];
$kat=$_POST['category'];
$teswir=$_POST['teswir'];
$aktif=0;
$date=date("d-m-Y");

if(empty($link)){
    echo 'Bos goyberme';
}else{
    $kayit=mysqli_query($baglan,"insert into ulanyjy_reklama (ulanyjy_ady,text,surat,link,category,date,teswir,aktif)value('$_SESSION[username]','$haty','$yol\/$dosyaadi','$link','$kat','$date','$teswir','$aktif')");
    if($kayit){
        header('Location:reklamagosulanyjy.php');
        $yukle=move_uploaded_file($kaynak,$yol."/".$dosyaadi);
    }else{
        echo mysqli_error($baglan);
    }
}
?>
