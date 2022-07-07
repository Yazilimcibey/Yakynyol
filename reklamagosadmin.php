<?php 
session_start();
$index='';
$sazlama='';
$sapak='';
$jan='';
$mugallym=' id=duzgun';

$birinjilink='#';
$ikinjilink='onumcilik_saytlary.php';
$ucunjilink='sowda_saytlary.php';
$dordunjilink='okuw_saytlary.php';  
$basinjilink='habar_saytlary.php';

$sekizinji='id=leftbarcurrent';

$birinjisoz='Ahlisi';
$ikinjisoz='Onumcilik saytlary';
$ucunjisoz='sowda saytlary';
$dordunjisoz='Okuw saytlary';
$basinjisoz='habar saytlary';
if(isset($_SESSION['username'])){
$altynjysoz='halanlarym';
$altynjylink='halanlarym_mugallymlar.php';
$yedinjisoz='Reklama gos';
$yedinjilink='reklamagosulanyjy.php';
}
if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
    $altynjysoz='Aktif edilmedikler';
    $altynjylink='non_activated.php';
    $yedinjisoz='Reklama gos';
$yedinjilink='reklamagosadmin.php';
$sekizinjisoz='Rugsat bermedikler';
$sekizinjilink='rugsatbermedikler.php';
    }

include 'includes/header.php';

?><div  style='padding:20px;height:200px; text-align:center;'>    
<form action="addadadmin.php" method="post" enctype='multipart/form-data'>
        <input type="file" name='surat'><br><br>
        <span>Reklamaň linkini ýazyň</span><br><br>
        <input type="text" name="link" style='border-radius:10px'><br><br>
        <button type="submit" id='button' class='button' style='line-height:0px; height:30px; padding:0px; width:60%; border-radius:20px;'>Ugrat</button>
        </form></div>
<?php include 'includes/footer.php'; ?>