<?php include 'includes/conn.php'; ?>
<?php

$ad=$_POST['ulanyjy_ady'];
$nomer=$_POST['nomer'];
$parol=$_POST['parol'];
$parol2=$_POST['parol2'];
$kod=md5($parol);

if(empty($ad) || empty($parol)){
    echo "Boş goýbermeli däl";
}else{
    if($parol!=$parol2){
        echo 'Açar sözleri meňzeş däl';
        }else{
                $kontrol=mysqli_num_rows(mysqli_query($baglan,"select * from ulanyjylar where ulanyjy_ady='$ad'"));
                if($kontrol>0){
                    echo 'Ulanyjy ady öň hem ulanylýar';
                }else{
                    $kayit=mysqli_query($baglan,"insert into ulanyjylar (ulanyjy_ady,parol,nomer)value('$ad','$kod','$nomer')");
                    if($kayit){
                        header('Location:Sazlamalar.php');
                    }
                }
            
    }
}

?>