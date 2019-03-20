<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */

$listLevel = [
    'admin'=>'admin',
    'pegawai'=>'pegawai',
];
?>


<div class="user-form">

    <?php $form = ActiveForm::begin(['options'=>['style'=>'max-width:500px;margin:0px auto;']]); ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->dropDownList($listLevel, ['prompt'=>'-pilih level-']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
