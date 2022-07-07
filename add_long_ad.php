<?php 
session_start();
$index='';
$sazlama='';
$sapak='';
$jan='id=duzgun';
$mugallym='';

$boy2='';

$customstyle='<link rel="stylesheet" href="css/slide.css">';

$birinjilink='jan.php';
$ucunjilink='okuwcylar.php';
$dordunjilink='talyplar.php';
$basinjilink='ussatlar.php';
$altynjylink='internet.php';


$ikinji='id=leftbarcurrent';

$birinjisoz='Ahlisi';
$ucunjisoz='Mugallymlar we okuwcylar';
$dordunjisoz='Içerki we daşarky talyplar';
$basinjisoz='Ussatlar';
$altynjysoz='Internet';
$yedinjisoz='Degismeler';
$yedinjilink='degishmeler.php';

if(isset($_SESSION['username'])){
  $ikinjilink='halanlarym_reklama.php';
  $ikinjisoz='Halanlarym';
if (isset($_SESSION['username']) and $_SESSION['username']=='admin') {
    $ikinjilink='add_long_ad.php';
    $ikinjisoz='Habar gos';
}
}

include 'includes/header.php';

?>
<form action="uzyn_reklama_gos.php" method="post" enctype='multipart/form-data' style='padding:10px;text-align:center;'>
        <span>Reklamaň textini ýazyň</span><br><br>
        <textarea name="text" cols="30" rows="10" style='border-radius:10px;padding:10px'></textarea><br>
        <input type="file" name='surat' style='border-radius:10px'><br>
        <input type="file" name='surat2' style='border-radius:10px'><br>
        <input type="file" name='surat3' style='border-radius:10px;'><br><br>
        <span>Reklamaň linkini ýazyň</span><br><br>
        <input type="text" name="link" style='border-radius:10px'><br><br>
        <select name='category' style='border-radius:10px;'>
          <option value='1'>Mugallymlar we Okuwçylar</option>
          <option value='2'>Içerki we daşarky talyplar</option>
          <option value='3'>Ussatlar</option>
          <option value='4'>Internet</option>
          <option value='5'>Degismeler</option>
        </select><br><br>
        <button type="submit" class='button' style='height:30px;width:80%;border-radius:20px;line-height:0px;padding:0px'>Ugrat</button>


<?php include 'includes/footer.php'; ?>