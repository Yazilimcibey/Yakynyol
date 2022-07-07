<style>
  .sayfala{
    font: 12px tahoma;
    margin-bottom:10px;
    display:inline;
    width:5%;
    margin-top: 20px;
    padding:4px 9px;
}
</style>

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


$basinji='id=leftbarcurrent';

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
<form action="search.php?value=2  " method='post' style='display:block;margin-left:10%;margin-top:-20px'>
            <input type="text" name='keyword' style='border-radius:10px;margin:auto;height:30px;width:80%;padding-left:5px; margin-top:30px;'>
            <input type="submit" value='Gözle' class='button' style='height:30px;line-height:0px;border-radius:10px;margin:auto;margin-bottom:30px'>
        </form>

  <ul style="display:flex; flex-direction:column">
  <?php 
    $baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');

    $sayfa=@intval($_GET['s']);
    if(!$sayfa){$sayfa=1;}
    $toplam=mysqli_num_rows(mysqli_query($baglan,"select * from reklamalar_uzyn"));

    $limit=10;
    $sayfa_sayisi=ceil($toplam/$limit);
    if($sayfa>$sayfa_sayisi){$sayfa=1;}
    $goster=$sayfa*$limit-$limit;
    $kontrol=mysqli_query($baglan,"select * from reklamalar_uzyn  where kategoriya=3  order by id DESC limit $goster,$limit");  
    

    $durum=1;
    while ($bilgi=mysqli_fetch_array($kontrol)) {  
      echo "
        <div id=$bilgi[id] style='border:1px solid black;margin-bottom:20px;border-radius:5px;padding:5px;height:200px;text-size:16px; overflow:hidden'>
        <li style='text-align:center'>
        <img src='$bilgi[surat]' width=100px height=100px class='$bilgi[id]' style='float:right'>
        
        <div class='$bilgi[id]' style='display:none'>
        <div class='slideshow-container'>

<div class='fade $bilgi[id]'>
  <div class='numbertext'>1 / 3</div>
  <img src='$bilgi[surat]' style='width:40%;height:250px'>
</div>

<div class='fade $bilgi[id]' style='display:none'>
  <div class='numbertext'>2 / 3</div>
  <img src='$bilgi[surat2]' style='width:40%;height:250px'>
</div>

<div class='fade $bilgi[id]' style='display:none'>
  <div class='numbertext'>3 / 3</div>
  <img src='$bilgi[surat3]' style='width:40%;height:250px'>
</div>

<a class='prev' onclick='plusSlides2($bilgi[id],-1)'>&#10094;</a>
<a class='next' style='background-color:black' onclick='plusSlides2($bilgi[id],1)''>&#10095;</a>

</div>
<br>

<div style='text-align:center'>
  <span class='dot' onclick='currentSlide(1)'></span> 
  <span class='dot' onclick='currentSlide(2)'></span> 
  <span class='dot' onclick='currentSlide(3)'></span> 
</div>
        
        </div>
        <p>$bilgi[haty]<p>";
        $query=mysqli_query($baglan,"select * from teswirler_uzyn_reklama where reklama=$bilgi[id]");?>
        <ul style='margin-top:200px;'>
    <?php 
    while ($bilgi2=mysqli_fetch_array($query)) {
        echo "
        <li style='border:1px solid brown; text-align:left;border-radius:15px; padding:10px'>";if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
            echo "<a href='delete_comments.php?id=$bilgi2[id]' style='float:right'>Teswiri poz</a>";}if(isset($_SESSION['username']) and $_SESSION['username']==$bilgi2['ulanyjy_ady']){
                echo "<a href='delete_comments.php?id=$bilgi2[id]' style='float:right'>Teswiri poz</a>";} echo "
        <h4 style='padding:5px;margin-bottom:-15px'>$bilgi2[ulanyjy_ady]</h4>
        <p style='padding:5px; margin-bottom:0px'>$bilgi2[text]</p>";
        $kontrol2=mysqli_query($baglan,"select * from teswirler where kat=2 and teswir_id='$bilgi2[id]'");
        echo "<div style='display:flex;flex-direction:column;justify-content:right'>";
        while ($row=mysqli_fetch_array($kontrol2)) {
            echo "<div style='border:1px solid brown; text-align:right;border-radius:15px; padding:10px;'>";if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
                echo "<a href='delete_comments.php?id=$row[id]' style='float:left'>Teswiri poz</a>";}if(isset($_SESSION['username']) and $_SESSION['username']==$row['ulanyjyady']){
                    echo "<a href='delete_comments.php?id=$row[id]' style='float:left'>Teswiri poz</a>";}    
                echo "<h4 style='padding:5px;margin-bottom:-15px'>$row[ulanyjyady]</h4>
            <p style='padding:5px; margin-bottom:0px'>$row[teswir]</p></div>";
        }if (isset($_SESSION['username']) and $_SESSION['teswir']=='hawa') {
        echo "
        <form action='teswir_jogapla.php?id=$bilgi2[id]&value=jan' method='post' style='width: 100%;'>
        <input name='jogap' style='border-radius:10px; padding:5px; width:75%'>
        <input type='submit' value='Jogap ber' class='button' style='border-radius:10px; height:30px; line-height:0px;margin:auto; padding-left:2px;margin-bottom:20px; width:20%;'>
        </form>
        
        ";
    }}
    ?></ul><?php
        if (isset($_SESSION['username']) and $_SESSION['teswir']=='hawa') {
          echo "
          <form action='add_comment_for_ad.php?id=$bilgi[id]' method='post'>
          <input name='teswir' style='border-radius:10px; padding:5px;width:75%'>
          <input type='submit' value='Ugrat' class='button' style='border-radius:10px; height:30px; line-height:0px;margin:auto;padding-left:2px; margin-bottom:20px; width:20%;'><br><br><br>
          </form>
          ";
      }
      if (isset($_SESSION['username']) and $_SESSION['username']!='admin'){
        echo "
        <a href='addtofavorite.php?id=$bilgi[id]&value=jan'>Halanlaryma gos</a>
        ";
    }if (isset($_SESSION['username']) and $_SESSION['username']=='admin'){
      echo "
      <a href='delete_word.php?action=ad&id=$bilgi[id]'>Reklamany poz</a>
      ";
  }
        echo "</div>
        </li>
        <button id='button' class='button $bilgi[id]' style='border-radius:10px; height:30px; line-height:0px;margin:auto; margin-top:-10px; margin-bottom:20px; width:80%;' onclick='uytget($bilgi[id])'>Doly gorkez</button>
        
        ";
    }echo "</ul>";

      

    ?>
    <script>
        durum=3;
        durum2=0;
        function uytget(n) {
            if (durum%2==1) {
              var button=document.getElementsByClassName(n);
              button[0].style.display='none';
              button[1].style.display='block';
              button[5].innerHTML='Gizle';
              console.log(button);
            var div=document.getElementById(n);
            div.style.height='auto';
            durum=durum+1;
            durum2=n;
            }else if(durum%2==0) {
              var button=document.getElementsByClassName(n);
              button[0].style.display='inline';
              button[1].style.display='none';
              button[5].innerHTML='Doly görkez';
            var div=document.getElementById(n);
            console.log(div);
            div.style.height='200px';
            durum=durum+1;
            }
            }
            var slideIndex = 1;
showSlides(slideIndex);

function plusSlides2(k,n) {
  durum2=k;
  plusSlides(n);
}

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides2 = document.getElementsByClassName(durum2);
  var slides=[];slides.push(slides2[2]);slides.push(slides2[3]);slides.push(slides2[4]);
  var dots = document.getElementsByClassName("dot");
  console.log(slides);
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
    </script>
  </ul>    
<?php include 'includes/footer.php'; ?>


