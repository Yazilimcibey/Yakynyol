
<?php include 'includes/conn.php'; ?>

<?php

$ad=$_POST['name_news'];
$news=$_POST['news'];

if(empty($ad) || empty($news)){
    echo 'Bos goyberme';
}else{
    $kayit=mysqli_query($baglan,"insert into habarlar (ady,ozeti,habar)value('$ad','$news','$news')");
    if($kayit){
        header('Location:index.php');
    }
                
}

?>