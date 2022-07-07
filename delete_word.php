<?php
$baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');

$id=$_GET['id'];
$action=$_GET['action'];
if(isset($_GET['action2'])){
$action2=$_GET['action2'];}

if($action=='soz'){$word='inlisce_sozler';}else if($action=='grammar'){$word='inlisce_text';}else{$word='inlisce_text';}
if($action=='user'){
    $kayit=mysqli_query($baglan,"delete from ulanyjylar where id='$id'");
}else if($action=='text2'){$query=mysqli_query($baglan,"select * from text where id='$id'");
    while($row=mysqli_fetch_array($query)){
            unlink($row['ses']);
            unlink($row['aydym2']);
    }
    $kayit=mysqli_query($baglan,"delete from text where id='$id'");
}else if($action=='ad'){$query=mysqli_query($baglan,"select * from reklamalar_uzyn where id='$id'");
    while($row=mysqli_fetch_array($query)){
            unlink($row['surat']);
            unlink($row['surat2']);
            unlink($row['surat3']);
    }
    $kayit=mysqli_query($baglan,"delete from reklamalar_uzyn where id='$id'");
}else if($action=='lesson'){
    $kayit=mysqli_query($baglan,"delete from dersler where id='$id'");
}else{$query=mysqli_query($baglan,"select * from $word where id='$id'");
    while($row=mysqli_fetch_array($query)){
            unlink($row['music']);
    }
    $kayit=mysqli_query($baglan,"delete from $word where id='$id'");
}
if($kayit){
    if($action=='soz'){
        if($action2=='duzet'){
        header('Location:add_word.php');
    }else{
            header('Location:manage_words.php?value=words');
        }}else 
        if($action=='grammar'){
            if($action2=='duzet'){
            header('Location:add_word.php');}
            else{
                header('Location:manage_words.php?value=grammar');
            }}else
            if($action=='text'){
                if($action2=='duzet'){
                header('Location:add_text.php');}
                else{
                    header('Location:manage_words.php?value=text');
                }}else
                if($action=='text2'){
                    if($action2=='duzet'){
                    header('Location:add_text.php');}
                    else{
                        header('Location:manage_words.php?value=text2');
                    }}else if($action=='user'){
                    header('Location:manage_users.php');
                }else if($action=='lesson'){
                    header('Location:manage_lessons.php');
                }else{
                    header('Location:jan.php');
                }
}
?>