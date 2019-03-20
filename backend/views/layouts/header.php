<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap\Nav;
    
?>
<!-- header -->
<?= Html::csrfMetaTags() ?>
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
                                }else {
                                    if(Yii::$app->user->identity->level == "pegawai"){
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