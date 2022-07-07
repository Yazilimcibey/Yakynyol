<?php 
session_start();
$index=' ';
$sazlama='id=duzgun';
$sapak='';
$jan='';
$mugallym='';
$ginlik2='';
$boy='100px';
$ikinji='id=leftbarcurrent';


$birinjilink='#';
$ikinjilink='halanlarym.php';
$ucunjilink='dil_sayla.php?value=2';

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
}

if (isset($_SESSION['username']) and $_SESSION['username']=='admin') {
    $birinjilink='dersgos.php';
    $birinjisoz='Ders gos';
    $basinjisoz='Soz gos';
    $basinjilink='add_word.php';
}
if (!isset($_SESSION['username'])) {
    header('location:index.php');
}
if (isset($_SESSION['username'])) {
    $birinjilink='profil.php';
    $birinjisoz='Profil';
}

include 'includes/header.php';

$baglan=mysqli_connect('localhost','root','','dil')or die('Baglanamadim');

$gerek='';
?>
<ul>
<?php 
$kayit=mysqli_query($baglan,"select * from halanlarym where ulanyjy_ady='$_SESSION[username]' and reklama=0");
while($row=mysqli_fetch_array($kayit)){
    $sozler=mysqli_num_rows(mysqli_query($baglan,"select * from inlisce_sozler where sapagy='$row[ders]'"));
    $ders=mysqli_fetch_array(mysqli_query($baglan,"select * from dersler where id='$row[ders]'"));
    echo "<li style='border:1px solid blue; padding:10px; border-radius:20px;'>
    <div>
    <h2>$ders[dersin_ady]  ($sozler)</h2>
    <a href='girish.php?value=$row[ders]'>Derse gec</a>
    </div>
    </li>";
}
?>
</ul>

<?php
include 'includes/footer.php'; ?>