<?php 
session_start();
$index=' ';
$sazlama='';
$sapak='';
$jan='';
$mugallym='id=duzgun';

$boy='';

$birinjilink='mugallymlar.php';
$ikinjilink='onumcilik_saytlary.php';
$ucunjilink='sowda_saytlary.php';
$dordunjilink='okuw_saytlary.php';  
$basinjilink='habar_saytlary.php';

$yedinji='id=leftbarcurrent';

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
if(!isset($_SESSION['username'])){
    header("location:mugallymlar.php");
}
include 'includes/header.php';



?>
<form action="addaduser.php" method="post" enctype='multipart/form-data' style='padding:20px; text-align:center'>
        <span>Suraty goşuň</span><br><br>
        <input type="file" name='surat'><br><br>
        <span>Reklamaň textini ýazyň</span><br><br>
        <textarea name="text" cols="30" rows="10" style='resize:none'></textarea><br><br>
        <span>Reklamaň linkini ýazyň</span><br><br>
        <input type="text" name="link"><br><br>
        <span>Kategoriýany saýlaň</span><br><br>
        <select name="category">
            <option value="onumchilik">Onumchilik</option>
            <option value="sowda">Sowda</option>
            <option value="okuw">Okuw</option>
            <option value="habar">Habar</option>
        </select><br><br>
        <span>Ulanyjylar teswir yazyp bilsinmi</span><br><br>
        <select name="teswir">
            <option value="1">Hawa</option>
            <option value="0">Yok</option>
        </select><br><br>
        <button type="submit" class='button' style='line-height:0px; height:30px; padding:0px; width:60%; border-radius:20px' id='button'>Goş</button>
        </form>
<?php include 'includes/footer.php'; ?>