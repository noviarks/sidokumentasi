<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Buat Akun';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$listLevel = [
    'admin'=>'admin',
    'pegawai'=>'pegawai',
];
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Silahkan isi form di bawah ini : </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'nama_lengkap')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'username')->textInput() ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
                
                <?= $form->field($model, 'level')->dropDownList($listLevel, ['prompt'=>'-pilih level-']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Buat Akun', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<script src="../../js/jquery-2.1.4.min.js"></script> 
<script type="text/javascript" src="../../js/bootstrap-3.1.1.min.js"></script>