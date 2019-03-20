<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap\Nav;
    use backend\models\Fotos;
?>
<!-- header -->
<?= Html::csrfMetaTags()?>
<div class="banner-top">

    <div class="w3_navigation">
        <div class="container">
            <nav class="navbar navbar-default ">
                <div class="navbar-header navbar-left ">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a class="navbar-brand" href="#"><i class="fa fa-camera" aria-hidden="true"></i> SIDOKUMENTASI  <p class="logo_w3l_agile_caption">Biro Humas & Protokol Jatim</p></a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <nav class="menu menu--iris">
                        <ul class="nav navbar-nav menu__list">
                             <?php

                                $menuItems[] =  '<li class="menu__item">'
                                                .Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home', 
                                                "http://localhost/sidokumentasi/backend/web", ['class' => 'menu__link']).
                                                '</li>';
                                
                                if (Yii::$app->user->isGuest) {
                                    $menuItems[] = '<li class="menu__item">'
                                                    .Html::a('<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Album', 
                                                    ['albums/index'], ['class' => 'menu__link']).
                                                    '</li>';
                                    $menuItems[] = '<li class="menu__item">'
                                                    .Html::a('<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login', 
                                                    ['site/login'], ['class' => 'menu__link']).
                                                    '</li>';
                                } else {
                                    if(Yii::$app->user->identity->level == "pegawai"){
                                        $menuItems[] = '<li class="menu__item">'
                                                    .Html::a('<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Album', 
                                                    ['albums/index'], ['class' => 'menu__link']).
                                                    '</li>';
  
                                    }
                                    elseif(Yii::$app->user->identity->level == "admin"){
                                         $menuItems[] = '<li class="dropdown menu__item">'
                                                        .Html::a('<span class="glyphicon glyphicon-book" aria-hidden="true"></span> 
                                                            Album <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>' ,'', ['class' => 'dropdown-toggle menu__link','data-toggle'=>"dropdown"])

                                                        .'<ul class="dropdown-menu agile_short_dropdown">'

                                                        .'<li>'
                                                        .Html::a('<span class="glyphicon glyphicon-list" aria-hidden="true"></span> 
                                                            Object', ['objects/index'])
                                                        .'</li">'

                                                        .'<li>'
                                                        .Html::a('<span class="glyphicon glyphicon-th" aria-hidden="true"></span> 
                                                            Kategori', ['kategori/index'])
                                                        .'</li">'

                                                        .'<li>'
                                                        .Html::a('<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                            Kelola Album', ['albums/index'])
                                                        .'</li">'

                                                        .'</ul>'
                                                        .'</li>';

                                        $menuItems[] = '<li class="menu__item">'
                                                    .Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"></span> User', 
                                                    ['user/index'], ['class' => 'menu__link']).
                                                    '</li>';
                                    }
                                    elseif(Yii::$app->user->identity->level == "petugas_piket"){
                                        $menuItems[] = '<li class="menu__item">'
                                                       .Html::a('<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Jadwal', 
                                                        ['jadwal/index'], ['class' => 'menu__link']).
                                                        '</li>';

                                    }
                                     else{

                                        $menuItems[] = '<li class="menu__item">'
                                                       .Html::a('<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Album', 
                                                        ['albums/index'], ['class' => 'menu__link']).
                                                        '</li>';
                                    }
                            
                                    $menuItems[] = '<li class="dropdown menu__item">'
                                        .Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"></span> '. Yii::$app->user->identity->username ,'', ['class' => 'dropdown-toggle menu__link','data-toggle'=>"dropdown"])

                                        .'<ul class="dropdown-menu agile_short_dropdown">'
                                        .'<li>'
                                        .Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Akun Saya', ['user/update', 'id' => Yii::$app->user->identity->id])
                                        .'</li">'
                                        .'<li >'
                                        .Html::a('<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout', 
                                                    Url::to(['/site/logout']),['data-method'=>'post'])
                                        .'</li">'
                                        . '</li>'
                                        .'</ul>'
                                        .'</li>';
                                }
                                echo Nav::widget([
                                    'options' => ['class' => 'navbar-nav navbar-left'],
                                    'items' => $menuItems,
                                ]);

                            ?> 

                        </ul>
                        
                    </nav>
                </div>
            </nav>

        </div>
    </div>
<!-- //header -->
<!-- banner -->
    <div class="banner-silder">
        <div id="JiSlider" class="jislider">
            <ul>
                <li>
                    <div class="w3layouts-banner-top">

                            <div class="container">
                                 <div class="agileits-banner-info">
                                     <span>Sidokumentasi</span>
                                    <h3>Selamat Datang</h3>
                                </div>
                            </div>
                        </div>
                </li>
                <li>
                        <div class="w3layouts-banner-top w3layouts-banner-top1">
                            <div class="container">
                                 <div class="agileits-banner-info">
                                     <span>Sidokumentasi</span>
                                    <h3>Selamat Datang</h3>
                                </div>
                            </div>
                        </div>
                </li>
                <li>
                        <div class="w3layouts-banner-top w3layouts-banner-top2">
                            <div class="container">
                                <div class="agileits-banner-info">
                                     <span>Sidokumentasi</span>
                                    <h3>Selamat Datang</h3>
                                </div>
                            </div>
                        </div>
                    </li>
            </ul>
        </div>
      </div>
</div>
<!-- //banner -->
    <!--about-->
<div class="about" id="about">
    <div class="container">
        <div class="about-main">
            <div class="col-md-6 about-left_w3ls_img">
                
            </div>
            <div class="col-md-6 about-right_w3ls">
          <div class="about-top_agile_its">
            <h2>Sidokumentasi</h2>
            <h5>Biro Humas & Protokol Jatim</h5>
            <p>Sidokumentasi adalah sebuah sistem informasi yang dapat membantu anda dalam mencari foto dolumentasi dari Pemerintah Provinsi Jawa Timur secara nyata. Anda akan dimudahkan dalam mencari foto dokumentasi yang anda perlukan. Selain menemukan foto dokumentasi yang anda perlukan, anda juga dapat mendownloadnya gratis. Foto ini 100% dapat dipertanggungjawabkan karena langsung dari Biro HUmas dan Protokol Pemprov Jatim</p>
            <span>Selamat mencoba aplikasi kami</span>
      </div>
   <div class="clearfix"> </div>
       </div>
    </div>
</div>
    <!-- //about -->
    <!-- Tooltip -->
                <div class="tooltip-content">

                    <div class="modal fade features-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Some few words</h4>
                                </div>
                                <div class="modal-body">
                                    <img src="images/g4.jpg" alt="Photostat">
                                    <h5>Fishing Season Now Open</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent varius lectus vitae porttitor fringilla. Donec turpis orci, elementum a nunc quis, maximus varius ipsum. Sed bibendum ex in dignissim bibendum.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- //Tooltip -->

 <!-- stats -->
    <div class="stats jarallax" id="stats">
      <div class="agile_overlay2">
        <div class="container"> 
        <div class="agileits_heading_section">
                <h3 class="wthree_head two">Foto yang Diupload</h3>
            </div>
            <div class="inner_w3l_agile_grids">
        <div class="col-md-4 w3layouts_stats_left w3_counter_grid">
            <i class="fa fa-sun-o" aria-hidden="true"></i>
            <p class="counter"><?php echo $gub?></p>
            <h3>Gubernur</h3>
        </div>
        <div class="col-md-4 w3layouts_stats_left w3_counter_grid1">
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <p class="counter"><?php echo $wagub?></p>
            <h3>Wagub</h3>
        </div>
        <div class="col-md-4 w3layouts_stats_left w3_counter_grid2">
        <i class="fa fa-certificate" aria-hidden="true"></i>
            <p class="counter"><?php echo $sekda?></p>
            <h3>Sekda</h3>
        </div>
        <div class="col-md-4 w3layouts_stats_left w3_counter_grid3">
        <i class="fa fa-asterisk" aria-hidden="true"></i>
            <p class="counter"><?php echo $bugub?></p>
            <h3>Bu Gubernur</h3>
        </div>
        <div class="col-md-4 w3layouts_stats_left w3_counter_grid3">
        <i class="fa fa-book" aria-hidden="true"></i>
            <p class="counter"><?php echo $buwagub?></p>
            <h3>Bu Wagub</h3>
        </div>
        <div class="col-md-4 w3layouts_stats_left w3_counter_grid3">
        <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
            <p class="counter"><?php echo $busekda?></p>
            <h3>Bu Sekda</h3>
        </div>

        <div class="clearfix"> </div>
    </div>
   </div>   
</div>
</div>
<!-- //stats -->
<!--start-gallery-->
<div class="gallery" id="gallery">
     <div class="agileits_heading_section">
            <h3 class="wthree_head">TAMPILAN FOTO</h3>
            <p class="w3l_sub_para_agile">Oleh Biro Humas & Protokol Jatim</p>
    </div>
            <div class="inner_w3l_agile_grids">
            <?php 
            
            $tampil = Fotos::find()->where(['status'=>'tampil home'])->orderBy('prioritas_home ASC')->all();
            ?> 
            <?php foreach ($tampil as $key ) { 
            if ($key->foto!='') { ?>
                    <div class="col-md-2 gallery-grid gallery1">
                        <a href="<?php echo Yii::$app->urlManager->createUrl(['/albums/view','id'=>$key->album_id]) ?>" >
                            <img src="<?php echo Yii::$app->request->baseUrl?>/Foto/compress/<?php echo $key->foto;?>" class="img-responsive" alt="/" style="width:200px;height:400px;">
                            <div class="textbox">
                                <h4>Biro Humas & Protokol Jatim</h4>
                                <p><i class="fa fa-camera" aria-hidden="true"></i></p>    
                            </div>
                        </a>
                    </div>
                <?php }
            }?>
                <div class="clearfix"> </div>
            </div>
        </div>  
    </div>
        
    <!--//gallery-->
   
  
<div class="contact-w3-agile1 map" data-aos="flip-right">        
       <iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=biro%20humas%20dan%20protokol%20jawa%20tomur%20indonesia+(My%20Business%20Name)&amp
       ;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"></iframe><br />
</div>
<!--footer-->
<div class="agile-footer jarallax">
<div class="agile_overlay1">
         
        <div class="container">
              <div class="cam"><a href="#"><i class="fa fa-camera" aria-hidden="true"></i></a></div>

            <div class="w3_agileits_social_media">
                    <ul>
                        
                        <li><a href="http://birohumas.jatimprov.go.id/" class="wthree_facebook"><i class="fa fa-bank" aria-hidden="true"></i></a></li>

                        <li><a href="https://web.facebook.com/humasprovjatim/?_rdc=1&_rdr" class="wthree_twitter"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

                        <li><a href="https://www.instagram.com/humasprovjatim/" class="wthree_dribbble"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        
                        <li><a href="https://twitter.com/humasprovjatim" class="wthree_rss"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>

            <div class="copy-right">
                <p>© 2018 Biro Humas dan Protokol Pemerintah Provinsi Jawa Timur</p>
            </div>
        </div>
    </div>
</div>
 <!-- //footer -->

<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    <!-- js -->
<script src="js/jquery-2.1.4.min.js"></script> 
<script src="js/JiSlider.js"></script>
        <script>
            $(window).load(function () {
                $('#JiSlider').JiSlider({color: '#fff', start: 3, reverse: true}).addClass('ff')
            })
        </script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
            <script src="js/jarallax.js"></script>
    <script src="js/SmoothScroll.min.js"></script>
    <script type="text/javascript">
        /* init Jarallax */
        $('.jarallax').jarallax({
            speed: 0.5,
            imgWidth: 1366,
            imgHeight: 768
        })
    </script>

<!-- start-smoth-scrolling -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>
<!-- //for bootstrap working -->
<!-- stats -->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.countup.js"></script>
        <script>
            $('.counter').countUp();
        </script>
<!-- //stats -->
<!-- start-smooth-scrolling -->.
<script type="text/javascript" src="/js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smooth-scrolling -->
<link rel="stylesheet" href="css/swipebox.css">
                <script src="js/jquery.swipebox.min.js"></script> 
                    <script type="text/javascript">
                        jQuery(function($) {
                            $(".swipebox").swipebox();
                        });
                    </script>

<!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */
                                
            $().UItoTop({ easingType: 'easeOutQuart' });
                                
            });
    </script>
<!-- //here ends scrolling icon -->

