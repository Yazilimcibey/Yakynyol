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
<form action="search.php?value=1" method='post' style='display:block;width:100%'>
            <input type="text" name='keyword' style='border-radius:10px;margin:auto;height:30px;padding-left:5px; margin-top:0px;width:70%'>
            <input type="submit" value='Gozle' class='button' style='height:30px;line-height:0px;border-radius:10px;margin:auto;margin-bottom:30px'>
        </form>

<ul style="display:flex; flex-direction:column">
  <?php 
    $baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');
    $kontrol5=mysqli_query($baglan,"select * from halanlarym where ulanyjy_ady='$_SESSION[username]' and reklama>0");
    while ($bilgi5=mysqli_fetch_array($kontrol5)) {
    $kontrol=mysqli_query($baglan,"select * from reklamalar_uzyn where id='$bilgi5[reklama]'");
    $durum=1;
    while ($bilgi=mysqli_fetch_array($kontrol)) {  
      echo "
        <div id=$bilgi[id] style='border:1px solid black;padding:10px;margin:20px;margin-top:-5px; border-radius:20px;height:200px;text-size:16px; overflow:hidden'>
        <li>
        <img src='$bilgi[surat]' width=300px height=200px style='float:right;height: 200px;'>
        <p>$bilgi[haty]</p>
        <a href='$bilgi[link]'>$bilgi[link]</a><br><br>";
        $query=mysqli_query($baglan,"select * from teswirler_ulanyjy_reklama where reklama=$bilgi[id]");?>
        <ul style=' margin-top:110px'>
    <?php 
    while ($bilgi2=mysqli_fetch_array($query)) {
        echo "
        <li style='border:1px solid brown; text-align:left;border-radius:15px; padding:10px;'>";if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
            echo "<a href='delete_comments.php?id=$bilgi2[id]' style='float:right'>Teswiri poz</a>";}if(isset($_SESSION['username']) and $_SESSION['username']==$bilgi2['ulanyjy_ady']){
                echo "<a href='delete_comments.php?id=$bilgi2[id]' style='float:right'>Teswiri poz</a>";} echo "
        <h4 style='padding:5px;margin-bottom:-15px'>$bilgi2[ulanyjy_ady]</h4>
        <p style='padding:5px; margin-bottom:0px'>$bilgi2[text]</p>";
        $kontrol2=mysqli_query($baglan,"select * from teswirler where kat=3 and teswir_id='$bilgi2[id]'");
        echo "<div style='display:flex;flex-direction:column;justify-content:right'>";
        while ($row=mysqli_fetch_array($kontrol2)) {
            echo "<div style='border:1px solid brown; text-align:right;border-radius:15px; padding:10px;'>";if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
                echo "<a href='delete_comments.php?id=$row[id]' style='float:left'>Teswiri poz</a>";}if(isset($_SESSION['username']) and $_SESSION['username']==$row['ulanyjyady']){
                    echo "<a href='delete_comments.php?id=$row[id]' style='float:left'>Teswiri poz</a>";}    
                echo "<h4 style='padding:5px;margin-bottom:-15px'>$row[ulanyjyady]</h4>
            <p style='padding:5px; margin-bottom:0px'>$row[teswir]</p></div>";
        }
        if (isset($_SESSION['username']) and $_SESSION['teswir']=='hawa') {
        echo "</div>
        <form action='teswir_jogapla.php?id=$bilgi2[id]&value2=mugallymlar' method='post' style='width:100%;'>
        <input name='jogap' style='width:90%;border-radius:10px; padding:5px;'>
        <input type='submit' value='Jogap ber' style='background-color:aqua; border-radius:10px'>
        </form>
        </li>
        ";
    }}
    ?></ul><?php
        if (isset($_SESSION['username']) and $_SESSION['teswir']=='hawa') {
          echo "<br><br>
          <form action='add_comment_for_ad.php?id=$bilgi[id]&value=salam' method='post'>
          <input name='teswir' type='text' style='border-radius:10px;width:80%'>
          <input type='submit' value='Ugrat' style='background-color:aqua; border-radius:10px'><br><br><br>
          </form>
          ";
      }
      
    if (isset($_SESSION['username']) and $_SESSION['username']=='admin'){
        echo "
        <a href='active_ads.php?id=$bilgi[id]&value=2'>Reklamany pos</a>
        
        ";
    }
        echo "
        </div>
        <button id='button' class='button $bilgi[id]' style='border-radius:10px; height:30px; line-height:0px;margin:auto; margin-top:-10px; margin-bottom:20px; width:80%;' onclick='uytget($bilgi[id])'>Doly gorkez</button>
        </li>
        ";
        
    }}

    ?></ul>   
    <script>
        durum=3;
        function uytget(n) {
            if (durum%2==1) {
              var button=document.getElementsByClassName(n);
            var div=document.getElementById(n);
            div.style.height='auto';
              button[0].innerHTML='Gizle';
            durum=durum+1;
            }else if(durum%2==0) {
              var button=document.getElementsByClassName(n);
            var div=document.getElementById(n);
            console.log(div);
              button[0].innerHTML='Doly görkez';
            div.style.height='200px';
            durum=durum+1;
            }
            }
    </script>
  

<?php include 'includes/footer.php'; ?>

