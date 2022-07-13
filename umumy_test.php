<?php include 'includes/conn.php'; ?>

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
$altynjylink='grammar_test.php';
$yedinjilink='#';


$yedinji='id=leftbarcurrent';

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



include 'includes/header.php';

if (isset($_POST['sapak'])) {
    @$sapagy=$_POST['sapak'];
    $_SESSION['sapagy']=$sapagy;
}else{
    if (isset($_SESSION['sapagy'])) {
        $sapagy=$_SESSION['sapagy'];
    }else{
        header('location:dil_sayla.php?value=2');
    }
}

$kontrol=mysqli_fetch_array(mysqli_query($baglan,"select * from dersler where id='$sapagy'"));
echo "<div><h2 style='width:auto;display:inline'>$kontrol[dersin_ady]</h2><p style='float:right'> Video sapaklary  <a href=$kontrol[youtube]>$kontrol[soz1]</a>   <a href=$kontrol[instagram]>$kontrol[soz2]</a>   <a href=$kontrol[imo]>$kontrol[soz3]</a></p><br><br><br></div>";


?>
<script>
    var inlisceler=[];description=[];yalnystext=[];inlisceler2=[];description2=[];yalnystext2=[];inlisceler3=[];inlisceler4=[];music=[];;music2=[];aydym=[];aydym2=[];gosmaca1=[];gosmaca12=[];gosmaca2=[];gosmaca22=[];
</script>
<?php 
    $kontrol=mysqli_query($baglan,"select * from inlisce_text where sapagy='$sapagy'");
    while($bilgi=mysqli_fetch_array($kontrol)){
        echo "<script>
        inlisceler.push(";
        echo json_encode($bilgi['inlisce']);
        echo ");music.push(";
        echo json_encode($bilgi['music']);
        echo ");aydym.push(";
        echo json_encode($bilgi['aydym3']);
        echo ");description.push(";
        echo json_encode($bilgi['description']);
        echo ");yalnystext.push(";
        echo json_encode($bilgi['yalnystext']);
        echo ");inlisceler3.push(";
        echo json_encode($bilgi['inlisce2']);
        echo ");gosmaca1.push(";
        echo json_encode($bilgi['gosmaca1']);
        echo ");gosmaca2.push(";
        echo json_encode($bilgi['gosmaca2']);
        echo ");</script>";

    $inlisce=$bilgi['inlisce'];
    $turkmence=$bilgi['turkmence'];
    $id=$bilgi['id'];}
    
    echo"
    <div id='divv' class='say' style='text-align:center'>
   
        <p id='text' class='1' style='color:blue;display:inline'></p>
        </div><br>

        <span style='font-size:25px; display:block;text-align:center'>Dogry jogsby saýlaň</span>
        <button class='button buttonn' style='line-height:normal; height:auto;'  id='button1' name='' onclick=jogapBarla(1)>Barla ( ýada Enter )</button><br>
        <button class='button buttonn'  style='line-height:normal; height:auto;' id='button2' name='' onclick=jogapBarla(2)>Barla ( ýada Enter )</button><br>
        <button class='button buttonn' style='line-height:normal; height:auto;' id='button3' name='' onclick=jogapBarla(3)>Barla ( ýada Enter )</button><br>
        <div style='border:1px solid green; border-radius:10px;' id='bord'>   <br><br>
        <p id='description' class='2' style='font-size:25px;color:green; margin-bottom:0px;line-height:0px'><p></div>
        <input type='button' class='button buttonn' id='dowam' value='Dowam et ( ýada Shift )' onclick=poz()><br>
        ";
        if(isset($_SESSION['username']) and $_SESSION['username']=='admin'){
            echo "<a href='manage_words.php?value=text'>Sozleri dolandyr</a>";
        }?>
        <ul>
        <?php 
        
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
            
        if(isset($_SESSION['username'])){echo "
        <form action='teswir_jogapla.php?id=$bilgi[id]' method='post' style='width:40%;'>
        <textarea name='jogap' style='border-radius:10px; resize:none; padding:5px;'></textarea>
        <input type='submit' value='Jogap ber'>
        </form>
        </li>
        ";}
        }
        ?>
    </ul><audio id='y'><source src=words/hello.mp3 id='src'>Bolanok</audio><?php
    if (isset($_SESSION['username'])) {
        echo "
        <form action='add_comment.php' method='post'>
        <textarea name='teswir' style='resize:none;padding:10px;border-radius:20px' rows=5></textarea>
        <input type='submit' value='Teswiriňi ugrat'><br><br><br>
        </form>
        ";
    }
?>
    <script>
  for (var i of inlisceler){
        inlisceler2.push(i);
    }
    for (var i of inlisceler3){
        inlisceler4.push(i);
    }
    for (var i of description){
        description2.push(i);
    }
    for (var i of yalnystext){
        yalnystext2.push(i);
    }
    for (var i of music){
        music2.push(i);
    }
    for (var i of gosmaca1){
        gosmaca12.push(i);
    }
    for (var i of gosmaca2){
        gosmaca22.push(i);
    }
    for (var i of aydym){
        aydym2.push(i);
    }
    var sorag=document.getElementById('text');
    var bord=document.getElementById('bord');
    var jogap1=document.getElementById('button1');
    var jogap2=document.getElementById('button2');
    var jogap3=document.getElementById('button3');
    var descriptiontext=document.getElementById('description');
log='d';
indiki();

function poz(){
    
if(log){    
    inlisceler.splice(id,1);
    inlisceler3.splice(id,1);
    description.splice(id,1);
    yalnystext.splice(id,1);
    music.splice(id,1);
    gosmaca1.splice(id,1);
    gosmaca2.splice(id,1);
    aydym.splice(id,1);
    if(inlisceler.length<3){
        inlisceler=[];
    inlisceler3=[];
    description=[];
    yalnystext=[];
    music=[];
    aydym=[];
        for (var i of inlisceler2){
            inlisceler.push(i);
        }
        for (var i of inlisceler4){
            inlisceler3.push(i);
        }
        for (var i of description2){
            description.push(i);
        }
        for (var i of music2){
            music.push(i);
        }
        for (var i of yalnystext2){
            yalnystext.push(i);
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
        for (var i of music2){
            music.push(i);
        }

    }
    indiki();}
}

function jogapBarla(jogap){
    if (dj==jogap){
        var src=document.getElementById('src');
        var y=document.getElementById('y');
        if(aydym[id][6]==' '){
            aydym[id] = aydym[id].replace(' ','');
        }
        src.src=aydym[id];
        y.load();
        y.play();
        log='h';
        descriptiontext.innerHTML=description[id];
        descriptiontext.style.color='green';
        bord.style.border='1px solid green';
    }else{
        descriptiontext.innerHTML=yalnystext2[id];
        descriptiontext.style.color='red';
        bord.style.border='1px solid red';
    }
}
var onceki=0;



function indiki(){

descriptiontext.innerHTML='';
id=Math.floor(Math.random()*inlisceler.length);
while(onceki==id){
   id=Math.floor(Math.random()*inlisceler.length);
}
onceki=id;

sorag.innerHTML=inlisceler[id]+'<br>'+gosmaca1[id];
dj=Math.floor(Math.random()*3);



while (1==1){
    console.log('salam')
id2=Math.floor(Math.random()*inlisceler.length);
id3=Math.floor(Math.random()*inlisceler.length);
    if(id==id2 || id==id3 || id2==id3){
id2=Math.floor(Math.random()*inlisceler.length);
id3=Math.floor(Math.random()*inlisceler.length);
}else{
    break;
}
}

if(dj==1){
jogap1.innerHTML=inlisceler3[id]+'<br>'+gosmaca2[id];
jogap2.innerHTML=inlisceler3[id2]+'<br>'+gosmaca2[id2];
jogap3.innerHTML=inlisceler3[id3]+'<br>'+gosmaca2[id3];
}else if(dj==2){
    jogap1.innerHTML=inlisceler3[id2]+'<br>'+gosmaca2[id2];
    jogap2.innerHTML=inlisceler3[id]+'<br>'+gosmaca2[id];
    jogap3.innerHTML=inlisceler3[id3]+'<br>'+gosmaca2[id3];
    }else if(dj==3){
        jogap1.innerHTML=inlisceler3[id2]+'<br>'+gosmaca2[id2];
        jogap2.innerHTML=inlisceler3[id3]+'<br>'+gosmaca2[id3];
        jogap3.innerHTML=inlisceler3[id]+'<br>'+gosmaca2[id];
        }else{
            dj=3;
            jogap1.innerHTML=inlisceler3[id2]+'<br>'+gosmaca2[id2];
            jogap2.innerHTML=inlisceler3[id3]+'<br>'+gosmaca2[id3];
            jogap3.innerHTML=inlisceler3[id]+'<br>'+gosmaca2[id];
        } 
var src=document.getElementById('src');
var y=document.getElementById('y');
    console.log(music[id])
    if(music[id][6]==' '){
        music[id] = music[id].replace(' ','');
    }
music[id]=music[id].replace('?','');
src.src=music[id];
y.load();
y.play();        
}
        

var say=document.getElementsByClassName('say')[0];
say.addEventListener('click',function(event){
    var src=document.getElementById('src');
    var y=document.getElementById('y');
    if(music[id][6]==' '){
        music[id] = music[id].replace(' ','');
    }
    src.src=music[id];
    y.load();
    y.play();
console.log(music,id);
})
    </script>
    
    

<?php include 'includes/footer.php'; ?>
