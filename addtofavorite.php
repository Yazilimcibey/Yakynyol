<?php
$baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');

$id=$_GET['id'];
session_start();
$ad=$_SESSION['username'];
if(empty($id)){
    echo 'Bos goyberme';
}else{
    if(isset($_GET['w'])){
    $kontrol=mysqli_num_rows(mysqli_query($baglan,"select * from halanlarym where ulanyjy_ady='$ad' and reklama='$id'"));
    if($kontrol>0){
        echo 'Bu halanlaryma gosulan';
    }else{
        $kayit=mysqli_query($baglan,"insert into halanlarym (ulanyjy_ady,reklama2)value('$ad','$id')");
        if($kayit){
            header('Location:mugallymlar.php');
        }
    }
}else{
    $kontrol=mysqli_num_rows(mysqli_query($baglan,"select * from halanlarym where ulanyjy_ady='$ad' and reklama2='$id'"));
    if($kontrol>0){
        echo 'Bu halanlaryma gosulan';
    }else{
        $kayit=mysqli_query($baglan,"insert into halanlarym (ulanyjy_ady,reklama)value('$ad','$id')");
        if($kayit){
            header('Location:jan.php');
        }
    } 
}
}

?>