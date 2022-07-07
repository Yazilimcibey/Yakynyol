<!DOCTYPE html>
<!-- saved from url=(0034)https://www.awwwards.com/websites/ -->
<html class="no-js" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="referrer" content="origin-when-cross-origin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Discover the best website designs of the world. Awwwards recognizes the talent and effort of the best designers, web developers and digital agencies.">
        <meta name="theme-color" content="#3ea094">
        <title>    Ýakyn ýol
</title>
<style> table, th, td{
     border:1px solid black;
     padding:10px;
 }</style>
        <?php if(isset($gerek)){
        echo "<link rel='stylesheet' href='css/login-style.css'>";}
        @session_start();
        $baglan=mysqli_connect('localhost','root','','dil')or die('Baglanamadim');

        ?>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/mobile-style.css">
        <?php if(isset($customstyle)){
            echo $customstyle;
        }
        if (isset($fff)) {echo '
        <link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
        ';} ?>
    </script>
    <!-- End Google Tag Manager -->
        <script src="./Awwwards - Website Design Inspiration_files/runtime.5ddff000.js.Без названия" defer=""></script><script src="./Awwwards - Website Design Inspiration_files/9755.ad58b337.js.Без названия" defer=""></script><script src="./Awwwards - Website Design Inspiration_files/6928.994e9a84.js.Без названия" defer=""></script><script src="./Awwwards - Website Design Inspiration_files/566.7d7cc9c1.js.Без названия" defer=""></script><script src="./Awwwards - Website Design Inspiration_files/grid.b2cb09c6.js.Без названия" defer=""></script>
<script type="text/javascript" src="./Awwwards - Website Design Inspiration_files/be.js.Без названия"></script><script src="./Awwwards - Website Design Inspiration_files/f(1).txt"></script></head>

<body class="">
    <div class="eu-location" data-eu="0"></div>
        <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXD9JT"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="wrapper ">
            
<nav class="nav-main" id="nav-main">
    <div class="top">
        <div class="header">
            <div class="pull-left">
                <span class="link-underlined js-nav-menu" data-menu-id="menu-lang">English</span>
            </div>
            <div class="pull-right">
                <div class="bt-close js-close-menu text-uppercase">close</div>
            </div>
        </div>
        <ul class="menu active" data-menu-name="English" data-menu-id="menu-lang" id="menu-main">

            <li class="active"><a href="index.php" class="item">Saýdyň ulanylyşy</a></li>
            <li><a href="Sazlamalar.php" class="item">Sazlamalar</a></li>
            <li><a href="girish.php" class="item">Sapak</a></li>
            <li><a href="jan.php" class="item">Arakesme</a></li>
            <li><a href="mugallymlar.php" class="item">Bildirişler</a></li>
            <li>
                <a href="#" class="item">
                    Söwda</a>
            </li>
            
        </ul>
        <ul class="menu" data-menu-name="BACK" data-menu-id="menu-main" id="menu-lang">

                            <li lang="en" class="js-change-locale active" data-locale="en">
                    <span class="item">
                        Turkmen
                                                    <span class="bt-check active">
                                <span class="bt-content"></span>
                            </span>
                                            </span>
                </li>
                          
                          
                          

            
            <li lang="pt"><span class="item">English <span class="soon">Soon!</span></span></li>
            <li lang="fr"><span class="item">Russian <span class="soon">Potom!</span></span></li>
        </ul>
    </div>
       
    </nav>

                    <header id="header">
        <div class="header-main">
            <div class="box-left">
                <div class="item bt-menu js-nav-main" data-menu-id="menu-main">
                    <div class="ico-menu">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                    <span class="has-tablet">MENU</span>
                </div>
            </div>
            <div class="box-right"><?php if(!isset($_SESSION['username'])){ ?>
                <a href="Sazlamalar.php" id='registerhref'>Register      </a>
                <?php }else{?>
                    <a href="logout.php" id='registerhref'>Logout      </a>
                    <?php } ?>

                                        <div class="item login"><?php if(!isset($_SESSION['username'])){echo "
        <strong><a class='text-black' href='Sazlamalar.php'>Register / log in</a></strong>";}else{
            echo "<strong><a class='text-black' href='logout.php'>Log Out</a></strong>";
        }?>
    </div>

                
     
                            </div>
            <div class="logo-header">
                <img src="images/logo.png" alt="Bolanok" style='width:300px; height:90px;position:relative;top:-35px;'>
                                                
            </div>
        </div>
    </header>
                

<div class="box-filters fixed seo" id="box-filters-fixed">
    <div class="container">
        <div class="box-left">
            <ul class="menu-filters js-filters-new">
                            
        

    <li data-name="filter.navigation_section.awards" class="item dropdown" data-order="name" <?php if(isset($birinji)){ echo $birinji;} ?> >
    <a href=<?php echo $birinjilink ?>><div class="leftbar" ><?php echo $birinjisoz ?></div></a>
                                                                                                                                    <div class="hidden">
                        
    </li>

    <?php if(isset($ikinjilink)){ ?>     
    <li data-name="filter.navigation_section.categories" class="item dropdown" data-order="name" <?php if(isset($ikinji)){ echo $ikinji;} ?>>
    <a href=<?php echo $ikinjilink ?>><div class="leftbar" <?php if(isset($ikinji)){ echo $ikinji;} ?>><?php echo $ikinjisoz ?></div></a>
                                                                                                                                    <div class="hidden">
                
    </li><?php } ?> 

    <?php if(isset($ucunjilink)){ ?>     
    <li data-name="filter.navigation_section.tags" class="item dropdown" data-order="name" <?php if(isset($ucunji)){ echo $ucunji;} ?>>
    <a href=<?php echo $ucunjilink ?>><div class="leftbar" <?php if(isset($ucunji)){ echo $ucunji;} ?>><?php echo $ucunjisoz ?></div></a>
                                                                                                                                    <div class="hidden">
                
    </li><?php } ?> 

    <?php if(isset($dordunjilink)){ ?>     
    <li data-name="filter.navigation_section.technologies" class="item dropdown" data-order="name" <?php if(isset($dordunji)){ echo $dordunji;} ?>>
    <a href=<?php echo $dordunjilink ?>><div class="leftbar"  <?php if(isset($dordunji)){ echo $dordunji;} ?>><?php echo $dordunjisoz ?></div></a>
                                                                                                                                    <div class="hidden">
                
    </li><?php } ?> 

    <?php if(isset($basinjilink)){ ?>     
    <li data-name="filter.navigation_section.colors" class="item dropdown" data-order="name" <?php if(isset($basinji)){ echo $basinji;} ?>>
    <a href=<?php echo $basinjilink ?>><div class="leftbar" <?php if(isset($basinji)){ echo $basinji;} ?>><?php echo $basinjisoz ?></div></a>
    <?php } ?>                                                                                                                    <div class="hidden">
    <?php if(isset($altynjylink)){ ?>     
        <li data-name="filter.navigation_section.colors" class="item dropdown" data-order="name" <?php if(isset($altynjy)){ echo $altynjy;} ?>>
    <a href=<?php echo $altynjylink ?>><div class="leftbar" <?php if(isset($altynjy)){ echo $altynjy;} ?>><?php echo $altynjysoz ?></div></a>
            
    </li><?php } ?>   
    <?php if(isset($yedinjilink)){ ?>     
        <li data-name="filter.navigation_section.colors" class="item dropdown" data-order="name" <?php if(isset($yedinji)){ echo $yedinji;} ?>>
    <a href=<?php echo $yedinjilink ?>><div class="leftbar" <?php if(isset($yedinji)){ echo $yedinji;} ?>><?php echo $yedinjisoz ?></div></a>
            
    </li><?php } ?>   
    <?php if(isset($sekizinjilink)){ ?>     
        <li data-name="filter.navigation_section.colors" class="item dropdown" data-order="name" <?php if(isset($sekizinji)){ echo $sekizinji;} ?>>
    <a href=<?php echo $sekizinjilink ?>><div class="leftbar" <?php if(isset($sekizinji)){ echo $sekizinji;} ?>><?php echo $sekizinjisoz ?></div></a>
            
    </li><?php } ?>   
    <?php if(isset($dokuzynjylink)){ ?>     
        <li data-name="filter.navigation_section.colors" class="item dropdown" data-order="name" <?php if(isset($dokuzynjy)){ echo $dokuzynjy;} ?>>
    <a href=<?php echo $dokuzynjylink ?>><div class="leftbar" <?php if(isset($dokuzynjy)){ echo $dokuzynjy;} ?>><?php echo $dokuzynjysoz ?></div></a>
            
    </li><?php } ?> 

    <?php if(isset($onunjylink)){ ?>     
        <li data-name="filter.navigation_section.colors" class="item dropdown" data-order="name" <?php if(isset($onunjy)){ echo $onunjy;} ?>>
    <a href=<?php echo $onunjylink ?>><div class="leftbar" <?php if(isset($onunjy)){ echo $onunjy;} ?>><?php echo $onunjysoz ?></div></a>
            
    </li><?php } ?>
            </ul>
        </div>
            </div>
    </div>
            <section id="content" class="">
            <div style='float:left; width:80%'>
<div class="container2" style="background-color: #c2cbed;
            width: <?php if(isset($ginlik)){echo "100%;padding:20px;";}else if(isset($ginlik2)){echo "100%;padding:20px;";}else{echo '100%;';} ?>
            height: <?php if(isset($boy)){echo "auto;";}else if(isset($boy2)){echo 'auto;';}else{echo 'auto;';} ?>
            position: relative; 
            margin:auto;
            top:0vh;
            padding:20px;
            border-radius: 25px;
            box-shadow: 0 0 10px black;
            float:center;
            text-align:center;
            ">