
<?php 
session_start();
$index=' ';
$sazlama='id=duzgun';
$sapak='';
$jan='';
$mugallym='';

$birinjilink='Sazlamalar.php';
$birinjisoz='Registrasiýa';

$ucunji='id=leftbarcurrent';

$ucunjilink='dil_sayla.php';
$ucunjisoz='Owrenjek dilin';

if (isset($_SESSION['username']) and $_SESSION['username']=='admin') {
    $dokuzynjysoz='Ders gos';
    $ikinjilink='halanlarym.php';
    $ikinjisoz='Halanlarym';
    $dokuzynjylink='dersgos.php';
    $dordunjisoz='Reklama Gos';
    $dordunjilink='add_ad.php';
    $basinjilink='add_word.php';
    $basinjisoz='Soz gos';
    $altynjylink='manage_users.php';
    $altynjysoz='Ulanyjylary gor';
    $yedinjilink='manage_ads.php';
    $yedinjisoz='Reklamalary dolandyr';
    $sekizinjisoz='Passive ulanyjylar';
    $sekizinjilink='users_passive.php';
}
if (isset($_SESSION['username'])) {
    $birinjilink='profil.php';
    $birinjisoz='Profil';
}

include 'includes/header.php';

$baglan=mysqli_connect('localhost','root','','dil')or die('Baglanamadim');

$gerek='';

if(isset($_GET['bilyan_dili'])){
$bilyandil=$_GET['bilyan_dili'];
$owrenyandil=$_GET['owrenjekdil'];
$_SESSION['bilyandil']=$bilyandil;
$_SESSION['owrenyandil']=$owrenyandil;}else{
$bilyandil=$_SESSION['bilyandil'];
$owrenyandil=$_SESSION['owrenyandil'];
}

$kontrol=mysqli_query($baglan,"select * from dersler");
?><div style='height:200px'>
<form action="girish.php" method="post" style='float:left;width:100%;text-align:center'>
<select name='sapak' style='border-radius:10px;display:block;text-size:40px;margin:auto; width:80%;margin-top:30px; text-align:center'>
    <?php 
    while($bilgi=mysqli_fetch_array($kontrol)){
        if($bilgi['bilyan_dili']==$bilyandil and $bilgi['kategoriya']==$owrenyandil){
            $ady=$bilgi['dersin_ady'];
            $syny=$bilgi['syny'];
            $id=$bilgi['id'];
    echo "<option value='$id'>$ady</option>
    ";}}
    ?>
</select><br><br><?php if(isset($_SESSION['username'])){?>
<a href="halanlaryma_gos.php?id=<?php echo $id?>" style='border:1px solid brown;padding:20px;margin:20px; border-radius:10px'>Halanlaryma goş</a><br><br><?php } ?><br><br>
<input type="submit" value="Ugrat" style='width:60%; margin:auto;display:block; border-radius:10px' >
</form>
</div>
<?php
include 'includes/footer.php'; ?>