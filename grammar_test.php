<?php 
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
$altynjylink='#';
$yedinjilink='umumy_test.php';

$altynjy='id=leftbarcurrent';

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

$fff='';

$baglan=mysqli_connect('localhost','root','','dil')or die('Baglanamadim');

include 'includes/header.php';

$sapagy=$_SESSION['sapagy'];

echo "";
$kontrol=mysqli_fetch_array(mysqli_query($baglan,"select * from dersler where id='$sapagy'"));
echo "<div><h2 style='width:auto;display:inline;float:left;font-size:30px'>$kontrol[dersin_ady]</h2><p style='float:right'> Video sapaklary  <a href=$kontrol[youtube]>$kontrol[soz1]</a>   <a href=$kontrol[instagram]>$kontrol[soz2]</a>   <a href=$kontrol[imo]>$kontrol[soz3]</a></p><br><br><br></div>";

?>
<script>
    var inlisceler=[];turkmenceler=[];dogrytext=[];aydym=[];aydym2=[];yalnystext=[];music=[];inlisceler2=[];turkmenceler2=[];dogrytext2=[];yalnystext2=[];music2=[];gosmaca1=[];gosmaca12=[];
</script>
<?php 
    $kontrol=mysqli_query($baglan,"select * from inlisce_text where sapagy='$sapagy'");
    while($bilgi=mysqli_fetch_array($kontrol)){
        echo "<script>
        inlisceler.push(";
        echo json_encode($bilgi['inlisce']);
        echo ");inlisceler.push(";
        echo json_encode($bilgi['inlisce2']);
        echo ");dogrytext.push(";
        echo json_encode($bilgi['description']);
        echo ");dogrytext.push(";
        echo json_encode($bilgi['description']);
        echo ");turkmenceler.push(";
        echo json_encode($bilgi['turkmence']);
        echo ");turkmenceler.push(";
        echo json_encode($bilgi['turkmence2']);
        echo ");gosmaca1.push(";
        echo json_encode($bilgi['gosmaca1']);
        echo ");gosmaca1.push(";
        echo json_encode($bilgi['gosmaca2']);
        echo ");aydym.push(";
        echo json_encode($bilgi['aydym2']);
        echo ");aydym.push(";
        echo json_encode($bilgi['music2']);
        echo ");music.push(";
        echo json_encode($bilgi['music']);
        echo ");music.push(";
        echo json_encode($bilgi['aydym3']);
        echo ");</script>";

    $inlisce=$bilgi['inlisce'];
    $turkmence=$bilgi['turkmence'];
        $id=$bilgi['id'];  }
        ?>
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
                    <button type="submit" onclick=jogapla() class="btn send"><i class="material-icons">send</i></button>
                    
                </div>
            </div>
        </div>
    </div>
						</div>
                    <?php    if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
        echo "<a href='manage_words.php?value=grammar'>Sozleri dolandyr</a>";
    }?>
        <ul>
        <?php 
        $baglan=mysqli_connect('localhost','root','','dil') or die('Baglanyp bilmedi');
        $kontrol=mysqli_query($baglan,"select * from teswirler where dersi='$sapagy' and kat=0");
        while ($bilgi=mysqli_fetch_array($kontrol)) {
            echo "
            <li style='border:1px solid brown; text-align:left;border-radius:15px; padding:10px'>";if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
                echo "<a href='delete_comments.php?id=$bilgi[id]' style='float:right'>Teswiri poz</a>";}if(isset($_SESSION['username']) and $_SESSION['username']==$bilgi['ulanyjyady']){
                    echo "<a href='delete_comments.php?id=$bilgi[id]' style='float:right'>Teswiri poz</a>";} echo "
            <h4 style='padding:5px;margin-bottom:-15px'>$bilgi[ulanyjyady]</h4>
            <p style='padding:5px; margin-bottom:0px'>$bilgi[teswir]</p>";
            $kontrol2=mysqli_query($baglan,"select * from teswirler where kat=1 and teswir_id='$bilgi[id]'");
            echo "<div style='display:flex;flex-direction:column;justify-content:right'>";
            while ($row=mysqli_fetch_array($kontrol2)) {
                echo "<div style='border:1px solid brown; text-align:right;border-radius:15px; padding:10px;'>";if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
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
        }?><audio id='y'><source src=words/hello.mp3 id='src'>Bolanok</audio>
    <script>
    

      for (var i of inlisceler){
        inlisceler2.push(i);
    }
    for (var i of turkmenceler){
        turkmenceler2.push(i);
    }
    for (var i of dogrytext){
        dogrytext2.push(i);
    }
    for (var i of gosmaca1){
        gosmaca12.push(i);
    }
    for (var i of music){
        music2.push(i);
    }
    for (var i of yalnystext){
        yalnystext2.push(i);
    }
    for (var i of aydym){
        aydym2.push(i);
    }
    </script>
<script src="js/chat_grammar_test.js"></script>    
    

<?php include 'includes/footer.php'; ?>
