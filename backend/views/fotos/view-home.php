<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Fotos;
use backend\models\Objects;
use yii\helpers\Url;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\Albums */

$this->title = "Tampilan Foto Home";
$this->params['breadcrumbs'][] = ['label' => 'Album', 'url' => ['albums/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albums-view">

    <h1><?= Html::encode($this->title) ?></h1><br>  

    <?php 

        $tampil = Fotos::find()->where(['status' => "tampil home"])->orderBy('prioritas_home ASC')->all();

    ?> 

    <br><br>

    <div class="col-md-8-offset-2" style="margin-left:60px ">   
        <?php foreach ($tampil as $key ) { 
            if ($key->foto!='') { ?>
                <div class="col-md-3" style="float:left;">
                    <figure>
                        <a href="<?php echo Yii::$app->urlManager->createUrl(['/fotos/view','id'=>$key->id_foto]) ?>">
                            <img class="img-responsive" src="<?php echo Yii::$app->request->baseUrl?>/Foto/compress/<?php echo $key->foto;?>" style="max-width:270px;height:200px;">
                            <figcaption style="margin-top: 10px;margin-bottom:10px;">
                                <center>
                                    <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update', ['update-home', 'id' => $key->id_foto], ['class' => 'btn btn-primary'])
                                    ?>
                                </center>
                            </figcaption>
                        </a>
                    </figure>  
                </div> 
    <?php   } 
        } 
        ?>
    </div>
     

    <br><br>
</div>

<script src="../../js/jquery-2.1.4.min.js"></script> 
<script type="text/javascript" src="../../js/bootstrap-3.1.1.min.js"></script>