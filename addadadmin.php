
<?php include 'includes/conn.php'; ?>

<?php

$kaynak=$_FILES['surat']['tmp_name'];
$dosyaadi=$_FILES['surat']['name'];
$yol='images';

$link=$_POST['link'];

if(empty($link)){
    echo 'Bos goyberme';
}else{
    $kayit=mysqli_query($baglan,"insert into uzyn_reklama (surat,link,cat)value('$yol\/$dosyaadi','$link',1)");
    if($kayit){
        header('Location:reklamagosadmin.php');
        $yukle=move_uploaded_file($kaynak,$yol."/".$dosyaadi);
    }else{
        echo 'Bolmady';
    }
}
?>
