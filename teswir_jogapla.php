<?php
session_start();
$baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');

$teswir=$_POST['jogap'];
$ulad=$_SESSION['username'];
$dersi=$_SESSION['sapagy'];
$teswir_id=$_GET['id'];

if(empty($teswir)){
    echo 'Bos goyberme';
}else{
    if(isset($_GET['value'])){
    $kayit=mysqli_query($baglan,"insert into teswirler(teswir,ulanyjyady,wagty,dersi,kat,teswir_id)value('$teswir','$ulad','0','$dersi',2,'$teswir_id')");
    if($kayit){
        header('Location:jan.php');
    }else{
        echo 'bolmady';
    }}else if(isset($_GET['value2'])){
        $kayit=mysqli_query($baglan,"insert into teswirler(teswir,ulanyjyady,wagty,dersi,kat,teswir_id)value('$teswir','$ulad','0','$dersi',3,'$teswir_id')");
        if($kayit){
            header('Location:mugallymlar.php');
        }else{
            echo 'bolmady';
        }}else{
    $kayit=mysqli_query($baglan,"insert into teswirler(teswir,ulanyjyady,wagty,dersi,kat,teswir_id)value('$teswir','$ulad','0','$dersi',1,'$teswir_id')");   
    
    if($kayit){
        header('Location:girish.php');
    }else{
        echo 'bolmady';
    }}
    
}
?>
