<?php
$baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');
$turkmence=$_POST['turkmence'];
$turkmence2 = $_POST['turkmence2'];
$beylekidil2 = $_POST['beylekidil2'];
$beyleki=$_POST['beylekidil'];

$description = "Dogry Berekella";
$yalnystext = "Ýalňyşdyňyz! Täzeden...";

$dosyaadi=$_POST['audio_another'];
$dosyaadi2=$_POST['audio_turkmen'];
$dosyaadi3=$_POST['audio_another2'];
$dosyaadi4=$_POST['audio_turkmen2'];
$yol='words';

$gosmaca1 = $_POST['gosmaca1'];
$gosmaca2 = $_POST['gosmaca2'];


$lesson_name = $_POST['lesson_name'];

$query = mysqli_query($baglan, "select * from dersler where dersin_ady='$lesson_name'");
$lesson_id = mysqli_fetch_array($query)['id']; 

$kayit2=mysqli_query($baglan,"insert into inlisce_text(turkmence,inlisce,turkmence2,inlisce2,gosmaca1,gosmaca2,description,yalnystext,sapagy,kat,music,aydym2,music2,aydym3)value('$turkmence','$beyleki','$turkmence2','$beylekidil2','$gosmaca1','$gosmaca2','$description','$yalnystext','$lesson_id',1,'$yol\/$dosyaadi','$yol\/$dosyaadi2','$yol\/$dosyaadi4','$yol\/$dosyaadi3')");

if ($kayit2) {
    echo 'boldy';
}else{
    echo mysqli_error($baglan);
}
        ?>