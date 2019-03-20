<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Objects;
use backend\models\Kategori;
use dosamigos\datepicker\DatePicker;
use kartik\typeahead\Typeahead;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\Albums */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="albums-form">

    <?php $form = ActiveForm::begin(['options'=>['style'=>'max-width:500px;margin:0px auto;']]); ?>

    <?= $form->field($model, 'object_id')->dropDownList(

            ArrayHelper::map(Objects::find()->all(),'id_object','nama_object'),['prompt'=>'Object']
    )?>
    
    <?= $form->field($model, 'kategori_id')->dropDownList(

            ArrayHelper::map(Kategori::find()->all(),'id_kategori','kategori'),['prompt'=>'Kategori']
    )?>

    <?= $form->field($model, 'tgl_post')->widget(
        DatePicker::className(), [
            // inline too, not bad
             'inline' => false, 
             'language' => 'id',
             
             // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ]
    ]); ?>

    <?= $form->field($model, 'nama_album')->textInput(['maxlength' => true]) ?>    

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'terbaru')->dropDownList(

            ['ya'=>'ya','tidak'=>'tidak'],['prompt'=>'Status'] )
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Simpan' : '<span class="glyphicon glyphicon-pencil" 
            aria-hidden="true"></span> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

