<?php include 'includes/conn.php'; ?>

<?php

$turkmence=$_POST['turkmence'];
$beyleki=$_POST['beylekidil'];
$turkmence2=$_POST['turkmence2'];
$beyleki2=$_POST['beylekidil2'];
$id = $_GET['id'];
$description=$_POST['description'];
$yalnystext=$_POST['yalnystext'];
$gosmaca1 = $_POST['gosmaca1'];
$gosmaca2 = $_POST['gosmaca2'];

$kaynak=$_FILES['aydym']['tmp_name'];
$dosyaadi=$_FILES['aydym']['name'];
$kaynak2=$_FILES['aydym2']['tmp_name'];
$dosyaadi2=$_FILES['aydym2']['name'];
$yol='words';
echo $id;
clearstatcache();
if(filesize($kaynak2)) {
    if(filesize($kaynak)) {
        $kayit=mysqli_query($baglan,"update inlisce_text set turkmence='$turkmence',inlisce='$beyleki',turkmence2='$turkmence2',inlisce2='$beyleki2',gosmaca1='$gosmaca1',gosmaca2='$gosmaca2',description='$description',yalnystext='$yalnystext',aydym='$yol\/$dosyaadi',aydym2='$yol\/$dosyaadi2' where id='$id'");        
        if ($kayit) {
            move_uploaded_file($kaynak,$yol.'/'.$dosyaadi);    
            move_uploaded_file($kaynak2,$yol.'/'.$dosyaadi2);
            header("Location:manage_words.php?value=grammar");
        }else{
            echo mysqli_error($baglan);
        }
    }else{
    $kayit=mysqli_query($baglan,"update inlisce_text set turkmence='$turkmence',inlisce='$beyleki',turkmence2='$turkmence2',inlisce2='$beyleki2',gosmaca1='$gosmaca1',gosmaca2='$gosmaca2',description='$description',yalnystext='$yalnystext',aydym2='$yol\/$dosyaadi2' where id='$id'");        
    if ($kayit) {
        move_uploaded_file($kaynak2,$yol.'/'.$dosyaadi2);
        header("Location:manage_words.php?value=grammar");
    }else{
        echo mysqli_error($baglan);
    }
}
}else{
    if(filesize($kaynak)) {
        $kayit=mysqli_query($baglan,"update inlisce_text set turkmence='$turkmence',inlisce='$beyleki',turkmence2='$turkmence2',inlisce2='$beyleki2',gosmaca1='$gosmaca1',gosmaca2='$gosmaca2',description='$description',yalnystext='$yalnystext',aydym='$yol\/$dosyaadi' where id='$id'");        
        if ($kayit) {
            move_uploaded_file($kaynak,$yol.'/'.$dosyaadi);
            header("Location:manage_words.php?value=grammar");    
        }else{
            echo mysqli_error($baglan);
        }
    }else{
    $kayit=mysqli_query($baglan,"update inlisce_text set turkmence='$turkmence',inlisce='$beyleki',turkmence2='$turkmence2',inlisce2='$beyleki2',gosmaca1='$gosmaca1',gosmaca2='$gosmaca2',description='$description',yalnystext='$yalnystext' where id='$id'");        
    if ($kayit) {
        echo $id;
        header("Location:manage_words.php?value=grammar");        
    }else{
        echo mysqli_error($baglan);
    }
}
}
        // $kayit=mysqli_query($baglan,"insert into inlisce_sozler (turkmence,inlisce,gosmaca1,gosmaca2,gosmaca3,description,yalnystext,aydym,aydym2,sapagy)value('$turkmence','$beyleki','$gosmaca1','$gosmaca2','$gosmaca3','$description','$yalnystext','$yol\/$dosyaadi','$yol\/$dosyaadi2','$kategoriya')");

?>