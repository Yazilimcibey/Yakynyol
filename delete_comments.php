<?php
$baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');

$id=$_GET['id'];
if(isset($_GET['value'])){
    $kayit=mysqli_query($baglan,"delete from teswirler_uzyn_reklama where id='$id'");
    $location='jan.php';
}else{
$kayit=mysqli_query($baglan,"delete from teswirler where id='$id'");
$location='jan.php';
}
if($kayit){
    header("Location:$location");
}
?>