<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Fotos;
use backend\models\User;
use backend\models\Objects;
use yii\helpers\Url;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\Albums */

$this->title = "Lihat Album";
$this->params['breadcrumbs'][] = ['label' => 'Album', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albums-view">

    <h1><?= Html::encode($this->title) ?></h1><br>  
    
    <?php if(Yii::$app->user->isGuest == false) {?>
    <p>
        
        <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update', 
            ['update', 'id' => $model->id_album], ['class' => 'btn btn-primary']) ?>

        <?= Dialog::widget([

            'overrideYiiConfirm' => true,
            'options' => [  
                'type' => Dialog::TYPE_WARNING, 
                'title' => Yii::t('kvdialog', 'Konfirmasi'),
                'btnOKClass' => 'btn-warning',
                'btnOKLabel' => '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' 
                                . Yii::t('kvdialog', ' Ya'),
                'btnCancelLabel' => '<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>' 
                                    . Yii::t('kvdialog', ' Tidak')
            ],
        ]);?>
        <?= Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Album', 
            ['delete', 'id' => $model->id_album], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php } ?>

    <br>    
    
    <?= DetailView::widget([

        'model' => $model,
        'attributes' => [
            'object.nama_object',
            'tgl_post',
            'nama_album',
            'keterangan',
            [
                'attribute'=>'user.nama_lengkap',
                'label'=>'Pembuat Album',            
            ], 
        ],
        
    ]) ?>

    <?php if(Yii::$app->user->isGuest == false) {?>
        
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Upload Foto'
                    , ['fotos/upload','id'=>$model->id_album], ['class' => 'btn btn-success']) 
            ?> 
        </p>
    <?php } ?>

    <?php 

        $tampil = Fotos::find()->where(['album_id'=> $model->id_album])->orderBy('id_foto DESC')->all();

    ?> 

    <br><br>

    <div class="col-md-8-offset-2" style="margin-left:20px ">   
        <?php foreach ($tampil as $key ) { 
            if ($key->foto!='') { ?>
                    <figure style="overflow:scroll;float:left;width:220px;height:200px">
                        <a href="<?php echo Yii::$app->urlManager->createUrl(['/fotos/view','id'=>$key->id_foto]) ?>">
                           
                            <img class="img-thumbnail" src="<?php echo Yii::$app->request->baseUrl?>/Foto/compress/<?php echo $key->foto;?>" class='img-thumbnails'/ style="width:220px;height:auto;">
                            <figcaption style="word-break: break-all;width:200px">
                                <center>
                                    <p ><?php echo "$key->nama"?></p>
                                </center>
                            </figcaption>
                        </a>
                    </figure>  
                
    <?php   } 
        } 
        ?>
    </div>
     

    <br><br>
</div>
