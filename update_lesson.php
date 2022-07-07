
<?php 
session_start();
$index='';
$sazlama='id=duzgun';
$sapak='';
$jan='';
$mugallym='';

$boy='500px';

$birinjilink='profil.php';
$ikinjilink='halanlarym.php';
$ucunjilink='dil_sayla.php?value=2';

$dokuzynjy='id=leftbarcurrent';

$birinjisoz='Profil';
$ikinjisoz='Halanlarym';
$ucunjisoz='Owrenjek dilin';
if (isset($_SESSION['username']) and $_SESSION['username']=='admin') {
  $dokuzynjysoz='Ders gos';
  $dokuzynjylink='dersgos.php';
  $ikinjisoz='Reklama Gos';
  $ikinjilink='add_ad.php';
  $basinjilink='add_word.php';
  $basinjisoz='Soz gos';
  $altynjylink='manage_users.php';
  $altynjysoz='Ulanyjylary gor';
  $yedinjilink='manage_ads.php';
  $yedinjisoz='Reklamalary dolandyr';
  $sekizinjisoz='Passive ulanyjylar';
  $sekizinjilink='users_passive.php';
}


include 'includes/header.php';

?>
<?php

$baglan=mysqli_connect('localhost','root','','dil')or die('Baglanamadim');
$id=$_GET['id'];
$bilgi=mysqli_fetch_array(mysqli_query($baglan,"select * from dersler where id='$id'"));
@$gornus=$_POST['sapak'];
if ($gornus=='video') {
    # code...
    echo "
    <form action='addless.php' method='post' enctype='multipart/form-data'>
    <input type='file' name='video'>
    </form>
    ";
}else{
    echo "
    <form action='update_less.php?id=$id' method='post' style='padding:20px;text-align:center'>
    <span>Dersin adyny yazyn</span><br><br>
    <input type='text' name='ad' value='$bilgi[dersin_ady]'><br><br>
    <span>Videoda owretyan link 1 goy</span><br><br>
    <input type='text' name='link1' value='$bilgi[youtube]'><br><br>
    <span>Link1 e soz yaz</span><br><br>
    <input type='text' name='soz1' value='$bilgi[soz1]'><br><br>
    <span>Videoda owretyan link 2 goy</span><br><br>
    <input type='text' name='link2' value='$bilgi[instagram]'><br><br>
    <span>Link2 e soz yaz</span><br><br>
    <input type='text' name='soz2' value='$bilgi[soz2]'><br><br>
    <span>Videoda owretyan link 3 goy</span><br><br>
    <input type='text' name='link3' value='$bilgi[imo]'><br><br>
    <span>Link3 e soz yaz</span><br><br>
    <input type='text' name='soz3' value='$bilgi[soz3]'><br><br>
    <select name='durum'><br><br>
    <option value='0'>Mugt</option>
    <option value='1'>Registrasiya bolmaly</option>
    </select><br><br>
    <button type='submit' class='button' style='line-height:0px; padding:0px; width:60%; height:30px; border-radius:20px;'>Uytget</button>
    </form>
    ";
}
?>
<?php include 'includes/footer.php'; ?>