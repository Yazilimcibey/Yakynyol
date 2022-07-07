<?php 
session_start();
$index='';
$sazlama='';
$sapak='';
$jan=' id=duzgun';
$mugallym='';

$birinjilink='jan.php';
$ucunjilink='okuwcylar.php';
$dordunjilink='talyplar.php';
$basinjilink='ussatlar.php';
$altynjylink='internet.php';


$ucunji='id=leftbarcurrent';

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
    $ucunjilink='uzynreklamagos.php';
    $ucunjisoz='Reklama gos';
}
}

if (isset($_SESSION['username']) and $_SESSION['username']!='admin') {
  header('location:index.php');
}

include 'includes/header.php';

?><div class="main" style='height:200px'>
<form action="addad.php" method="post" enctype='multipart/form-data'  style='float:left;width:100%;text-align:center'>
        <input type="file" name='surat'><br><br>
        <span>Reklamaň linkini ýazyň</span><br><br>
        <input type="text" name="link" style='border-radius:10px'><br><br>
        <button type="submit" id='button' class='button' style='line-height:0px; width:60%; height:30px; border-radius:20px;'>Ugrat</button>
        </form></div>
<?php include 'includes/footer.php'; ?>