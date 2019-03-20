<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Fotos;
use kartik\dialog\Dialog;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $model app\modules\pegawai\models\Foto */

$this->title = "Lihat Foto";
$this->params['breadcrumbs'][] = ['label' => 'Album', 'url' => ['albums/index']];
$this->params['breadcrumbs'][] = ['label' => 'Lihat Album', 'url' => ['albums/view','id'=>$model->album_id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="foto-view">
    <div style="max-width:700px;margin:0px auto;">   
        <?php if($model->prev!=null){ ?>
            <?= Html::a('<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Sebelumnya '
                , ['fotos/view', 'id' => $model->prev->id_foto]); ?>
        <?php }?>

        <?php if($model->next!=null){ ?>
            <?= Html::a('Selanjutnya <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
                , ['fotos/view', 'id' => $model->next->id_foto],['style'=>'float:right']); ?>
        <?php }?>

        <?php
           if ($model->foto!='') {
             echo '<br /><p><center><img src="http://localhost/sidokumentasi/backend/web/Foto/compress/'.$model->foto.'" class="img-responsive img-thumbnail" style="height:40%; width:700px;" ></center></p>';
           }    
        ?><br>
    </div>
    
    <div class="text-center">

        <?= Html::a('<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download'
                , ['download', 'foto' => $model->foto,'id'=>$model->id_foto], ['class' => 'btn btn-success']) ?>

        <?php if(Yii::$app->user->isGuest == false) {?>
            <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
                    Update', ['update', 'id' => $model->id_foto], ['class' => 'btn btn-primary'])
            ?>

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

            <?= Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Foto'
                , ['delete', 'id' => $model->id_foto], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Apakah anda yakin ingin menghapus foto ini?',
                        'method' => 'post',
                    ],
            ]) ?>

        <?php } ?>
    </div>

    <br><br>

     <?php if(Yii::$app->user->isGuest == false) {?>   
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nama',
                'status',
                [
                    'attribute'=>'user.nama_lengkap',
                    'label'=>'Diupload Oleh',            
                ],
            ],

        ]) ?>

    <?php } ?>

    
</div>
