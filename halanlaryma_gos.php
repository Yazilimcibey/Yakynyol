<?php
$baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');

$id=$_GET['id'];
session_start();
$ad=$_SESSION['username'];
if(empty($id)){
    echo 'Bos goyberme';
}else{
    $kontrol=mysqli_num_rows(mysqli_query($baglan,"select * from halanlarym where ders='$id' and ulanyjy_ady='$_SESSION[username]'"));
    if($kontrol>0){
        echo 'Bu sapak halanlaryma gosulan';
    }else{
        $kayit=mysqli_query($baglan,"insert into halanlarym (ulanyjy_ady,ders)value('$ad','$id')");
        if($kayit){
            header("Location:choose_lesson.php");
        }
    }
}

?>