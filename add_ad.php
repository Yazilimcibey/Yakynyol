<?php 
session_start();
$index=' ';
$sazlama='id=duzgun';
$sapak='';
$jan='';
$mugallym='';


$birinjilink='profil.php';
$ikinjilink='#';
$ucunjilink='dil_sayla.php?value=2';
$dordunjilink='#';

$dordunji='id=leftbarcurrent';

$birinjisoz='Profil';
$ikinjisoz='Halanlarym';
$ucunjisoz='Owrenjek dilin';
$dordunjisoz='Sapak 1';
if (isset($_SESSION['username']) and $_SESSION['username']=='admin') {
  $dokuzynjysoz='Ders gos';
  $ikinjilink='halanlarym.php';
  $ikinjisoz='Halanlarym';
  $dokuzynjylink='dersgos.php';
  $onunjysoz='Gepleşik goş';
  $onunjylink='add_text.php';
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

include 'includes/header.php';

?>
<form action="reklama_gos.php" method="post" enctype='multipart/form-data' style='padding:20px;text-align:center'>
        <input type="file" name='surat' style='background-color:white; border-radius:10px;margin:auto'><br><br>
        <span style='font'>Reklaman linkini ýaz</span><br><br>
        <input type="text" name="link" style='border-radius:10px'><br><br>
        <button type="submit" id='button'>Goş</button>
        </form>
<?php include 'includes/footer.php'; ?>