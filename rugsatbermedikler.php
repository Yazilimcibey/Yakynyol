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

$birinjilink='mugallymlar.php';
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
    if($_SESSION['username']!='admin'){
  header("location:profil.php");
}
include 'includes/header.php';

?>
<form action="search.php?value=1" method='post' style='display:block;width:100%'>
            <input type="text" name='keyword' style='border-radius:10px;margin:auto;height:30px;padding-left:5px; margin-top:0px;width:70%'>
            <input type="submit" value='Gozle' class='button' style='height:30px;line-height:0px;border-radius:10px;margin:auto;margin-bottom:30px'>
        </form>

<ul style="display:flex; flex-direction:column">
  <?php 
    $kontrol=mysqli_query($baglan,"select * from ulanyjy_reklama where aktif=3 order by id DESC");
    $durum=1;
    while ($bilgi=mysqli_fetch_array($kontrol)) {  
      echo "
        <div id=$bilgi[id] style='border:1px solid black;padding:10px;margin:20px;margin-top:-5px; border-radius:20px;height:200px;text-size:16px; overflow:hidden'>
        <li>
        <img src='$bilgi[surat]' width=300px height=200px style='float:right;height: 200px;'>
        <p>$bilgi[text]</p>
        <a href='$bilgi[link]'>$bilgi[link]</a><br><br>";
        $query=mysqli_query($baglan,"select * from teswirler_ulanyjy_reklama where reklama=$bilgi[id] and aktif=1");?>
        <ul style='margin-top:110px'>
    <?php 
    while ($bilgi2=mysqli_fetch_array($query)) {
        echo "
        <li style='border:1px solid brown; text-align:";if($bilgi2['ulanyjy_ady']=='admin'){echo "left;";}else{echo "right;";}echo "border-radius:15px; padding:10px;'>";echo "
        <h4 style='padding:5px;margin-bottom:-15px'>$bilgi2[ulanyjy_ady]</h4>
        <p style='padding:5px; margin-bottom:0px'>$bilgi2[text]</p>";
        
    }
    ?></ul><?php
          echo "<br><br>
          <form action='add_comment_for_ad.php?id=$bilgi[id]&value2=salam' method='post'>
          <input name='teswir' type='text' style='border-radius:10px;width:100%;background-color:white;border:1px solid black' placeholder='Teswiriniz'>
         <br><br> <input type='submit' value='Ugrat' style='background-color:aqua; border-radius:10px; width:40%'><br><br><br>
          </form>
          ";
      
      
    if (isset($_SESSION['username']) and $_SESSION['username']=='admin'){
        echo "
        <a href='active_ads.php?id=$bilgi[id]&value=2'>Reklamany pos</a>
        <a href='active_ads.php?id=$bilgi[id]&value=1'>Rugsat ber</a>
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
              button[0].innerHTML='Doly g??rkez';
            div.style.height='200px';
            durum=durum+1;
            }
            }
    </script>
  

<?php include 'includes/footer.php'; ?>

