
<?php include 'includes/conn.php'; ?>

<?php 
session_start();

$index=' ';
$sazlama='id=duzgun';
$sapak='';
$jan='';
$mugallym='';

$boy='650px';


$birinjilink='profil.php';
$ikinjilink='halanlarym.php';
$ucunjilink='dil_sayla.php?value=2';

$basinji='id=leftbarcurrent';

$birinjisoz='Profil';
$ikinjisoz='Halanlarym';
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
  $onunjysoz='Gepleşik goş';
  $onunjylink='add_text.php';
}
if (!isset($_SESSION['username']) or  $_SESSION['username']!='admin') {
    header('location:index.php');
}
if(!$_SESSION['username']=='admin'){
    header('Location:Sazlamalar.php');
}

include 'includes/header.php';

?>
<?php

$kontrol=mysqli_query($baglan,"select * from dersler");
    echo "
    <form action='addword.php' method='post' enctype='multipart/form-data' style='padding:30px;text-align:center'>
    <select name='kategoriya' style='border-radius:10px'><br><br>";
    while($bilgi=mysqli_fetch_array($kontrol)){
            $ady=$bilgi['dersin_ady'];
            $syny=$bilgi['syny'];
            $id=$bilgi['id'];
    echo "<option value='$id'>$ady</option>
    ";} ?>
    </select><br><br>
    <select name='gornus' style='border-radius:10px' id='gornus'>
        <option value='soz'>Soz</option>
        <option value='text'>Text</option>
    </select><br><br>
    <span>Turkmencani yazyn</span><br><br>
    <textarea name='turkmence' style='width:90%; height:100px'></textarea><br><br>
    <span>Beyleki dili yazyn</span><br><br>
    <textarea name='beylekidil' style='width:90%; height:100px'></textarea><br><br>
    <span>gosmaca1</span><br><br>
    <textarea name='gosmaca1' style='width:90%; height:100px'></textarea><br><br>
    <span>gosmaca2</span><br><br>
    <textarea name='gosmaca2' style='width:90%; height:100px'></textarea><br><br>
    <span>gosmaca3</span><br><br>
    <textarea name='gosmaca3' style='width:90%; height:100px'></textarea><br><br>
    <span>Dogry yazanda cykjak teksti yazyn</span><br><br>
    <textarea name='description' style='width:90%; height:100px'></textarea><br><br>
    <span>Yalnys yazanda cykjak teksti yazyn</span><br><br>
    <textarea name='yalnystext' style='width:90%; height:100px'></textarea><br><br>
    <span>Dogry cykandaky aydym fayly saylan</span><br><br>
    <input type='file' name='aydym2'><br><br>
    <span>Aydym fayly saylan</span><br><br>
    <input type='file' name='aydym'><br><br>
    
    <button type='submit' class='button' style='line-height:0px; padding:0px; width:60%; height:30px; border-radius:20px;'>Gos</button>
    </form>
    
<?php include 'includes/footer.php'; ?>