<?php 
session_start();
$index='';
$sazlama='';
$sapak='';
$jan='';
$mugallym=' id=duzgun';

$boy2='';
$ginlik='';

$birinjilink='#';
$ikinjilink='onumcilik_saytlary.php';
$ucunjilink='sowda_saytlary.php';
$dordunjilink='okuw_saytlary.php';  
$basinjilink='habar_saytlary.php';

$birinji='id=leftbarcurrent';

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
    }
include 'includes/header.php';

if($_GET['value']!='text'){
    if($_GET['value']=='text2'){
        echo "
        <table>
        <tr>
            <th>Turkmence</th>
            <th>Inlisce</th>
            <th>Duzetmek</th>
            <th>Pozmak</th>
        </tr>";
    }else{
    echo "
<table>
    <tr>
        <th>Turkmence</th>
        <th>Inlisce</th>
        <th>Dogry</th>
        <th>gosmaca3</th>
        <th>gosmaca1</th>
        <th>gosmaca2</th>
        <th>Duzetmek</th>
        <th>Pozmak</th>
    </tr>";}}else{
        echo "
        <table>
        <tr>
            <th>Turkmence</th>
            <th>Inlisce</th>
            <th>Turkmence2</th>
            <th>Inlisce2</th>
            <th>gosmaca1</th>
            <th>gosmaca2</th>
            <th>Dogry</th>
            <th>Yalnys</th>
            <th>Duzetmek</th>
            <th>Pozmak</th>
        </tr>"; 
    }
    ?>
  <?php 
    $baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');
    if(isset($_GET['value'])){
    if($_GET['value']=='grammar'){
        $kontrol=mysqli_query($baglan,"select * from inlisce_text where sapagy=$_SESSION[sapagy]");
        $key='description';
    }else if($_GET['value']=='text'){
        $kontrol=mysqli_query($baglan,"select * from inlisce_text where sapagy=$_SESSION[sapagy]");
        $key='description';
    }else if($_GET['value']=='text2'){
        $kontrol=mysqli_query($baglan,"select * from text where sapagy=$_SESSION[sapagy]");
        $key='description';
        $durum2='';
    }
else{
    $kontrol=mysqli_query($baglan,"select * from inlisce_sozler where sapagy=$_SESSION[sapagy]");
    $key='dogrytext';
}}else{
    $kontrol=mysqli_query($baglan,"select * from inlisce_sozler where sapagy=$_SESSION[sapagy]");
    $key='dogrytext';
}
    $durum=1;
    while ($bilgi=mysqli_fetch_array($kontrol)) {  if(isset($_GET['value'])){
        if($_GET['value']=='grammar'){$word='grammar';}else if($_GET['value']=='text'){$word='text';}else if($_GET['value']=='text2'){$word='text2';}else{$word='soz';}}else{$word='text';}
      if($word!='text'){
        echo "
        <tr>
            <td>$bilgi[turkmence]</td>
            <td>$bilgi[inlisce]</td>";if(!isset($durum2)) echo "
            <td>$bilgi[$key]</td>
            <td>$bilgi[gosmaca3]</td>
            <td>$bilgi[gosmaca1]</td>
            <td>$bilgi[gosmaca2]</td>";echo "
            <td><a href='delete_word.php?id=$bilgi[id]&action=$word&action2=duzet'>Duzet</a></td>
            <td><a href='delete_word.php?id=$bilgi[id]&action=$word&action2=poz'>Poz</a></td>
        </tr>
        ";
    }else{
        echo "
        <tr>
            <td>$bilgi[turkmence]</td>
            <td>$bilgi[inlisce]</td>
            <td>$bilgi[turkmence2]</td>
            <td>$bilgi[inlisce2]</td>
            <td>$bilgi[gosmaca1]</td>
            <td>$bilgi[gosmaca2]</td>
            <td>$bilgi[$key]</td>
            <td>$bilgi[yalnystext]</td>
            <td><a href='delete_word.php?id=$bilgi[id]&action=$word&action2=duzet'>Duzet</a></td>
            <td><a href='delete_word.php?id=$bilgi[id]&action=$word&action2=poz'>Poz</a></td>
        </tr>
        ";
    }
}

    ?></table>   

  

<?php include 'includes/footer.php'; ?>

