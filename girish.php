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
<?php include 'includes/conn.php'; ?>

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
                <div class="col-md-12" id='tet' style='overflow:scroll;'>

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
<script>

var tet=document.getElementById('tet');
var text=document.getElementById('textfield')
id=Math.round(Math.random()*(inlisceler.length-1));
tet.innerHTML=tet.innerHTML+"<div class='message'><img class='avatar-md' src='dist/img/avatars/avatar-female-5.jpg' data-toggle='tooltip' data-placement='top' title='Keith' alt='avatar'><div class='text-main'><div class='text-group' onclick=playbyid("+inlisceler2.indexOf(inlisceler[id])+") style='cursor:pointer' ><div class='text' style='background-color:yellow'><p>"+inlisceler[id]+"</p></div></div></div></div>";


function jogapla(){
    tet.innerHTML=tet.innerHTML+"<div class='message me'><div class='text-main'><div class='text-group me'><div class='text me'><p>"+text.value+"</p></div></div></div></div>"; 
    jogapbarla();
    tet.scrollTop=tet.scrollHeight;
    text.value='';
}

function soragber(){
    arassala();
    id=Math.round(Math.random()*(inlisceler.length-1));
    // alert(inlisceler.indexOf('hello'));
    aytdyr();
    tet.innerHTML=tet.innerHTML+"<div class='message'><img class='avatar-md' src='dist/img/avatars/avatar-female-5.jpg' data-toggle='tooltip' data-placement='top' title='Keith' alt='avatar'><div class='text-main'><div class='text-group' onclick=playbyid("+inlisceler2.indexOf(inlisceler[id])+") style='cursor:pointer'><div class='text' style='background-color:yellow'><p>"+inlisceler[id]+"</p></div></div></div></div>";
    tet.scrollTop=tet.scrollHeight;
}

function jogapbarla() {
    gelenjogap=text.value.replaceAll('\n','');
    gelenjogap=gelenjogap.replaceAll(' ','');
    gelenjogap=gelenjogap.replaceAll(',','');
    gelenjogap=gelenjogap.replaceAll('.','');
    gelenjogap=gelenjogap.replaceAll('?','');
    gelenjogap=gelenjogap.replaceAll('!','');
    dogryjogap=inlisceler[id];
    dogryjogap=dogryjogap.replaceAll(' ','');
    dogryjogap=dogryjogap.replaceAll(',','');
    dogryjogap=dogryjogap.replaceAll('.','');
    dogryjogap=dogryjogap.replaceAll('?','');
    dogryjogap=dogryjogap.replaceAll('!','');
    console.log(gelenjogap);
    console.log(dogryjogap);
    if (gelenjogap.toLowerCase()==dogryjogap.toLowerCase()) {
        setTimeout(dogrygorkez,1000)
        setTimeout(soragber,3000);                              
    }else{
        tet.innerHTML=tet.innerHTML+"<div class='message'><img class='avatar-md' src='dist/img/avatars/avatar-female-5.jpg' data-toggle='tooltip' data-placement='top' title='Keith' alt='avatar'><div class='text-main'><div class='text-group'><div class='text' style='background-color:red;color:white'><p><p style='font-size:30px'>&#9785;</p>Ýalňyşdyňyz!!! Dogrusy:  "+inlisceler[id]+"</p></div></div></div></div>";
        tet.scrollTop=tet.scrollHeight;
    }
}


function arassala(){
    inlisceler.splice(id,1);
    turkmenceler.splice(id,1);
    description.splice(id,1);
    music.splice(id,1);
    aydym.splice(id,1);
    gosmaca1.splice(id,1);
    gosmaca3.splice(id,1);
    gosmaca2.splice(id,1);
    console.log(aydym);
    if (inlisceler.length==0) {
        for (var i of inlisceler2){
            inlisceler.push(i);
        }
        for (var i of turkmenceler2){
            turkmenceler.push(i);
        }
        for (var i of description2){
            description.push(i);
        }
        for (var i of music2){
            music.push(i);
        }
        for (var i of aydym2){
            aydym.push(i);
        }
        for (var i of gosmaca12){
            gosmaca1.push(i);
        }
        for (var i of gosmaca22){
            gosmaca2.push(i);
        }
        for (var i of gosmaca32){
            gosmaca3.push(i);
        }
    }
}

function dogrygorkez() {
    console.log(gosmaca1[id].length);
    if(gosmaca2[id]!=''){
    tet.innerHTML=tet.innerHTML+"<div class='message'><img class='avatar-md' src='dist/img/avatars/avatar-female-5.jpg' data-toggle='tooltip' data-placement='top' title='Keith' alt='avatar'><div class='text-main'><div class='text-group'><div class='text' style='background-color:green;color:white'><p><p style='font-size:30px'>&#128077;"+turkmenceler[id]+' ('+gosmaca1[id]+")   </p>"+gosmaca2[id]+"<br>"+gosmaca3[id]+"<br>"+description[id]+"</p></div></div></div></div>";
    }else{
        tet.innerHTML=tet.innerHTML+"<div class='message'><img class='avatar-md' src='dist/img/avatars/avatar-female-5.jpg' data-toggle='tooltip' data-placement='top' title='Keith' alt='avatar'><div class='text-main'><div class='text-group'><div class='text' style='background-color:green;color:white'><p><p style='font-size:30px'>&#128077;"+turkmenceler[id]+"   </p>("+description[id]+"<br>"+gosmaca1[id]+")</p></div></div></div></div>";
    }
    tet.scrollTop=tet.scrollHeight;
    aytdyr2();
}



document.addEventListener('keyup',function(event){
    if(event.keyCode==13){
        tet.innerHTML=tet.innerHTML+"<div class='message me'><div class='text-main'><div class='text-group me'><div class='text me'><p>"+text.value+"</p></div></div></div></div>"; 
        jogapbarla();
        text.value='';
    }

})

function aytdyr() {
    var src=document.getElementById('src');
    var y=document.getElementById('y');
    console.log(music[id]);
    if(music[id][6]==' '){
        music[id] = music[id].replace(' ','');
        console.log(music[id]);
    }
    src.src=music[id];
    y.load();
    y.play();
}
function aytdyr2() {
    var src=document.getElementById('src');
    var y=document.getElementById('y');
    if(aydym[id][6]==' '){
        aydym[id] = aydym[id].replace(' ','');
        console.log(aydym[id]);
    }
    src.src=aydym[id];
    y.load();
    y.play();
}

function playbyid(n){
    var src=document.getElementById('src');
    var y=document.getElementById('y');
    if(music2[n][6]==' '){
        music2[n] = music2[n].replace(' ','');
        console.log(music2[n]);
    }    src.src=music2[n];
    y.load();
    y.play();
    console.log(n);
}


 </script>

<?php include 'includes/footer.php'; ?>