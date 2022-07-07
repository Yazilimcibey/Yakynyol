<style>
    #videosapaklar{
        display:none;
    }
    #dersad{
        font-size:30px;
    }
    @media screen and (max-width:600px) {
    #videosapaklar{
        display:inline;       
    }
    #dersad{
        font-size:20px;
    }
    #header .item{
        padding:30px 32px;
    }
    }
</style>

<?php 
$fff='';
session_start();
$index='';
$sazlama='';
$sapak='id=duzgun';
$jan='';
$mugallym='';


$birinjilink='#';
$ucunjilink='sozluk_test.php';
$ikinjilink='sesli_test.php';
$dordunjilink='grammar_owrenmek.php';
$basinjilink='grammar_sesli_test.php';
$altynjylink='grammar_test.php';
$yedinjilink='umumy_test.php';

$birinji='id=leftbarcurrent';

$birinjisoz='Sozluk owrenmek';
$ucunjisoz='Sozluk test';
$ikinjisoz='Sesli test';
$dordunjisoz='Sözlem owrenmek';
$basinjisoz='Sözlem sesli test';
$altynjysoz='Sözlem test';
$yedinjisoz='Gepleşik';

$sekizinjisoz='Gepleşik test';
$sekizinjilink='text_dialog.php';

$dokuzynjylink='text.php';
$dokuzynjysoz='Text';

$gerek='';


$boy='400px';

$baglan=mysqli_connect('localhost','root','','dil')or die('Baglanamadim');

if (isset($_POST['sapak'])) {
    $sapagy=$_POST['sapak'];
    $_SESSION['sapagy']=$sapagy;
}else if (isset($_GET['value'])) {
    $sapagy=$_GET['value'];
    $_SESSION['sapagy']=$sapagy;
}else
{
    if (isset($_SESSION['sapagy'])) {
        $sapagy=$_SESSION['sapagy'];
    }else{
        header('location:dil_sayla.php?value=2');
    }
}

include 'includes/header.php';

echo "";
$kontrol2=mysqli_fetch_array(mysqli_query($baglan,"select * from dersler where id='$sapagy'"));
echo "<div style='height:40px;'><h3 style='width:auto;display:inline' id='dersad'>$kontrol2[dersin_ady]</h3><p id='sapaklar'> Video sapaklary  <a href=$kontrol2[youtube]>$kontrol2[soz1]</a>   <a href=$kontrol2[instagram]>$kontrol2[soz2]</a>   <a href=$kontrol2[imo]>$kontrol2[soz3]</a></p><br><br><br></div>";
if (!isset($_SESSION['username'])) {
    if ($kontrol2['durum']==1) {
        header('location:Sazlamalar.php');
    }
}

?>
<script>
    var inlisceler=[];turkmenceler=[];description=[];gosmaca1=[];gosmaca2=[];gosmaca3=[];music=[];aydym=[];inlisceler2=[];turkmenceler2=[];description2=[];music2=[];aydym2=[];gosmaca12=[];gosmaca22=[];gosmaca32=[];
</script>
<?php 
    $kontrol=mysqli_query($baglan,"select * from inlisce_sozler where sapagy='$sapagy'");
    while($bilgi=mysqli_fetch_array($kontrol)){
        echo "<script>
        inlisceler.push(";
        echo json_encode($bilgi['inlisce']);
        echo ");music.push(";
        echo json_encode($bilgi['aydym']);
        echo ");aydym.push(";
        echo json_encode($bilgi['aydym2']);
        echo ");gosmaca1.push(";
        echo json_encode($bilgi['gosmaca1']);
        echo ");gosmaca2.push(";
        echo json_encode($bilgi['gosmaca2']);
        echo ");gosmaca3.push(";
        echo json_encode($bilgi['gosmaca3']);
        echo ");description.push(";
        echo json_encode($bilgi['dogrytext']);
        echo ");turkmenceler.push(";
        echo json_encode($bilgi['turkmence']);
        echo ");</script>";

    $inlisce=$bilgi['inlisce'];
    $turkmence=$bilgi['turkmence'];
    $id=$bilgi['id'];}?>
    <div class="babble tab-pane fade active show main" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
							<!-- Start of Chat -->
    <div class="chat" id="chat1">
        <div class="content" id="content">
            <div class="container">
                <div class="col-md-12" id='tet' style='height:100%;overflow:scroll;'>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-12">
                <div class="bottom">
                    <textarea class="form-control" id='textfield' placeholder="Jogap ýaz..." rows="1"></textarea>
                    <button type="button" onclick=jogapla() class="btn send"><i class="material-icons">send</i></button>
                    
                </div>
            </div>
        </div>
    </div>
						</div>
     <?php                   if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
        echo "<a href='manage_words.php?value=words'>Sozleri dolandyr</a>";
    }			?>
    <ul>
    <?php 
    $baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');
    $kontrol=mysqli_query($baglan,"select * from teswirler where dersi='$sapagy' and kat=0");
    while ($bilgi=mysqli_fetch_array($kontrol)) {
        echo "
        <li style='border:1px solid rgb(25, 61, 11); text-align:left;border-radius:15px; padding:10px'>";if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
            echo "<a href='delete_comments.php?id=$bilgi[id]' style='float:right'>Teswiri poz</a>";}if(isset($_SESSION['username']) and $_SESSION['username']==$bilgi['ulanyjyady']){
                echo "<a href='delete_comments.php?id=$bilgi[id]' style='float:right'>Teswiri poz</a>";} echo "
        <h4 style='padding:5px;margin-bottom:-15px'>$bilgi[ulanyjyady]</h4>
        <p style='padding:5px; margin-bottom:0px'>$bilgi[teswir]</p>";
        $kontrol3=mysqli_query($baglan,"select * from teswirler where kat=1 and teswir_id='$bilgi[id]'");
        echo "<div style='display:flex;flex-direction:column;justify-content:right'>";
        while ($row=mysqli_fetch_array($kontrol3)) {
            echo "<div style='border:1px solid rgb(104, 202, 65); text-align:right;border-radius:15px; padding:10px;'>";if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
                echo "<a href='delete_comments.php?id=$row[id]' style='float:left'>Teswiri poz</a>";}if(isset($_SESSION['username']) and $_SESSION['username']==$bilgi['ulanyjyady']){
                    echo "<a href='delete_comments.php?id=$row[id]' style='float:left'>Teswiri poz</a>";}    
                echo "<h4 style='padding:5px;margin-bottom:-15px'>$row[ulanyjyady]</h4>
            <p style='padding:5px; margin-bottom:0px'>$row[teswir]</p></div>";
        }
        echo "</div>";
        if(isset($_SESSION['username'])){echo "
        <form action='teswir_jogapla.php?id=$bilgi[id]' method='post' style='width:40%;'>
        <textarea name='jogap' style='border-radius:10px; resize:none; padding:5px;'></textarea>
        <input type='submit' value='Jogap ber'>
        </form>
        </li>
        ";}
    }
    ?>
</ul><audio id='y'><source src=words/hello.mp3 id='src'>Bolanok</audio>
<?php
if (isset($_SESSION['username'])) {
    echo "
    <form action='add_comment.php' method='post'>
    <textarea name='teswir' style='resize:none;padding:10px;border-radius:20px' rows=5></textarea>
    <input type='submit' value='Teswiriňi ugrat'><br><br><br>
    </form>
    ";
}
    echo "
    <script>
    console.log(music);
    console.log(gosmaca3)
    var body=document.body;

    for (var i of inlisceler){
        inlisceler2.push(i);
    }
    for (var i of turkmenceler){
        turkmenceler2.push(i);
    }
    for (var i of description){
        description2.push(i);
    } 
    for (var i of gosmaca1){
        gosmaca12.push(i);
    }
    for (var i of gosmaca2){
        gosmaca22.push(i);
    }
    for (var i of gosmaca3){
        gosmaca32.push(i);
    }
    for (var i of music){
        music2.push(i);
    }
    for (var i of aydym){
        aydym2.push(i);
    }
    </script>
    ";
    ?>
    <script type="text/javascript" src="js/chat_giris.js"></script>


<?php include 'includes/footer.php'; ?>