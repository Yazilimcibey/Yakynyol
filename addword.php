<?php
$baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');

$turkmence=$_POST['turkmence'];
$beyleki=$_POST['beylekidil'];
$kategoriya=$_POST['kategoriya'];
$description=$_POST['description'];
$gornus=$_POST['gornus'];
$yalnystext=$_POST['yalnystext'];

$kaynak=$_FILES['aydym']['tmp_name'];
$dosyaadi=$_FILES['aydym']['name'];
$kaynak2=$_FILES['aydym2']['tmp_name'];
$dosyaadi2=$_FILES['aydym2']['name'];
$yol='words';

$kayit=False;
    if ($gornus=='soz') {
        $gosmaca1 = $_POST['gosmaca1'];
        $gosmaca2 = $_POST['gosmaca2'];
        $gosmaca3 = $_POST['gosmaca3'];
        $kayit=mysqli_query($baglan,"insert into inlisce_sozler (turkmence,inlisce,gosmaca1,gosmaca2,gosmaca3,dogrytext,yalnystext,aydym,aydym2,sapagy)value('$turkmence','$beyleki','$gosmaca1','$gosmaca2','$gosmaca3','$description','$yalnystext','$yol\/$dosyaadi','$yol\/$dosyaadi2','$kategoriya')");
    }
    if($gornus=='text'){
        $kayit2=mysqli_query($baglan,"insert into text(turkmence,inlisce,ses,surat_inlisce,sapagy)value('$turkmence','$beyleki','$yol\/$dosyaadi2','images\/$dosyaadi','$kategoriya')");
    }
        if($kayit2){
            header('Location:add_word.php');
            $yukle=move_uploaded_file($kaynak2,$yol."/".$dosyaadi2);
            $yukle=move_uploaded_file($kaynak,"images/".$dosyaadi);

        }else if($kayit){
            header('Location:add_word.php');
            $yukle=move_uploaded_file($kaynak2,$yol."/".$dosyaadi2);
            $yukle=move_uploaded_file($kaynak,$yol."/".$dosyaadi);

        }{
            echo mysqli_error($baglan);
        }
        if($gornus=='text2'){
            $kaynak3=$_FILES['aydym3']['tmp_name'];
            $dosyaadi3=$_FILES['aydym3']['name'];
            $kaynak4=$_FILES['aydym4']['tmp_name'];
            $dosyaadi4=$_FILES['aydym4']['name'];
            $gosmaca1 = $_POST['gosmaca1'];
            $gosmaca2 = $_POST['gosmaca2'];
            $kayit2=mysqli_query($baglan,"insert into inlisce_text(turkmence,inlisce,turkmence2,inlisce2,description,gosmaca1,gosmaca2,yalnystext,sapagy,kat,music,aydym2,music2,aydym3)value('$turkmence','$beyleki','$_POST[turkmence2]','$_POST[beylekidil2]','$description','$gosmaca1','$gosmaca2','$yalnystext','$kategoriya',1,'$yol\/$dosyaadi','$yol\/$dosyaadi2','$yol\/$dosyaadi3','$yol\/$dosyaadi4')");
        }
        if($kayit2){
            header('Location:add_text.php');
            $yukle=move_uploaded_file($kaynak,$yol."/".$dosyaadi);
            $yukle=move_uploaded_file($kaynak2,$yol."/".$dosyaadi2);
            $yukle=move_uploaded_file($kaynak3,$yol."/".$dosyaadi3);
            $yukle=move_uploaded_file($kaynak4,$yol."/".$dosyaadi4);
        }else{
            echo mysqli_error($baglan);
        }



?>