<?php 
session_start();
$index=' ';
$sazlama='id=duzgun';
$sapak='';
$jan='';
$mugallym='';

$birinjilink='#';
$ikinjilink='dil_sayla.php?value=2';

$birinji='id=leftbarcurrent';

$birinjisoz='Registrasiya';

$ikinjisoz='Owrenjek dilin';
$gerek='';

if (isset($_SESSION['username']) and $_SESSION['username']=='admin') {
  $basinjilink='add_word.php';
  $basinjisoz='Soz gos';
  $ikinjisoz='Reklama Gos';
  $ikinjilink='add_ad.php';
  $birinjilink='#';
  $birinjisoz='Registrasiya';
  $altynjylink='users_passive.php';
  $altynjysoz='Ulanyjylary gor';
  $yedinjisoz='Passive ulanyjylar';
  $yedinjilink='users_passive.php';
}

if(isset($_SESSION['username'])){
  header('location:profil.php');
}
include 'includes/header.php';

?>
        <div class="tabs">
            <h2 class='reg-tab' id="reg-tab">Registrasiýa</h2>
            <h2 class='login-tab active' id="login-tab">Içeri gir</h2>
        </div>

        <div id="login-form">
            <form action="login.php" method='post'>
                <input type="text" name="ulanyjy_ady" id="username" placeholder="Ulanyjy ady">
                <input type="password" name="parol" id="pass" placeholder="Açar sözi">
                <div class="options">
                    <div class="remember">
                        <input type="checkbox" name="rem" id="rem">
                        <label for='rem'>Meni ýatla</label>
                    </div>
                    <a href="#">Açar sözümi ýatdan çykardym ?</a>
                </div>
                <button type="submit">Içeri gir</button>
            </form>
        </div>

        <div id="registration-form">
            <form action="registration.php" method='post'>
                <p class="msg">Password didnot match !!!</p>
                <input type="text" name="ulanyjy_ady" id="username" placeholder="Ulanyjy ady">
                <input type="text" name="nomer" id="email" placeholder="Telefon nomeriňiz">
                <input type="password" name="parol" id="pass" placeholder="Açar sözüňiz">
                <input type="password" name="parol2" id="confirm-pass" placeholder=" Açar sözi täzeden">
                <select name="welayat" style='text-align:center'>
                    <option value="balkan">Balkan</option>
                    <option value="ahal">Ahal</option>
                    <option value="mary">Mary</option>
                    <option value="lebap">Lebap</option>
                    <option value="dashoguz">Dasoguz</option>
                    <option value="ashgabat">Ashgabat</option>
                </select>
                <p style='text-align:center;font-size:20px'>Telefon belgiňizi hasaba aldyrmak üçin bellän belgiňizden +993 64 197532 belgä boş sms ugradyň. Admin nomeringizi barlap rugsat berenden song Içeri gir bölüminden içeri girip bilersiňiz!</p>
                <button id="create" type="submit">Register</button>
            </form>
        </div>

        <script>
        const reg_form = document.querySelector("#registration-form")
        const login_form = document.querySelector("#login-form")

        const reg_tab = document.querySelector("#reg-tab")
        const login_tab = document.querySelector("#login-tab")

        const pass = document.querySelector('#pass')
        const confirm_pass = document.querySelector('#confirm-pass')
        const msg = document.querySelector('p')
        const btn = document.querySelector('#create')

        reg_tab.addEventListener('click', (e) => {
            login_form.style.display = 'none';
            reg_form.style.display = 'block';
            reg_tab.classList.add('active')
            login_tab.classList.remove('active')
        })
        login_tab.addEventListener('click', (e) => {
            login_form.style.display = 'block';
            reg_form.style.display = 'none';
            reg_tab.classList.remove('active')
            login_tab.classList.add('active')
        })

    </script>

<?php include 'includes/footer.php'; ?>