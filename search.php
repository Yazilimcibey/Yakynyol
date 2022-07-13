<?php include 'includes/conn.php'; ?>

<?php
session_start();
$index='';
$sazlama='';
$sapak='';
$jan='';
$mugallym=' id=duzgun';

$value=$_GET['value'];
if ($value=='1') {
  # code...

$birinjilink='#';
$ikinjilink='onumcilik_saytlary.php';
$ucunjilink='sowdda_saytlary.php';
$dordunjilink='okuw_saytlary.php';  
$basinjilink='habar_saytlary.php';

$birinji='id=leftbarcurrent';

$ginlik='';
$boy2='';

$birinjisoz='Ahlisi';
$ikinjisoz='Onumcilik saytlary';
$ucunjisoz='sowda saytlary';
$dordunjisoz='Okuw saytlary';
$basinjisoz='habar saytlary';}else{
  $birinjilink='#';
$ikinjilink='halanlarym_reklama.php';
$ucunjilink='okuwcylar.php';
$dordunjilink='talyplar.php';
$basinjilink='ussatlar.php';
$altynjylink='internet.php';

$birinji='id=leftbarcurrent';

$birinjisoz='Ahlisi';
$ikinjisoz='Halanlarym';
$ucunjisoz='Mugallymlar we okuwcylar';
$dordunjisoz='Içerki we daşarky talyplar';
$basinjisoz='Ussatlar';
$altynjysoz='Internet';
}
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

$keyword=$_POST['keyword'];

include 'includes/header.php';

if ($value=='1') {
  $val='text';
  # code...
$ret=mysqli_query($baglan,"select * from ulanyjy_reklama where text like '%$keyword%' and aktif=1");}else{
  $ret=mysqli_query($baglan,"select * from reklamalar_uzyn where haty like '%$keyword%'");
$val='haty';
}

$num=mysqli_num_rows($ret);
echo "<h4>Gözlenilen söz: <u>$keyword</u></h4>";
if($num>0){
    $durum=1;
    while ($bilgi=mysqli_fetch_array($ret)) {  
      echo "
        <div id=$bilgi[id] style='border:1px solid black;padding:10px;margin:20px; border-radius:20px;height:200px;text-size:16px; overflow:hidden'>
        <li>
        <img src='$bilgi[surat]' width=300px height=200px style='float:right'>
        <p>$bilgi[$val]</p>";
        $query=mysqli_query($baglan,"select * from teswirler_ulanyjy_reklama where reklama=$bilgi[id]");
        while ($row=mysqli_fetch_array($query)) {
          echo "
          <div style='border:1px solid black;width:70%;margin:auto;text-align:center; border-radius:10px; height:auto;margin-bottom:10px'>
          <p>$row[text]</p>
          </div>
          ";
        }
        if (isset($_SESSION['username']) and $bilgi['teswir']=='1') {
          echo "<br><br><br><br><br><br><br><br><br><br><br>
          <form action='add_comment_for_ad.php?id=$bilgi[id]' method='post'>
          <textarea name='teswir' style='resize:none;' rows=5></textarea>
          <input type='submit' value='Ugrat'><br><br><br>
          </form>
          ";
      }
      if (isset($_SESSION['username'])){
        echo "
        <a href='addtofavorite.php?id=$bilgi[id]'>Halanlaryma gos</a>
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
        if ($durum==2) {
          $kayit=mysqli_query($baglan,"select * from uzyn_reklama where cat=1 order by rand() limit 1");
          while ($row=mysqli_fetch_array($kayit)) {  
            echo "<a href='$row[link]'><img src='$row[surat]' width=100% height=100px style='margin-top:20px'></a>";
        }}
        $durum=$durum+1;
    }
      }
  
      ?>
      <script>
          durum=3;
          function uytget(n) {
              if (durum%2==1) {
              var button=document.getElementsByClassName(n);
              var div=document.getElementById(n);
              console.log(div);
              div.style.height='auto';
              button[0].innerHTML='Gizle';
              durum=durum+1;
              console.log(durum);
              }else if(durum%2==0) {
              var button=document.getElementsByClassName(n);
              var div=document.getElementById(n);
              console.log(div);
              div.style.height='200px';
              button[0].innerHTML='Doly görkez';
              durum=durum+1;
              }
              }
      </script>
    </ul>   
						
		
<?php include('includes/footer.php');?>
