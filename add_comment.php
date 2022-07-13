
<?php include 'includes/conn.php'; ?>

<?php
session_start();

$teswir=$_POST['teswir'];
$ulad=$_SESSION['username'];
$dersi=$_SESSION['sapagy'];

if(empty($teswir)){
    echo 'Bos goyberme';
}else{
    $kayit=mysqli_query($baglan,"insert into teswirler (teswir,ulanyjyady,wagty,dersi)value('$teswir','$ulad','0','$dersi')");
    if($kayit){
        header('Location:girish.php');
    }else{
        echo 'bolmady';
    }
    
}

?>
