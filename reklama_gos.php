<?php include 'includes/conn.php'; ?>

<?php

$kaynak=$_FILES['surat']['tmp_name'];
$dosyaadi=$_FILES['surat']['name'];
$yol='images';

$link=$_POST['link'];

if(empty($link)){
    echo 'Bos goyberme';
}else{
    $kayit=mysqli_query($baglan,"insert into reklamalar (surat,link)value('$yol\/$dosyaadi','$link')");
    if($kayit){
        header('Location:add_ad.php');
        $yukle=move_uploaded_file($kaynak,$yol."/".$dosyaadi);
    }else{
        echo 'Bolmady';
    }
}

?>