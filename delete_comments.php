<?php include 'includes/conn.php'; ?>

<?php

$id=$_GET['id'];
if(isset($_GET['value'])){
    $kayit=mysqli_query($baglan,"delete from teswirler_uzyn_reklama where id='$id'");
    $location='jan.php';
}else{
$kayit=mysqli_query($baglan,"delete from teswirler_ulanyjy_reklama where id='$id'");
$location='mugallymlar.php';
}
if($kayit){
    header("Location:$location");
}
?>