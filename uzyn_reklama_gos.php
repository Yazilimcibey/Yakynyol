<?php include 'includes/conn.php'; ?>

<?php

$kaynak=$_FILES['surat']['tmp_name'];
$dosyaadi=$_FILES['surat']['name'];
$kaynak2=$_FILES['surat2']['tmp_name'];
$dosyaadi2=$_FILES['surat2']['name'];
$kaynak3=$_FILES['surat3']['tmp_name'];
$dosyaadi3=$_FILES['surat3']['name'];
$yol='images';

$link=$_POST['link'];
$haty=$_POST['text'];
$kat=$_POST['category'];

if(empty($link)){
    echo 'Bos goyberme';
}else{
    $kayit=mysqli_query($baglan,"insert into reklamalar_uzyn (surat,surat2,surat3,haty,link,kategoriya)value('$yol\/$dosyaadi','$yol\/$dosyaadi2','$yol\/$dosyaadi3','$haty','$link','$kat')");
    if($kayit){
        header('Location:add_long_ad.php');
        $yukle=move_uploaded_file($kaynak,$yol."/".$dosyaadi);
        $yukle=move_uploaded_file($kaynak2,$yol."/".$dosyaadi2);
        $yukle=move_uploaded_file($kaynak3,$yol."/".$dosyaadi3);
    }else{
        echo 'Bolmady';
    }
}
?>
