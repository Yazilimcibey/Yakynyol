<?php 
$index=' ';
$sazlama='id=duzgun';
$sapak='';
$jan='';
$mugallym='';

$birinjilink='#';
$ikinjilink='dil_sayla.php';
$ucunjilink='dil_sayla.php?value=2';
$dordunjilink='#';
$basinjilink='youtube.com';

$birinji='id=leftbarcurrent';

$boy='400px';

$birinjisoz='Registrasiya';
$ikinjisoz='Bilyan dilin';
$ucunjisoz='Owrenjek dilin';
$dordunjisoz='Sapak 1';
$basinjisoz='Youtube kanalymyz';

include 'includes/header.php';

if($_SESSION['username']!='admin'){
    header('location.index.php');
}
?>
  <form action="add_news.php" method="post" style='padding:20px; text-align:center'>
    <span>Habaryň adyny ýazyň</span><br><br>
    <input type="text" name="name_news" style='border-radius:10px'><br><br>
    <span>Habary ýazyň</span><br><br>
    <textarea name="news" cols="30" rows="10" style='border-radius:10px'></textarea> <br><br>
    <input type="submit" class='button' value="Ugrat" style='line-height:0px; padding:0px; width:60%; height:30px; border-radius:20px'>
     
  </form>
<?php include 'includes/footer.php'; ?>