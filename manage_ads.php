<?php include 'includes/conn.php'; ?>

<?php 
session_start();
$index='';
$sazlama='';
$sapak='';
$jan='';
$mugallym=' id=duzgun';

$boy2='';
$ginlik='';

$birinjilink='profil.php';
$ikinjilink='halanlarm.php';
$ucunjilink='dil_sayla.php?value=2';

$yedinji='id=leftbarcurrent';

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

if(!$_SESSION['username']=='admin'){
    header('Location:Sazlamalar.php');
}

include 'includes/header.php';
        echo "
        <table>
        <tr>
            <th>Suraty</th>
            <th>linki</th>
            <th>Duzet</th>
        </tr>"; 
    
    ?>
  <?php 
$kontrol=mysqli_query($baglan,"select * from reklamalar");

    $durum=1;
    while ($bilgi=mysqli_fetch_array($kontrol)) { 
        echo "
        <tr>
            <td><img src='$bilgi[surat]'</td>
            <td><a href='$bilgi[link]'>$bilgi[link]</a></td>
            <td><a href='delete_ads.php?id=$bilgi[id]'>Poz</a></td>
        </tr>
        ";}
        $kontrol=mysqli_query($baglan,"select * from uzyn_reklama");
        $durum=1;
    while ($bilgi=mysqli_fetch_array($kontrol)) { 
        echo "
        <tr>
            <td><img src='$bilgi[surat]'</td>
            <td><a href='$bilgi[link]'>$bilgi[link]</a></td>
            <td><a href='delete_ads.php?id=$bilgi[id]&uzyn=poz'>Poz</a></td>
        </tr>
        ";
   
}

    ?></table>   

  

<?php include 'includes/footer.php'; ?>

