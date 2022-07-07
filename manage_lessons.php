<?php 
session_start();
$index=' ';
$sazlama='id=duzgun';
$sapak='';
$jan='';
$mugallym='';

$ginlik='';
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
  $dokuzynjylink='dersgos.php';
  $ikinjisoz='Reklama Gos';
  $ikinjilink='add_ad.php';
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

include 'includes/header.php';


    echo "
<table>
    <tr>
        <th>Dersin ady</th>
        <th>Birinji link</th>
        <th>Birinji soz</th>
        <th>Ikinji link</th>
        <th>Ikinji soz</th>
        <th>Ucunji link</th>
        <th>Ucunji soz</th>
        <th>Kategoriya</th>
        <th>Duzet</th>
    </tr>";
    ?>
  <?php 
    $baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');
        $kontrol=mysqli_query($baglan,"select * from dersler");
    $durum=1;
    while ($bilgi=mysqli_fetch_array($kontrol)){
        echo "
        <tr>
            <td>$bilgi[dersin_ady]</td>
            <td>$bilgi[youtube]</td>
            <td>$bilgi[soz1]</td>
            <td>$bilgi[instagram]</td>
            <td>$bilgi[soz2]</td>
            <td>$bilgi[imo]</td>
            <td>$bilgi[soz3]</td>
            <td>$bilgi[kategoriya]</td>
            <td><a href='delete_word.php?id=$bilgi[id]&action=lesson&action2=poz'>Poz</a>
            <a href='update_lesson.php?id=$bilgi[id]'>Duzet</a></td>
        </tr>
        ";
    
}
    ?></table>   

  

<?php include 'includes/footer.php'; ?>

