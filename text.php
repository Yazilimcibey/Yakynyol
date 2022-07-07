<?php 
session_start();
$index='';
$sazlama='';
$sapak='id=duzgun';
$jan='';
$mugallym='';


$birinjilink='girish.php';
$ucunjilink='sozluk_test.php';
$ikinjilink='sesli_test.php';
$dordunjilink='grammar_owrenmek.php';
$basinjilink='grammar_sesli_test.php';
$altynjylink='grammar_test.php';
$yedinjilink='umumy_test.php';

$dokuzynjy='id=leftbarcurrent';

$birinjisoz='Sozluk owrenmek';
$ucunjisoz='Sozluk test';
$ikinjisoz='Sesli test';
$dordunjisoz='Sözlem owrenmek';
$basinjisoz='Sözlem sesli test';
$altynjysoz='Sözlem test';
$yedinjisoz='Gepleşik';

$sekizinjisoz='Gepleşik test';
$sekizinjilink='text_dialog.php';

$dokuzynjylink='#';
$dokuzynjysoz='Text';

$gerek='';


$boy='400px';

$baglan=mysqli_connect('localhost','root','','dil')or die('Baglanamadim');

if (isset($_POST['sapak'])) {
    $sapagy=$_POST['sapak'];
    $_SESSION['sapagy']=$sapagy;
}else{
    if (isset($_SESSION['sapagy'])) {
        $sapagy=$_SESSION['sapagy'];
    }else{
        header('location:dil_sayla.php?value=2');
    }
}

include 'includes/header.php';

echo "";
$kontrol=mysqli_fetch_array(mysqli_query($baglan,"select * from dersler where id='$sapagy'"));
echo "<div><h2 style='width:auto;display:inline;float:left;font-size:30px'>$kontrol[dersin_ady]</h2><p style='float:right'> Video sapaklary  <a href=$kontrol[youtube]>$kontrol[soz1]</a>   <a href=$kontrol[instagram]>$kontrol[soz2]</a>   <a href=$kontrol[imo]>$kontrol[soz3]</a></p><br><br><br></div>";
$dersad=$kontrol['dersin_ady'];
if (!isset($_SESSION['username'])) {
    if ($kontrol['durum']==1) {
        header('location:Sazlamalar.php');
    }
}

?>
<script>
    var inlisceler=[];turkmenceler=[];id=[];inlisceler2=[];turkmenceler2=[];music2=[];
</script>
<?php 
    $kontrol=mysqli_query($baglan,"select * from text where sapagy='$sapagy'");
    while($bilgi=mysqli_fetch_array($kontrol)){
        echo "<script>
        inlisceler.push(";
        echo json_encode($bilgi['inlisce']);
        echo ");id.push(parseInt(";
        echo json_encode($bilgi['id']);
        echo "));turkmenceler.push(";
        echo json_encode($bilgi['turkmence']);
        echo ");</script>";
        echo "
        <div style='border:1px solid black;width:93%;padding:10px;margin:20px;margin-top:-5px; border-radius:20px;height:auto;text-size:16px; overflow:hidden'>
        <li>
        
        <img src='$bilgi[surat_inlisce]' class='$bilgi[id]' onclick='salam($bilgi[id])' width=40% style='float:right;height: 200px;'>
        <p>$bilgi[inlisce]</p><br><br>
        <p class='$bilgi[id]'></p><br><br>
        <audio id='$bilgi[id]'><source src='$bilgi[ses]'>Bolanok</audio>";?>
        <?php
     
        echo "
        </div>
        <button id='button' class='button $bilgi[id]' style='border-radius:10px; height:30px; line-height:0px;margin:auto; margin-top:-10px; margin-bottom:20px; width:80%;' onclick='uytget($bilgi[id])'>Terjimesini g</button>
        </li>
        ";}
    
    ?>
</ul>
<?php
    echo "
    <script>
    function salam(n){
    var y=document.getElementById(n);
    y.load();
    y.play();
}
console.log(turkmenceler);
function uytget(n){
    var elements=document.getElementsByClassName(n);
    if(elements[1].innerHTML==''){
    elements[1].innerHTML=turkmenceler[id.indexOf(n)];
    }else{
        elements[1].innerHTML='';
}
}
    </script>
    ";
    ?>
    
<?php include 'includes/footer.php'; ?>