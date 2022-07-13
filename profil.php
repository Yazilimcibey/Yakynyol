<?php include 'includes/conn.php'; ?>

<?php 
session_start();
$index=' ';
$sazlama='id=duzgun';
$sapak='';
$jan='';
$mugallym='';

$ginlik2='';
$birinji='id=leftbarcurrent';


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

$gerek='';

include 'includes/header.php';
?><h3><?php echo $_SESSION['username']; ?></h3>
<ul style="display:flex; flex-direction:column">
  <?php 
    $kontrol=mysqli_query($baglan,"select * from ulanyjy_reklama where ulanyjy_ady='$_SESSION[username]' order by id DESC");
    $durum=1;
    while ($bilgi=mysqli_fetch_array($kontrol)) {  
      echo "
        <div id=$bilgi[id] style='border:1px solid black;padding:10px;margin:20px;margin-top:-5px; border-radius:20px;height:200px;text-size:16px; overflow:hidden'>
        <li>
        <img src='$bilgi[surat]' width=300px height=200px style='float:right;height: 200px;'>
        <h6>$bilgi[date]</h6>
        <p>$bilgi[text]</p>
        <a href='$bilgi[link]'>$bilgi[link]</a><br><br>";
        $query=mysqli_query($baglan,"select * from teswirler_ulanyjy_reklama where reklama=$bilgi[id] and aktif=1");?>
        <ul style=' margin-top:110px'>
    <?php 
    while ($bilgi2=mysqli_fetch_array($query)) {
        echo "
        <li style='border:1px solid brown; text-align:";if($bilgi2['ulanyjy_ady']=='admin'){echo "left;";}else{echo "right;";}echo ";border-radius:15px; padding:10px;'>";if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
            echo "<a href='delete_comments.php?id=$bilgi2[id]' style='float:right'>Teswiri poz</a>";} echo "
        <h4 style='padding:5px;margin-bottom:-15px'>$bilgi2[ulanyjy_ady]</h4>
        <p style='padding:5px; margin-bottom:0px'>$bilgi2[text]</p>";
        
       }
    ?></ul><?php
        if (isset($_SESSION['username']) and $_SESSION['teswir']=='hawa') {
          echo "<br><br>
          <form action='add_comment_for_ad.php?id=$bilgi[id]&value2=salam' method='post'>
          <input name='teswir' type='text' style='border-radius:10px;width:100%;background-color:white;border:1px solid black' placeholder='Teswiriniz'>
          <input type='submit' value='Ugrat' style='background-color:aqua; border-radius:10px'><br><br><br>
          </form>
          ";
      }
      if (isset($_SESSION['username'])){
        echo "
        <a href='active_ads.php?id=$bilgi[id]&value=2'>Reklamany poz</a>
        ";
    }
    if (isset($_SESSION['username']) and $_SESSION['username']=='admin'){
        echo "
        <a href='active_ads.php?id=$bilgi[id]&value=2'>Reklamany pos</a>
        
        ";
    }
        echo "
        <h4>Awtory: $bilgi[ulanyjy_ady]</h4>
        </div>
        <button id='button' class='button $bilgi[id]' style='border-radius:10px; height:30px; line-height:0px;margin:auto; margin-top:-10px; margin-bottom:20px; width:80%;' onclick='uytget($bilgi[id])'>Doly gorkez</button>
        </li>
        ";
        
    }

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

