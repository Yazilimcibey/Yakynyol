<?php include 'includes/conn.php'; ?>

<?php 
session_start();
$index=' ';
$sazlama='id=duzgun';
$sapak='';
$jan='';
$mugallym='';

$birinjilink='#';
$ikinjilink='halanlarym.php';
$ucunjilink='dil_sayla.php?value=2';
$basinjilink='youtube.com';

$ginlik2='';
$boy='';

$birinjilink='profil.php';
$ikinjilink='halanlarym.php';
$ucunjilink='dil_sayla.php?value=2';

$sekizinji='id=leftbarcurrent';

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
if(isset($_SESSION['username'])){
  $birinjisoz='Profil';
  $birinjilink='profil.php';
}
if(!$_SESSION['username']=='admin'){
    header('Location:Sazlamalar.php');
}

include 'includes/header.php';


?>
  <ul style="display:flex; flex-direction:column">
  <?php 
    $kontrol=mysqli_query($baglan,"select * from ulanyjylar where aktif=0");
    $durum=1;
    while ($bilgi=mysqli_fetch_array($kontrol)) {  
      echo "
        <div id=$bilgi[id] >
        <li>
        <h1>$bilgi[ulanyjy_ady]</h1>
        <p>$bilgi[nomer]<p>";
        echo "
        <a href='activate_user.php?id=$bilgi[id]&value=1'>Rugsat ber</a>
        <a href='activate_user.php?id=$bilgi[id]&value=2'>Poz</a>
        ";
        echo "
        </div>
        </li>
        ";
    }

    ?>
    <script>
        durum=3;
        function uytget(n) {
            if (durum%2==1) {
            var div=document.getElementById(n);
            console.log(div);
            div.style.height='auto';
            durum=durum+1;
            console.log(durum);
            }else if(durum%2==0) {
            var div=document.getElementById(n);
            console.log(div);
            div.style.height='100px';
            durum=durum+1;
            }
            }
    </script>
  </ul>    
<?php include 'includes/footer.php'; ?>