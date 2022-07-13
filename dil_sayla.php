<?php 
session_start();
$index=' ';
$sazlama='id=duzgun';
$sapak='';
$jan='';
$mugallym='';
$boy2='';
$birinjilink='Sazlamalar.php';
$ikinjilink='#';

$ikinji='id=leftbarcurrent';
$boy='';
$birinjisoz='Registrasiýa';
$ikinjisoz='Owrenjek dilin';

if (isset($_SESSION['username'])) {
    $birinjilink='profil.php';
    $ucunji='id=leftbarcurrent';
    $ikinji='';
    $birinjisoz='Profil';
    $ikinjilink='halanlarym.php';
    $ikinjisoz='Halanlarym';
    $ucunjilink='#';
    $ucunjisoz='Öwrenjek diliň';
}
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
include 'includes/header.php';
?><div style='height:200px'>
<form action="choose_lesson.php" method="get" style='float:left;width:100%;text-align:center'>
<span style='font-size:20px'>Bilýän diliňizi saýlaň</span><br><br>
<select name="bilyan_dili" style='border-radius:10px; text-align:center; width:70%; margin:auto'>
<option value="turkmendili">Türkmen dili</option>
<option value="inlisdili">Iňlis dili</option>
<option value="rusdili">Rus dili</option>
</select><br><br>

        <span style='font-size:20px'>Öwrenjek dilinizi saýlaň</span><br><br>
        <select name='owrenjekdil' style='border-radius:10px; text-align:center; width:70%; margin:auto'>
        <option value='inlisdili'>Iňlis dili</option>
        <option value='rusdili'>Rus dili</option>
        <option value='turkdili'>Türk dili</option>
        <option value='hytaydili'>Hytaý dili</option>
        <option value='turkmendili'>Goşmaça</option>
        </select><br><br>
        <input type='submit' value='Ugrat'  style='width:60%; margin:auto;display:block; border-radius:10px'>
        </form>
</div>
    


<?php include 'includes/footer.php'; ?>