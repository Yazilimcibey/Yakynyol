<?php include 'includes/conn.php'; ?>


<?php
session_start();

$teswir=$_POST['teswir'];
$ulad=$_SESSION['username'];
$dersi=$_GET['id'];


if(empty($teswir)){
    echo 'Bos goyberme';
}else{
    if(isset($_GET['value'])){
        $kayit=mysqli_query($baglan,"insert into teswirler_ulanyjy_reklama (ulanyjy_ady,text,reklama)value('$ulad','$teswir','$dersi')");
 
 if($kayit){
     header('Location:mugallymlar.php');
 }else{
     echo 'bolmady';
 }
    }else if(isset($_GET['value2'])){
        $kayit=mysqli_query($baglan,"insert into teswirler_ulanyjy_reklama (ulanyjy_ady,text,reklama,aktif)value('$ulad','$teswir','$dersi',1)");
 
 if($kayit){
     header('Location:rugsatbermedikler.php');
 }else{
     echo 'bolmady';
 }
    }else{
        $kayit=mysqli_query($baglan,"insert into teswirler_uzyn_reklama (ulanyjy_ady,text,reklama)value('$ulad','$teswir','$dersi')");
        if($kayit){
            header('Location:jan.php');
        }else{
            echo 'bolmady';
        }
    }
}

?>

 
 