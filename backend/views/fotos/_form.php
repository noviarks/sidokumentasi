<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Albums;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Fotos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fotos-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data',
                                                    'style'=>'max-width:500px;margin:0px auto
                                                    ;padding:6px'                    
                                                  ]]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(

            ['Tidak Tampil Home'=>'Tidak Tampil Home','Tampil Home'=>'Tampil Home'],['prompt'=>'Status'] )
    ?>

    <?= $form->field($model, 'prioritas_home')->dropDownList(

            ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6'],['prompt'=>'Prioritas'] )
    ?>

    <div class="form-group">
        <?= Html::submitButton('<span class="glyphicon glyphicon-pencil" 
            aria-hidden="true"></span> Update', ['class' => 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
