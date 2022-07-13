<?php include 'includes/conn.php'; ?>

<?php

$ad=$_POST['ad'];
$link1=$_POST['link1'];
$link2=$_POST['link2'];
$link3=$_POST['link3'];
$soz1=$_POST['soz1'];
$soz2=$_POST['soz2'];
$soz3=$_POST['soz3'];
$kategoriya=$_POST['kategoriya'];
$main_language=$_POST['main_language'];
$durum=$_POST['durum'];

if(empty($ad)){
    echo 'Bos goyberme';
}else{
    $kontrol=mysqli_num_rows(mysqli_query($baglan,"select * from dersler where dersin_ady='$ad'"));
    if($kontrol>0){
        echo 'Beyle atly sapak bar';
    }else{
        $kayit=mysqli_query($baglan,"insert into dersler (dersin_ady,kategoriya,youtube,instagram,imo,soz1,soz2,soz3,bilyan_dili,durum)value('$ad','$kategoriya','$link1','$link2','$link3','$soz1','$soz2','$soz3','$main_language',$durum)");
        if($kayit){
            header('Location:addlesson.php');
        }else{
            echo 'bolmady';
        }
    }
}

?>
