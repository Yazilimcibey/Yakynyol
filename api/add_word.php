<?php
$baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');

$turkmence=$_POST['turkmence'];

$beyleki=$_POST['beylekidil'];

$description=$_POST['description'];

$dosyaadi=$_POST['audio_another'];

$dosyaadi2=$_POST['audio_turkmen'];

$yol='words';

$gosmaca1 = $_POST['gosmaca1'];

$gosmaca2 = $_POST['gosmaca2'];

$gosmaca3 = $_POST['gosmaca3'];

$lesson_name = $_POST['lesson_name'];

$query = mysqli_query($baglan, "select * from dersler where dersin_ady='$lesson_name'");
$lesson_id = mysqli_fetch_array($query)['id'];  
// echo mysqli_error($baglan);
$kayit=mysqli_query($baglan,"insert into inlisce_sozler (turkmence,inlisce,gosmaca1,gosmaca2,gosmaca3,dogrytext,aydym,aydym2,sapagy)value('$turkmence','$beyleki','$gosmaca1','$gosmaca2','$gosmaca3','$description','$yol\/$dosyaadi','$yol\/$dosyaadi2','$lesson_id')");
if($kayit){
    echo "boldy";
}else{
    echo mysqli_error($baglan);
}


