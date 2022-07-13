<?php include 'includes/conn.php'; ?>

<?php

$id=$_GET['id'];
$sert=$_GET['value'];

if($sert==1){
    $kayit=mysqli_query($baglan,"update ulanyjylar set aktif=1 where id='$id'");
    if($kayit){
        header('Location:users_passive.php');
    }else{
        echo 'Bolmady';
    }
}else if($sert==2){
    $kayit=mysqli_query($baglan,"delete from ulanyjylar where id='$id'");
    if($kayit){
        header('Location:users_passive.php');
    }else{
        echo 'Bolmady';
    }
}
?>
