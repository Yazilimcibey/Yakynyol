
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
  $ikinjilink='halanlarym.php';
  $ikinjisoz='Halanlarym';
  $dokuzynjylink='dersgos.php';
  $dordunjisoz='Reklama Gos';
  $dordunjilink='add_ad.php';
  $basinjilink='add_word.php';
  $onunjysoz='Gepleşik goş';
  $onunjylink='add_text.php';
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
    <a href='manage_lessons.php'>Dersleri dolandyr</a>
    <form action='addless.php' method='post' style='padding:20px;text-align:center'>
    <span>Dersin adyny yazyn</span><br><br>
    <input type='text' name='ad'><br><br>
    <span>Videoda owretyan link 1 goy</span><br><br>
    <input type='text' name='link1'><br><br>
    <span>Link1 e soz yaz</span><br><br>
    <input type='text' name='soz1'><br><br>
    <span>Videoda owretyan link 2 goy</span><br><br>
    <input type='text' name='link2'><br><br>
    <span>Link2 e soz yaz</span><br><br>
    <input type='text' name='soz2'><br><br>
    <span>Videoda owretyan link 3 goy</span><br><br>
    <input type='text' name='link3'><br><br>
    <span>Link3 e soz yaz</span><br><br>
    <input type='text' name='soz3'><br><br>
    <select name='main_language'><br><br>
    <option value='inlisdili'>Inlis dili</option>
    <option value='turkmendili'>Turkmen dili</option>
    <option value='rusdili'>Rus dili</option>
    </select><br><br>
    <select name='kategoriya'><br><br>
    <option value='inlisdili'>Inlis dili</option>
    <option value='turkmendili'>Turkmen dili</option>
    <option value='rusdili'>Rus dili</option>
    <option value='turkdili'>Turk dili</option>
    <option value='hytaydili'>Hytay dili</option>
    </select><br><br>
    <select name='durum'><br><br>
    <option value='0'>Mugt</option>
    <option value='1'>Registrasiya bolmaly</option>
    </select><br><br>
    <button type='submit' class='button' style='line-height:0px; padding:0px; width:60%; height:30px; border-radius:20px;'>Gos</button>
    </form>
    ";
}
?>
<?php include 'includes/footer.php'; ?>