<?php include 'includes/conn.php'; ?>

<?php

$id=$_GET['id'];
if(isset($_GET['action'])){  
        $query=mysqli_query($baglan,"select * from ulanyjy_reklama where id='$id'");
while($row=mysqli_fetch_array($query)){
        unlink($row['surat']);
}
$kayit=mysqli_query($baglan,"delete from ulanyjy_reklama where id='$id'");
$location='profil.php';
}else if(isset($_GET['uzyn'])){  
        $query=mysqli_query($baglan,"select * from uzyn_reklama where id='$id'");
while($row=mysqli_fetch_array($query)){
        unlink($row['surat']);
}
        $kayit=mysqli_query($baglan,"delete from uzyn_reklama where id='$id'");
        $location='manage_ads.php';
        }else{$query=mysqli_query($baglan,"select * from reklamalar where id='$id'");
                while($row=mysqli_fetch_array($query)){
                        unlink($row['surat']);
                }
$kayit=mysqli_query($baglan,"delete from reklamalar where id='$id'");
$location='manage_ads.php';
}
if($kayit){
        header("Location:$location");
}
?>