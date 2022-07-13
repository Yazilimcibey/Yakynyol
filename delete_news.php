<?php include 'includes/conn.php'; ?>

<?php

$id=$_GET['id'];
$action=$_GET['action'];
$action2=$_GET['action2'];

if($action=='ad'){
    $query=mysqli_query($baglan,"select * from reklamalar_uzyn where id='$id'");
                while($row=mysqli_fetch_array($query)){
                        unlink($row['surat']);
                        unlink($row['surat2']);
                        unlink($row['surat3']);
                }
    $kayit=mysqli_query($baglan,"delete from reklamalar_uzyn where id='$id'");
}
if($kayit){
    if($action=='ad'){
        header('Location:jan.php');
}}
?>