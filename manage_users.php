<?php include 'includes/conn.php'; ?>

<?php 
session_start();
$index=' ';
$sazlama='id=duzgun';
$sapak='';
$jan='';
$mugallym='';

$ginlik2='';
$boy='100px';

$birinjilink='profil.php';
$ikinjilink='halanlarym.php';
$ucunjilink='dil_sayla.php?value=2';

$altynjy='id=leftbarcurrent';

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
    $onunjysoz='Gepleşik goş';
    $onunjylink='add_text.php';
    $basinjilink='add_word.php';
    $basinjisoz='Soz gos';
    $altynjylink='manage_users.php';
    $altynjysoz='Ulanyjylary gor';
    $yedinjilink='manage_ads.php';
    $yedinjisoz='Reklamalary dolandyr';
    $sekizinjisoz='Passive ulanyjylar';
    $sekizinjilink='users_passive.php';
}

$gerek='';

if(!$_SESSION['username']=='admin'){
    header('Location:Sazlamalar.php');
}

include 'includes/header.php';


    echo "
<table>
    <tr>
        <th>Ulanyjy ady</th>
        <th>Nomer</th>
        <th>Aktif</th>
        <th>Duzet</th>
    </tr>";
    ?>
  <?php 
        $kontrol=mysqli_query($baglan,"select * from ulanyjylar");
    $durum=1;
    while ($bilgi=mysqli_fetch_array($kontrol)){
        echo "
        <tr>
            <td>$bilgi[ulanyjy_ady]</td>
            <td>$bilgi[nomer]</td>
            <td>$bilgi[aktif]</td>
            <td><a href='delete_word.php?id=$bilgi[id]&action=user&action2=poz'>Poz</a></td>
        </tr>
        ";
    
}
    ?></table>   

  

<?php include 'includes/footer.php'; ?>

