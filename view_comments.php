<?php include 'includes/conn.php'; ?>

<?php 
session_start();
$index='';
$sazlama='';
$sapak='id=duzgun';
$jan='';
$mugallym=' ';

$birinjilink='#';
$ikinjilink='sozluk_test.php';
$ucunjilink='grammar_owrenmek.php';
$dordunjilink='grammar_test.php';  
$basinjilink='umumy_test.php';

$birinji='id=leftbarcurrent';

$sapagy=$_GET['id'];

$birinjisoz='Sozluk owrenmek';
$ikinjisoz='Sozluk test';
$ucunjisoz='Grammar owrenmek';
$dordunjisoz='Grammar test';
$basinjisoz='Text';

if (isset($_SESSION['username'])) {
    $basinjilink='dersgos.php';
    $basinjisoz='Ders gos';
}

include 'includes/header.php';
?>
<ul>
    <?php 
    $kontrol=mysqli_query($baglan,"select * from teswirler where dersi='$sapagy'");
    while ($bilgi=mysqli_fetch_array($kontrol)) {
        echo "
        <li>
        <h1>$bilgi[teswir]</h1>
        <p style='padding:5px;border-right:1px solid black'>$bilgi[ulanyjyady]</p>
        <p>$bilgi[wagty]</p><br><br>
        </li>
        ";
    }

    ?>
</ul>


<?php include 'includes/footer.php'; ?>