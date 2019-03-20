<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\Fotos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fotos-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data',
                                                    'style'=>'max-width:500px;margin:0px auto
                                                    ;padding:6px'                    
                                                  ]]); ?>
    
    <div class="row">
      <?= $form->field($upload, 'album_id')->dropDownList($albums) ?>
      <?= $form->field($upload, 'foto[]')->widget(FileInput::classname(), [
              'options' => ['accept' => 'image/*', 'multiple' => true],
               'pluginOptions'=>['allowedFileExtensions'=>['jpg','jpeg','gif','png'],
                                  'showUpload' => true,
                                  'showRemove' => true,
                                  'previewFileType' => 'image',
                                  'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                                  'browseLabel' =>  'Pilih Foto',
                                  'browseClass' => 'btn btn-primary btn-block',
                                  'showCaption' => false,
                                  'showCancel' => false,
                                  'maxImageWidth' => 800,
                                  'maxImageHeight'=> 600,
                                  'resizePreference'=>'height',
                                  'resizeImage'=>true,
                                ],
          ]);   ?>
   
    </div>

    <?php ActiveForm::end(); ?>

</div>
