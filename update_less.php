<?php include 'includes/conn.php'; ?>

<?php

$id=$_GET['id'];
$ad=$_POST['ad'];
$link1=$_POST['link1'];
$link2=$_POST['link2'];
$link3=$_POST['link3'];
$soz1=$_POST['soz1'];
$soz2=$_POST['soz2'];
$soz3=$_POST['soz3'];
$durum=$_POST['durum'];

    $kayit=mysqli_query($baglan,"update dersler set dersin_ady='$ad',youtube='$link1',instagram='$link2',imo='$link3',soz1='$soz1',soz2='$soz2',soz3='$soz3',durum='$durum' where id='$id'");
    if($kayit){
        header('Location:manage_lessons.php');
    }else{
        echo 'Bolmady';
    }
?>
